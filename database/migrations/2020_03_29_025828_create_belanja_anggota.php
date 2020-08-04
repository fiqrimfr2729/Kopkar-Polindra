<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBelanjaAnggota extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('belanja_anggota', function (Blueprint $table) {
            $table->increments('id_belanja');
            $table->char('no_anggota',255)->index();
            $table->foreign('no_anggota')->references('no_anggota')->on('anggota');
            $table->char('no_transaksi', 255)->index();
            $table->foreign('no_transaksi')->references('no_transaksi')->on('transaksi');
            $table->integer('poin');
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
        Schema::dropIfExists('belanja_anggota');
    }
}
