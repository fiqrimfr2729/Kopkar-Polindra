<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Dashboard extends Controller
{
    public function index(Request $request){
        if($request->session()->exists('username')){
            $menu = 'dashboard';

            return view('admin.dashboard', compact('menu'));
          }else{
            return redirect()->route('login_admin');
        }
    }
}
