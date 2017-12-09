<?php

namespace App\Http\Controllers;

use App\Entities\Pesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PesananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->wantsJson()) {
            $pesanan = Pesanan::paginate(10); 

            return response()->json($pesanan);
        }
        $title = 'Pesanan';
        $script = asset('js/pesanan.js');

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
            'tanggal' => 'required',
            'total_bayar' => 'required',
            'produks' => 'required',
        ]);

        DB::transaction(function() use($request){
            $pesanan = new Pesanan();
            $pesanan->tanggal = $request->tanggal;
            $pesanan->total_bayar = $request->total_bayar;
            // $pesanan->produks = $request->produks;
            $pesanan->save();    
            foreach ($request->produks as $key => $value) {
                $pesanan->produks()->attach($value['produk_id'], ['jumlah' => $value['jumlah']]);
            }
        });
        

        return response()->json([
            'message' => 'Data Berhasil Ditambahkan'
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Entities\Pesanan  $pesanan
     * @return \Illuminate\Http\Response
     */
    public function show(Pesanan $pesanan)
    {
        return response()->json($pesanan);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Entities\Pesanan  $pesanan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pesanan $pesanan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Entities\Pesanan  $pesanan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pesanan $pesanan)
    {
        $this->validate($request, [
            'tanggal' => 'required',
            'total_bayar' => 'required',
            'produks' => 'required',
        ]);

        DB::transaction(function() use($request){
            $pesanan = new Pesanan();
            $pesanan->tanggal = $request->tanggal;
            $pesanan->total_bayar = $request->total_bayar;
            $pesanan->save();    

            $pesanan->produks()->sync($request->produks);
        });
        

        return response()->json([
            'message' => 'Data Berhasil Dihapus'
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Entities\Pesanan  $pesanan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pesanan $pesanan)
    {
        $pesanan->delete();
        
        return response()->json([
            'message' => 'Data Berhasil Diubah'
        ], 201);
    }
}
