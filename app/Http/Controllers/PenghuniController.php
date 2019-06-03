<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penghuni;
Use App\Http\Controllers\Session;


class PenghuniController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $penghunis = Penghuni::all();
      return view('Penghuni.lihatPenghuni', compact('penghunis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $penghunis = Penghuni::all();
      return view('Penghuni.tambahPenghuni', compact('penghunis'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $penghuni = new Penghuni;
      $penghuni->id_penghuni=$request->id_penghuni;
      $penghuni->noKTP=$request->noKTP;
      $penghuni->nama=$request->nama;
      $penghuni->jenisKelamin=$request->jenisKelamin;
      $penghuni->tempatLahir=$request->tempatLahir;
      $tglLahir = strtotime($request->tanggalLahir);
      $tglLahir = date('Y-m-d',$tglLahir);
      $penghuni->tanggalLahir=$tglLahir;
      $penghuni->noHP=$request->noHP;
      $penghuni->pekerjaan=$request->pekerjaan;
      $penghuni->alamatAsli=$request->alamatAsli;
      $penghuni->save();

      return redirect('/lihatpenghuni')->with('success', 'Data Penghuni berhasil ditambahkan!');
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
        $penghuni = Penghuni::find($id);
        return view('Penghuni.editPenghuni', compact('penghuni'));
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
      $penghuni = Penghuni::find($id);
      $penghuni->noKTP=$request->noKTP;
      $penghuni->nama=$request->nama;
      $penghuni->jenisKelamin=$request->jenisKelamin;
      $penghuni->tempatLahir=$request->tempatLahir;
      $tglLahir = strtotime($request->tanggalLahir);
      $tglLahir = date('Y-m-d',$tglLahir);
      $penghuni->tanggalLahir=$tglLahir;
      $penghuni->noHP=$request->noHP;
      $penghuni->pekerjaan=$request->pekerjaan;
      $penghuni->alamatAsli=$request->alamatAsli;
      $penghuni->update();
      return redirect('/lihatpenghuni')->with('info', 'Data Berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $penghuni = Penghuni::find($id);
      $penghuni->delete();
      return redirect('/lihatpenghuni')->with('info', 'Data Penghuni berhasil dihapus!');
    }
}
