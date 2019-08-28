<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Pembayarandet;

class LoginController extends Controller
{
    public function Login(Request $request)
    {
      if($request->username=="admin" && $request->password=="greenhouse"){

        Carbon::setLocale('id');
        $bulan = date('m', strtotime(Carbon::today()->addWeeks(1)));
        $namabulan = date('F', strtotime(Carbon::today()->addWeeks(1)));
        $tahun = date('Y', strtotime(Carbon::today()->addWeeks(1)));
        $jatuhtempos = Pembayarandet::where('tahun', $tahun)->where('bulan', $bulan)->where('status',0)->join('penghuni','pembayarandet.id_penghuni','=','penghuni.id_penghuni')->get();

        return view('JatuhTempo.jatuhtempo', compact('jatuhtempos', 'namabulan', 'tahun'));
      }else{

        return redirect('/');
      }
    }

}
