<?php

namespace App\Http\Controllers;
use App\Exports\UsersExport;
use App\Products;
use App\User;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use DB;
use Session;


class Ix extends Controller
{
    public function importExportExcelORCSV(){
        return view('file_import_export');
    }

    public function importFileIntoDB(Request $request){
    	if($request->hasFile('import_file')){
            Excel::load($request->file('import_file')->getRealPath(), function ($reader) {
                foreach ($reader->toArray() as $key => $row) {
                    $data['name'] = $row['name'];
                    $data['email'] = $row['email'];

                    if(!empty($data)) {
                        DB::table('users')->insert($data);
                    }
                }
            });
        }

        Session::put('success', 'Youe file successfully import in database!!!');
        return redirect('/');
    }

    public function downloadExcelFile($type){
        $products = User::get()->toArray();
        return \Excel::create('expertphp_demo', function($excel) use ($products) {
            $excel->sheet('sheet name', function($sheet) use ($products)
            {
                $sheet->fromArray($products);
            });
        })->download($type);
    }      
}
