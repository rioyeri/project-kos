<?php

namespace App\Http\Controllers;

use App\Models\Penghuni;
use App\Models\Kamar;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
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
        return view('Pembayaran.lihatPembayaran', compact('pembayarans','kamar','penghuni'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pembayarans = Pembayaran::all();
        $kamars = Kamar::all();
        $penghunis = Penghuni::all();
        return view('Pembayaran.tambahPembayaran',compact('pembayarans', 'kamars', 'penghunis'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $data = new Pembayaran;
      $data->kamar_id=$request->kamar_id;
      $data->penghuni_id=$request->penghuni_id;
      $data->jumlahBayar=$request->jumlahBayar;
      $tglBayar = strtotime($request->tglPembayaran);
      $tglBayar = date('Y-m-d',$tglBayar);
      $data->tglPembayaran=$tglBayar;
      $tglMsk = strtotime($request->tglMasuk);
      $tglMsk = date('Y-m-d',$tglMsk);
      $data->tglMasuk=$tglMsk;
      $tglKlr = strtotime($request->tglKeluar);
      $tglKlr = date('Y-m-d',$tglKlr);
      $data->tglKeluar=$tglKlr;
      $nama = Penghuni::where('id_penghuni', $request->penghuni_id)->first()->nama;
      $namabukti = "bukti/$nama";
      $filebukti = $request->file("buktiBayar")->store($namabukti);
      $data->buktiBayar=$filebukti;
      $data->save();
      //Session::flash('success','Data Anda Berhasil Ditambahkan!');
      return redirect('/lihatpembayaran');
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
    public function edit($id)
    {
      $pembayaran = Pembayaran::find($id);
      $kamars = Kamar::all();
      $penghunis = Penghuni::all();
      return view('Pembayaran.editPembayaran', compact('pembayaran','kamars','penghunis'));
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
      $data = Pembayaran::find($id);
      $data->kamar_id=$request->kamar_id;
      $data->penghuni_id=$request->penghuni_id;
      $data->jumlahBayar=$request->jumlahBayar;
      $tglBayar = strtotime($request->tglPembayaran);
      $tglBayar = date('Y-m-d',$tglBayar);
      $data->tglPembayaran=$tglBayar;
      $tglMsk = strtotime($request->tglMasuk);
      $tglMsk = date('Y-m-d',$tglMsk);
      $data->tglMasuk=$tglMsk;
      $tglKlr = strtotime($request->tglKeluar);
      $tglKlr = date('Y-m-d',$tglKlr);
      $data->tglKeluar=$tglKlr;

      if($data->buktiBayar){
        Storage::delete($data->buktiBayar);
      }

      $nama = Penghuni::where('id_penghuni', $request->penghuni_id)->first()->nama;
      $namabukti = "bukti/$nama";
      $filebukti = $request->file("buktiBayar")->store($namabukti);
      $data->buktiBayar=$filebukti;
      $data->update();
      return redirect('/lihatpembayaran');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pembayaran = Pembayaran::find($id);
        if($pembayaran->buktiBayar){
          Storage::delete($pembayaran->buktiBayar);
          $nama = Penghuni::where('id_penghuni', $pembayaran->penghuni_id)->first()->nama;
          $namafolder = "bukti/$nama";
          Storage::deleteDirectory($namafolder);
        }
        $pembayaran->delete();
        return redirect('/lihatpembayaran');
    }
}
