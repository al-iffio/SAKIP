<?php

namespace App\Http\Controllers;

use App\Models\TujuanIku;
use App\Models\SasaranIku;
use App\Models\ikuUnitKerja;
use App\Models\IndikatorIku;
use Illuminate\Http\Request;

class ikuUnitKerjaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('ikuUnitKerja.index', [
            'title' => 'Pengaturan IKU',
            'ikuUnitKerjas' => ikuUnitKerja::sortable()->filter()->paginate(10)
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
    public function show(ikuUnitKerja $ikuUnitKerja)
    {
        return view('ikuUnitKerja.show', [
            'title' => 'Pengaturan IKU',
            'ikuUnitKerja' => $ikuUnitKerja,
            'tujuanIKUs' => TujuanIku::where('ikuUnitKerja_id', $ikuUnitKerja->id)->get(),
            'sasaranIKUs' => SasaranIku::where('ikuUnitKerja_id', $ikuUnitKerja->id)->get(),
            'indikatorIKUs' => IndikatorIku::where('ikuUnitKerja_id', $ikuUnitKerja->id)->get(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ikuUnitKerja $ikuUnitKerja)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ikuUnitKerja $ikuUnitKerja)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ikuUnitKerja $ikuUnitKerja)
    {
        //
    }
}
