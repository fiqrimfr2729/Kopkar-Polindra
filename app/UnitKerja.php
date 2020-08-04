<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UnitKerja extends Model
{

    protected $table = 'unit_kerja';

    protected $fillable = ['id_unit_kerja', 'nama_unit_kerja'];

    protected $primaryKey = 'id_unit_kerja';

    public function anggota(){
        return $this->hasMany('App\Anggota', 'id_unit_kerja');
    }
    
}
