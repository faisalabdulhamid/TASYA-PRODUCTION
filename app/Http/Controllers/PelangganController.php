<?php

namespace App\Http\Controllers;

use App\Entities\Distributor;
use App\Entities\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
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
            $pelanggan = new Pelanggan;
            if (request()->cari) {
                $pelanggan = $pelanggan->where('nama', 'LIKE', '%'.request()->cari.'%');
            }
            $pelanggan = $pelanggan->paginate(10); 

            return response()->json($pelanggan);
        }
        $title = 'Pelanggan';
        $script = asset('js/pelanggan.js');

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
            'no_telepon' => 'required|unique:pelanggan',
            'alamat' => 'required',
            'kota' => 'required',
            'provinsi' => 'required',
        ]);

        $pelanggan = new Pelanggan();
        $pelanggan->nama = $request->nama;
        $pelanggan->no_telepon = $request->no_telepon;
        $pelanggan->alamat = $request->alamat;
        $pelanggan->provinsi_id = $request->provinsi;
        $pelanggan->kota_id = $request->kota;
        $pelanggan->save();

        return response()->json([
            'message' => 'Data Berhasil Ditambahkan'
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Entities\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Pelanggan::with('pesanan.produks')->get()->find($id);
        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Entities\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pelanggan $pelanggan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Entities\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama' => 'required',
            'no_telepon' => 'required',
            'alamat' => 'required',
            'kota' => 'required',
            'provinsi' => 'required',
        ]);
        $pelanggan = Pelanggan::find($id);

        $pelanggan->nama = $request->nama;
        $pelanggan->no_telepon = $request->no_telepon;
        $pelanggan->alamat = $request->alamat;
        $pelanggan->provinsi_id = $request->provinsi;
        $pelanggan->kota_id = $request->kota;
        $pelanggan->save();

        return response()->json([
            'message' => 'Data Berhasil Diubah'
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Entities\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pelanggan $pelanggan)
    {
        $pelanggan->delete();

        return response()->json([
            'message' => 'Data Berhasil Dihapus'
        ], 201);
    }

    public function distributor(Request $request)
    {
        $distributor = new Distributor();

        if ($request->wantsJson()) {
            $data = $distributor->with('pelanggan')->whereHas('pelanggan.kota', function($q) use($request){
                if (!is_null($request->kota)) {
                    $q->where('id', $request->kota);
                }
            })->paginate(10);

            return response()->json($data);
        }

        $title = 'Distributor';
        $script = asset('js/distributor.js');

        return view('index', compact('title', 'script'));
    }
}
