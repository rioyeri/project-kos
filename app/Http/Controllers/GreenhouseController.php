<?php

namespace App\Http\Controllers;

use App\Models\Greenhouse;
use Illuminate\Http\Request;

class GreenhouseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $greenhouse = Greenhouse::where('id', 1)->first();

        return view('Setting.Greenhouse.form', compact('greenhouse'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
      try{
        $data = Greenhouse::where('id', $id)->first();
        $data->welcome = $request->welcome;
        $data->welcome_desc = $request->welcome_desc;
        $data->galeri_desc = $request->galeri_desc;
        $data->alamat = $request->alamat;
        $data->kota = $request->kota;
        $data->email = $request->email;
        $data->noHP = $request->noHP;

        $data->save();
        return redirect()->route('greenhouse.index')->with('status', 'Data Greenhouse berhasil diedit!');
      }catch(\Exception $e){
        return redirect()->back()->withErrors($e->getMessage());
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
        //
    }
}
