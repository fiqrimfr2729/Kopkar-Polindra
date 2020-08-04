<?php

namespace App\Http\Controllers\Admin;

use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PengurusController extends Controller
{

    public function __construct(Request $request){
        if($request->session()->exists('username')){
            
            
          }else{
            return redirect()->route('login_admin');
        }
    }

    public function index(Request $request){
        $menu = 'anggota';
        $anggota = DB::table('anggota')->select('no_anggota', 'nama_lengkap')->where('role', 1)->get();

        $pengurus = DB::table('anggota')->where('role', 2)->get();

        return view('admin.pengurus', compact('menu', 'anggota', 'pengurus'));
    }

    public function pengurus_add(Request $request){
        $query = DB::table('anggota')->where('no_anggota', $request->no_anggota)->update(['role' => 2]);

        if($query){
            return response()->json([
                'error' => 0,
                'message' => 'Success Edit Data'
              ], 200);
        }else{
            return response()->json([
                'error' => 1,
                'message' => 'Gagal'
              ], 200);
        }
    }
}
