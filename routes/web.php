<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/date', function() {
	$a = DB::table('peminjamans')->whereBetween('created_at', array('2018-09-21', '2018-09-25'))->get();
	dd($a);
});
Route::get('/', function () {
	return view('welcome');
});
Route::get('pagenotfound', ['as' => 'notfound', 'uses' => 'HomeController@pagenotfound']);
Route::get('pdfview', 'HomeController@pdfview')->name('generate-pdf');
Route::get('pdfviewPeminjaman', 'HomeController@pdfviewPeminjaman');

Auth::routes();

Route::middleware(['admins'], 'auth')->group(function() {
	Route::group(['prefix' => 'supplier'] , function(){
		Route::post('save', 'SupplierController@save');
		Route::get('{nm_supplier}', 'SupplierController@barangSupplier');
		Route::get('edit/{id}', 'SupplierController@editSupplier');
	});

	Route::group(['prefix' => 'pengguna'] , function(){
		Route::post('save', 'HomeController@save');
		Route::get('/edit/{id}','HomeController@edit');
		Route::post('update','HomeController@update');
	});

	Route::group(['prefix' => 'pelanggan'] , function(){
		Route::post('save', 'PelangganController@save');
		Route::get('/edit/{id}','PelangganController@edit');
		Route::post('update','PelangganController@update');
		Route::get('delete/{id}','PelangganController@delete');
	});

	Route::group(['prefix' => 'siswa'] , function(){
		Route::get('detail/{id}', 'HomeController@detailSiswa');
		Route::get('/10', 'HomeController@allSiswa');
		Route::get('/11', 'HomeController@allSiswa');
		Route::get('/12', 'HomeController@allSiswa');
		Route::post('save', 'HomeController@saveSiswa');
		Route::get('/edit/{id}','HomeController@editSiswa');
		Route::post('update','HomeController@updateSiswa');
		Route::get('delete/{id}','HomeController@deleteSiswa');
		Route::get('importExport', 'HomeController@importExport');
		Route::get('downloadExcel/{type}', 'HomeController@downloadExcel');
		Route::post('importExcel', 'HomeController@importExcel');
	});

	Route::group(['prefix' => 'barang'] , function(){
		Route::get('/report/all', 'BarangController@allReport');
		Route::get('/diterima', 'BarangController@allditerima');
		Route::get('/diterima/{kode_barang}', 'BarangController@kodeBarang');
		Route::get('/ditolak', 'BarangController@allditolak');
		Route::get('/add', 'BarangController@add');
		Route::get('/addtolak', 'BarangController@add');
		Route::post('save', 'BarangController@save')->name('saveBarang');
		Route::post('savetolak', 'BarangController@savetolak');
		Route::get('/edit/{id}','BarangController@edit');
		Route::post('update','BarangController@update');
		Route::get('delete/{id}','BarangController@delete');
		Route::get('deletetolak/{id}','BarangController@deletetolak');
		Route::get('peminjaman/{id}', 'BarangController@peminjamanan');
		Route::post('peminjaman/save','BarangController@savePeminjaman');
		Route::get('dipinjam', 'BarangController@barangTerpinjam');
		Route::get('dipinjam/sudah', 'BarangController@sudahKembali');
		Route::get('dipinjam/belum', 'BarangController@sudahKembali');
		Route::get('pengembalian/{id}', 'BarangController@pengembalian');
		Route::post('pengembalian/save', 'BarangController@savePengembalian');
		Route::get('history/nama/{nama}','BarangController@terpinjamNama');
		Route::get('history/kelas/{kelas}','BarangController@terpinjamKelas');

		Route::group(['prefix' => 'mutasi'], function() {
			Route::get('/', 'BarangController@mutasiAll');
			Route::get('/keluar/{id}', 'BarangController@mutasiKeluar');
			Route::post('/keluar/save', 'BarangController@savemutasiKeluar');
			Route::get('/masuk/{id}', 'BarangController@mutasiMasuk');
			Route::get('{nama_pelanggan}', 'BarangController@mutasiPelanggan');
		});
	});

	Route::group(['prefix' => 'barang2'], function() {
		Route::get('/', 'BarangRHController@allRh');
		Route::get('hilang', 'BarangRHController@barangHilang');
		Route::get('rusak', 'BarangRHController@barangRusak');
		Route::get('{kode_barang}', 'BarangRHController@kodeBarang');
	});
});

Route::middleware(['admins'] || ['users'] , 'auth')->group(function() {
	Route::get('/dashboard', 'HomeController@index')->name('home');
	Route::group(['prefix' => 'supplier'] , function(){
		Route::get('/', 'SupplierController@all');
	});

	Route::group(['prefix' => 'pengguna'] , function(){
		Route::get('/', 'HomeController@alluser');
	});

	Route::group(['prefix' => 'pelanggan'] , function(){
		Route::get('/', 'PelangganController@all');
	});

	Route::group(['prefix' => 'barang'] , function(){
		Route::get('/', function() {
			$barang = \App\Income::paginate(10);
			$supplier = \App\Supplier::all();

			return view('admin/barang.all')->with(['barangs' => $barang, 'suppliers' => $supplier]);
		});
	});

	Route::group(['prefix' => 'siswa'] , function(){
		Route::get('/', 'HomeController@allSiswa');
	});
});

Route::middleware(['users'], 'auth')->group(function() {
	Route::get('/user', function() {
		echo "kamu user";
	});	
});
Route::get('test', 'HomeController@chart');
