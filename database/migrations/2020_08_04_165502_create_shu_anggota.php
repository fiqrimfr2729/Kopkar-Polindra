<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShuAnggota extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shu_anggota', function (Blueprint $table) {
            $table->increments('id_shu_anggota');
            $table->char('no_anggota', 255)->index();
            $table->foreign('no_anggota')->references('no_anggota')->on('anggota');
            $table->year('tahun');
            $table->integer('jumlah');
            $table->integer('sisa');
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
        Schema::dropIfExists('shu_anggota');
    }
}
