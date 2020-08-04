<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Login extends Controller
{
    public function index(Request $request){
        if($request->session()->exists('username')){
            return redirect()->route('dashboard_admin');
          }else{
            return view('admin.login');
        }
    }

    public function login(Request $request){
        $auth = auth()->guard('admin');

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

    public function logout(Request $request){
        $request->session()->forget('username');
        return redirect()->route('login_admin');
    }
}
