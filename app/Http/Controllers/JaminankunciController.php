<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JaminanKunci;
use App\Models\Penghuni;
use App\Models\Pembayaran;
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
        $pembayarans = Pembayaran::all();
        $penghunis = Penghuni::all();
        $kamars = Kamar::all();
        return view('Jaminankunci.tambahJaminanKunci', compact('jaminankuncis','pembayarans','penghunis','kamars'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new JaminanKunci;
        $data->penghuni_id=$request->penghuni_id;
        $data->jaminan=$request->jaminan;
        $data->save();

        return redirect('/lihatjaminankunci');
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
        $jaminankunci = JaminanKunci::find($id);
        $penghunis = Penghuni::all();
        return view('JaminanKunci.editJaminanKunci', compact('jaminankunci', 'penghunis'));
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
      $data = JaminanKunci::find($id);
      $data->penghuni_id=$request->penghuni_id;
      $data->jaminan=$request->jaminan;
      $data->update();

      return redirect('/lihatjaminankunci');
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
        return redirect('/lihatjaminankunci');
    }
}
