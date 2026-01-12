<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $table = 'produk';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'id',
        'nama',
        'kategori_id',
        'merek_id',
        'deskripsi',
        'gambar1',
        'gambar2',
        'gambar3',
        'harga',
        'stok',
    ];
}

