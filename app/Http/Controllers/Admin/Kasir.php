<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Kasir extends Controller
{
    public function index(){
        $menu = 'dashboard';

        return view('admin.kasir', compact('menu'));
    }
}
