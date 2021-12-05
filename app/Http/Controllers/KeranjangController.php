<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Commodity;
use App\Carousel;

class KeranjangController extends Controller
{
    public function index()
    {
        $data['carousels'] = Carousel::all();

        return view('pages.keranjang', $data);
    }
}
