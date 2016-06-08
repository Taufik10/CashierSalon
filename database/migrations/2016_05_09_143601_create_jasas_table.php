<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJasasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('jasas', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('kode_produk');
			$table->string('nama_produk');
			$table->string('keterangan');
			$table->string('harga');
			$table->string('kategori_jasa');
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
		Schema::drop('jasas');
	}

}
