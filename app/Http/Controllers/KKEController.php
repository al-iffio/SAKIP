<?php

namespace App\Http\Controllers;

use App\Models\Kke;
use App\Models\TujuanIku;
use App\Models\UnitKerja;
use App\Models\KriteriaKke;
use App\Models\ikuUnitKerja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KKEController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('kke.index', [
            'title' => 'Pengaturan KKE',
            'kkes' => Kke::orderBy('kodeKKE')->get()
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
            'kodeKKE' => 'required|alpha:ascii|size:1|uppercase|unique:kkes',
            'namaKKE' => 'required|unique:kkes'
        ]);

        Kke::create($validatedData);

        return redirect('/kke')->with('success', 'KKE baru berhasil dibuat');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Kke $kke)
    {
        if(auth()->user()->role=="Koordinator"){
            return view('kke.show', [
                'kke' => $kke,
                'title' => 'Lihat KKE',
                'kriteriaKKEs' => KriteriaKke::where('kke_id', $kke->id)->get()
            ]);
        } else {
            $unitKerja = UnitKerja::find($request->IDunitKerja);
            $ikuUnitKerja = ikuUnitKerja::where('id', $unitKerja->ikuUnitKerja_id)->get();
            $ikuUnitKerja = $ikuUnitKerja[0];
            return view('kke.show', [
                'kke' => $kke,
                'IDunitKerja' => $request->IDunitKerja,
                'title' => 'Evaluasi KKE',
                'kriteriaKKEs' => KriteriaKke::where('kke_id', $kke->id)->get(),
                'unitKerja' => UnitKerja::find($request->IDunitKerja),
                'tujuanIKUs' => TujuanIku::where('ikuUnitKerja_id', $ikuUnitKerja->id)->get()
            ]);
        }        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Kke $kke)
    {
        if(auth()->user()->role=="Koordinator"){
            $title = "Ubah KE";
        } else {
            $title = "Evaluasi KKE";
        }

        return view('kke.edit', [
            'kke' => $kke,
            'unitKerja' => $request->unitKerja,
            'IDunitKerja' => $request->IDunitKerja,
            'title' => $title,
            'kriteriaKKEs' => KriteriaKke::where('kke_id', $kke->id)->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kke $kke)
    {
        $rules = [];

        if($request->kodeKKE != $kke->kodeKKE) {
            $rules['kodeKKE'] = 'required|alpha:ascii|size:1|uppercase|unique:kkes';
        }

        if($request->namaKKE != $kke->namaKKE) {
            $rules['namaKKE'] = 'required|unique:kkes';
        }

        $validatedData = $request->validate($rules);

        KKE::where('id', $kke->id)
            ->update($validatedData);

        return redirect('/kke')->with('success', 'KKE berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kke $kke)
    {
        Kke::destroy($kke->id);
        return redirect('/kke')->with('success', 'KKE berhasil dihapus');
    }
}
