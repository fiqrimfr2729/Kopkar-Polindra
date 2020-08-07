<?php

namespace App\Http\Controllers\Pengawas;

use DB;
use App\SimpananSukarela;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SimpananSukarelaController extends Controller
{
    public function sukarela_anggota(){
        $menu = 'simpanan_sukarela';

        $anggota = DB::table('anggota')
        ->select('no_anggota', 'nama_lengkap')
        ->get();

        foreach($anggota as $data){
            $data->jumlah = DB::table('simpanan_sukarela')->where('no_anggota', '=', $data->no_anggota)->sum('jumlah');
            $data->pengurangan = DB::table('pengurangan_shu_anggota')->where('no_anggota', $data->no_anggota)->sum('jumlah');
        }
        
        
        return view('pengawas.anggota_simpanan_sukarela', compact('menu', 'anggota'));
    }

    public function detail($no_anggota){
        date_default_timezone_set("Asia/Jakarta");
        $menu = 'simpanan_sukarela';
        $year = date("Y");

        $simpanan = DB::table('simpanan_sukarela')->where('no_anggota', $no_anggota)->get();
        $anggota = DB::table('anggota')->select('nama_lengkap', 'no_anggota')->where('no_anggota', $no_anggota)->first();
        $pengurangan = DB::table('pengurangan_shu_anggota')->where('no_anggota', $no_anggota)->sum('jumlah');
        
        $jumlah_tahun_ini = DB::table('simpanan_sukarela')
        ->where('no_anggota', '=', $no_anggota)
        ->whereYear('tanggal', $year)->sum('jumlah');

        $jumlah = DB::table('simpanan_sukarela')
        ->where('no_anggota', '=', $no_anggota)
        ->sum('jumlah');

        $jumlah_angsuran = DB::table('simpanan_sukarela')
        ->where('no_anggota', '=', $no_anggota)
        ->whereYear('tanggal', $year)->count('jumlah');

        $detail = array(
            'jumlah_tahun_ini' => $jumlah_tahun_ini,
            'jumlah' => $jumlah,
            'jumlah_angsuran' => $jumlah_angsuran
        );
        
        //return $detail;
        return view('pengawas.detail_simpanan_sukarela', compact('menu', 'simpanan', 'anggota', 'detail', 'pengurangan'));
    }

}
