<?php

namespace App\Http\Controllers;

use App\Entities\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->wantsJson()) {
            $produk = new  Produk;
            if (request()->cari) {
                $produk = $produk->where('kode', 'LIKE', '%'.request()->cari.'%')->orWhere('nama', 'LIKE', '%'.request()->cari.'%');
            }
            
            $produk = $produk->paginate(10);

            return response()->json($produk);
        }
        $title = 'Produk';
        $script = asset('js/produk.js');

        return view('index', compact('title', 'script'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'kode' => 'required|unique:produk',
            'harga' => 'required|numeric',
            'gambar' => 'required',
            'deskripsi' => 'required',
        ]);

        $produk = new Produk();
        $produk->nama = $request->nama;
        $produk->kode = $request->kode;
        $produk->harga = $request->harga;
        $produk->gambar = $request->gambar;
        $produk->deskripsi = $request->deskripsi;
        $produk->save();

        return response()->json([
            'message' => 'Data Berhasil Ditambahkan'
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Entities\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function show(Produk $produk)
    {
        return response()->json($produk);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Entities\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function edit(Produk $produk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Entities\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produk $produk)
    {
        $this->validate($request, [
            'nama' => 'required',
            'kode' => 'required',
            'harga' => 'required|numeric',
            'gambar' => 'required',
            'deskripsi' => 'required',
        ]);

        $produk->nama = $request->nama;
        $produk->kode = $request->kode;
        $produk->harga = $request->harga;
        $produk->gambar = $request->gambar;
        $produk->deskripsi = $request->deskripsi;
        $produk->save();

        return response()->json([
            'message' => 'Data Berhasil Diubah'
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Entities\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produk $produk)
    {
        $produk->delete();

        return response()->json([
            'message' => 'Data Berhasil Dihapus'
        ], 201);
    }
}
