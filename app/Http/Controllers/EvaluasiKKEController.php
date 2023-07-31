<?php

namespace App\Http\Controllers;

use App\Models\Kke;
use App\Models\UnitKerja;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EvaluasiKKEController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('evaluasiKKE.index', [
            'title' => 'Evaluasi KKE',
            'unitKerjas' => UnitKerja::orderBy('kodeUnitKerja')->filter()->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(UnitKerja $evaluasiKKE)
    {
        return view('evaluasiKKE.show', [
            'title' => 'Evaluasi KKE',
            'unitKerja' => $evaluasiKKE,
            'kkes' => Kke::all()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UnitKerja $evaluasiKKE)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UnitKerja $evaluasiKKE)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UnitKerja $evaluasiKKE)
    {
        //
    }
}
