<?php

namespace App\Http\Controllers;

use App\Models\UnitKerja;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KomponenLke;

class PanelisasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        return view('dashboard.seluruhNilaiPanelisasi.panelisasi', [
            'title' => 'Nilai Panelisasi',
            'provinsi' => $panelisasi,
            'unitKerjas' => UnitKerja::where('kodeWilayah', $panelisasi->kodeWilayah)->get(),
            'komponenLKEs' => KomponenLke::all()
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
