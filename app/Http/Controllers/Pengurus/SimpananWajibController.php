<?php

namespace App\Http\Controllers\pengurus;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\SimpananWajib;

class SimpananWajibController extends Controller
{
    public function angsuran(){
        setlocale(LC_TIME, 'id_ID');
        $menu = 'simpanan_wajib';
        $simpanan = DB::table('simpanan_wajib')->select(DB::raw('count(id_simpanan_wajib) as data'),DB::raw('sum(jumlah) as jumlah'), DB::raw("DATE_FORMAT(tanggal, '%m-%Y') new_date"),  DB::raw('YEAR(tanggal) year, MONTH(tanggal) month'))
        ->groupBy('year', 'month')
        ->get();
        
        $total = DB::table('simpanan_wajib')->sum('jumlah');
        
        return view('pengurus.angsuran_simpanan_wajib', compact('menu', 'simpanan', 'total'));
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
        return view('pengurus.anggota_simpanan_wajib', compact('menu', 'anggota'));
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
        return view('pengurus.detail_simpanan_wajib', compact('menu', 'simpanan', 'anggota', 'detail'));
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
        return view('pengurus.rincian_angsuran_bulanan_wajib', compact('menu', 'simpanan', 'jumlah', 'date'));
    }

    public function store(Request $request){
        date_default_timezone_set("Asia/Jakarta");
        $simpanan = new SimpananWajib();

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

    public function delete(Request $request){
        $data = SimpananWajib::findOrFail($request->id_simpanan_pokok);

        try{
            $data->delete();

            if($data){
                return response()->json([
                    'error' => 0,
                    'message' => 'Hapus Data Berhasil'
                  ], 200);
            }
        }catch(\Exception $e){
            return response()->json([
                'error' => 1,
                'message' => 'Hapus Data Gagal'
              ], 200);
        }
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


