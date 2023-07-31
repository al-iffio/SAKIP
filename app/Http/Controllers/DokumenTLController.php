<?php

namespace App\Http\Controllers;

use App\Models\DokumenTl;
use App\Http\Controllers\Controller;
use App\Models\KriteriaTl;
use Illuminate\Http\Request;

class DokumenTLController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dokumenTL.index', [
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
        $validatedData = $request->validate([
            'dokumenTL' => 'required|unique:dokumen_tls'
        ]);

        DokumenTl::create($validatedData);

        return redirect('/dokumenTL')->with('success', 'Dokumen Tindak Lanjut baru berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(DokumenTl $dokumenTL)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DokumenTl $dokumenTL)
    {
        return view('dokumenTL.edit', [
            'dokumenTL' => $dokumenTL,
            'title' => 'Ubah Dokumen TL',
            'kriteriaTLs' => KriteriaTl::where('dokumenTL_id', $dokumenTL->id)
            ->orderBy(
                function($q) {
                    return $q->from('kriteria_lkes')
                        ->whereRaw('`kriteria_lkes`.id = `kriteria_tls`.kriteriaLKE_id' )
                        ->select('kodeKriteriaLKE');
                }
            )->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DokumenTl $dokumenTL)
    {
        $rules = [];

        if($request->dokumenTL != $dokumenTL->dokumenTL) {
            $rules['dokumenTL'] = 'required|unique:dokumen_tls';
        }

        $validatedData = $request->validate($rules);

        DokumenTl::where('id', $dokumenTL->id)
            ->update($validatedData);

        return redirect('/dokumenTL')->with('success', 'Dokumen Tindak Lanjut berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DokumenTl $dokumenTL)
    {
        DokumenTl::destroy($dokumenTL->id);
        return redirect('/dokumenTL')->with('success', 'Dokumen Tindak Lanjut berhasil dihapus');
    }
}
