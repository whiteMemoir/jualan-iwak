<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;
use App\Tentang;
use Illuminate\Support\Facades\DB;

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
        $data = Tentang::all();
        $items = Item::all();
        // $hargaAkhir = DB::table('items')
        //     ->selectRaw('harga', 'diskon', 'harga - (harga*diskon/100)')
        //     ->get();

        return view('pages.home', compact('data', 'items'));
    }
}
