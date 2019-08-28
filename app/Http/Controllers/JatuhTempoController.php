<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pembayarandet;
use Carbon\Carbon;

class JatuhTempoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Carbon::setLocale('id');
        // $now = Carbon::today();
        // $till = Carbon::today()->addWeeks(1);
        $bulan = date('m', strtotime(Carbon::today()->addWeeks(1)));
        $namabulan = date('F', strtotime(Carbon::today()->addWeeks(1)));
        $tahun = date('Y', strtotime(Carbon::today()->addWeeks(1)));
        // $jatuhtempos = Pembayaran::whereBetween('wktKeluar', [$now, $till])->get();
    //   $jatuhtempos = Pembayaran::whereYear('tglKeluar', $q->year)->whereMonth('tglKeluar', $q->month)->get();
        $jatuhtempos = Pembayarandet::where('tahun', $tahun)->where('bulan', $bulan)->where('status',0)->join('penghuni','pembayarandet.id_penghuni','=','penghuni.id_penghuni')->get();

        return view('JatuhTempo.jatuhtempo', compact('jatuhtempos', 'namabulan', 'tahun'));
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
        //
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
