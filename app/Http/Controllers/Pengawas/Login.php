<?php

namespace App\Http\Controllers\Pengawas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Login extends Controller
{
    public function index(){
        return view('pengawas.dashboard');
    }
}
