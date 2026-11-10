<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $table = 'produk';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'nama',
        'kategori',
        'brand',
        'harga',
        'gambar',
        'deskripsi',
        'warna',
        'berat',
        'stok',
    ];
}