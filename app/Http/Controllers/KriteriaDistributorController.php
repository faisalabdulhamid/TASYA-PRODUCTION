<?php

namespace App\Http\Controllers;

use App\Entities\KriteriaDistributor as Kriteria;
use Illuminate\Http\Request;

class KriteriaDistributorController extends Controller
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
            $kriterium = Kriteria::paginate(10); 

            return response()->json($kriterium);
        }
        $title = 'Kriteria Distibutor';
        $script = asset('js/kriteria-distibutor.js');

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
            'kriteria' => 'required',
            'bobot' => 'required',
            'benefit' => 'required',
        ]);

        $kriterium = new Kriteria();
        $kriterium->kriteria = $request->kriteria;
        $kriterium->bobot = $request->bobot;
        $kriterium->benefit = $request->benefit;
        $kriterium->save();

        return response()->json([
            'message' => 'Data Berhasil Ditambahkan'
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Entities\Kriteria  $kriterium
     * @return \Illuminate\Http\Response
     */
    public function show($kriterium)
    {
        $kriteria = Kriteria::find($kriterium);
        return response()->json($kriteria);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Entities\Kriteria  $kriterium
     * @return \Illuminate\Http\Response
     */
    public function edit(Kriteria $kriterium)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Entities\Kriteria  $kriterium
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $kriterium)
    {
        $this->validate($request, [
            'kriteria' => 'required',
            'bobot' => 'required',
        ]);

        $kriteria = Kriteria::find($kriterium);
        $kriteria->kriteria = $request->kriteria;
        $kriteria->bobot = $request->bobot;
        $kriteria->benefit = $request->benefit;
        $kriteria->save();

        return response()->json([
            'message' => 'Data Berhasil Diubah'
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Entities\Kriteria  $kriterium
     * @return \Illuminate\Http\Response
     */
    public function destroy($kriterium)
    {
        $kriteria = Kriteria::find($kriterium);
        $kriteria->delete();

        return response()->json([
            'message' => 'Data Berhasil Dihapus'
        ], 201);

    }
}
