<?php

namespace App\Http\Controllers\Pengurus;

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
        }
        
        
        return view('pengurus.anggota_simpanan_sukarela', compact('menu', 'anggota'));
    }

    public function detail($no_anggota){
        date_default_timezone_set("Asia/Jakarta");
        $menu = 'simpanan_sukarela';
        $year = date("Y");

        $simpanan = DB::table('simpanan_sukarela')->where('no_anggota', $no_anggota)->get();
        $anggota = DB::table('anggota')->select('nama_lengkap', 'no_anggota')->where('no_anggota', $no_anggota)->first();
        
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
        return view('pengurus.detail_simpanan_sukarela', compact('menu', 'simpanan', 'anggota', 'detail'));
    }

    public function store(Request $request){
        date_default_timezone_set("Asia/Jakarta");
        $simpanan = new SimpananSukarela();

        $simpanan->no_anggota = $request->no_anggota;
        $simpanan->tanggal = $request->tanggal;
        $simpanan->jumlah = str_replace('.', '', $request->jumlah);
        $simpanan->ket = $request->keterangan;

        $simpanan->save();

        if($simpanan){
            return response()->json([
                'error' => 0,
                'message' => 'Tambah Data Berhasil'
              ], 200);
        }
    }
}
