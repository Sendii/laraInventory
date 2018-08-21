<?php

namespace App\Http\Controllers;
use ConsoleTVs\Charts\Facades\Charts;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function chart()
    {
        $chart = Charts::create('line', 'highcharts')
            ->title("Monthly new Register Users")
            ->elementLabel("Total Users")
            ->dimensions(1000, 500)
            ->responsive(true);
        return view('chart', ['charts' => $chart]);
    }
    public function index()
    {
      $data['barangs'] = \App\Income::take(8)->orderBy('id', 'DESC')->get();
      $data['users'] = \App\User::take(5)->orderBy('id', 'DESC')->get();
        return view('home')->with($data);
    }

    public function alluser() {
        $user['users'] = \App\User::paginate(10);

        return view('admin/user.all')->with($user);
    }

    // public function save(Request $r) {
    //     $new = new \App\Supplier;
    //     $new->fixsupplier = date("Y-m-d");
    //     $new->nm_supplier = $r->input('namasupplier');
    //     $new->alamat = $r->input('alamat');
    //     $new->telepon = $r->input('telepon');

    //     $new->save();
    //     return redirect('supplier');
    // }
    public function edit($id)
    {
      $user = \App\User::find($id);
      $outlet = \App\Pelanggan::all();
      return view('admin/user.edit', ['users' => $user, 'outlets' => $outlet]);  
    }

    public function update(Request $request)
    {
      $b = \App\User::find($request->input('id'));
      $b->name = $request->nama;
      $b->email = $request->email;
      $b->id_outlet = $request->hakakses;      
      $b->save();

      return redirect(url('pengguna'));
    }

    public function allsiswa() {
      $siswa['siswas'] = \App\Siswa::paginate(15);
      $siswa['kelas'] = \App\Kelas::all();

      return view('admin/siswa.all')->with($siswa);
    }

    public function saveSiswa(Request $r) {
      $new = new \App\Siswa;
      $new->namalengkap = $r->input('namasiswa');
      $new->id_kelas = $r->input('kelas');
      $new->phone = $r->input('phone');
      $new->nisn = $r->input('nisn');

      $new->save();
      return redirect('siswa');
    }

    public function editSiswa($id) {
      $edit = \App\Siswa::find($id);
      $kelas = \App\Kelas::all();

      return view('admin/siswa.edit')->with(['edits' => $edit, 'kelass' => $kelas]);
    }

    public function updateSiswa(Request $r) {
      $edit = \App\Siswa::find($r->input('id'));

      $edit->namalengkap = $r->input('nama');
      $edit->id_kelas = $r->input('kelas');
      $edit->phone = $r->input('phone');
      $edit->nisn = $r->input('nisn');

      $edit->save();
      return redirect('siswa');
    }

    public function deleteSiswa($id) {
      $drop = \App\Siswa::find($id);
      $drop->delete();

      return redirect('siswa');
    }
}
