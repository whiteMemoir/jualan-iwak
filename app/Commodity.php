<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commodity extends Model
{
    protected $fillable = [
        'nama',
        'slug',
        'gambar'
    ];

    public function items()
    {
        return $this->hasMany(Item::class);
    }
}
