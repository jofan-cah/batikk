<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('barang', function (Blueprint $table) {
			$table->increments('id_barang')->first();
			$table->string('sku');
			$table->string('korner');
			$table->string('produk');
			$table->string('model');
			$table->string('motif');

			$table->string('proses');
			$table->string('material');
			$table->string('warna');
			$table->string('rasa');
			$table->string('brand');

			$table->string('size');
			$table->string('satuan');
			$table->string('status');
			$table->string('sup');
			$table->string('asal');
			$table->string('pt');
			$table->integer('updat');

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
		Schema::dropIfExists('barang');
	}
};
