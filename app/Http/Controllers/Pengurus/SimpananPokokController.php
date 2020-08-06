<?php

namespace App\Http\Controllers\Pengurus;

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
        
        return view('pengurus.angsuran_simpanan', compact('menu', 'simpanan', 'total'));
    }

    public function pokok_anggota(){
        $menu = 'simpanan_pokok';

        $anggota = DB::table('anggota')
        ->select('no_anggota', 'nama_lengkap')
        ->get();

        foreach($anggota as $data){
            $data->jumlah = DB::table('simpanan_pokok')->where('no_anggota', '=', $data->no_anggota)->sum('jumlah');
        }
        
        
        return view('pengurus.anggota_simpanan', compact('menu', 'anggota'));
    }

    public function detail($no_anggota){
        $menu = 'simpanan_pokok';

        $simpanan = DB::table('simpanan_pokok')->where('no_anggota', $no_anggota)->get();
        $anggota = DB::table('anggota')->select('nama_lengkap', 'no_anggota')->where('no_anggota', $no_anggota)->first();
        $total = DB::table('simpanan_pokok')->where('no_anggota', $no_anggota)->sum('jumlah');
        
        return view('pengurus.detail_simpanan_anggota', compact('menu', 'simpanan', 'anggota', 'total'));
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
        return view('pengurus.rincian_angsuran_bulanan', compact('menu', 'simpanan', 'jumlah', 'date'));
    }

    public function store(Request $request){
        date_default_timezone_set("Asia/Jakarta");
        $simpanan = new SimpananPokok();
        
        
        $simpanan->no_anggota = $request->no_anggota;
        $simpanan->tanggal = $request->tanggal;
        $simpanan->jumlah = str_replace('.', '', $request->jumlah);

        $simpanan->save();

        if($simpanan){
            return response()->json([
                'error' => 0,
                'message' => 'Tambah Data Berhasil'
              ], 200);
        }
    }

    public function delete(Request $request){
        $data = SimpananPokok::findOrFail($request->id_simpanan_pokok);

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
