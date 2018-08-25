<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    protected $table = 'peminjamans';

    public function Barang() {
    	return $this->belongsTo('App\Income', 'id_barang', 'id');
    }

    public function Siswa() {
    	return $this->belongsTo('App\Siswa', 'id_siswa', 'id');
    }

    public function Kelas() {
    	return $this->belongsTo('App\Kelas', 'id_siswa', 'id');
    }
}
