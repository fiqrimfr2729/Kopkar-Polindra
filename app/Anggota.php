<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Anggota extends Authenticatable
{
    use Notifiable;

    protected $table = 'anggota';

    protected $fillable = [
      'no_anggota', 'email','nama_lengkap', 'nama_inisial', 'password', 
      'tgl_lahir', 'tgl_gabung', 'id_unit_kerja', 'alamat', 'no_hp',
      'role', 'token'
    ];

    protected $hidden = [
      'password','remember_token'
    ];

    protected $primaryKey = 'no_anggota';

    public $incrementing = false;

    public function setPasswordAttribute($value)
    {
      $this->attributes['password'] = bcrypt($value);
    }

    public function simpanan_pokok(){
      return $this->hasMany('App\SimpananPokok', 'no_anggota');
    }

    public function simpanan_wajib(){
      return $this->hasMany('App\SimpananPokok', 'no_anggota');
    }
}