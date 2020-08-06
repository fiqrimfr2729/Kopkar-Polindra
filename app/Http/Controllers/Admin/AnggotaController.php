<?php

namespace App\Http\Controllers\Admin;

use App\Anggota;
use App\UnitKerja;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AnggotaController extends Controller
{
    public function index(){
        $menu = 'anggota';
        
        $anggota = DB::table('anggota')->where('role', 1)->get();

        return view('admin.anggota', compact('menu', 'anggota'));
    }

    public function form(){
        $menu = 'anggota';

        $unit = UnitKerja::all();
        return view('admin.form_anggota', compact('menu', 'unit'));
    }

    public function form_edit($no_anggota){
        $menu = 'anggota';
        $unit = UnitKerja::all();

        $anggota = DB::table('anggota')->select('no_anggota', 'nama_lengkap', 'nama_inisial', 
        'tgl_lahir', 'tgl_gabung', 'id_unit_kerja', 'alamat', 'no_hp', 'email', 'role')->where('no_anggota',  $no_anggota)->get();

        //return $anggota;
        return view('admin.form_edit_anggota', compact('menu', 'unit', 'anggota'));
    }

    public function store(Request $requst){
        date_default_timezone_set("Asia/Jakarta");
        $year = date("y");
        $year = substr( $year, -2);
        $month = date('m');

        $anggota = new Anggota();
        

        $last_id = DB::table('anggota')->latest('no_anggota')->first();
        if($last_id == null){
            $last_id = '0';
        }else{
            $last_id = $last_id->no_anggota;
            $last_id = substr($last_id, -2);
        }  
        $last_id = (int)$last_id;
        $last_id++; 
        $last_id = str_pad($last_id, 3, '0', STR_PAD_LEFT);

        $anggota->no_anggota = 'KKP'.$year.$month.$last_id;
        $anggota->nama_lengkap = $requst->nama_lengkap;
        $anggota->nama_inisial = $requst->nama_inisial;
        $anggota->no_hp = $requst->no_hp;
        $anggota->alamat = $requst->alamat;
        $anggota->email = $requst->email;
        $anggota->tgl_lahir = $requst->tgl_lahir;
        $anggota->id_unit_kerja = $requst->id_unit_kerja;
        $anggota->tgl_gabung = $requst->tgl_gabung;
        $anggota->role = 1;
        $anggota->password = Hash::make('Anggota123', ['rounds' => 12 ]);

        $query = $anggota->save();

        if($query){
            return response()->json([
                'error' => 0,
                'message' => 'Tambah Data Berhasil'
              ], 200);
        }
    }

    public function update(Request $request){
        $anggota = Anggota::findOrFail($request->no_anggota);

        $anggota->update($request->all());

        if($anggota){
            return response()->json([
                'error' => 0,
                'message' => 'Success Edit Data'
              ], 200);
        }
    }
    
}
