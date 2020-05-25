<?php

namespace App\Http\Controllers;

use App\Models\Penghuni;
use App\Models\Kamar;
use App\Models\Pembayaran;
use App\Models\Pembayarandet;
use App\Models\Keuangan;
use App\Models\Mapping;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Storage;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pembayarans = Pembayaran::all();
        $kamar = Kamar::all();
        $penghuni = Penghuni::all();
        $bulan = ["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"];
        $status = ["Semua","Sudah Bayar","Belum Bayar"];
        return view('Pembayaran.lihatPembayaran', compact('pembayarans','kamar','penghuni','bulan','status'));
    }

    public function getAjxTagihan(Request $request)
    {
        $pembayarandets = Pembayarandet::where('id_penghuni', $request->penghuni)->where('status', 0)->get();
        return view('Pembayaran.getAjxTagihan', compact('pembayarandets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mappeng = Mapping::all('id_penghuni');
        $pembayarans = Pembayaran::all();
        $kamars = Kamar::all();
        $penghunis = Penghuni::whereIn('id_penghuni', $mappeng)->where('status', 1)->get();
        $pembayarandets = Pembayarandet::all();
        return view('Pembayaran.tambahPembayaran',compact('pembayarans', 'kamars', 'penghunis','pembayarandets'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      // echo "<pre>";
      // print_r($request->all());
      // die();
      try{
        $data = new Pembayaran;
        $data->penghuni_id=$request->penghuni_id;
        $data->jumlahBayar=$request->jumlahBayar;
        $tglBayar = date('Y-m-d', strtotime($request->tglPembayaran));
        $data->tglPembayaran = $tglBayar;
        $metode = $request->metode;
        $data->metode = $metode;
        if($metode == "transfer"){
          $nama = Penghuni::where('id_penghuni', $request->penghuni_id)->first()->nama;
          // $namabukti = "bukti/$nama";
          // $filebukti = $request->file("buktiBayar")->store($namabukti);
          // $data->buktiBayar=$filebukti;
          if($request->buktitf <> NULL|| $request->buktitf <> ''){
            $buktitf = $nama.'.'.$tglBayar.'.'.$request->buktitf->getClientOriginalExtension();
            // echo $buktitf;
            // die();
            $request->buktitf->move(public_path('images/bukti/'),$buktitf);
            $data->buktiBayar = $buktitf;
          }
        }

        $data->save();

        $pembayaran = Pembayaran::latest()->first()->id_pembayaran;

        for($j=1;$j<=$request->ii;$j++){
          // echo "<pre>";
          // print_r($pembayaran);
          $tagihan = "tagihan$j";
          $det = Pembayarandet::where('id_penghuni', $request->penghuni_id)->where('id',$request->$tagihan)->first();
          if ($request->$tagihan == true){
            $det->id_pembayaran = $pembayaran;
            $det->status = 1;
            $det->update();
          }
        }

        return redirect('/lihatpembayaran')->with('success', 'Data pembayaran berhasil ditambahkan!');
      }catch(\Exception $e){
        // echo $e->getMessage();
        // die();
        return redirect()->back()->withErrors($e->getMessage());
        // return response()->json($e);
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
      $pembayarans = Pembayaran::all();
      $kamar = Kamar::all();
      $penghuni = Penghuni::all();
      return view('Pembayaran.laporanPembayaran', compact('pembayarans','kamar','penghuni'));
    }

    public function sort(Request $request)
    {
      $from = $request->from;
      $to = $request->to;
      $pembayarans = Pembayaran::whereBetween('tglPembayaran', [$from, $to])->get();;
      $kamar = Kamar::all();
      $penghuni = Penghuni::all();
      return view('Pembayaran.laporanPembayaran', compact('pembayarans','kamar','penghuni'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($thn, $bln,$id)
    {
      $thn = $thn;
      $bln = $bln;
      $pembayaran = Pembayaran::find($id);
      // $pembayarandets = Pembayarandet::where('id_pembayaran',$id)->where('tahun',$thn)->where('bulan',$bln)->first();
      $pembayarandets = Pembayarandet::where('id_pembayaran',$id)->get();
      $kamars = Kamar::all();
      $penghunis = Penghuni::all();
      return view('Pembayaran.editPembayaran', compact('pembayaran','kamars','penghunis', 'pembayarandets','thn','bln'));
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
      // echo "<pre>";
      // print_r($request->all());
      // die();
      $metode = $request->metode;
      $data = Pembayaran::find($id);
      $data->jumlahBayar = $request->jumlahBayar;
      $tglBayar = date('Y-m-d',strtotime($request->tglPembayaran));
      $data->tglPembayaran=$tglBayar;

      $nama = Penghuni::where('id_penghuni', $request->penghuni_id)->first()->nama;
      if($metode == "transfer"){
        // Upload Bukti bayar
        if($request->buktitf <> NULL|| $request->buktitf <> ''){

          if (file_exists(public_path('images/bukti/').$data->buktiBayar) ){
              unlink(public_path('images/bukti/').$data->buktiBayar);
          }

          $buktitf = $nama.'.'.$tglBayar.'.'.$request->buktitf->getClientOriginalExtension();
          // echo $buktitf;
          // die();
          $request->buktitf->move(public_path('images/bukti/'),$buktitf);
        }else{
          $buktitf = $data->buktitf;
        }
        // echo "tes";
        // die();
      }elseif($metode == "tunai"){
        if (file_exists(public_path('images/bukti/').$data->buktiBayar)){
          unlink(public_path('images/bukti/').$data->buktiBayar);
        }
        $buktitf = "";
      }else{
        $buktitf = $data->buktitf;
      }

      $data->metode = $metode;
      $data->buktiBayar = $buktitf;

      try{
        $data->update();
        return redirect('/lihatpembayaran')->with('info','Data pembayaran berhasil diupdate');
      }catch(\Exception $a){
        return redirect()->back()->withErrors($a->errorInfo);
        // return response()->json($e);
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($thn, $bln, $id)
    {
        $pembayaran = Pembayaran::find($id);
        $detail = Pembayarandet::where('id_pembayaran',$id)->get();
        $keuangan = Keuangan::where('trx_jenis', 2)->where('trx_id',$id)->first();

        try{
          if($pembayaran->buktiBayar){
            Storage::delete($pembayaran->buktiBayar);
            $nama = Penghuni::where('id_penghuni', $pembayaran->penghuni_id)->first()->nama;
            $namafolder = "bukti/$nama";
            Storage::deleteDirectory($namafolder);
          }
          $pembayaran->delete();
          $keuangan->delete();
          foreach($detail as $det){
            $det->id_pembayaran = null;
            $det->status = 0;
            $det->update();
          }
          return redirect('/lihatpembayaran')->with('info','Data pembayaran terpilih, berhasil dihapus');
        }catch(\Exception $a){
          return redirect()->back()->withErrors($a->errorInfo);
          // return response()->json($e);
        }
    }

    public function ajxDelete(Request $request){
      $pembayaran = Pembayaran::find($request->id);
        if($pembayaran->buktiBayar){
          Storage::delete($pembayaran->buktiBayar);
          $nama = Penghuni::where('id_penghuni', $pembayaran->penghuni_id)->first()->nama;
          $namafolder = "bukti/$nama";
          Storage::deleteDirectory($namafolder);
        }
        $pembayaran->delete();
        return redirect('/lihatpembayaran')->with('info','Data pembayaran terpilih, berhasil dihapus');
    }

    public function AjxShowTable(Request $request){
        $thn = $request->tahun;
        $bln = $request->bulan;
        $bulan = ["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"];
        $namabulan = $bulan[$bln-1];
        $pembayarans = Pembayaran::all();
        $penghunis = Penghuni::all();
        $filterstat = $request->stat;
        if($filterstat == "Semua"){
          $pembayarandets = Pembayarandet::where('tahun', $thn)->where('bulan',$bln)->get();
        }elseif($filterstat == "Belum Bayar"){
          $pembayarandets = Pembayarandet::where('tahun', $thn)->where('bulan',$bln)->where('status',0)->get();
        }elseif($filterstat == "Sudah Bayar"){
          $pembayarandets = Pembayarandet::where('tahun', $thn)->where('bulan',$bln)->where('status',1)->get();
        }

        return view('Pembayaran.AjxShowTable',compact('pembayarans','penghunis', 'pembayarandets','filterstat','thn','bln','namabulan'));
    }

    public function ajxGetKeluar(Request $request){
      $keluar = new Carbon($request->msk);
      $keluar = $keluar->addMonths($request->lamaKontrak);
      $hasil = date('Y-m-d',strtotime($keluar));
      echo $hasil;
    }

    public function ajxGetHarga(Request $request){
      $idpenghuni = Pembayarandet::where('id',$request->det_id)->first()->id_penghuni;
      $idkamar = Mapping::where('id_penghuni',$idpenghuni)->first()->id_kamar;
      $hargakamar = Kamar::where('id_kamar',$idkamar)->first()->harga;
      if(empty($request->jumlah)){
        $jumlah = $hargakamar;
      }else{
        if($request->check == 1){
          $jumlah = $request->jumlah + $hargakamar;
        }elseif($request->check == 0){
          $jumlah = $request->jumlah - $hargakamar;
        }
      }
      echo $jumlah;
    }
}
