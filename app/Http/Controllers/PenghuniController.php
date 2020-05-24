<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penghuni;
use App\Models\Mapping;
use App\Models\dokumenPenghuni;
use App\Imports\PenghuniImport;
use Excel;
use App\Exports\PenghuniExport;
use Carbon\Carbon;

class PenghuniController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $jenis=1;
      $penghunis = Penghuni::where('status',1)->get();
      return view('Penghuni.lihatPenghuni', compact('penghunis', 'jenis'));
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
      try{
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
        $penghuni->status=1;
        $penghuni->save();

        return redirect('/lihatpenghuni')->with('success', 'Data Penghuni berhasil ditambahkan!');
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
      try{
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
      try{
        $penghuni = Penghuni::find($id);
        $penghuni->status = 0;
        $penghuni->update();
        if(Mapping::where('id_penghuni', $id)){
          Mapping::where('id_penghuni', $id)->delete();
        }
        return redirect('/lihatpenghuni')->with('info', 'Data Penghuni berhasil dihapus!');
      }catch(\Exception $a){
        return redirect()->back()->withErrors($a->getMessage());
        // return response()->json($e);
      }
    }

    public function importPenghuni(Request $request)
    {
        //VALIDASI
        $this->validate($request, [
            'file' => 'required|mimes:xls,xlsx'
        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file'); //GET FILE
            Excel::import(new PenghuniImport, $file); //IMPORT FILE
            return redirect()->back()->with(['success' => 'Upload success']);
        }
        return redirect()->back()->with(['error' => 'Please choose file before']);
    }

    public function getPenghuniNonaktif()
    {
      $jenis=0;
      $penghunis = Penghuni::where('status',0)->get();
      return view('Penghuni.lihatPenghuni', compact('penghunis', 'jenis'));
    }

    public function restorePenghuni($id)
    {
      try{
        $penghuni = Penghuni::find($id);
        $penghuni->status = 1;
        $penghuni->update();

        return redirect('/lihatpenghuni')->with('info', 'Data Penghuni berhasil direstore!');
      }catch(\Exception $a){
        return redirect()->back()->withErrors($a->errorInfo);
        // return response()->json($e);
      }
    }

    public function getDokumen(Request $request)
    {
      if($request->ajax()){
        $penghuni = Penghuni::where('id_penghuni', $request->id)->select('id_penghuni', 'nama')->first();
        $dokumen = dokumenPenghuni::join('penghuni', 'dokumenpenghuni.id_penghuni', 'penghuni.id_penghuni')->where('penghuni.id_penghuni',$request->id)->select('id','nama', 'jenis', 'dokumen')->get();

        return response()->json(view('Penghuni.modal',compact('dokumen', 'penghuni'))->render());
      }else{
        $jenis = 1;
        $penghunis = Penghuni::where('status',1)->get();

        return view('Penghuni.lihatPenghuni', compact('penghunis', 'jenis'));
      }
    }

    public function tambahDokumen(Request $request, $id)
    {
      $penghuni = Penghuni::where('id_penghuni', $request->id)->select('id_penghuni', 'nama')->first();
      return view('Penghuni.tambahDokumen', compact('penghuni'));
    }

    public function storeDokumen(Request $request, $id)
    {
      // echo "<pre>";
      // print_r($request->file->getClientOriginalName());
      // die();
      try{
        $penghuni = Penghuni::where('id_penghuni', $id)->first()->nama;
        $data = new dokumenPenghuni;
        $data->id_penghuni = $id;
        $data->jenis = $request->jenis;
        // Upload Foto
        if($request->file <> NULL|| $request->file <> ''){
          $file = $request->jenis.'-'.$penghuni.'.'.$request->file->getClientOriginalExtension();
          $request->file->move(public_path('images/dokumen/'.$penghuni.'/'),$file);
        }
        // $path = "$request->nama/$request->jenis";
        // $file = $request->file("file")->store($path);
        $data->dokumen = $file;
        $data->save();

        return redirect()->route('penghuni.index');
      }catch(\Exception $a){
        return redirect()->back()->withErrors($a->getMessage());
        // return response()->json($e);
      }
    }

    public function destroyDokumen(Request $request, $id)
    {
      try{
        $data = dokumenPenghuni::where('id', $id)->first();
        $nama = Penghuni::where('id_penghuni', $data->id_penghuni)->first()->nama;

        if (file_exists(public_path('images/dokumen/'.$nama.'/').$data->dokumen)) {
              unlink(public_path('images/dokumen/'.$nama.'/').$data->dokumen);
              $data->delete();
        }

        return redirect()->route('penghuni.index');
      }catch(\Exception $a){
        return redirect()->back()->withErrors($a->getMessage());
        // return response()->json($e);
      }
    }

    public function export(Request $request){
      ini_set('max_execution_time', 3000);

      $tgl = date('Y-m-d', strtotime(Carbon::today()));

      $filename = "Daftar Penghuni (".$tgl.")";
      $data = Penghuni::getData("asc");
      $i = 0;

      // echo "<pre>";
      // print_r($data);
      // die();
      $export = new PenghuniExport($data);

      return Excel::download($export, $filename.'.xlsx');
    }
}
