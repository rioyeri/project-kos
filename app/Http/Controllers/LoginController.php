<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Carbon\Carbon;
use App\Models\Pembayarandet;

class LoginController extends Controller
{
    public function index(Request $request){
      if ($request->session()->has('isLoggedIn')) {
          $user_id = $request->session()->get('username');

          Carbon::setLocale('id');
          $bulan = date('m', strtotime(Carbon::today()->addWeeks(1)));
          $namabulan = date('F', strtotime(Carbon::today()->addWeeks(1)));
          $tahun = date('Y', strtotime(Carbon::today()->addWeeks(1)));
          // $jatuhtempos = Pembayaran::whereBetween('wktKeluar', [$now, $till])->get();
          // $jatuhtempos = Pembayaran::whereYear('tglKeluar', $q->year)->whereMonth('tglKeluar', $q->month)->get();
          $jatuhtempos = Pembayarandet::where('tahun', $tahun)->where('bulan', $bulan)->join('penghuni','pembayarandet.id_penghuni','=','penghuni.id_penghuni')->get();

          return view('JatuhTempo.jatuhtempo', compact('jatuhtempos', 'namabulan', 'tahun', 'bulan','user_id'));
      }else{
          return view('Home.landingpage');
      }
    }

    public function Loginlama(Request $request)
    {
      if($request->username=="admin" && $request->password=="greenhouse"){

        // Carbon::setLocale('id');
        // $bulan = date('m', strtotime(Carbon::today()->addWeeks(1)));
        // $namabulan = date('F', strtotime(Carbon::today()->addWeeks(1)));
        // $tahun = date('Y', strtotime(Carbon::today()->addWeeks(1)));
        // $jatuhtempos = Pembayarandet::where('tahun', $tahun)->where('bulan', $bulan)->where('pembayarandet.status',0)->join('penghuni','pembayarandet.id_penghuni','=','penghuni.id_penghuni')->where('penghuni.status', 1)->get();

        // return view('JatuhTempo.jatuhtempo', compact('jatuhtempos', 'namabulan', 'tahun'));

        return redirect('/home');
      }else{
        return redirect('/');
      }
    }

    public function login(Request $request){
      // Validate
      $validator = Validator::make($request->all(), [
          'username' => 'required',
          'password' => 'required',
      ]);

      // IF Validation fail
      if ($validator->fails()) {
          return redirect()->back()->with('failed', 'User tidak ditemukan');
      }else{
          $user = User::where('username',$request->username)->first();

          // FOUND
          if($user && Hash::check($request->password, $user->password)){
              $request->session()->put('username', $request->username);
              $request->session()->put('name', $user->nama);
              $request->session()->put('isLoggedIn', 'Ya');

              return redirect()->route('getHome')->with('status', $user->nama.' Berhasil Login!');

          // NOT FOUND
          }else{
            return redirect()->back()->with('failed', 'User tidak ditemukan');
          }
      }

  }

  public function logout(Request $request){
    $request->session()->flush();

    return redirect()->route('getHome');
  }

}
