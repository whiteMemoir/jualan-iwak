<?php

namespace App\Http\Controllers\admin;

use App\Commodity;
use App\Http\Controllers\Controller;
use App\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::with('commodity')->get();
        return view('admin.items.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $commodities = Commodity::latest()->get();
        return view('admin.items.create', compact('commodities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $gambar = $request->file('gambar');
        $gambar->storeAs('public/items', $gambar->hashName());

        $item = Item::create([
            'gambar'        => $gambar->hashName(),
            'nama'          => $request->nama,
            'slug'          => Str::slug($request->name, '-'),
            'commodity_id'  => $request->commodity_id,
            'deskripsi'     => $request->deskripsi,
            'diskon'        => $request->diskon,
            'harga'         => $request->harga,
            'keterangan'    => $request->keterangan
        ]);

        if ($item) {
            return redirect()->route('item.index')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            return redirect()->route('item.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        $commodities = Commodity::latest()->get();
        return view('admin.items.edit', compact('item', 'commodities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        if ($request->file('image') == '') {
            //UPDATE DATA TANPA IMAGE
            $item = Item::findOrFail($item->id);
            $item->update([
                'nama'          =>  $request->nama,
                'slug'          =>  Str::slug($request->nama, '-'),
                'commodity_id'  => $request->commodity_id,
                'deskripsi'     => $request->deskripsi,
                'diskon'        => $request->diskon,
                'harga'         => $request->harga,
                'keterangan'    => $request->keterangan
            ]);
        } else {
            //HAPUS IMAGE LAMA
            Storage::disk('local')->delete('public/items/' . basename($item->gambar));

            //UPLOAD IMAGE BARU
            $gambar = $request->file('gambar');
            $gambar->storeAs('public/items', $gambar->hashName());

            //UPDATE DENGAN IMAGE BARU
            $item = Item::findOrFail($item->id);
            $item->update([
                'gambar'        => $gambar->hashName(),
                'nama'          => $request->nama,
                'slug'          => Str::slug($request->nama, '-'),
                'commodity_id'  => $request->commodity_id,
                'deskripsi'     => $request->deskripsi,
                'diskon'        => $request->diskon,
                'harga'         => $request->harga,
                'keterangan'    => $request->keterangan
            ]);
        }

        if ($item) {
            return redirect()->route('item.index')->with(['success' => 'Data Berhasil Diupdate!']);
        } else {
            return redirect()->route('item.index')->with(['error' => 'Data Gagal Diupdate!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Item::findOrFail($id);
        Storage::disk('local')->delete('public/items/' . basename($item->gambar));
        $item->delete();

        if ($item) {
            return response()->json([
                'status' => 'success'
            ]);
        } else {
            return response()->json([
                'status' => 'error'
            ]);
        }
    }
}
