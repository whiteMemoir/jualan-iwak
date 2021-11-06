<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = [
        'nama',
        'commodity_id',
        'slug',
        'gambar',
        'deskripsi',
        'diskon',
        'harga',
        'keterangan'
    ];

    public function commodity()
    {
        return $this->belongsTo(Commodity::class);
    }
}
