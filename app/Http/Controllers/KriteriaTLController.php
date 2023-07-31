<?php

namespace App\Http\Controllers;

use App\Models\KriteriaTl;
use App\Http\Controllers\Controller;
use App\Models\KriteriaLke;
use Illuminate\Http\Request;

class KriteriaTLController extends Controller
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
    public function create(Request $request)
    {
        return view('dokumenTL.kriteriaTL.create',[
            'title' => 'Tambah Kriteria TL',
            'jumlahInputs' => $request->jumlahInput,
            'id' => $request->id,
            'kriteriaLKEs' => KriteriaLke::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dokumenTL_id = $request->dokumenTL_id;
        $kriteriaLKE_id = $request->kriteriaLKE_id;
        
        for($i=0;$i<count($kriteriaLKE_id);$i++) {
            
            $datasave = [
                'dokumenTL_id' => $dokumenTL_id[$i],
                'kriteriaLKE_id' => $kriteriaLKE_id[$i]
            ];
            KriteriaTl::create($datasave);
        }
        
        return redirect()->route('DokumenTL', ['id' => $request->dokumenTL_id[0]])->with('success', 'Kriteria Tindak Lanjut berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(KriteriaTl $kriteriaTL)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(KriteriaTl $kriteriaTL)
    {
        return view('dokumenTL.kriteriaTL.edit',[
            'title' => 'Ubah Kriteria TL',
            'kriteriaTL' => $kriteriaTL,
            'kriteriaLKEs' => KriteriaLke::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, KriteriaTl $kriteriaTL)
    {
        $rules = [];
        
        if($request->kriteriaLKE_id != $kriteriaTL->kriteriaLKE_id) {
            $rules['kriteriaLKE_id'] = 'required|unique:kriteria_tls';
        }

        $validatedData = $request->validate($rules);

        KriteriaTl::where('id', $kriteriaTL->id)
            ->update($validatedData);
        
        return redirect()->route('DokumenTL', ['id' => $request->dokumenTL_id])->with('success', 'Kriteria Tindak Lanjut berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, KriteriaTl $kriteriaTL)
    {
        KriteriaTl::destroy($kriteriaTL->id);
        return redirect()->route('DokumenTL', ['id' => $request->dokumenTL_id])->with('success', 'Kriteria Tindak Lanjut berhasil dihapus');
    }
}
