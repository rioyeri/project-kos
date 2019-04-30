<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function Login(Request $request)
    {
      if($request->username=="admin" && $request->password=="greenhouse"){

        return view('Home.home');
      }else{

        return redirect('/');
      }
    }

}
