<?php

namespace App\Http\Controllers\Pengurus;

use DB;
use App\SimpananHasilUsaha;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SimpananHasilUsahaController extends Controller
{
    public function shu_anggota(){
        $menu = 'simpanan_hasil_usaha';

        $simpanan = DB::table('simpanan_hasil_usaha')
        ->get();

        
        
        
        return view('pengurus.anggota_shu', compact('menu', 'simpanan'));
    }

    public function total_simpanan(Request $request){
        date_default_timezone_set("Asia/Jakarta");
    
        $tahun = $request->tahun;
        $simpanan_wajib = DB::table('simpanan_wajib')->whereYear('tanggal', '=', $tahun)->sum('jumlah');
        $simpanan_pokok = DB::table('simpanan_pokok')->whereYear('tanggal', '=', $tahun)->sum('jumlah');
        $simpanan_sukarela = DB::table('simpanan_sukarela')->whereYear('tanggal', '=', $tahun)->sum('jumlah');

        $total = $simpanan_wajib + $simpanan_sukarela + $simpanan_pokok;

        $jumlah = $total; 
        $jumlah="Rp ". number_format($jumlah,0,',','.');  
        
        return response()->json([
            'jumlah' => $jumlah
          ], 200);
        
    }

}
