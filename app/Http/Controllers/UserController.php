<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('User.User');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $validator = Validator::make($request->all(), [
        'username' => 'required|string',
        'password' => 'required',
        'nama' => 'required|string',
        'noHP' => 'required',
      ]);

      if ($validator->fails()) {
        return redirect()->back()->withErrors($validator->errors());
      // Validation success
      }else{
        if(session('username')=="superadmin"){
          $user = new User;
          $user->nama = $request->nama;
          $user->username = $request->username;
          $user->password = Hash::make($request->password);
          $user->backup_pass = $request->password;
          $user->no_HP = $request->noHP;
          $user->save();
          return redirect()->route('getHome')->with('status', 'User baru berhasil ditambahkan');
        }else{
          return redirect()->route('getHome')->with('warning', 'Hanya admin yang bisa menambahkan user baru');
        }
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
        $user = User::where('id', $id)->first();

        return view('User.User', compact('user'));
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
      $validator = Validator::make($request->all(), [
        'username' => 'required|string',
        'password' => 'required',
        'nama' => 'required|string',
        'noHP' => 'required',
      ]);

      if ($validator->fails()) {
        return redirect()->back()->withErrors($validator->errors());
      // Validation success
      }else{
        try{
          $user = User::where('id', $id)->first();
          $user->nama = $request->nama;
          $user->password = Hash::make($request->password);
          $user->backup_pass = $request->password;
          $user->no_HP = $request->noHP;
          $user->update();

          return redirect()->route('getHome')->with('status', 'Perubahan berhasil disimpan');
        }catch(\Exception $e){
          return redirect()->back()->withErrors($e->getMessage());
        }
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
