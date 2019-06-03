<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kamar;
use App\Models\Penghuni;
use App\Models\Mapping;

class MappingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function ajx(Request $request)
    {
      $getKamar = Mapping::where('id_penghuni', $request->id_peng)->first();
      $result = $getKamar->id_kamar;

      echo $result;

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $mappeng = Mapping::all('id_penghuni');
      $mapkam = Mapping::all('id_kamar');
      $mappings = Mapping::all();
      $kamars = Kamar::whereNotIn('id_kamar', $mapkam)->get();
      $penghunis = Penghuni::whereNotIn('id_penghuni', $mappeng)->get();

      return view('Mapping.mapping_kamar', compact('kamars', 'penghunis', 'mappings', 'mappeng'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $mapping = new Mapping;
      $mapping->id_penghuni = $request->penghuni_id;
      $mapping->id_kamar = $request->kamar_id;
      if (Mapping::where('id_kamar', $mapping->id_kamar)->first()){
        return redirect('/mapping/tambah')->with('alert', 'Kamar sudah dihuni penghuni lain!');
      }else{
        $mapping->save();
        return redirect('/mapping/tambah')->with('success', 'Mapping PENGHUNI-KAMAR berhasil dibuat');
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
        $data = Mapping::find($id);
        $data->delete();
        return redirect()->back()->with('info', 'Mapping Kamar terhapus!');
    }
}
