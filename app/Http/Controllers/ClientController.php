<?php

namespace App\Http\Controllers;

use App\Entities\Kategori;
use App\Entities\Produk;
use Illuminate\Http\Request;

class ClientController extends Controller
{

    public function index()
    {
        if (request()->wantsJson()) {
            $product = Produk::paginate(12);
            return response()->json($product);
        }
        return view('client');
    }

    public function ProductByKategori($kategori)
    {
        $product = Produk::whereHas('kategori', function($q)use($kategori){
            $q->where('url', $kategori);
        })->paginate(12);
        return response()->json($product);
    }

    public function getKategori()
    {
        return response()->json(Kategori::all());
    }

    public function ProductById($id)
    {
        $product = Produk::find($id);
        return response()->json($product);
    }
}
