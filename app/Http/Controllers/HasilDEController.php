<?php

namespace App\Http\Controllers;

use App\Models\DokumenTl;
use App\Models\UnitKerja;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HasilDEController extends Controller
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
    public function show(UnitKerja $hasilDE)
    {
        return view('dashboard.hasilDEdanMonevTL.hasilDE', [
            'title' => 'Hasil DE',
            'provinsi' => $hasilDE,
            'dokumenTLs' => DokumenTl::all(),
            'unitKerjas' => UnitKerja::where('kodeWilayah', $hasilDE->kodeWilayah)->get()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UnitKerja $hasilDE)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UnitKerja $hasilDE)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UnitKerja $hasilDE)
    {
        //
    }
}
