<?php

namespace App\Http\Controllers;

use App\blok;
use Illuminate\Http\Request;

class BlokController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $bloks = blok::all();
      return view('Kamar.tambahkamar', compact('bloks'));
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
     * @param  \App\blok  $blok
     * @return \Illuminate\Http\Response
     */
    public function show(blok $blok)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\blok  $blok
     * @return \Illuminate\Http\Response
     */
    public function edit(blok $blok)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\blok  $blok
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, blok $blok)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\blok  $blok
     * @return \Illuminate\Http\Response
     */
    public function destroy(blok $blok)
    {
        //
    }
}
