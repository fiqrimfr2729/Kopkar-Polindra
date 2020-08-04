<?php

namespace App\Http\Controllers\Pengurus;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Dashboard extends Controller
{
    public function index(){
        $menu = 'anggota';
        return view('pengurus.dashboard', compact('menu'));
    }
}
