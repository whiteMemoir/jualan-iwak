<?php

namespace App\Http\Controllers\admin;

use App\Commodity;
use App\Item;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CommodityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $commodities = Commodity::get();
        return view('admin.commodities.index', compact('commodities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.commodities.create');
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
        // jika gambar diisi
        if($gambar) {
            $gambar->storeAs('public/commodities', $gambar->hashName());
            $gambar = $gambar->hashName();
        }

        // jika slug sudah ada
        $slug = Str::slug($request->nama);
        $slug_exists = Commodity::where('slug', $slug)->first();
        if($slug_exists){
            $slug = $slug.'-'.$slug_exists->id;
        }

        $commodity = Commodity::create([
            'gambar' => $gambar,
            'nama'  => $request->nama,
            'slug'  => $slug
        ]);

        if ($commodity) {
            return redirect()->route('commodity.index')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            return redirect()->route('commodity.index')->with(['error' => 'Data Gagal Disimpan!']);
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
    public function edit(Commodity $commodity)
    {
        return view('admin.commodities.edit', compact('commodity'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Commodity $commodity)
    {
        $old_image = null;
        $slug = Str::slug($request->nama, '-');
        $slug_exists = Commodity::where('slug', $slug)->where('id', '!=', $commodity->id)->first();
        if($slug_exists){
            $slug = $slug.'-'.$slug_exists->id;
        }

        if ($request->file('image') == '') {
            //UPDATE DATA TANPA IMAGE
            $commodity = Commodity::findOrFail($commodity->id);
            $commodity->update([
                'nama'  =>  $request->nama,
                'slug'  =>  $slug,
            ]);
        } else {
            $old_image = basename($commodity->gambar);
            //UPLOAD IMAGE BARU
            $gambar = $request->file('gambar');
            $gambar->storeAs('public/commodities', $gambar->hashName());

            //UPDATE DENGAN IMAGE BARU
            $commodity = Commodity::findOrFail($commodity->id);
            $commodity->update([
                'gambar' => $gambar->hashName(),
                'nama'   => $request->nama,
                'slug'   => $slug
            ]);
        }

        if ($commodity) {
            if($old_image != null){
                //HAPUS IMAGE LAMA KETIKA DATA BERHASIL DIUPDATE
                Storage::disk('local')->delete('public/commodities/' . $old_image);
            }
            return redirect()->route('commodity.index')->with(['success' => 'Data Berhasil Diupdate!']);
        } else {
            return redirect()->route('commodity.index')->with(['error' => 'Data Gagal Diupdate!']);
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
        $commodity = Commodity::findOrFail($id);

        Storage::disk('local')->delete('public/commodities/' . basename($commodity->gambar));
        $commodity->delete();

        $items = Item::where('commodity_id', $id)->get();
        if($items) {
            foreach ($items as $item) {
                $item->commodity_id = null;
                $item->save();
            }
        }

        if ($commodity) {
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
