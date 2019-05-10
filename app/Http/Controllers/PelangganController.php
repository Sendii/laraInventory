<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PelangganController extends Controller
{
    public function all() {
    	$pelanggan['pelanggans'] = \App\Pelanggan::paginate(10);

    	return view('admin/pelanggan.all')->with($pelanggan);
    }

    public function save(Request $r) {
    	$new = new \App\Pelanggan;
    	$new->fixpelanggans = date("Y-m-d");
    	$new->kode_outlet = str_random(5);
    	$new->nama_outlet = $r->input('nama_outlet');
    	$new->alamat = $r->input('alamat');
    	$new->telepon = $r->input('telepon');
    	$new->npwp = $r->input('npwp');
    	$new->email = $r->input('email');

    	$new->save();
    	return redirect('pelanggan');
    }

    public function edit($id)
    {
      $pelanggan = \App\Pelanggan::find($id);
      if (isset($pelanggan)) {
        return view('admin/pelanggan.edit', ['pelanggans' => $pelanggan]);  
      }else{
        echo "ada kesalahan";
      }
    }

    public function update(Request $request)
    {
      $b = \App\Pelanggan::find($request->input('id'));
      if (isset($b)) {
              $b->nama_outlet = $request->nama;
      $b->alamat = $request->alamat;
      $b->telepon = $request->telepon;    
      $b->npwp = $request->npwp;    
      $b->email = $request->email;    
      $b->save();

      return redirect(url('pelanggan'));
      }else{
        echo "cie ada salaa";
        return;
      }
    }

    public function delete($id){
      $pel = \App\Pelanggan::find($id);
      $pel->delete();

      return redirect(url('pelanggan'));
    }
}
