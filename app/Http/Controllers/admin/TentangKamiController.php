<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Tentang;

class TentangKamiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tentang = Tentang::all();

        return view('admin.tentang_kami.index', compact('tentang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tentang_kami.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tentang = Tentang::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi
        ]);

        if ($tentang) {
            return redirect()->route('tentang-kami.index')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            return redirect()->route('tentang-kami.index')->with(['error' => 'Data Gagal Disimpan!']);
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
        $tentang = Tentang::findOrFail($id);

        return view('admin.tentang_kami.edit', compact('tentang'));
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
        $tentang = Tentang::findOrFail($id);
        $tentang->update([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi
        ]);

        if ($tentang) {
            return redirect()->route('tentang-kami.index')->with(['success' => 'Data Berhasil Diupdate!']);
        } else {
            return redirect()->route('tentang-kami.index')->with(['error' => 'Data Gagal Diupdate!']);
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
        $item = Tentang::findOrFail($id);
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
