<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    protected $table = 'barangs';

    public function Supplier() {
    	return $this->belongsTo('App\Supplier', 'id_supplier', 'id');
    }
}
