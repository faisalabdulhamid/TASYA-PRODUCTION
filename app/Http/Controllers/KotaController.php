<?php

namespace App\Http\Controllers;

use App\Entities\Kota;
use Illuminate\Http\Request;

class KotaController extends Controller
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
            $kotum = Kota::paginate(10);

            return response()->json($kotum);
        }
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
            'kota' => 'required|unique:kota',
            'provinsi' => 'required',
        ]);

        $kotum = new Kota();
        $kotum->kota = $request->kota;
        $kotum->provinsi_id = $request->provinsi;
        $kotum->save();

        return response()->json([
            'message' => 'Data Berhasil Ditambahkan'
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Entities\Kota  $kotum
     * @return \Illuminate\Http\Response
     */
    public function show(Kota $kotum)
    {
        return response()->json($kotum);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Entities\Kota  $kotum
     * @return \Illuminate\Http\Response
     */
    public function edit(Kota $kotum)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Entities\Kota  $kotum
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kota $kotum)
    {
        $this->validate($request, [
            'kota' => 'required',
            'provinsi' => 'required',
        ]);

        $kotum->kota = $request->kota;
        $kotum->provinsi_id = $request->provinsi;
        $kotum->save();

        return response()->json([
            'message' => 'Data Berhasil Diubah'
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Entities\Kota  $kotum
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kota $kotum)
    {
        $kotum->delete();
        
        return response()->json([
            'message' => 'Data Berhasil Dihapus'
        ], 201);
    }
}
