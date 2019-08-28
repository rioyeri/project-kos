<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kamar;
use App\Models\Penghuni;
use App\Models\Mapping;
use Carbon\Carbon;
use App\Models\Pembayarandet;

class MappingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $mappeng = Mapping::all('id_penghuni');
      $mapkam = Mapping::all('id_kamar');
      $mappings = Mapping::all();
      $kamars = Kamar::whereNotIn('id_kamar', $mapkam)->get();
      $penghunis = Penghuni::whereNotIn('id_penghuni', $mappeng)->get();

      return view('Mapping.mapping_kamar', compact('kamars', 'penghunis', 'mappings', 'mappeng'));
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

      return view('Mapping.tambah_mapping', compact('kamars', 'penghunis', 'mappings', 'mappeng'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      $msk = new Carbon($request->masuk);
      $klr = new Carbon($request->keluar);
      $masuk = date('Y-m-d', strtotime($msk));
      $keluar = date('Y-m-d', strtotime($klr));

      $mapping = new Mapping;
      $mapping->id_penghuni = $request->penghuni_id;
      $mapping->id_kamar = $request->kamar_id;
      $mapping->tglMasuk = $masuk;
      $mapping->tglKeluar = $keluar;

      if (Mapping::where('id_kamar', $mapping->id_kamar)->first()){
        return redirect('/mapping/tambah')->with('alert', 'Kamar sudah dihuni penghuni lain!');
      }else{
        for($i=0;$i<$request->lamaKontrak;$i++){
          $data1 = new Pembayarandet;
          $data1->id_penghuni = $request->penghuni_id;
          $tglmsk = date('d', strtotime($msk));
          $blnmsk = date('m', strtotime($msk));
          $thnmsk = date('Y', strtotime($msk));
          $data1->tanggal = $tglmsk;
          $data1->tahun = $thnmsk;
          $data1->bulan = $blnmsk;
          $data1->status = 0;
          $data1->save();
          $msk = $msk->addMonths(1);
        }
        $mapping->save();
        return redirect('/mapping/lihat')->with('success', 'Mapping PENGHUNI-KAMAR berhasil dibuat');
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
      $mapping = Mapping::find($id);

      return view('Mapping.edit_mapping', compact('mapping'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
      $msk = new Carbon($request->masuk);
      for($i=0;$i<$request->lamaKontrak;$i++){
        $data1 = new Pembayarandet;
        $data1->id_penghuni = $request->penghuni_id;
        $blnmsk = date('m', strtotime($msk));
        $thnmsk = date('Y', strtotime($msk));
        $data1->tahun = $thnmsk;
        $data1->bulan = $blnmsk;
        $data1->status = 0;
        $data1->save();
        $msk = $msk->addMonths(1);
      }
      return redirect('/mapping/lihat')->with('success', 'Perpanjangan masa sewa disimpan');
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
