<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'HomeController@index');

Route::get('/databarang', 'BarangController@index');
Route::get('/inbarang', 'BarangController@create');
Route::post('/inbarang', 'BarangController@inbar');
Route::get('/hapusbarang/{id}', 'BarangController@delete');
Route::get('/edbarang/{id}', 'BarangController@editbarang');
Route::post('/edbarang/{id}', 'BarangController@updatebarang');

Route::get('/projasa', 'JasaController@index');
Route::get('/injasa', 'JasaController@create');
Route::post('/injasa', 'JasaController@injasa');
Route::get('/hapusjasa/{id}', 'JasaController@hapusjasa');
Route::get('/edjasa/{id}', 'JasaController@editjasa');
Route::post('/edjasa/{id}', 'JasaController@updatejasa');

Route::get('/katjas', 'JasaController@katjas');
Route::get('/inkatjas', 'JasaController@creates');
Route::post('/inkatjas', 'JasaController@addkatjasa');
Route::get('/hapuskatjasa/{id}', 'JasaController@hapus');
Route::get('/edkatjas/{id}', 'JasaController@editkatjas');
Route::post('/edkatjas/{id}', 'JasaController@updatekatjas');

Route::get('/datpeg', 'JasaController@datpeg');
Route::get('/indatpeg', 'JasaController@createss');
Route::post('/indatpeg', 'JasaController@addpegawai');
Route::get('/hapuspegawai/{id}', 'JasaController@delete');
Route::get('/edpegawai/{id}', 'JasaController@editpegawai');
Route::post('/edpegawai/{id}', 'JasaController@updatepegawai');

Route::get('/katbar', 'BarangController@katbar');
Route::get('/inkatbarang', 'BarangController@creates');
Route::post('/inkatbarang', 'BarangController@createss');
Route::get('/hapuskatbarang/{id}', 'BarangController@hapus');
Route::get('/edkatbar/{id}', 'BarangController@edit');
Route::post('/edkatbar/{id}', 'BarangController@update');

Route::get('/ritbar', 'TransaksiController@index');
Route::get('/transbarang', 'TransaksiController@transaksi');
Route::post('/transbarang', 'TransaksiController@create');
Route::get('/transbarang/notab', 'TransaksiController@notab');
Route::get('/kosongTransaksi', 'TransaksiController@kosongTransaksi');
Route::post('/transaksibarang', 'TransaksiController@simpanTransaksi');
Route::get('/hapusb/{id}', 'TransaksiController@hapusb');
Route::get('/notajasa/{kode_penjualan}', 'TransaksiController@notajasa');
Route::get('/notabarang/{kode_penjualan}', 'TransaksiController@notabarang');

Route::get('/ritjas', 'TransaksiController@bindex');
Route::get('/transproduk', 'TransaksiController@transaksip');
Route::post('/transproduk', 'TransaksiController@createp');
Route::get('/transproduk/nota', 'TransaksiController@nota');	
Route::get('/kosongTransaksip', 'TransaksiController@kosongTransaksip');
Route::post('/transaksiproduk', 'TransaksiController@simpanTransaksip');
Route::get('/hapusp/{id}', 'TransaksiController@hapusp');

Route::get('/logout','Auth\AuthController@getLogout');
Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::post('/ajax/databarang', 'BarangController@ajaxdatabarang');
Route::post('/ajax/dataproduk', 'BarangController@ajaxdataproduk');
Route::post('/ajax/pilihproduk', 'BarangController@ajaxpilihproduk');
Route::post('/ajax/pilihbarang', 'BarangController@ajaxpilihbarang');


Route::post('ajax/produk/keluar','TransaksiController@ajaxprodukkeluar');

Route::get('/kosongTransaksi/{id}', function(Request $r, $id){
	$array = session('transaksib');
	unset($array[$id]);
	session(['transaksib'=> $array]);
	return redirect()->back();
}); 
