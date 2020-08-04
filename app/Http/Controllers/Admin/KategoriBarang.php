<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KategoriBarang extends Controller
{
    public function index(){
        $menu = 'pos';

        return view('admin.kategori_barang', compact('menu'));
    }
}
