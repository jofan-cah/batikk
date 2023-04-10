<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
	use HasFactory;

	protected $table = 'barang';
	// public $incrementing = true;
	protected $primaryKey = 'id_barang';
	public $incrementing = true;
	protected $fillable = [
		'sku',
		'korner',
		'produk',
		'model',
		'motif',
		'proses',
		'material',
		'warna',
		'rasa',
		'brand',
		'size',
		'satuan',
		'status',
		'sup',
		'asal',
		'pt',
		'updat'
	];
}
