<?php

namespace App\Http\Controllers\Pengawas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Dashboard extends Controller
{
    public function index(){
        $menu = 'dashboard';
        return view('pengawas.dashboard', compact('menu'));
    }
}
