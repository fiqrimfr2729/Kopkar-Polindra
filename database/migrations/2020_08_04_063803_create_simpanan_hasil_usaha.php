<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSimpananHasilUsaha extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('simpanan_hasil_usaha', function (Blueprint $table) {
            $table->increments('id_simpanan_hasil_usaha');
            $table->year('tahun');
            $table->integer('shu_anggota');
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
        Schema::dropIfExists('simpanan_hasil_usaha');
    }
}
