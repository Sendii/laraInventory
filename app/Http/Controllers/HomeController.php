<?php

namespace App\Http\Controllers;
use DB;
use PDF;
use Input;
use Excel;
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

    public function importExport()
    {
      return view('importExport');
    }
    public function downloadExcel($type)
    {
      $data = \App\Siswa::get()->toArray();
      return Excel::create('sisawReport', function($excel) use ($data) {
        $excel->sheet('mySheet', function($sheet) use ($data)
        {
          $sheet->fromArray($data);
        });
      })->download($type);
    }
    public function importExcel()
    {
      if(Input::hasFile('import_file')){
        $path = Input::file('import_file')->getRealPath();
        $data = Excel::load($path, function($reader) {
        })->get();
        if(!empty($data) && $data->count()){
          foreach ($data as $key => $value) {
            $insert[] = ['nis' => $value->nis, 'nohp' => $value->nohp, 'nik' => $value->nik, 'nisn' => $value->nisn, 'nama' => $value->nama, 'id_kelas' => $value->id_kelas, 'jenkel' => $value->jenkel, 'tempat' => $value->tempat, 'tanggallahir' => $value->tanggallahir, 'agama' => $value->agama, 'namaortu' => $value->namaortu, 'namaayah' => $value->namaayah, 'namaibu' => $value->namaibu, 'alamat' => $value->alamat, 'nomorijazah' => $value->nomorijazah, 'tahun' => $value->tahun];
          }
          if(!empty($insert)){
            DB::table('siswas')->insert($insert);
            return redirect(url('siswa'));
          }
        }
      }
      return back();
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
      $_requestUrl = basename($_SERVER['REQUEST_URI']);
      if ($_requestUrl == "siswa") {
        $siswa['siswas'] = \App\Siswa::paginate(700);
        $siswa['kelas'] = \App\Kelas::all();
      }elseif ($_requestUrl == "10") {
        $siswa['siswas'] = \App\Siswa::whereIn('id_kelas', [2,3,8,9,14,15,20])->get();
        $siswa['kelas'] = \App\Kelas::all();
      }elseif ($_requestUrl == "11") {
        $siswa['siswas'] = \App\Siswa::whereIn('id_kelas', [4,5,10,11,16,17,21])->get();
        $siswa['kelas'] = \App\Kelas::all();
      }elseif ($_requestUrl == "12") {
        $siswa['siswas'] = \App\Siswa::whereIn('id_kelas', [6,7,12,13,18,19,22])->get();
        $siswa['kelas'] = \App\Kelas::all();
      }

      return view('admin/siswa.all')->with($siswa);
    }

    public function saveSiswa(Request $r) {
      $new = new \App\Siswa;
      $new->nama = $r->input('namasiswa');
      $new->id_kelas = $r->input('kelas');
      $new->nohp = $r->input('phone');
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

      $edit->nama = $r->input('nama');
      $edit->id_kelas = $r->input('kelas');
      $edit->nis = $r->input('nis');
      $edit->nisn = $r->input('nisn');
      $edit->alamat = $r->input('alamat');
      $edit->nomorijazah = $r->input('nomorijazah');

      $edit->save();
      return redirect('siswa');
    }

    public function deleteSiswa($id) {
      $drop = \App\Siswa::find($id);
      $drop->delete();

      return redirect('siswa');
    }

    // ----------------URL REDIRECT TO ERROR404------------
    public function pagenotfound()
    {
     return view('503');
   }

   public function detailSiswa($id) {
      $siswa['siswas'] = \App\Siswa::find($id);
      $siswa['kelas'] = \App\Kelas::all();

      return view('admin/siswa.detail', $siswa);
   }

   public function pdfview()
    {
      $data['barangs'] = \App\Income::all();
      $pdf = PDF::loadView('admin/barang.report', $data);
      return $pdf->download('invoice.pdf');
    }

    public function pdfviewPeminjaman() {
      $barang['barangs'] = \App\Peminjaman::paginate(10);
      $pdf = PDF::loadView('admin/barang.reportpeminjaman', $barang);
      return $pdf->download('allPeminjaman.pdf');
    }
 }
