<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnggota extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anggota', function (Blueprint $table) {
            $table->char('no_anggota', 255)->primary();
            $table->char('nama_lengkap', 255);
            $table->char('nama_inisial', 50);
            $table->date('tgl_lahir');
            $table->date('tgl_gabung');
            $table->integer('id_unit_kerja')->unsigned();
            $table->foreign('id_unit_kerja')->references('id_unit_kerja')->on('unit_kerja');
            $table->char('alamat', 255);
            $table->char('no_hp', 15);
            $table->char('email', 100);
            $table->tinyInteger('role');
            $table->char('token', 255);
            $table->char('password', 255);
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
        Schema::dropIfExists('anggota');
    }
}
