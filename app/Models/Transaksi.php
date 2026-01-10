<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksi';
    protected $primaryKey = 'id_transaksi';
    public $timestamps = false;

    protected $fillable = [
        'id_transaksi',
        'tanggal',
        'id',
        'id_metode',
    ];

    public function detail()
    {
        return $this->hasMany(Detail_Transaksi::class, 'id_transaksi');
    }
}
