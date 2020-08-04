<?php

namespace App\Http\Controllers\Admin;

use App\UnitKerja;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UnitKerjaController extends Controller
{
    public function index(){
        $menu = 'anggota';
        $unitKerja = UnitKerja::all();

        //return $unitKerja;
        return view('admin.unitkerja', compact('menu', 'unitKerja'));
    }

    public function store(Request $request){
        $nama_unit_kerja = $request->nama_unit_kerja;

        $unit_kerja = new UnitKerja();
        $unit_kerja->nama_unit_kerja = $nama_unit_kerja;

        $unit_kerja;

        $unit_kerja->save();

        if($unit_kerja){
            return response()->json([
                'error' => 0,
                'message' => 'Tambah Data Berhasil'
              ], 200);
        }
    }

    public function update(Request $request){
        $data = UnitKerja::findOrFail($request->id_unit_kerja);
        $data->update($request->all());

        if($data){
            return response()->json([
                'error' => 0,
                'message' => 'Success Edit Data'
              ], 200);
        }
    }

    public function delete(Request $request){
        $data = UnitKerja::findOrFail($request->id_unit_kerja);

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
}
