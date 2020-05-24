<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JaminanKunci;
use App\Models\Penghuni;
use App\Models\Mapping;
use App\Models\Kamar;

class JaminankunciController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jaminankuncis = JaminanKunci::all();
        $penghunis = Penghuni::all();
        return view('Jaminankunci.lihatJaminankunci', compact('jaminankuncis','penghunis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jaminankuncis = JaminanKunci::all();

        $mapping = Mapping::join('penghuni', 'mappingkamar.id_penghuni', '=', 'penghuni.id_penghuni')->select('penghuni.nama', 'mappingkamar.id_kamar', 'penghuni.id_penghuni')->get();
        $kamars = Kamar::all();
        return view('Jaminankunci.tambahJaminanKunci', compact('jaminankuncis','kamars', 'mapping'));
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
        $data = new JaminanKunci;
        $data->penghuni_id=$request->penghuni_id;
        $data->jaminan=$request->jaminan;
        $data->save();

        return redirect('/lihatpenghuni')->with('success','Data berhasil disimpan');
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
        if(JaminanKunci::where('penghuni_id', $id)->count() != 0){
          $jenis = "edit";
        }else{
          $jenis = "create";
        }

        $jaminankunci = JaminanKunci::where('penghuni_id',$id)->first();
        $penghuni = Penghuni::where('id_penghuni', $id)->first();
        // $mapping = Mapping::join('penghuni', 'mappingkamar.id_penghuni', '=', 'penghuni.id_penghuni')->select('penghuni.nama', 'mappingkamar.id_kamar', 'penghuni.id_penghuni')->get();
        return view('JaminanKunci.editJaminanKunci', compact('jaminankunci', 'penghuni', 'jenis'));
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
      try{
        $data = JaminanKunci::find($id);
        $data->penghuni_id=$request->penghuni_id;
        $data->jaminan=$request->jaminan;
        $data->update();

        return redirect('/lihatpenghuni')->with('info','Data berhasil diupdate');
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
        $jaminankunci = JaminanKunci::find($id);
        $jaminankunci->delete();
        return redirect('/lihatjaminankunci')->with('info', 'Data terpilih berhasil dihapus');
    }
}
