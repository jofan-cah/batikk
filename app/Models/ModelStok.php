<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelStok extends Model
{
    use HasFactory;
    protected $table = 'stok';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $fillable = [

        'sku',
        'qty',
        'kat',
        'sat',
        'updat',

    ];
}
