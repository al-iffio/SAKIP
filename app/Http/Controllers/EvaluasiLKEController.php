<?php

namespace App\Http\Controllers;

use App\Models\UnitKerja;
use App\Http\Controllers\Controller;
use App\Models\KomponenLke;
use Illuminate\Http\Request;

class EvaluasiLKEController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('evaluasiLKE.index', [
            'title' => 'Evaluasi LKE',
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
    public function show(UnitKerja $evaluasiLKE)
    {
        return view('evaluasiLKE.show', [
            'title' => 'Evaluasi LKE',
            'unitKerja' => $evaluasiLKE,
            'komponenLKEs' => KomponenLke::orderBy('kodeKomponen')->get()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UnitKerja $evaluasiLKE)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UnitKerja $evaluasiLKE)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UnitKerja $evaluasiLKE)
    {
        //
    }
}
