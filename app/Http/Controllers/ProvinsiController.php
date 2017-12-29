<?php

namespace App\Http\Controllers;

use App\Entities\Provinsi;
use Illuminate\Http\Request;

class ProvinsiController extends Controller
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
            $provinsi = Provinsi::paginate(10);

            return response()->json($provinsi);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->validate($request, [
            'provinsi' => 'required|unique:provinsi',
        ]);

        $provinsi = new Provinsi();
        $provinsi->provinsi = $request->provinsi;
        $provinsi->save();

        return response()->json([
            'message' => 'Data Berhasil Ditambahkan'
        ], 201);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Entities\Provinsi  $provinsi
     * @return \Illuminate\Http\Response
     */
    public function show(Provinsi $provinsi)
    {
        return response()->json($provinsi);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Entities\Provinsi  $provinsi
     * @return \Illuminate\Http\Response
     */
    public function edit(Provinsi $provinsi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Entities\Provinsi  $provinsi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Provinsi $provinsi)
    {
        $this->validate($request, [
            'provinsi' => 'required',
        ]);

        $provinsi->provinsi = $request->provinsi;
        $provinsi->save();

        return response()->json([
            'message' => 'Data Berhasil Diubah'
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Entities\Provinsi  $provinsi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Provinsi $provinsi)
    {
        $provinsi->delete();
        
        return response()->json([
            'message' => 'Data Berhasil Dihapus'
        ], 201);
    }
}
