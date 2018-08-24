<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    public function Kelas() {
    	return $this->belongsTo('App\Kelas', 'id_kelas', 'id');
    }
}
