<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SimpananPokok extends Model
{
    protected $table = 'simpanan_pokok';

    protected $fillable = ['id_simpanan_pokok', 'no_anggota', 'tanggal', 'jumlah', 'ket'];

    protected $primaryKey = 'id_simpanan_pokok';

    public function anggota(){
        return $this->belongsTo('App\Anggota', 'no_anggota');
    }
}
