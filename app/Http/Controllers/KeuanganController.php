<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Keuangan;
use App\Exports\LaporanExport;
use Carbon\Carbon;
use Excel;

class KeuanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $keuangans = Keuangan::all();
        // $pemasukans = Pemasukan::all();
        // $pengeluarans = Pengeluaran::all();
        $keuangans = Keuangan::getKeuangan("desc");
        // echo "<pre>";
        // print_r($data);
        // die();

        // return view('Keuangan.laporanKeuangan', compact('keuangans', 'pemasukans', 'pengeluarans'));
        return view('Keuangan.laporanKeuangan', compact('keuangans'));
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

    public function export(Request $request){
      ini_set('max_execution_time', 3000);

      $tgl = date('Y-m-d', strtotime(Carbon::today()));

      $filename = "Laporan Keuangan (".$tgl.")";
      $data = Keuangan::getKeuangan("asc");
      $i = 0;

      // echo "<pre>";
      // print_r($data);
      // die();
      $export = new LaporanExport($data);

      return Excel::download($export, $filename.'.xlsx');
    }
}
