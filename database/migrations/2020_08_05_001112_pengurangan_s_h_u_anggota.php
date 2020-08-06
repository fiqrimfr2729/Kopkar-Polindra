<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PenguranganSHUAnggota extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengurangan_shu_anggota', function (Blueprint $table) {
            $table->increments('id_pengurangan_shu');
            $table->char('no_anggota', 255)->index();
            $table->foreign('no_anggota')->references('no_anggota')->on('anggota');
            $table->year('tahun');
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
        //
    }
}
