<?php

namespace App\Http\Controllers;

use App\Models\DokumenTl;
use App\Http\Controllers\Controller;
use App\Models\KriteriaTl;
use Illuminate\Http\Request;

class TindakLanjutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('tindakLanjut.index', [
            'title' => 'Tindak Lanjut',
            'dokumenTLs' => DokumenTl::filter()->get()
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
    public function show(DokumenTl $tindakLanjut)
    {
        return view('tindakLanjut.show',[
            'title' => 'Tindak Lanjut',
            'dokumenTL' => $tindakLanjut,
            'kriteriaTLs' => KriteriaTl::where('dokumenTL_id', $tindakLanjut->id)->get()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DokumenTl $tindakLanjut)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DokumenTl $tindakLanjut)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DokumenTl $tindakLanjut)
    {
        //
    }
}
