<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ukuran extends Model
{
    protected $table = 'ukuran';
    protected $fillable = ['nama'];

    public function kategoris()
    {
        return $this->belongsToMany(Kategori::class, 'kategori_ukuran');
    }
}

