<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSimpananWajib extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('simpanan_wajib', function (Blueprint $table) {
            $table->increments('id_simpanan_wajib');
            $table->char('no_anggota', 255)->index();
            $table->foreign('no_anggota')->references('no_anggota')->on('anggota');
            $table->date('tanggal');
            $table->integer('jumlah');
            $table->char('ket', 255);
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
        Schema::dropIfExists('simpanan_wajib');
    }
}
