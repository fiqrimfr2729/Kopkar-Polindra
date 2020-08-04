<?php

namespace App\Http\Controllers\Pengurus;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SimpananController extends Controller
{
    public function pokok_anggota(){
        $menu = 'anggota';
        
        

        return view('pengurus.anggota_simpanan', compact('menu'));
    }
}
