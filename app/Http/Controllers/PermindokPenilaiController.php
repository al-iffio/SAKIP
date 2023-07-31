<?php

namespace App\Http\Controllers;

use App\Models\Permindok;
use App\Models\UnitKerja;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PermindokPenilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('permindokPenilai.index', [
            'title' => 'Permintaan Dokumen',
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
    public function show(UnitKerja $permindokPenilai)
    {
        return view('permindokPenilai.show', [
            'title' => 'Permindok',
            'unitKerja' => $permindokPenilai,
            'permindoks' => Permindok::filter()->paginate(10)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UnitKerja $permindokPenilai)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UnitKerja $permindokPenilai)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UnitKerja $permindokPenilai)
    {
        //
    }
}
