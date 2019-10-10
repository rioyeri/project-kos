<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemasukan;
use App\Models\Keuangan;

class PemasukanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $pemasukans = Pemasukan::all();
      return view('Pemasukan.lihatPemasukan', compact('pemasukans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $jenis="create";
      return view('Pemasukan.tambahPemasukan', compact('jenis'));
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
        $data = new Pemasukan;
        $data->namaSumber = $request->namaSumber;
        $data->jumlah = $request->jumlah;
        $data->tanggal = $request->tanggal;
        $data->keterangan = $request->keterangan;
        $data->save();

        $pemasukan = Pemasukan::latest()->first()->id_pemasukan;
        $keuangan = new Keuangan;
        $keuangan->trx_jenis = 1;
        $keuangan->trx_id = $pemasukan;
        $keuangan->save();

        return redirect('/lihatpemasukan');
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
        $pemasukan = Pemasukan::find($id);
        $jenis="edit";
        return view('Pemasukan.tambahPemasukan', compact('pemasukan','jenis'));
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
        $data = Pemasukan::find($id);
        $data->namaSumber=$request->namaSumber;
        $data->keterangan=$request->keterangan;
        $data->tanggal=$request->tanggal;
        $data->jumlah=$request->jumlah;
        $data->update();
        return redirect('/lihatpemasukan');
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
        $pemasukan = Pemasukan::find($id);
        $keuangan = Keuangan::where('trx_jenis', 1)->where('trx_id', $id)->first();
        $keuangan->delete();
        $pemasukan->delete();
        return redirect('/lihatpemasukan');
      }catch(\Exception $a){
        return redirect()->back()->withErrors($a->errorInfo);
        // return response()->json($e);
      }
    }
}
