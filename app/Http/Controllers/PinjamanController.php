<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pinjaman;

class PinjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pinjamans = Pinjaman::all();
        return view('Pinjaman.lihatPinjaman', compact('pinjamans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $pinjamans = Pinjaman::all();
      return view('Pinjaman.tambahPinjaman', compact('pinjamans'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Pinjaman;
        $data->namaPeminjam=$request->namaPeminjam;
        $data->jumlah=$request->jumlah;
        $tglPjm = strtotime($request->tglPinjam);
        $tglPjm = date('Y-m-d',$tglPjm);
        $data->tglPinjam=$tglPjm;
        $data->keterangan=$request->keterangan;
        $data->jmlKembali=0;
        $data->statusPinjaman="Belum Lunas";
        $data->save();

        return redirect('/lihatpinjaman');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pinjaman = Pinjaman::find($id);
        return view('Pinjaman.bayarPinjaman', compact('pinjaman'));
    }

    public function edit2($id)
    {
        $pinjaman = Pinjaman::find($id);
        return view('Pinjaman.editPinjaman', compact('pinjaman'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $data = Pinjaman::find($id);
      $data->namaPeminjam=$request->namaPeminjam;
      $data->keterangan=$request->keterangan;
      if($request->jmlKembali<$request->jumlah){
        $data->jmlKembali=$request->jmlKembali;
        $data->jumlah=($request->jumlah-$request->jmlKembali);
        $status = 'Belum Lunas';
      }elseif ($request->jmlKembali>=$request->jumlah) {
        $data->jumlah=0;
        $data->jmlKembali=$request->jmlKembali;
        $status = 'Lunas';
      }
      $tglBlk = strtotime($request->tglKembali);
      $tglBlk = date('Y-m-d',$tglBlk);
      $data->tglKembali=$tglBlk;
      $data->statusPinjaman=$status;
      $data->update();
      return redirect('/lihatpinjaman');
    }

    public function update2(Request $request, $id)
    {
      $data = Pinjaman::find($id);
      $data->namaPeminjam=$request->namaPeminjam;
      $data->keterangan=$request->keterangan;
      $data->jumlah=$request->jumlah;
      $data->update();
      return redirect('/lihatpinjaman');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pinjaman = Pinjaman::find($id);
        $pinjaman->delete();
        return redirect('/lihatpinjaman');
    }
}
