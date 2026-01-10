<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Transaksi;
use App\Models\Produk;

class Detail_Transaksi extends Model
{
    protected $table = 'detail_transaksi';
    protected $primaryKey = 'id_detail';
    public $timestamps = false;

    protected $fillable = [
        'id_detail',
        'id_transaksi',
        'id_produk',
        'nama_produk',
        'jumlah',
        'total_harga',
    ];

    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class, 'id_transaksi');
    }

    public function produk()
    {
        return $this->belongsTo(Produk::class, 'id_produk');
    }
}
