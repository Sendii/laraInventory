<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MutasiBarang extends Model
{
    protected $table = 'mutasibarang';

    public function Pelanggan() {
    	return $this->belongsTo('App\Pelanggan', 'id_pelanggan', 'id');
    }

    public function Supplier() {
    	return $this->belongsTo('App\Supplier', 'id_supplier', 'id');
    }
}
