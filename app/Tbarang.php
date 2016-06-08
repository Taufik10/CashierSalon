<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Tbarang extends Model {

	public function katbarang(){
		return $this->belongsTo('\App\Katbarang','kategori_barang','id');
	}

	public function barang(){
		return $this->belongsTo('\App\Barang','nama_barang','id');
	}

}
