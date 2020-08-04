<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SimpananHasilUsaha extends Model
{
    protected $table = 'simpanan_hasil_usaha';

    protected $fillable = ['id_simpanan_hasil_usaha', 'tahun', 'shu_anggota'];

    protected $primaryKey = 'id_simpanan_hasil_usaha';


}
