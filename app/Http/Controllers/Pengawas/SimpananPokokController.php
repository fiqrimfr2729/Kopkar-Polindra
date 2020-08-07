<?php

namespace App\Http\Controllers\Pengawas;

use DB;
use App\SimpananPokok;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SimpananPokokController extends Controller
{
    public function angsuran(){
        setlocale(LC_TIME, 'id_ID');
        $menu = 'simpanan_pokok';
        $simpanan = DB::table('simpanan_pokok')->select(DB::raw('count(id_simpanan_pokok) as data'),DB::raw('sum(jumlah) as jumlah'), DB::raw("DATE_FORMAT(tanggal, '%m-%Y') new_date"),  DB::raw('YEAR(tanggal) year, MONTH(tanggal) month'))
        ->groupBy('year', 'month')
        ->get();
        
        $total = DB::table('simpanan_pokok')->sum('jumlah');
        
        return view('pengawas.angsuran_simpanan', compact('menu', 'simpanan', 'total'));
    }

    public function pokok_anggota(){
        $menu = 'simpanan_pokok';

        $anggota = DB::table('anggota')
        ->select('no_anggota', 'nama_lengkap')
        ->get();

        foreach($anggota as $data){
            $data->jumlah = DB::table('simpanan_pokok')->where('no_anggota', '=', $data->no_anggota)->sum('jumlah');
        }
        
        
        return view('pengawas.anggota_simpanan', compact('menu', 'anggota'));
    }

    public function detail($no_anggota){
        $menu = 'simpanan_pokok';

        $simpanan = DB::table('simpanan_pokok')->where('no_anggota', $no_anggota)->get();
        $anggota = DB::table('anggota')->select('nama_lengkap', 'no_anggota')->where('no_anggota', $no_anggota)->first();
        $total = DB::table('simpanan_pokok')->where('no_anggota', $no_anggota)->sum('jumlah');
        
        return view('pengawas.detail_simpanan_anggota', compact('menu', 'simpanan', 'anggota', 'total'));
    }

    public function rincian_angsuran($month, $year){
        date_default_timezone_set("Asia/Jakarta");
        $menu = 'simpanan_pokok';
        $simpanan = DB::table('simpanan_pokok')
        ->join('anggota', 'simpanan_pokok.no_anggota' , '=', 'anggota.no_anggota')
        ->select('id_simpanan_pokok', 'anggota.no_anggota', 'anggota.nama_lengkap', 'tanggal', 'jumlah')
        ->whereMonth('tanggal','=', $month)->whereYear('tanggal', '=', $year)->get();

        $jumlah = DB::table('simpanan_pokok')->whereMonth('tanggal','=', $month)->whereYear('tanggal', '=', $year)->sum('jumlah');
        
        $date = array(
            'month' => $this->get_month($month),
            'year' => $year
        );
        //return $simpanan;
        //return $jumlah;
        return view('pengawas.rincian_angsuran_bulanan', compact('menu', 'simpanan', 'jumlah', 'date'));
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
