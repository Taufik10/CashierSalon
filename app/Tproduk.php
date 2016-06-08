<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Tproduk extends Model {

	public function katjasa(){
		return $this->belongsTo('\App\Katjasa','kategori_jasa','id');
	}

	public function jasa(){
		return $this->belongsTo('\App\Jasa','nama_jasa','id');
	}

}
