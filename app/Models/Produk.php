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
        'gambarproduk',
        'gambarproduk1',
        'gambarproduk2',
        'gambarproduk3',
        'harga',
        'stok',
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }

    public function merek()
    {
        return $this->belongsTo(Merek::class);
    }
}

