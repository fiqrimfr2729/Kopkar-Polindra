<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Admin
Route::get('/dashboard_admin', 'Admin\Dashboard@index')->name('dashboard_admin');
Route::get('/login_admin', 'Admin\Login@index')->name('login_admin');
Route::post('/do_login_admin', 'Admin\Login@login')->name('do_login_admin');
Route::get('/logout_admin', 'Admin\Login@logout')->name('logout_admin');
//Anggota
Route::get('/anggota', 'Admin\AnggotaController@index')->name('admin_anggota');
Route::get('/form_anggota', 'Admin\AnggotaController@form')->name('form_anggota');
Route::get('/form_edit_anggota/{no_anggota}', 'Admin\AnggotaController@form_edit')->name('form_edit_anggota');
Route::post('/anggota_create', 'Admin\AnggotaController@store')->name('anggota_create');
Route::post('/anggota_update', 'Admin\AnggotaController@update')->name('anggota_update');
//Pengurus
Route::get('/pengurus', 'Admin\PengurusController@index')->name('pengurus');
Route::post('/pengurus_add', 'Admin\PengurusController@pengurus_add')->name('pengurus_add');

Route::get('/pengawas', 'Admin\Pengawas@index')->name('pengawas');
Route::get('/kasir', 'Admin\Kasir@index')->name('kasir');
Route::get('/kategori', 'Admin\KategoriBarang@index')->name('kategori');
//Unit Kerja
Route::get('/unit_kerja', 'Admin\UnitKerjaController@index')->name('unit_kerja');
Route::post('/unit_kerja_delete', 'Admin\UnitKerjaController@delete')->name('unit_kerja_delete');
Route::post('/unit_kerja_create', 'Admin\UnitKerjaController@store')->name('unit_kerja_create');
Route::post('/unit_kerja_update', 'Admin\UnitKerjaController@update')->name('unit_kerja_update');

//Resource

//User
Route::get('/login', 'Login@index');
Route::post('/do_login', 'Login@login')->name('do_login');

//Pengurus
Route::get('/pengurus/dashboard', 'Pengurus\Dashboard@index')->name('dashboard_pengurus');
Route::get('/pengurus/anggota', 'Pengurus\AnggotaController@index')->name('anggota');
Route::get('/pengurus/login', 'Pengurus\Login@index')->name('login_pengurus');
Route::get('/pengurus/logout', 'Pengurus\Login@logout')->name('logout_pengurus');
Route::post('/pengurus/do_login', 'Pengurus\Login@login')->name('do_login');
//Simpanan Pokok
Route::get('/pengurus/simpanan_pokok_anggota', 'Pengurus\SimpananPokokController@pokok_anggota')->name('simpanan_pokok_anggota');
Route::get('/pengurus/simpanan_pokok/', 'Pengurus\SimpananPokokController@angsuran')->name('angsuran_simpanan_pokok');
Route::get('/pengurus/simpanan_pokok/rincian_angsuran/{month}/{year}', 'Pengurus\SimpananPokokController@rincian_angsuran')->name('rincian_angsuran');
Route::get('/pengurus/detail_simpanan_anggota/{no_anggota}', 'Pengurus\SimpananPokokController@detail')->name('detail_simpanan_anggota');
Route::post('/pengurus/simpanan_pokok_create', 'Pengurus\SimpananPokokController@store')->name('simpanan_pokok_create');
Route::post('/pengurus/simpanan_pokok_delete', 'Pengurus\SimpananPokokController@delete')->name('simpanan_pokok_delete');
//Simpanan wajib
Route::get('/pengurus/simpanan_wajib_anggota', 'Pengurus\SimpananWajibController@wajib_anggota')->name('simpanan_wajib_anggota');
Route::get('/pengurus/detail_simpanan_wajib/{no_anggota}', 'Pengurus\SimpananWajibController@detail')->name('detail_simpanan_wajib');
Route::post('/pengurus/simpanan_wajib_create', 'Pengurus\SimpananWajibController@store')->name('simpanan_wajib_create');
Route::post('/pengurus/simpanan_wajib_delete', 'Pengurus\SimpananWajibController@delete')->name('simpanan_wajib_delete');
Route::get('/pengurus/simpanan_wajib/', 'Pengurus\SimpananWajibController@angsuran')->name('angsuran_simpanan_wajib');
Route::get('/pengurus/simpanan_wajib/rincian_angsuran/{month}/{year}', 'Pengurus\SimpananWajibController@rincian_angsuran')->name('rincian_angsuran_wajib');
//Simpanan sukarela
Route::get('/pengurus/simpanan_sukarela_anggota', 'Pengurus\SimpananSukarelaController@sukarela_anggota')->name('simpanan_sukarela_anggota');
Route::post('/pengurus/simpanan_sukarela_create', 'Pengurus\SimpananSukarelaController@store')->name('simpanan_sukarela_create');
Route::get('/pengurus/detail_simpanan_sukarela/{no_anggota}', 'Pengurus\SimpananSukarelaController@detail')->name('detail_simpanan_sukarela');
//SHU
Route::get('/pengurus/shu_anggota', 'Pengurus\SimpananHasilUsahaController@shu_anggota')->name('shu_anggota');
Route::get('/pengurus/total_simpanan', 'Pengurus\SimpananHasilUsahaController@total_simpanan')->name('total_simpanan');
Route::post('/pengurus/hitung_shu', 'Pengurus\SimpananHasilUsahaController@hitung_shu')->name('hitung_shu');
Route::get('/pengurus/rincian_penerimaan_shu/{tahun}', 'Pengurus\SimpananHasilUsahaController@rincian_penerimaan_shu')->name('rincian_penerimaan_shu');
Route::post('/pengurus/pengurangan_shu', 'Pengurus\SimpananHasilUsahaController@pengurangan_shu')->name('pengurangan_shu');


Route::get('/login_pengurus', 'Pengurus\Login@index');


//Pengawas
Route::get('/pengawas', 'Pengawas\Dashboard@index');