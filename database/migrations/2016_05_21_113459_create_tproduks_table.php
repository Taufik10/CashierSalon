<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTproduksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tproduks', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('kode_penjualan');
			$table->string('pelanggan');
			$table->string('keterangan');
			$table->string('kategori_jasa');
			$table->string('nama_produk');
			$table->string('pegawai');
			$table->integer('harga');
			$table->integer('diskon');			
			$table->integer('total');
			$table->integer('bayar');
			$table->integer('kembalian');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tproduks');
	}

}
