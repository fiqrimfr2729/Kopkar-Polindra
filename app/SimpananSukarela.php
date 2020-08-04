<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SimpananSukarela extends Model
{
    protected $table = 'simpanan_sukarela';

    protected $fillable = ['id_simpanan_sukarela', 'no_anggota', 'tanggal', 'jumlah', 'ket'];

    protected $primaryKey = 'id_simpanan_sukarela';

    public function anggota(){
        return $this->belongsTo('App\Anggota', 'no_anggota');
    }
}
