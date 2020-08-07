<?php

namespace App\Http\Controllers\Pengurus;

use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PinjamanController extends Controller
{
    public function index(){
        $menu = 'pinjaman';
        
        $pinjaman = DB::table('pinjaman')->get();

        foreach($pinjaman as $data){
            $data->anggota = DB::table('anggota')->where('no_anggota', '=', $data->no_anggota)->first();

            }

        return view('pengurus.pinjaman', compact('menu', 'pinjaman'));
    }

    public function setujui_pinjaman(Request $request){
        $id_pinjaman = $request->id_pinjaman;

        $pinjaman = DB::table('pinjaman')->where('id_pinjaman', $id_pinjaman)->update(['status'=>1]);

        if($pinjaman){
            return response()->json([
                'error' => 0,
                'message' => 'Update berhasil'
              ], 200);
        }
    }
}
