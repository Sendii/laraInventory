<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    protected $table = 'peminjamans';

    public function Barang() {
    	return $this->belongsTo('App\Income', 'id_barang', 'id');
    }
}
