<?php

namespace App\Http\Controllers;

use App\Item;
use App\Tentang;
use Illuminate\Http\Request;
use App\Commodity;
use App\Item;

class ItemController extends Controller
{
    public function index($slug = '')
    {
        // slug disini adalah slug komoditas
        $commodity = Commodity::where('slug', $slug)->first();
        if($slug != '') {
            $data['items'] = Item::where('commodity_id', $commodity->id)->get();
        } else {
            $data['items'] = Item::limit(6)->get();
        }

        $data['slug'] = $slug;
        $data['commodities'] = Commodity::get();

        return view('pages.item', $data);
    }

    public function getItems($slug_komoditas)
    {
        $commodity = Commodity::where('slug', $slug_komoditas)->first();
        $items = [];
        if($commodity) {
            $items = Item::where('commodity_id', $commodity->id)->get();
        }

        return response()->json($items);
    }
}
