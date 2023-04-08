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
		Schema::create('harga_barang', function (Blueprint $table) {
			$table->increments('id_harga');
			$table->string('sku');
			$table->integer('harga');
			$table->integer('diskon');
			$table->timestamp('tgl_berlaku');
			$table->string('kode_cp');
			$table->timestamp('tgl_del');
			$table->double('diskon_psn');
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
		Schema::dropIfExists('kategori');
	}
};
