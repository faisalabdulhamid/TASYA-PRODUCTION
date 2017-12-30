<?php

namespace App\Http\Controllers;

use App\Entities\CalonDistributor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CalonDistributorController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->wantsJson()) {
            $calon = CalonDistributor::with(['kriterias' => function($q){
                $q->select('id', 'nilai');
            }])->has('pelanggan.kota.provinsi')
            ->whereHas('pelanggan.kota', function($query) {
                if (!is_null(request()->provinsi)) {
                    $query->where('provinsi_id', request()->provinsi);
                }
            })->paginate(10);

            return response()->json($calon);
        }
        $title = 'Calon Distributor';
        $script = asset('js/calon-distributor.js');

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
            'pelanggan' => 'required|unique:calon_distributor,pelanggan_id',
            '*.*.nilai' => 'required|numeric'
        ]);

        DB::transaction(function()use($request){
            $calon = new CalonDistributor();    
            $calon->pelanggan_id = $request->pelanggan;
            $calon->save();
            foreach ($request->kriterias as $key => $value) {
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
        $dis = CalonDistributor::with(['kriterias' => function($q){
            $q->select('id', 'kriteria', 'nilai');
        }])->get()->find($id);
        return response()->json($dis);
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
        $calon = CalonDistributor::find($id);
        $calon->delete();

        return response()->json([
            'message' => 'Data Berhasil Dihapus'
        ], 201);
    }

    public function hitung()
    {
        $title = 'Perhitungan Distributor';
        $script = asset('js/hitung-distributor.js');

        return view('index', compact('title', 'script'));
    }
}
