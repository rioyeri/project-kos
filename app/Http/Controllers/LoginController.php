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

          return view('JatuhTempo.jatuhtempo', compact('jatuhtempos', 'namabulan', 'tahun', 'user_id'));
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

          echo("here");die();
          return redirect()->back();

      }else{
          $user = User::where('username',$request->username)->first();

          // FOUND
          if($user && Hash::check($request->password, $user->password)){
              $request->session()->put('username', $request->username);
              $request->session()->put('isLoggedIn', 'Ya');

              return redirect()->route('getHome');

          // NOT FOUND
          }else{
            echo "<pre>";
            print_r('NOT FOUND');
            die();
              return redirect()->back();
          }
      }

  }

  public function logout(Request $request){
    $request->session()->flush();

    return redirect()->route('getHome');
  }

}
