<?php

namespace App\Http\Controllers;

use App\Entities\Pesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PesananController extends Controller
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
    public function index(Request $request)
    {
        if ($request->awal || $request->akhir) {
            $hasil = DB::table('pelanggan')
                // ->select('pelanggan.*')
                ->select(DB::raw('pelanggan.id, pelanggan.nama, SUM(detail_pesanan.sub_total) as rata_rata'))
                ->join('pesanan', 'pesanan.pelanggan_id', '=', 'pelanggan.id')
                ->join('detail_pesanan', 'pesanan.id', '=', 'detail_pesanan.pesanan_id')
                ->whereBetween('pesanan.tanggal', [$request->awal, $request->akhir])
                ->groupBy('id')
                ->get();

            return $hasil;
        }
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
            'pelanggan' => 'required',
            'total_bayar' => 'required',
            '*.*.produk_id' => 'required',
            '*.*.jumlah' => 'required',
            '*.*.sub_total' => 'required',
        ]);

        DB::transaction(function() use($request){
            $pesanan = new Pesanan();
            $pesanan->pelanggan_id = $request->pelanggan;
            // $pesanan->total_bayar = $request->total_bayar;
            // $pesanan->produks = $request->produks;
            $pesanan->save();    
            foreach ($request->produks as $key => $value) {
                $pesanan->produks()->attach($value['produk_id'], ['jumlah' => $value['jumlah'], 'sub_total' => $value['sub_total']]);
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
    public function show($id)
    {
        $pesanan = Pesanan::with(['produks' => function($q){
            $q->select('kode', 'nama', 'harga', 'jumlah');
        }])->get()->find($id);
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
