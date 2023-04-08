<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
	use HasFactory;

	protected $table = 'harga_barang';
	protected $primaryKey = 'id_harga';
	public $incrementing = true;
	protected $fillable = [

		'sku',
		'harga',
		'diskon',
		'tgl_berlaku',
		'kode_cp',
		'tgl_del',
		'diskon_psn',
		'updat'
	];

	// public function barang()
	// {
	// 	return $this->hasMany(Barang::class, 'id_kategori');
	// }
}
