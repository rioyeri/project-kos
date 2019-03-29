<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
  public function login()
  {
      return view('Home.login');
  }

  public function home()
  {
      return view('Home.home');
  }

  public function tambahkamar()
  {
      $lantai = lantai::all();
      $blok = blok::all();
      return view('Kamar.tambahkamar', compact('lantai'));
  }
}
