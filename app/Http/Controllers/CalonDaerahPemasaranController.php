<?php

namespace App\Http\Controllers;

use App\Entities\CalonDaerahPemasaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CalonDaerahPemasaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->wantsJson()) {
            $calon = CalonDaerahPemasaran::with(['kriterias' => function($q){
                $q->select('id', 'nilai');
            }])->has('kota.provinsi')->whereHas('kota.provinsi', function($query) {
                if (!is_null(request()->provinsi)) {
                    $query->where('id', request()->provinsi);
                }
            })->paginate(10);

            return response()->json($calon);
        }
        $title = 'Calon Daerah Pemasaran';
        $script = asset('js/calon-daerah-pemasaran.js');

        return view('index', compact('title', 'script'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function check($id)
    {
        $calon = CalonDaerahPemasaran::find($id);
        $calon->status = 1;
        $calon->save();

        return response()->json([
            'message' => 'Data Berhasil Dicheck'
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
        $this->validate($request, [
            'kota' => 'required|unique:calon_daerah_pemasaran,kota_id',
            '*.*.nilai' => 'required|numeric'
        ]);

        DB::transaction(function()use($request){
            $calon = new CalonDaerahPemasaran();    
            $calon->kota_id = $request->kota;
            $calon->save();
            foreach ($request->kriteria as $key => $value) {
                $calon->kriterias()->attach($value['id'],['nilai' => $value['nilai']]);    
            }
        });

        return response()->json([
            'message' => 'Data Berhasil Ditambahkan'
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $calon = CalonDaerahPemasaran::with(['kriterias' => function($q){
            $q->select('id', 'kriteria', 'nilai');
        }])->get()->find($id);
        return response()->json($calon);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $calon = CalonDaerahPemasaran::find($id);
        $calon->status = 0;
        $calon->save();

        return response()->json([
            'message' => 'Data Berhasil Diuncheck'
        ], 201);
    }
}
