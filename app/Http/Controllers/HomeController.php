<?php namespace App\Http\Controllers;

class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

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
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		$barang = \App\Barang::count();
		$katbarang = \App\Katbarang::count();
		$jasa = \App\Jasa::count();
		$katjasa = \App\Katjasa::count();
		$pegawai = \App\Pegawai::count();
		$tbarang = \App\Tbarang::groupBy('kode_penjualan')->get()->count();
		$tproduk = \App\Tproduk::groupBy('kode_penjualan')->get()->count();
		$chart = \App\Tbarang::select(\DB::raw('count(nama_barang) as jumlah_barang'))->groupBy('nama_barang')->orderBy('jumlah_barang','desc')->take(5)->get();

		// return response()->json($chart);

		return view('home')->with('barang',$barang)->with('katbarang',$katbarang)->with('jasa',$jasa)
		->with('katjasa',$katjasa)->with('pegawai',$pegawai)->with('tbarang',$tbarang)->with('tproduk',$tproduk)->with('chart',$chart);
	}

}
