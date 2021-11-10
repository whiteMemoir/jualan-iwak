<?php

namespace App\Http\Controllers;

use App\Item;
use App\Tentang;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        $data = Tentang::all();
        $items = Item::orderBy('harga')->paginate(5);
        return view('pages.item', compact('data', 'items'));
    }
}
