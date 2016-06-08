<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBarangsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('barangs', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('kode_barang');
			$table->string('nama_barang');
			$table->string('harga_modal');
			$table->string('harga_jual');
			$table->string('satuan');
			$table->string('stok');
			$table->string('keterangan');
			$table->string('kategori_barang');			
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
		Schema::drop('barangs');
	}

}
