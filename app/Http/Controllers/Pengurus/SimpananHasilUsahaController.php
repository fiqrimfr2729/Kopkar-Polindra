<?php

namespace App\Http\Controllers\Pengurus;

use DB;
use App\SimpananHasilUsaha;
use App\SimpananWajib;
use App\SimpananPokok;
use App\SimpananSukarela;
use App\SHUAnggota;
use App\PenguranganSHUAnggota;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SimpananHasilUsahaController extends Controller
{
    public function shu_anggota(){
        $menu = 'shu_anggota';

        $simpanan = DB::table('simpanan_hasil_usaha')
        ->get();

        $simpanan_wajib = DB::table('simpanan_wajib')->orderBy('tanggal', 'asc')->get();

        $tahun = array();
        $temp = null;
        $i=0;
        foreach($simpanan_wajib as $data){
            $date = date('Y', strtotime($data->tanggal));
            $year = $date;

            if($temp != $year){
                $temp = $year;
                $tahun[$i] = $year;
                $i++;
            }
        }
        
        //return $tahun;
        return view('pengurus.anggota_shu', compact('menu', 'simpanan', 'tahun'));
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

    public function hitung_shu(Request $request){
        $total_shu_anggota = str_replace('.', '', $request->shu_anggota);
        $tahun = $request->tahun;

        $simpanan_wajib = DB::table('simpanan_wajib')->whereYear('tanggal', '=', $tahun)->sum('jumlah');
        $simpanan_pokok = DB::table('simpanan_pokok')->whereYear('tanggal', '=', $tahun)->sum('jumlah');
        $simpanan_sukarela = DB::table('simpanan_sukarela')->whereYear('tanggal', '=', $tahun)->sum('jumlah');

        $total_simpanan_seluruhnya = $simpanan_wajib + $simpanan_sukarela + $simpanan_pokok;

        $persentasi = $total_shu_anggota/$total_simpanan_seluruhnya;

        $anggota = DB::table('anggota')->get();

        foreach($anggota as $data){
            $simpanan_wajib = DB::table('simpanan_wajib')->whereYear('tanggal', '=', $tahun)->where('no_anggota', $data->no_anggota)->sum('jumlah');
            $simpanan_pokok = DB::table('simpanan_pokok')->whereYear('tanggal', '=', $tahun)->where('no_anggota', $data->no_anggota)->sum('jumlah');
            $simpanan_sukarela = DB::table('simpanan_sukarela')->whereYear('tanggal', '=', $tahun)->where('no_anggota', $data->no_anggota)->sum('jumlah');
            $total_simpanan_anggota = $simpanan_wajib + $simpanan_sukarela + $simpanan_pokok;

            $total_shu = $persentasi * $total_simpanan_anggota;
            $shu_anggota = new SHUAnggota();
            $shu_anggota->no_anggota = $data->no_anggota;
            $shu_anggota->tahun = $tahun;
            $shu_anggota->jumlah = $total_shu;

            $sukarela = new SimpananSukarela();
            $sukarela->jumlah = $total_shu;
            $sukarela->no_anggota = $data->no_anggota;
            $sukarela->tanggal = date("Y-m-d");
            $sukarela->ket = "Simpanan Hasil Usaha Tahun $tahun";
            $sukarela->save();

            $shu_anggota->save();
        }

        $shu = new SimpananHasilUsaha();

        $shu->tahun = $tahun;
        $shu->shu_anggota = $total_shu_anggota;
        $shu->save();

        if($shu){
            return response()->json([
                'error' => 0,
                'message' => 'Tambah Data Berhasil'
              ], 200);
        }

        //return $shu;
    }

    public function pengurangan_shu(Request $request){
        $pengurangan_shu = new PenguranganSHUAnggota();

        $pengurangan_shu->no_anggota = $request->no_anggota;
        $pengurangan_shu->jumlah = str_replace('.', '', $request->pengurangan);
        $pengurangan_shu->tahun = $request->tahun;

        
        if($request->simpanan == 'sukarela'){
            $simpanan = new SimpananSukarela();
        }elseif($request->simpanan == 'wajib'){
            $simpanan = new SimpananWajib();
        }else{
            $simpanan = new SimpananPokok();
        }

        $pengurangan_shu->ket = $request->simpanan;

        $tanggal = date("Y-m-d");
        $simpanan->no_anggota = $request->no_anggota;
        $simpanan->tanggal = $tanggal;
        $simpanan->jumlah = str_replace('.', '', $request->pengurangan);
        $simpanan->ket = "Dari Simpanan Hasil Usaha tahun $request->tahun";

        $simpanan->save();

        $pengurangan_shu->save();

        if($pengurangan_shu){
            return response()->json([
                'error' => 0,
                'message' => 'Tambah Data Berhasil'
              ], 200);
        }
        
    }

    public function rincian_penerimaan_shu($tahun){
        $menu = 'shu_anggota';

        $anggota = DB::table('anggota')
        ->select('no_anggota', 'nama_lengkap')
        ->get();

        foreach($anggota as $data){
            $data->shu_anggota = DB::table('shu_anggota')->where('no_anggota', '=', $data->no_anggota)->where('tahun', $tahun)->sum('jumlah');
            $data->simpanan_sukarela = DB::table('simpanan_sukarela')->where('no_anggota', $data->no_anggota)->sum('jumlah') ;
            $data->pengurangan = DB::table('pengurangan_shu_anggota')->where('no_anggota', $data->no_anggota)->sum('jumlah');
        }

        //return $anggota;

        return view('pengurus.penerimaan_shu_anggota', compact('menu', 'anggota', 'tahun'));
    }

}
