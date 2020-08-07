<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Pinjaman extends Model
{
    protected $table = 'pinjaman';

    protected $fillable = ['id_pinjaman', 'no_anggota', 'status', 'jumlah', 'ket'];

    protected $primaryKey = 'id_pinjaman';

    public function anggota(){
        return $this->belongsTo('App\Anggota', 'no_anggota');
    }
}
