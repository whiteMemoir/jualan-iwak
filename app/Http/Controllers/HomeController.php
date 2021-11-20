<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\Tentang;
use App\Commodity;
use App\Carousel;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $tentang = Tentang::all();
        $commodities = Commodity::get();
        $items = Item::limit(6)->get();
        $carousels = Carousel::all();

        return view('pages.home', compact('tentang', 'items', 'commodities', 'carousels'));
    }
}
