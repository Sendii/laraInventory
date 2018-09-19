<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DB;
use Excel;
use App\Product;
use App\Exports\UsersExport;
use App\Http\Controllers\Controller;


class ReportController extends Controller
{
    public function importExport() {
        return view('importExport');
    }

    public function downloadExcel($type) {
        $data = \App\Siswa::get()->toArray();
        return Excel::create('itsolutionstuff_example', function($excel) use ($data) {
            $excel->sheet('mySheet', function($sheet) use ($data)
            {
                $sheet->fromArray($data);
            });
        })->download($type);
    }

    public function importExcel(Request $r) {
        if ($r->hasFile('import_file')) {
            $path = $r->file('import_file')->getRealPath();
            $data = Excel::load($path, function($reader) {
            })->get();
            if (!empty($data) && $data->count()) {
                foreach ($data as $key => $value) {
                    $insert[] = ['id' => $value->id, 'id_kelas' => $value->id_kelas, 'namalengkap' => $value->namalengkap, 'phone' => $value->phone, 'nisn' => $value->nisn];
                }
                if (!empty($insert)) {
                    DB::table('items')->insert($insert);
                    dd('Insert successfully');
                }else{
                    dd('gagal');
                }
            }
        }
    }
}
