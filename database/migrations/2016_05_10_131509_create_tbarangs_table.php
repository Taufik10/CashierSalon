<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbarangsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tbarangs', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('kode_penjualan');
			$table->string('pelanggan');
			$table->string('keterangan');
			$table->string('kategori_barang');
			$table->string('nama_barang');
			$table->string('kode_barang');
			$table->integer('harga_jual');
			$table->integer('jumlah');
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
		Schema::drop('tbarangs');
	}

}
