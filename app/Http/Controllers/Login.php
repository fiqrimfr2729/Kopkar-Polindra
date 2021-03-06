<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Login extends Controller
{
    public function index(Request $request){
        if($request->session()->exists('pengurus')){
            return redirect()->route('dashboard_pengurus');
          }else{
            return view('login');
        }
    }

    public function login(Request $request){
        $auth = auth()->guard('anggota');

        $credentials = [
          'email'    => $request->email,
          'password' => $request->password,
        ];

        $validator = Validator::make($request->all(), [
          'email'   => 'required|max:15|alpha_dash',
          'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
          return response()->json([
            'error'   => 1,
            'message' => $validator->messages(),
          ], 200);
        } else {
          if ($auth->attempt($credentials)) {
            $request->session()->put('email', $request->email);
            return response()->json([
              'error'   => 0,
              'message' => 'Login Success',
              'username'   => $request->email
            ], 200);
          } else {
            return response()->json([
              'error'   => 2,
              'message' => 'Wrong Username or Password'
            ], 200);
          }
        }
    }
}
