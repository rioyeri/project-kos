<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kamar;
use App\Models\Penghuni;
use App\Models\Mapping;
use Carbon\Carbon;
use App\Models\Pembayarandet;
use PDF;

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

      return view('Mapping.mapping_kamar', compact('kamars', 'mappings', 'mappeng'));
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
      $mappings = Mapping::all();
      $kamars = Kamar::all();
      $penghunis = Penghuni::whereNotIn('id_penghuni', $mappeng)->where('status',1)->get();

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
      try{
        $msk = new Carbon($request->masuk);
        $masuk = date('Y-m-d', strtotime($msk));
        $klr = new Carbon($request->keluar);
        $keluar = date('Y-m-d', strtotime($klr));

        $mapping = new Mapping;
        $mapping->id_penghuni = $request->penghuni_id;
        $mapping->id_kamar = $request->kamar_id;
        $mapping->tglMasuk = $masuk;
        $mapping->tglKeluar = $keluar;

        $mapping->save();
        $idmap = Mapping::where('id_penghuni', $request->penghuni_id)->where('id_kamar', $request->kamar_id)->select('id_mapping')->first();
        for($i=0;$i<$request->lamaKontrak;$i++){
          $data1 = new Pembayarandet;
          $data1->id_penghuni = $request->penghuni_id;
          $tglmsk = date('d', strtotime($msk));
          $blnmsk = date('m', strtotime($msk));
          $thnmsk = date('Y', strtotime($msk));
          $data1->id_mapping = $idmap['id_mapping'];
          $data1->tanggal = $tglmsk;
          $data1->tahun = $thnmsk;
          $data1->bulan = $blnmsk;
          $data1->status = 0;
          $data1->save();
          $msk = $msk->addMonths(1);
        }

        return redirect('/mapping/lihat')->with('success', 'Mapping PENGHUNI-KAMAR berhasil dibuat');
      }catch(\Exception $a){
        return redirect()->back()->withErrors($a->getMessage());
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
      $mapping = Mapping::find($id);

      return view('Mapping.edit_mapping', compact('mapping', 'id'));
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
      // echo "<pre>";
      // print_r($request->all());
      // die();
      // $mapping = Mapping::where('id_mapping', $request->id_mapping)->first();
      // $klr = new Carbon($request->keluar);
      // $keluar = date('Y-m-d', strtotime($klr));
      // $mapping->tglKeluar = $keluar;
      // $mapping->update();
      try{
        $msk = new Carbon($request->masuk);
        $masuk = date('Y-m-d', strtotime($msk));
        $klr = new Carbon($request->keluar);
        $keluar = date('Y-m-d', strtotime($klr));

        $data = Mapping::where('id_mapping', $request->id_mapping)->first();
        $mapping = new Mapping;
        $mapping->id_penghuni = $request->penghuni_id;
        $mapping->id_kamar = $data->id_kamar;
        $mapping->tglMasuk = $masuk;
        $mapping->tglKeluar = $keluar;

        $mapping->save();

        for($i=0;$i<$request->lamaKontrak;$i++){
          $data1 = new Pembayarandet;
          $data1->id_penghuni = $request->penghuni_id;
          $blnmsk = date('m', strtotime($msk));
          $thnmsk = date('Y', strtotime($msk));
          $tglmsk = date('d', strtotime($msk));
          $data1->id_mapping = $mapping->id_mapping;
          $data1->tahun = $thnmsk;
          $data1->bulan = $blnmsk;
          $data1->tanggal = $tglmsk;
          $data1->status = 0;
          $data1->save();
          $msk = $msk->addMonths(1);
        }
        return redirect('/mapping/lihat')->with('success', 'Perpanjangan masa sewa disimpan');
      }catch(\Exception $a){
        return redirect()->back()->withErrors($a->getMessage());
        // return response()->json($e);
      }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Mapping::where('id_mapping', $id)->first();
        $masuk = Carbon::createFromFormat('Y-m-d',$data->tglMasuk);
        $keluar = Carbon::createFromFormat('Y-m-d',$data->tglKeluar);
        $count = $masuk->diffInMonths($keluar);
        // echo "<pre>";
        // print_r($count);
        // die();
        // $blnmsk = date('m', strtotime($data->tglMasuk));
        // $thnmsk = date('Y', strtotime($data->tglMasuk));
        // $tglmsk = date('d', strtotime($data->tglMasuk));

        try{
          for($i=0; $i<$count; $i++){
            $blnmsk = date('m', strtotime($masuk));
            $thnmsk = date('Y', strtotime($masuk));
            $tglmsk = date('d', strtotime($masuk));

            PembayaranDet::where('id_mapping', $id)->where('tahun', $thnmsk)->where('bulan', $blnmsk)->where('tanggal', $tglmsk)->delete();
            $masuk = $masuk->addMonths(1);
          }

          $data->delete();
          return redirect()->back()->with('info', 'Mapping Kamar terhapus!');
        }catch(\Exception $e){
          return redirect()->back()->withErrors($e->getMessage());
        }
    }

    public function pdfSuratPerjanjian($id, Request $request){
      $penghuni = Mapping::join('penghuni', 'mappingkamar.id_penghuni', 'penghuni.id_penghuni')->join('kamar', 'mappingkamar.id_kamar', 'kamar.id_kamar')->where('id_mapping', $id)->first();
      $pembayaran = PembayaranDet::where('id_mapping', $id)->where('id_penghuni', $penghuni->id_penghuni)->count();
      // echo "<pre>";
      // print_r($penghuni);
      // die();
      ini_set('max_execution_time', 3000);
      $tgl = date('d F Y', strtotime(Carbon::today()));
      $filename = "Surat Perjanjian ".$penghuni->nama;
      $amount = $penghuni->harga * $pembayaran;

      $datas = ['penghuni'=>$penghuni, 'tgl'=>$tgl];

      // return view('penghuni.pdfSuratPerjanjian', compact('penghuni', 'tgl'));
      // $pdf = PDF::loadview('penghuni.pdfSuratPerjanjian',$datas)->setPaper('a4');

      // $pdf->save(public_path('download/'.$filename.'.pdf'));
      // return $pdf->download($filename.'.pdf');
      if ($request->ajax()) {
        return response()->json(view('Penghuni.pdfSuratPerjanjian',compact('penghuni', 'tgl', 'amount'))->render());
      }else{
          return view('Penghuni.pdfSuratPerjanjian',compact('penghuni', 'tgl', 'amount'));
      }
    }
}
