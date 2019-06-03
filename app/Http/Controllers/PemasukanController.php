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
      return view('Pemasukan.tambahPemasukan');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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
        $getSaldo = Keuangan::all();

        if(!empty($getSaldo->last())){

          $keuangan->saldo = $getSaldo->last()->saldo + $request->jumlah;
        }else{
          $keuangan->saldo = $request->jumlah;
        }
        $keuangan->save();

        return redirect('/lihatpemasukan');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
