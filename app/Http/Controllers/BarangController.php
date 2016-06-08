<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class BarangController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	public function __construct()
	{
		$this->middleware('auth');
	}

	public function index(Request $request)
	{
		$barang = \App\Barang::with('katbarang')->orderBy('id','desc')->paginate(5);		
		return view ('barang.databarang')->with('barangs', $barang);					
	}

	public function inbar(Request $request)
	{
		$barang = new \App\Barang;
		$barang->kode_barang = $request->kode_barang;
		$barang->nama_barang = $request->nama_barang;
		$barang->harga_modal = $request->harga_modal;
		$barang->harga_jual = $request->harga_jual;
		$barang->satuan = $request->satuan;
		$barang->stok = $request->stok;
		$barang->keterangan = $request->keterangan;
		$barang->kategori_barang = $request->kategori_barang;
		$barang->save();
		return redirect('/databarang');
	}
	public function hapus($id)
	{
		\App\Katbarang::find($id)->delete();
		return redirect('/katbar');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function katbar()
	{
		$data= array('data'=>\App\Katbarang::orderBy('id','desc')->paginate(5));
		return view ('barang.katbarang')->with($data,'data');				
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function create()
	{
		$katbarang = \App\Katbarang::all();
		return view ('barang.inbarang')->with('kategoris',$katbarang);	
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function creates()
	{			
		return view ('barang.inkatbarang');		
	}

	public function createss(Request $request)
	{
		$katbarang = new \App\Katbarang;
		$katbarang->kategori_barang = $request->kategori_barang;
		$katbarang->save();
		return redirect('/katbar');
	}
	public function delete($id)
	{
		\App\Barang::find($id)->delete();
		return redirect('/databarang');
	}
	public function edit($id)
	{		
        $katbarang = \App\Katbarang::where('id','=',$id)->first();
		return view ('barang.edkatbar')->with('katbarang',$katbarang);	    

	}
	public function update(Request $request,$id)
	{		
        $katbarang = \App\Katbarang::find($id);
		$katbarang->kategori_barang = $request->kategori_barang;
		$katbarang->save();
		return redirect('/katbar');

	}
	public function editbarang($id)
	{		
        $barang = \App\Barang::where('id','=',$id)->first();
        $kategoris = \App\Katbarang::all();
		return view ('barang.edbarang')->with('barang', $barang)->with('kategoris',$kategoris);	    

	}
	public function updatebarang(Request $request,$id)
	{		
        $barang = \App\Barang::find($id);
		$barang->kode_barang = $request->kode_barang;
		$barang->nama_barang = $request->nama_barang;
		$barang->harga_modal = $request->harga_modal;
		$barang->harga_jual = $request->harga_jual;
		$barang->satuan = $request->satuan;
		$barang->stok = $request->stok;
		$barang->keterangan = $request->keterangan;
		$barang->kategori_barang = $request->kategori_barang;
		$barang->save();
		return redirect('/databarang');

	}

	public function ajaxdatabarang(Request $req)
	{
		$barang = \App\Barang::with('katbarang')->where('kategori_barang',$req->id)->get();
		return $barang;
	}
	public function ajaxpilihbarang(Request $req){
		$barang = \App\Barang::find($req->id);
		return $barang;
	}
	public function ajaxdataproduk(Request $req)
	{
		$produk = \App\Jasa::with('katjasa')->where('kategori_jasa',$req->id)->get();
		return $produk;
	}
	public function ajaxpilihproduk(Request $req){
		$produk = \App\Jasa::find($req->id);
		return $produk;
	}

}
