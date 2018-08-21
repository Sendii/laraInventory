<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function all() {
    	$supplier['suppliers'] = \App\Supplier::paginate(10);

    	return view('admin/supplier.all')->with($supplier);
    }

    public function save(Request $r) {
    	$new = new \App\Supplier;
    	$new->fixsupplier = date("Y-m-d");
    	$new->nm_supplier = $r->input('namasupplier');
    	$new->alamat = $r->input('alamat');
    	$new->telepon = $r->input('telepon');

    	$new->save();
    	return redirect('supplier');
    }

    public function barangSupplier($nm_supplier) {
        $barang = \App\Income::where('nm_supplier', $nm_supplier)->get();
        $supplier = \App\Supplier::all();

        return view('admin/supplier.barang_supplier')->with(['barangs' => $barang, 'suppliers' => $supplier]);
    }
}
