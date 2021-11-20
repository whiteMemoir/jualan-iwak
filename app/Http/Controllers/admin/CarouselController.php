<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Carousel;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
class CarouselController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['carousels'] = Carousel::all();

        return view('admin.carousel.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.carousel.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $gambar = null;
        if($request->file('gambar')) {
            $gambar = $request->file('gambar');
            $gambar->storeAs('public/carousels', $gambar->hashName());
            $gambar = $gambar->hashName();
        }

        // cek slug
        $slug = Str::slug($request->nama);
        $slug_exists = Carousel::where('slug', $slug)->first();
        if($slug_exists){
            $slug = $slug.'-'.$slug_exists->id;
        }

        $carousel = Carousel::create([
            'gambar'        => $gambar,
            'nama'          => $request->nama,
            'slug'          => $slug,
            'keterangan'    => $request->keterangan,
            'link'          => $request->link,
        ]);


        if ($carousel) {
            return redirect()->route('carousel.index')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            return redirect()->route('carousel.index')->with(['error' => 'Data Gagal Disimpan!']);
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
    public function edit($id)
    {
        $data['carousel'] = Carousel::findOrFail($id);

        return view('admin.carousel.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $gambar = null;

        // kalau ada gambar lama
        if($request->gambar_lama != '') {
            $gambar = $request->gambar_lama;
        }

        // kalau ada gambar diupload
        if ($request->file('image')) {
            Storage::disk('local')->delete('public/carousels/' . basename($carousel->gambar));

            $gambar = $request->file('gambar');
            $gambar->storeAs('public/carousels', $gambar->hashName());
            $gambar = $gambar->hashName();
        }

        // cek slug
        $slug = Str::slug($request->nama);
        $slug_exists = Carousel::where('slug', $slug)->first();
        if($slug_exists){
            $slug = $slug.'-'.$slug_exists->id;
        }

        $carousel = carousel::findOrFail($id);
        $carousel->update([
            'gambar'        => $gambar,
            'nama'          => $request->nama,
            'slug'          => $slug,
            'keterangan'    => $request->keterangan,
            'link'          => $request->link
        ]);

        if ($carousel) {
            return redirect()->route('carousel.index')->with(['success' => 'Data Berhasil Diupdate!']);
        } else {
            return redirect()->route('carousel.index')->with(['error' => 'Data Gagal Diupdate!']);
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
        $carousel = Carousel::findOrFail($id);
        $carousel->delete();

        if ($carousel) {
            Storage::disk('local')->delete('public/carousels/' . basename($carousel->gambar));
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
