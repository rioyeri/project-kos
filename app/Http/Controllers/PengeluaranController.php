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
        $pengeluarans = Pengeluaran::orderBy('tanggal', 'DESC')->get();
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
      try{
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
        $keuangan->save();

        return redirect('/lihatpengeluaran');
      }catch(\Exception $a){
        return redirect()->back()->withErrors($a->errorInfo);
        // return response()->json($e);
      }
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
      $data->tanggal=$request->tanggal;
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
      try{
        $pengeluaran = Pengeluaran::find($id);
        $keuangan = Keuangan::where('trx_jenis', 0)->where('trx_id', $id)->first();
        $keuangan->delete();
        $pengeluaran->delete();
        return redirect('/lihatpengeluaran');
      }catch(\Exception $a){
        return redirect()->back()->withErrors($a->errorInfo);
        // return response()->json($e);
      }
    }
}
