<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class BarangController extends Controller
{

  public function allReport() {
    $data['barangs'] = \App\Peminjaman::where('keterangan', 'Rusak')->count();

    return view('admin/barang.reportall', $data);
  }
    public function allditerima() {
    	$barang = \App\Income::where('keterangan', 'Diterima')->paginate(10);
      $barangs = \App\Income::where('keterangan', 'Ditolak')->paginate(10);
    	$supplier = \App\Supplier::all();

    	return view('admin/barang.allditerima')->with(['barangs' => $barang, 'suppliers' => $supplier, 'barangstolak' => $barangs]);
    }

    public function kodeBarang($kode_barang) {
      $kode['kodes'] = \App\Income::where('kode_barang', '=', $kode_barang)->get();

      return view('admin/barang.kode', $kode);
    } 

    public function allditolak() {
      $barang = \App\Income::where('keterangan', 'Ditolak')->paginate(10);
      $supplier = \App\Supplier::all();

      return view('admin/barang.allditerima')->with(['barangstolak' => $barang, 'suppliers' => $supplier]);
    }

    public function add() {
      $supplier['suppliers'] = \App\Supplier::all();
    	return view('admin/barang.add', $supplier);
    }

    public function save(Request $r) {
      // dd($r->all());
        $input = $r->input('datefromto');
        $getDate = explode(" ", $input);
        $date1 = $getDate[0];
        $date2 = $getDate[2];
        $firstDate = strtolower(str_replace('/', '-', substr($date1, 0, 100)));
        $secondDate = strtolower(str_replace('/', '-', substr($date2, 0, 100)));

        $a = DB::table('peminjamans')->whereBetween('created_at', ["2018-09-20", "2018-09-25"])->get();
    	for ($i=0; $i < $r['row']; $i++)
        {
         $new2 = new \App\Income;
          $new2->banyak_brg = $r->input('row');
          $new2->kode_barang = str_random(8);
         $new2->id_supplier = $r->input('supplier');
         $new2->nama_barang = $r['nama'][$i];
         $new2->qty = $r['qty'][$i];
         $new2->keterangan = "Diterima";  
         $new2->status = "Bagus";  
         $new2->save();
       }
       return redirect('barang/diterima');

    }

    public function savetolak(Request $r) {
      // dd($r->all());
      for ($i=0; $i < $r['row']; $i++)
        {
         $new2 = new \App\Income;
          $new2->banyak_brg = $r->input('row');
          $new2->kode_barang = str_random(8);
         $new2->id_supplier = $r->input('supplier');
         $new2->nama_barang = $r['nama'][$i];
         $new2->qty = $r['qty'][$i];
         $new2->keterangan = "Ditolak";
         $new2->keterangantolak = $r->input('keterangan2');
         $new2->status = "Tidak Bagus";    
         $new2->save();
       }
       return redirect('barang/ditolak');

    }

    public function edit($id)
    {
      $barangs['barang'] = \App\Income::find($id);
      return view('admin/barang.edit', $barangs);  
    }

    public function update(Request $request)
    {
      $b = \App\Income::find($request->input('id'));
      $id = \App\Supplier::where('nm_supplier', $request->input('nama_supplier'))->value('id');
      $b->id_supplier = $id;
      $b->qty = $request->input('stock');
      $b->nama_barang = $request->input('namabarang');    
      $b->save();

      return redirect(url('barang/diterima'));
    }

    public function delete($id){
      $pel = \App\Income::find($id);
      $pel->delete();

      return redirect(url('barang/diterima'));
    }

    public function deletetolak($id){
      $pel = \App\Income::find($id);
      $pel->delete();

      return redirect(url('barang/ditolak'));
    }

    public function peminjamanan($id) {
      $a['barang'] = \App\Income::find($id);
      $a['siswas'] = \App\Siswa::all();

      return view('admin/barang.pinjam', $a);
    }

    public function mutasiMasuk($id) {
      $a['barang'] = \App\Income::find($id);
      $a['pelanggan'] = \App\Pelanggan::all();

      return view('admin/barang/mutasi.masuk', $a);
    }

    public function savemutasiKeluar(Request $r) {
      $new = new \App\MutasiBarang;
      $edit = \App\Income::find($r->input('id'));

      $new->id_supplier = $r->input('namasupplier');
      $new->id_pelanggan = $r->input('namapelanggan');
      $new->nama_barang = $r->input('nama_barang');
      $new->kode_barang = $r->input('kode_barang');
      $new->qty = $r->input('jumlah');
      $new->keterangan = "Keluar";
      $new->save();

      $edit->qty = $r->input('stock') - $r->input('jumlah');
      $edit->save();

      return redirect('barang/mutasi');
    }

    public function mutasiPelanggan($nama_pelanggan) {
      $a = \App\Pelanggan::where('nama_outlet', $nama_pelanggan)->value('id');
      $data = \App\MutasiBarang::where('id_pelanggan', $a)->paginate();

      dd($data);   
    }

    public function savePeminjaman(Request $r) {
      $new = new \App\Peminjaman;
      $edit = \App\Income::find($r->input('id'));

      $new->id_siswa = $r->input('namapeminjam');
      $new->nama_barang = $r->input('nama_barang');
      $new->jumlahminjam = $r->input('jumlah');
      $new->status = "Meminjam";
      $new->keterangan = $r->input('keterangan');
      $new->id_barang = $r->input('id');
      $new->save();

      $edit->qty = $r->input('stock') - $r->input('jumlah');
      $edit->save();

      return redirect('barang/dipinjam');
    }

    public function barangTerpinjam() {
      $barang['barangs'] = \App\Peminjaman::paginate(10);

      return view('admin/barang.barangterpinjam', $barang);
    }

    public function pengembalian($id) {
      $edit['barang'] = \App\Peminjaman::find($id);
      $editbarang = \App\Peminjaman::where('id', $id)->value('id_barang');
      $edit['a'] = \App\Income::find($editbarang);
      
      return view('admin/barang.kembalikan', $edit);
    }

    public function savePengembalian(Request $r) {
      $a = $r->input('nama_peminjam');
      $kelas = \App\Siswa::where('nama', $a)->value('id');
      // dd($r->all());
      $barang = \App\Income::find($r->input('id_barang'));
      $kembalikan = \App\Peminjaman::find($r->input('id'));
      $new2 = new \App\Income;
      $barangbermasalah = new \App\BarangRusakH;
        if($r->input('keterangan') == "Hilang"){
        $barang->qty = $r->input('stock') + $r->input('jumlah');
        $kembalikan->keterangan = $r->input('keterangan');
        $kembalikan->waktukembali = date("d-m-Y");
        $kembalikan->status = "Sudah Dikembalikan";
        $barangbermasalah->kode_barang = $r->input('kode_barang');
        $barangbermasalah->jumlah_brg = $r->input('jumlah');
         $barangbermasalah->keterangan = $r->input('keterangan');
         $barangbermasalah->id_barang = $r->input('id_barang');
         $barangbermasalah->id_peminjaman = $r->input('id');
         $barangbermasalah->id_siswa = $kelas;
         $kembalikan->save();
        $barangbermasalah->save();
        return redirect('barang2');  
      }elseif($r->input('keterangan') == "Rusak"){
        $barang->qty = $r->input('stock') + $r->input('jumlah');
        $kembalikan->keterangan = $r->input('keterangan');
        $kembalikan->waktukembali = date("d-m-Y");
        $kembalikan->status = "Sudah Dikembalikan";
        $barangbermasalah->kode_barang = $r->input('kode_barang');
        $barangbermasalah->jumlah_brg = $r->input('jumlah');
         $barangbermasalah->keterangan = $r->input('keterangan');
         $barangbermasalah->id_barang = $r->input('id_barang');
         $barangbermasalah->id_peminjaman = $r->input('id');
         $barangbermasalah->id_siswa = $kelas;
         $kembalikan->save();
        $barangbermasalah->save();  
        return redirect('barang2');
      }elseif($r->input('keterangan') == "Bagus"){
      $barang->status = $r->input('keterangan');
      $barang->qty = $r->input('stock') + $r->input('jumlah');
      $barang->save();

      $kembalikan->status = "Sudah Dikembalikan";
      $kembalikan->keterangan = $r->input('keterangan');
      $kembalikan->waktukembali = date("d-m-Y");
      $kembalikan->save();
      return redirect('barang');
      }else{
        echo "ada kesalahan";
      }
    } 

    public function mutasiAll() {
      $a['mutasibarangs2'] = \App\MutasiBarang::paginate(10);
      $a['mutasibarangs'] = \App\Income::paginate(10);

      return view('admin/barang/mutasi.all', $a);
    }

    public function mutasiKeluar($id) {
      $a['barang'] = \App\Income::find($id);
      $a['pelanggan'] = \App\Pelanggan::all();

      return view('admin/barang/mutasi.masuk', $a);
    }

    public function terpinjamNama($nama) {
      $a = \App\Siswa::where('nama', $nama)->value('id');
      $nama = \App\Peminjaman::where('id_siswa', $a)->get();
      $first = \App\Peminjaman::where('id_siswa', $a)->first();
      return view('admin/barang.terpinjamnama')->with(['namas' => $nama, 'firsts' => $first]);
    }

    public function terpinjamKelas($kelas) {
      $a = \App\Kelas::where('kelas', $kelas)->value('id');
      $b = \App\Siswa::where('id_kelas', $a)->value('id');
      $data['kelas'] = \App\Kelas::where('id', $a)->first();
      $data['datas'] = \App\Peminjaman::where('id_siswa', $b)->get();

      return view('admin/pinjam.kelas', $data);
    }

    public function sudahKembali() {
      $data['peminjamansudah'] = \App\Peminjaman::where('status', 'Sudah Dikembalikan')->paginate(10);
      $data['peminjamanbelum'] = \App\Peminjaman::where('status', 'Meminjam')->paginate(10);
      return view('admin/pinjam.pinjamsudah', $data);
    }
}
