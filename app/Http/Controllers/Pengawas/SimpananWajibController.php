<?php

namespace App\Http\Controllers\Pengawas;

use DB;
use App\SimpananWajib;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SimpananWajibController extends Controller
{
    public function angsuran(){
        setlocale(LC_TIME, 'id_ID');
        $menu = 'simpanan_wajib';
        $simpanan = DB::table('simpanan_wajib')->select(DB::raw('count(id_simpanan_wajib) as data'),DB::raw('sum(jumlah) as jumlah'), DB::raw("DATE_FORMAT(tanggal, '%m-%Y') new_date"),  DB::raw('YEAR(tanggal) year, MONTH(tanggal) month'))
        ->groupBy('year', 'month')
        ->get();
        
        $total = DB::table('simpanan_wajib')->sum('jumlah');
        
        return view('pengawas.angsuran_simpanan_wajib', compact('menu', 'simpanan', 'total'));
    }

    public function wajib_anggota(){
        $menu = 'simpanan_wajib';
        $year = date("Y");

        $anggota = DB::table('anggota')
                    ->select('no_anggota', 'nama_lengkap')
                    ->get();

        foreach($anggota as $data){
            $data->jumlah = DB::table('simpanan_wajib')->where('no_anggota', '=', $data->no_anggota)->sum('jumlah');
            $data->jumlah_tahun_ini = DB::table('simpanan_wajib')->where('no_anggota', '=', $data->no_anggota)->whereYear('tanggal', $year)->sum('jumlah');
        }

        //return $anggota;
        return view('pengawas.anggota_simpanan_wajib', compact('menu', 'anggota'));
    }

    public function detail($no_anggota){
        date_default_timezone_set("Asia/Jakarta");
        $menu = 'simpanan_wajib';
        $year = date("Y");

        $simpanan = DB::table('simpanan_wajib')->where('no_anggota', $no_anggota)->get();
        $anggota = DB::table('anggota')->select('nama_lengkap', 'no_anggota')->where('no_anggota', $no_anggota)->first();
        
        $jumlah_tahun_ini = DB::table('simpanan_wajib')
        ->where('no_anggota', '=', $no_anggota)
        ->whereYear('tanggal', $year)->sum('jumlah');

        $jumlah = DB::table('simpanan_wajib')
        ->where('no_anggota', '=', $no_anggota)
        ->sum('jumlah');

        $jumlah_angsuran = DB::table('simpanan_wajib')
        ->where('no_anggota', '=', $no_anggota)
        ->whereYear('tanggal', $year)->count('jumlah');

        $detail = array(
            'jumlah_tahun_ini' => $jumlah_tahun_ini,
            'jumlah' => $jumlah,
            'jumlah_angsuran' => $jumlah_angsuran
        );
        
        //return $detail;
        return view('pengawas.detail_simpanan_wajib', compact('menu', 'simpanan', 'anggota', 'detail'));
    }

    public function rincian_angsuran($month, $year){
        date_default_timezone_set("Asia/Jakarta");
        $menu = 'simpanan_wajib';
        $simpanan = DB::table('simpanan_wajib')
        ->join('anggota', 'simpanan_wajib.no_anggota' , '=', 'anggota.no_anggota')
        ->select('id_simpanan_wajib', 'anggota.no_anggota', 'anggota.nama_lengkap', 'tanggal', 'jumlah')
        ->whereMonth('tanggal','=', $month)->whereYear('tanggal', '=', $year)->get();

        $jumlah = DB::table('simpanan_wajib')->whereMonth('tanggal','=', $month)->whereYear('tanggal', '=', $year)->sum('jumlah');
        
        $date = array(
            'month' => $this->get_month($month),
            'year' => $year
        );
        //return $simpanan;
        //return $jumlah;
        return view('pengawas.rincian_angsuran_bulanan_wajib', compact('menu', 'simpanan', 'jumlah', 'date'));
    }

    public function get_month($month){
        $bulan = array (1 =>   'Januari',
			'Februari',
			'Maret',
			'April',
			'Mei',
			'Juni',
			'Juli',
			'Agustus',
			'September',
			'Oktober',
			'November',
			'Desember'
		);

        return $bulan[$month];
    }
}
