<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BarangRHController extends Controller
{
    public function allRh(){
    	$rh['rusakh'] = \App\BarangRusakH::paginate(10);
    	return view('admin/barang/rusakh.all', $rh);
    }

    public function kodeBarang($kode_barang) {
    	$a['kode'] = \App\Income::where('kode_barang', $kode_barang)->paginate(10);
    	$b = \App\Income::where('kode_barang', $kode_barang)->value('id');
    	$a['barang'] = \App\BarangRusakH::where('id_barang', $b)->first();
    	return view('admin/barang/rusakh.kode', $a);
    }
}