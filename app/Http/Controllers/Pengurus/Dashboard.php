<?php

namespace App\Http\Controllers\Pengurus;

use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Dashboard extends Controller
{
    public function index(Request $request){
        

        $menu = 'dashboard';
        $anggota = DB::table('anggota')->where('role', '1')->count();
        $pengurus = DB::table('anggota')->where('role', '2')->count();
        $pengawas = DB::table('anggota')->where('role', '3')->count();
        return view('pengurus.dashboard', compact('menu', 'pengurus', 'pengawas', 'anggota'));
    }
}
