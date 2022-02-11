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
        'gambar_modal',
        'deskripsi',
        'diskon',
        'harga',
        'keterangan',
        'satuan'
    ];

    public function commodity()
    {
        return $this->belongsTo(Commodity::class);
    }
}
