<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Product;
use Maatwebsite\Excel\Excel;
use App\Exports\UsersExport;
use App\Http\Controllers\Controller;


class ReportController extends Controller
{

    public function report() {
        $data['user'] = User::all();
    $data['peminjaman'] = \App\Peminjaman::where('created_at')->count();
        dd($data['peminjaman']);
        return view('chart', $data);
    }
	public function importExportView(){

		return view('import_export');

	}



    /**

     * Create a new controller instance.

     *

     * @return void

     */

    public function importFile(Request $request){

    	if($request->hasFile('sample_file')){

    		$path = $request->file('sample_file')->getRealPath();
    		dd($request->hasFile('sample_file'));
    		$data = \Excel::load($path)->get();
    		if($data->count()){
    			foreach ($data as $key => $value) {
    				$arr[] = ['title' => $value->title, 'body' => $value->body];
    			}
    			if(!empty($arr)){
    				DB::table('users')->insert($arr);
    				dd('Insert Recorded successfully.');
    			}
    		}
    	}else{
    		dd('Request data does not have any files to import.');      
    	}
    } 
    /**

     * Create a new controller instance.

     *

     * @return void

     */

    public function exportFile($type){
    	return Excel::download(new UsersExport, 'users.xlsx');
    }      
}
