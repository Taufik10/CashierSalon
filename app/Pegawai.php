<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model {

	public function katjasa(){
		return $this->belongsTo('\App\Katjasa','kategori_jasa','id');
	}

}
