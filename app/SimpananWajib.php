<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SimpananWajib extends Model
{
    protected $table = 'simpanan_wajib';

    protected $fillable = ['id_simpanan_wajib', 'no_anggota', 'tanggal', 'jumlah', 'ket'];

    protected $primaryKey = 'id_simpanan_wajib';

    public function anggota(){
        return $this->belongsTo('App\Anggota', 'no_anggota');
    }
}
