<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangKeluar extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barang_keluar', function (Blueprint $table) {
            $table->increments('id_barang_keluar');
            $table->char('kd_barang',255)->index();
            $table->foreign('kd_barang')->references('kd_barang')->on('barang');
            $table->char('no_transaksi', 255)->index();
            $table->foreign('no_transaksi')->references('no_transaksi')->on('transaksi');
            $table->integer('kuantitas');
            $table->integer('harga');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('barang_keluar');
    }
}
