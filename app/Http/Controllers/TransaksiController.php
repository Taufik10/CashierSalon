<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Tproduk;
use App\Tbarang;

class TransaksiController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}
	public function index(Request $req)
	{
		$tbarangs = \App\Tbarang::groupBy('kode_penjualan')->orderBy('id','desc')->paginate(5);
		return view('transaksi.tbarang')->with('tbarang',$tbarangs);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function transaksi()
	{
		$katbarang = \App\Katbarang::all();
		$barang = \App\Barang::all();
		$transaksib = session('transaksib');
		return view('transaksi.transaksib')->with('kategoris',$katbarang)->with('barangs', $barang)->with('transaksib', $transaksib);
	}
	public function simpanTransaksi(Request $request)
	{
		//return session('transaksib');
		foreach(session('transaksib') as $key => $tbarang){
			$transaksiba = new \App\Tbarang;		
			$transaksiba->kode_penjualan = $tbarang['kode_penjualan'];
			$transaksiba->pelanggan = $tbarang['pelanggan'];
			$transaksiba->keterangan = $tbarang['keterangan'];
			$transaksiba->kategori_barang = $tbarang['kategori_barang'];
			$transaksiba->nama_barang = preg_replace('/\d+-/','',  $tbarang['nama_barang']);
			$transaksiba->kode_barang = $tbarang['kode_barang'];
			$transaksiba->harga_jual = $tbarang['hargajual'];
			$transaksiba->jumlah = $tbarang['jumlah'];
			$transaksiba->total = $request->total; 
			$transaksiba->bayar = $request->bayar;
			$transaksiba->kembalian = $request->bayar - $request->total;
			$transaksiba->save();
			
			$barangs = \App\Barang::where('kode_barang',$transaksiba->kode_barang)->get();
			$barangs[0]->stok = $tbarang['stok'];
			$barangs[0]->save();
			
		}
		$request->session()->put('uang_total',$request->total);
		$request->session()->put('uang_bayar',$request->bayar);
		$request->session()->put('uang_kembali',$request->bayar - $request->total);

		// $request->session()->forget('transaksip');
		// return redirect()->back()->withinput();
		return redirect('transbarang/notab');
		// $request->session()->forget('transaksib');
		// return redirect()->back()->withinput();

	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function kosongTransaksi(Request $request){
		$request->session()->forget('transaksib');
		return redirect()->back()->withinput();

	}
	public function create(Request $request)
	{		

		$key = count(session('transaksib'));
		$array = session('transaksib');
		$array[$key]['kode_penjualan'] = $request->kode_penjualan;
		$array[$key]['keterangan'] = $request->keterangan;
		$array[$key]['pelanggan'] = $request->pelanggan;
		$array[$key]['kategori_barang'] = $request->kategori_barang;
		$array[$key]['nama_barang'] = $request->nama_barang;
		$array[$key]['kode_barang'] = $request->kode_barang;
		$array[$key]['hargajual'] = $request->hargajual;
		$array[$key]['stok'] = $request->stoksisa;		
		$array[$key]['jumlah'] = $request->jumlah;
		$request->session()->put('transaksib',$array);
		$request->session()->put('pelanggan', $request->pelanggan);
		$request->session()->put('keterangan',$request->keterangan);
		// return session('transaksib');
		return redirect()->back()->withinput();
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function bindex(Request $req)
	{
		$tproduks = \App\Tproduk::groupBy('kode_penjualan')->orderBy('id','desc')->paginate(5);
		return view('transaksi.tproduk')->with('tproduk',$tproduks);
	}
	public function transaksip()
	{
		$katjasa = \App\Katjasa::all();
		$jasa = \App\Jasa::all();
		$transaksip = session('transaksip');
		return view('transaksi.transaksip')->with('kategoris',$katjasa)->with('jasas', $jasa)->with('transaksip', $transaksip);
	}
	public function simpanTransaksip(Request $request)
	{
		//return session('transaksib');
		foreach(session('transaksip') as $key => $tproduk){
			$transaksipa = new \App\Tproduk;		
			$transaksipa->kode_penjualan = $tproduk['kode_penjualan'];
			$transaksipa->pelanggan = $tproduk['pelanggan'];
			$transaksipa->keterangan = $tproduk['keterangan'];
			$transaksipa->kategori_jasa = $tproduk['kategori_jasa'];
			$transaksipa->nama_produk = preg_replace('/\d+-/','',  $tproduk['nama_produk']);
			$transaksipa->kode_produk = $tproduk['kode_produk'];
			$transaksipa->harga = $tproduk['harga'];
			$transaksipa->diskon = $tproduk['diskon'];
			$transaksipa->total = $request->total; 
			$transaksipa->bayar = $request->bayar;
			$transaksipa->kembalian = $request->bayar - $request->total;
			$transaksipa->save();	


			// $request->session()->put('pelanggan',$);
			// $request->session()->put('keterangan',$request->keterangan);
			// echo $tproduk['pelanggan'];
		}

		$request->session()->put('uang_total',$request->total);

		$request->session()->put('uang_bayar',$request->bayar);
		$request->session()->put('uang_kembali',$request->bayar - $request->total);
		// $request->session()->forget('transaksip');
		// return redirect()->back()->withinput();
		// echo $request->;
		// die();
		return redirect('transproduk/nota');

	}

	public function nota(Request $r)
	{
		$katjasa = \App\Katjasa::all();
		$jasa = \App\Jasa::all();
		$transaksip = session('transaksip');
		$uang_total = $r->session()->get('uang_total');
		$uang_bayar = $r->session()->get('uang_bayar');
		$uang_kembali = $r->session()->get('uang_kembali');
		$pelanggan = $r->session()->get('pelanggan');
		$keterangan = $r->session()->get('keterangan');


		// echo $r->session()->get('pelanggan');
		// die();
		$r->session()->forget('transaksip');
		return view('transaksi.tnota')->with('uang_total',$uang_total)->with('uang_bayar', $uang_bayar)->with('uang_kembali', $uang_kembali)->with('kategoris',$katjasa)->with('jasas', $jasa)->with('transaksip', $transaksip)->with('pelanggan', $pelanggan)->with('keterangan', $keterangan);
	}

	public function notab(Request $r)
	{
		$katbarang = \App\Katbarang::all();
		$barang = \App\Barang::all();		
		$transaksib = session('transaksib');
		$uang_total = $r->session()->get('uang_total');
		$uang_bayar = $r->session()->get('uang_bayar');
		$uang_kembali = $r->session()->get('uang_kembali');
		$pelanggan = $r->session()->get('pelanggan');
		$keterangan = $r->session()->get('keterangan');

		$r->session()->forget('transaksib');
		return view('transaksi.tnotab')->with('uang_total',$uang_total)->with('uang_bayar', $uang_bayar)->with('uang_kembali', $uang_kembali)->with('kategoris',$katbarang)->with('barangs', $barang)->with('transaksib', $transaksib)->with('pelanggan', $pelanggan)->with('keterangan', $keterangan);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function kosongTransaksip(Request $request){
		$request->session()->forget('transaksip');
		return redirect()->back()->withinput();

	}
	public function createp(Request $request)
	{		

		$key = count(session('transaksip'));
		$array = session('transaksip');
		$array[$key]['kode_penjualan'] = $request->kode_penjualan;
		$array[$key]['keterangan'] = $request->keterangan;
		$array[$key]['pelanggan'] = $request->pelanggan;
		$array[$key]['kategori_jasa'] = $request->kategori_jasa;
		$array[$key]['nama_produk'] = $request->nama_produk;
		$array[$key]['kode_produk'] = $request->kode_produk;
		$array[$key]['harga'] = $request->harga;
		$array[$key]['diskon'] = $request->diskon;				
		$request->session()->put('transaksip',$array);
		$request->session()->put('pelanggan', $request->pelanggan);
		$request->session()->put('keterangan',$request->keterangan);
		// return session('transaksib');

		// echo $request->session()->get('pelanggan');
		// die();
		return redirect()->back()->withinput();
	}



	public function ajaxprodukkeluar(Request $req){
		$produkkeluar = Barang::find($req->id);
		return $produkkeluar;
	}
	
	public function hapusb($kode)
	{
		
		\App\Tbarang::whereKodePenjualan($kode)->delete();
		return redirect('/ritbar');
	}
	public function hapusp($kode)
	{
		
		\App\Tproduk::whereKodePenjualan($kode)->delete();
		return redirect('/ritjas');
	}

	public function notajasa(Request $r,$kode_penjualan)
	{

		$tproduk = Tproduk::where('kode_penjualan',$kode_penjualan)->get();
		$pelanggan = Tproduk::where('kode_penjualan',$kode_penjualan)->first();
		$transaksip = session('transaksip');
		$keterangan = $r->session()->get('keterangan');
		$grandtotal = Tproduk::where('kode_penjualan',$kode_penjualan)->sum('total');
		$uang_bayar = Tproduk::where('kode_penjualan',$kode_penjualan)->first();
		$uang_kembali = Tproduk::where('kode_penjualan',$kode_penjualan)->first();
		return view('transaksi.notajasa',['tproduk'=>$tproduk,'transaksip'=>$transaksip,'pelanggan'=>$pelanggan,'keterangan'=>$keterangan,'grandtotal'=>$grandtotal,'uang_bayar'=>$uang_bayar,'uang_kembali'=>$uang_kembali]);
	}

	public function notabarang(Request $r,$kode_penjualan)
	{

		$tbarang = Tbarang::where('kode_penjualan',$kode_penjualan)->get();
		$pelanggan = Tbarang::where('kode_penjualan',$kode_penjualan)->first();
		$transaksib = session('transaksib');
		$keterangan = $r->session()->get('keterangan');
		$grandtotal = Tbarang::where('kode_penjualan',$kode_penjualan)->sum('total');
		$uang_bayar = Tbarang::where('kode_penjualan',$kode_penjualan)->first();
		$uang_kembali = Tbarang::where('kode_penjualan',$kode_penjualan)->first();
		return view('transaksi.notabarang',['tbarang'=>$tbarang,'transaksib'=>$transaksib,'pelanggan'=>$pelanggan,'keterangan'=>$keterangan,'grandtotal'=>$grandtotal,'uang_bayar'=>$uang_bayar,'uang_kembali'=>$uang_kembali]);
	}
}
