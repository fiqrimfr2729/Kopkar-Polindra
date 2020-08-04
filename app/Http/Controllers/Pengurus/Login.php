<?php

namespace App\Http\Controllers\Pengurus;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Login extends Controller
{
    public function index(Request $request){
        if($request->session()->exists('pengurus')){
            return redirect()->route('dashboard_pengurus');
          }else{
            return view('pengurus.login');
        }
    }

    public function login(Request $request){
        $auth = auth()->guard('pengurus');

        $credentials = [
          'username'    => $request->username,
          'password' => $request->password,
        ];

        $validator = Validator::make($request->all(), [
          'username'   => 'required|max:15|alpha_dash|regex:/^(?=.*?)(?=.*?[a-z])(?=.*?[0-9])/',
          'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
          return response()->json([
            'error'   => 1,
            'message' => $validator->messages(),
          ], 200);
        } else {
          if ($auth->attempt($credentials)) {
            $request->session()->put('username', $request->username);
            return response()->json([
              'error'   => 0,
              'message' => 'Login Success',
              'username'   => $request->username
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
