<?php

namespace App\Http\Controllers\Pengurus;

use DB;
use App\Anggota;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AnggotaController extends Controller
{
    public function index(){
        $menu = 'anggota';
        
        $anggota = DB::table('anggota')->get();

        foreach($anggota as $data){
            $data->simpanan_pokok = DB::table('simpanan_pokok')->where('no_anggota', '=', $data->no_anggota)->sum('jumlah');
            $data->simpanan_wajib = DB::table('simpanan_wajib')->where('no_anggota', '=', $data->no_anggota)->sum('jumlah');
            $data->simpanan_sukarela = DB::table('simpanan_sukarela')->where('no_anggota', '=', $data->no_anggota)->sum('jumlah');
        }

        return view('pengurus.anggota', compact('menu', 'anggota'));
    }

}
