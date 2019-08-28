<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use Illuminate\Http\Request;
Use App\Http\Controllers\Session;
use App\Models\blok;
use App\Models\lantai;
use Sentinel;

class KamarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kamars = Kamar::all();
        return view('Kamar.lihatKamar', compact('kamars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $kamars = kamar::all();
      $bloks = blok::all();
      $lantais = lantai::all();
      return view('Kamar.tambahkamar', compact('bloks'), compact('lantais'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $data = new Kamar;
      $data->blok_id=$request->id_blok;
      $data->lantai_id=$request->id_lantai;
      $data->namaKamar=$request->namaKamar;
      $data->harga=$request->harga;
      $data->save();
      return redirect('/tambahkamar')->with('success', 'Data kamar berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Kamar  $kamar
     * @return \Illuminate\Http\Response
     */
    public function show(Kamar $kamar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kamar  $kamar
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      //if(Sentinel::check()){
        $kamar = Kamar::find($id);
        $bloks = blok::all();
        $lantais = lantai::all();
        return view('Kamar.editKamar',compact('kamar', 'bloks', 'lantais'));
      // }
      // else{
      //   return redirect('/');
      // }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kamar  $kamar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $kamar = Kamar::find($id);
      $kamar->namaKamar = $request->namaKamar;
      $kamar->blok_id = $request->id_blok;
      $kamar->lantai_id = $request->id_lantai;
      $kamar->harga = $request->harga;
      $kamar->update();
      return redirect('/lihatkamar')->with('success', 'Data kamar berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kamar  $kamar
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $kamar = Kamar::find($id);
      $kamar->delete();
      return redirect('/lihatkamar')->with('info', 'Data kamar berhasil dihapus');
    }
}
