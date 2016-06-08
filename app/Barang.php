<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model {

	public function katbarang(){
		return $this->belongsTo('\App\Katbarang','kategori_barang','id');
	}

}
