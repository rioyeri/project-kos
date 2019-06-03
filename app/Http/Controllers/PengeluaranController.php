<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengeluaran;
use App\Models\Keuangan;

class PengeluaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengeluarans = Pengeluaran::all();
        return view('Pengeluaran.lihatPengeluaran', compact('pengeluarans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $pengeluarans = Pengeluaran::all();
      return view('Pengeluaran.tambahPengeluaran', compact('pengeluarans'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Pengeluaran;
        $data->namaPJ=$request->namaPJ;
        $data->jumlah=$request->jumlah;
        $tgl = strtotime($request->tanggal);
        $tgl = date('Y-m-d',$tgl);
        $data->tanggal=$tgl;
        $data->keterangan=$request->keterangan;
        $data->save();

        $pengeluaran = Pengeluaran::latest()->first()->id_pengeluaran;
        $keuangan = new Keuangan;
        $keuangan->trx_jenis = 0;
        $keuangan->trx_id = $pengeluaran;
        $getSaldo = Keuangan::all();

        if(!empty($getSaldo->last())){
          $keuangan->saldo = $getSaldo->last()->saldo - $request->jumlah;
        }else{
          $keuangan->saldo = $request->jumlah;
        }
        $keuangan->save();

        return redirect('/lihatpengeluaran');
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
        $pengeluaran = Pengeluaran::find($id);
        return view('Pengeluaran.bayarPengeluaran', compact('pengeluaran'));
    }

    public function edit2($id)
    {
        $pengeluaran = Pengeluaran::find($id);
        return view('Pengeluaran.editPengeluaran', compact('pengeluaran'));
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
      $data = Pengeluaran::find($id);
      $data->namaPJ=$request->namaPJ;
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
      $data->statusPengeluaran=$status;
      $data->update();
      return redirect('/lihatpengeluaran');
    }

    public function update2(Request $request, $id)
    {
      $data = Pengeluaran::find($id);
      $data->namaPJ=$request->namaPJ;
      $data->keterangan=$request->keterangan;
      $data->jumlah=$request->jumlah;
      $data->update();
      return redirect('/lihatpengeluaran');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pengeluaran = Pengeluaran::find($id);
        $pengeluaran->delete();
        return redirect('/lihatpengeluaran');
    }
}
