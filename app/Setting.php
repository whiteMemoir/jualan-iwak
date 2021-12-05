<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'tentang',
        'nomor_wa',
        'alamat'
    ];

    // untuk sementara no wa dari sini kawkawkawkawk
    // nanti diperbaikin kalo ingat akwawkkawkaw
    public static function no_wa()
    {
        return '6285333372786';
    }
}
