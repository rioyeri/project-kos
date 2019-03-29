<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use Illuminate\Http\Request;
Use App\Http\Controllers\Session;
use App\Models\blok;
use App\Models\lantai;

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
      // Post::create([
      //   'namaKamar' => request('namaKamar'),
      //   'blok_id' => request('id_blok'),
      //   'lantai_id' => request('id_lantai')
      // ]);

      $data = new Kamar;
      $data->blok_id=$request->id_blok;
      $data->lantai_id=$request->id_lantai;
      $data->namaKamar=$request->namaKamar;
      $data->save();
      Session::flash('success','Data Anda Berhasil Ditambahkan!');
      return redirect('/tambahkamar');
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
    public function edit(Kamar $kamar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kamar  $kamar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kamar $kamar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kamar  $kamar
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kamar $kamar)
    {
        //
    }
}
