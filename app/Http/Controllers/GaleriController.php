<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Galeri;

class GaleriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $galeris = Galeri::all();
      return view('Setting.Galeri.index', compact('galeris'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('Setting.Galeri.form');
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
          $data = new Galeri;
          $data->title=$request->title;
          $data->description=$request->description;

          if($request->image <> NULL|| $request->image <> ''){
            $image = $request->title.' - '.$request->image->getClientOriginalName();

            $request->image->move(public_path('landingpage/gallery/'),$image);
            $data->image = $image;
          }

          $data->save();

          return redirect()->route('galeri.index')->with('success', 'Data Gambar berhasil ditambahkan!');
        }catch(\Exception $e){
          return redirect()->back()->withErrors($e->getMessage());
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
      $galeri = Galeri::where('id', $id)->first();

      return view('Setting.Galeri.form', compact('galeri'));
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
        $data = Galeri::where('id', $id)->first();
        $data->title=$request->title;
        $data->description=$request->description;

        if($request->image <> NULL|| $request->image <> ''){
          if (file_exists(public_path('landingpage/gallery/').$data->image) ){
            unlink(public_path('landingpage/gallery/').$data->image);
          }

          $image = $request->title.' - '.$request->image->getClientOriginalName();
          $request->image->move(public_path('landingpage/gallery/'),$image);
        }else{
          $image = $data->image;
        }
        $data->image = $image;

        $data->update();

        return redirect()->route('galeri.index')->with('success', 'Data Gambar berhasil ditambahkan!');
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
        try{
          Galeri::where('id',$id)->delete();

          return redirect()->route('galeri.index')->with('success', 'Data Gambar berhasil dihapus');
        }catch(\Exception $e){
          return redirect()->back()->withErrors($e->getMessage());
        }
    }
}
