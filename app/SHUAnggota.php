<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SHUAnggota extends Model
{
    protected $table = 'shu_anggota';

    protected $fillable = ['id_shu_anggota', 'no_anggota', 'tahun', 'jumlah', 'ket'];

    protected $primaryKey = 'id_shu_anggota';

    public function anggota(){
        return $this->belongsTo('App\Anggota', 'no_anggota');
    }
}
