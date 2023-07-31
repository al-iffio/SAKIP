<?php

namespace App\Http\Controllers;

use App\Models\UnitKerja;
use App\Models\KomponenLke;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EvaluasiPanelisasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('evaluasiPanelisasi.index', [
            'title' => 'Panelisasi',
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
    public function show(UnitKerja $panelisasi)
    {
        return view('evaluasiPanelisasi.show', [
            'title' => 'Evaluasi LKE TL',
            'unitKerja' => $panelisasi,
            'komponenLKEs' => KomponenLke::orderBy('kodeKomponen')->get()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UnitKerja $panelisasi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UnitKerja $panelisasi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UnitKerja $panelisasi)
    {
        //
    }
}
