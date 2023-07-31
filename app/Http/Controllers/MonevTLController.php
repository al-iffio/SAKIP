<?php

namespace App\Http\Controllers;

use App\Models\DokumenTl;
use App\Models\UnitKerja;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MonevTLController extends Controller
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
    public function show(UnitKerja $monevTL)
    {
        return view('dashboard.hasilDEdanMonevTL.monevTL', [
            'title' => 'Monev TL',
            'provinsi' => $monevTL,
            'dokumenTLs' => DokumenTl::all(),
            'unitKerjas' => UnitKerja::where('kodeWilayah', $monevTL->kodeWilayah)->get()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UnitKerja $monevTL)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UnitKerja $monevTL)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UnitKerja $monevTL)
    {
        //
    }
}
