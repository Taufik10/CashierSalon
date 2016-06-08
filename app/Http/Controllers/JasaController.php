<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class JasaController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}
	public function index()
	{
		$jasas = \App\Jasa::with('katjasa')->orderBy('id','desc')->paginate(5);		
		return view('jasa.produkjasa')->with('jasas', $jasas);		
		
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function katjas()
	{
		$data= array('data'=>\App\Katjasa::orderBy('id','desc')->paginate(5));
		return view ('jasa.katjasa')->with($data,'data');	
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function datpeg()
	{
		$pegawais = \App\Pegawai::with('katjasa')->orderBy('id','desc')->paginate(5);		
		return view ('jasa.datapeg')->with('pegawais', $pegawais);			
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function create()
	{
		$katjasa = \App\Katjasa::all();
		return view('jasa.injasa')->with('kategoris',$katjasa);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function creates()
	{
		return view('jasa.inkatjas');
	}

	public function createss()
	{
		$katjasa = \App\Katjasa::all();
		return view ('jasa.indatpeg')->with('kategoris',$katjasa);		
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function addkatjasa(Request $request)
	{
		$katjasa = new \App\Katjasa;		
		$katjasa->kategori_jasa = $request->kategori_jasa;
		$katjasa->save();
		return redirect('/katjas');
	}
	public function hapus($id)
	{
		\App\Katjasa::find($id)->delete();
		return redirect('/katjas');
	}
	public function addpegawai(Request $request)
	{
		$pegawai = new \App\Pegawai;		
		$pegawai->nama = $request->nama;
		$pegawai->kategori_jasa = $request->kategori_jasa;
		$pegawai->save();
		return redirect('/datpeg');
	}
	public function delete($id)
	{
		\App\Pegawai::find($id)->delete();
		return redirect('/datpeg');
	}
	public function injasa(Request $request)
	{
		$jasa = new \App\Jasa;		
		$jasa->kode_produk = $request->kode_produk;
		$jasa->nama_produk = $request->nama_produk;
		$jasa->keterangan = $request->keterangan;
		$jasa->harga = $request->harga;
		$jasa->kategori_jasa = $request->kategori_jasa;
		$jasa->save();
		return redirect('/projasa');
	}
	public function hapusjasa($id)
	{
		\App\Jasa::find($id)->delete();
		return redirect('/projasa');
	}

	public function editkatjas($id)
	{		
        $katjasa = \App\Katjasa::where('id','=',$id)->first();        
		return view ('jasa.edkatjas')->with('katjasa', $katjasa);	    

	}
	public function updatekatjas(Request $request,$id)
	{		
        $barang = \App\Katjasa::find($id);
		$barang->kategori_jasa = $request->kategori_jasa;	
		$barang->save();
		return redirect('/katjas');

	}
	public function editpegawai($id)
	{		
        $pegawai = \App\Pegawai::where('id','=',$id)->first();        
        $kategoris = \App\Katjasa::all();
        return view ('jasa.edpegawai')->with('pegawai', $pegawai)->with('kategoris',$kategoris);	    			    

	}
	public function updatepegawai(Request $request,$id)
	{		
        $pegawai = \App\Pegawai::find($id);		
		$pegawai->nama = $request->nama;
		$pegawai->kategori_jasa = $request->kategori_jasa;
		$pegawai->save();
		return redirect('/datpeg');

	}
	public function editjasa($id)
	{		
        $jasa = \App\Jasa::where('id','=',$id)->first();        
        $kategoris = \App\Katjasa::all();
        return view ('jasa.edjasa')->with('jasa', $jasa)->with('kategoris',$kategoris);	    			    

	}
	public function updatejasa(Request $request,$id)
	{		
        $jasa = \App\Jasa::find($id);		
		$jasa->kode_produk = $request->kode_produk;
		$jasa->nama_produk = $request->nama_produk;
		$jasa->keterangan = $request->keterangan;
		$jasa->harga = $request->harga;
		$jasa->kategori_jasa = $request->kategori_jasa;
		$jasa->save();
		return redirect('/projasa');

	}


}
