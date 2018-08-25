<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BarangRusakH extends Model
{
    public function Siswa() {
    	return $this->belongsTo('App\Siswa', 'id_siswa', 'id');
    }

    public function Barang() {
    	return $this->belongsTo('App\Income', 'id_barang', 'id');
    }

    public function Peminjam() {
    	return $this->belongsTo('App\Peminjaman', 'id_peminjaman', 'id');
    }

    public function Supplier() {
    	return $this->belongsTo('App\Supplieran', 'id_supplier', 'id');
    }
}
