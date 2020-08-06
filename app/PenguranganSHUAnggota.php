<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PenguranganSHUAnggota extends Model
{
    protected $table = 'pengurangan_shu_anggota';

    protected $fillable = ['id_pengurangan_shu', 'no_anggota', 'tahun', 'jumlah', 'ket'];

    protected $primaryKey = 'id_pengurangan_shu';

    public function anggota(){
        return $this->belongsTo('App\Anggota', 'no_anggota');
    }
}
