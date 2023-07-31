<?php

namespace App\Http\Controllers;

use App\Models\TujuanIku;
use App\Models\KomponenLke;
use Illuminate\Http\Request;
use App\Models\SubKomponenLke;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class KomponenLKEController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('komponenLKE.index', [
            'title' => 'Pengaturan LKE',
            'komponenLKEs' => KomponenLke::orderBy('kodeKomponen')->get()
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
            'kodeKomponen' => 'required|alpha:ascii|size:1|uppercase|unique:komponen_lkes',
            'namaKomponen' => 'required|unique:komponen_lkes',
            'persentaseNilai' => 'required|numeric|between:0,100'
        ]);

        KomponenLke::create($validatedData);

        return redirect('/komponenLKE')->with('success', 'Komponen LKE baru berhasil dibuat');
    }

    /**
     * Display the specified resource.
     */
    public function show(KomponenLke $komponenLKE)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, KomponenLke $komponenLKE)
    {
        if(auth()->user()->role=="Koordinator"){
            $title = "Ubah Komponen LKE";
        } else {
            $title = "Evaluasi LKE";
        }

        return view('komponenLKE.edit', [
            'komponenLKE' => $komponenLKE,
            'title' => $title,
            'unitKerja' => $request->unitKerja,
            'IDunitKerja' => $request->IDunitKerja,
            'subKomponenLKEs' => SubKomponenLke::where('komponenLKE_id', $komponenLKE->id)
            ->orderBy('kodeSubKomponen')
                ->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, KomponenLke $komponenLKE)
    {
        $rules = [
            'persentaseNilai' => 'required|numeric|between:0,100'
        ];

        if($request->kodeKomponen != $komponenLKE->kodeKomponen) {
            $rules['kodeKomponen'] = 'required|alpha:ascii|size:1|uppercase|unique:komponen_lkes';
        }

        if($request->namaKomponen != $komponenLKE->namaKomponen) {
            $rules['namaKomponen'] = 'required|unique:komponen_lkes';
        }

        $validatedData = $request->validate($rules);

        KomponenLke::where('id', $komponenLKE->id)
            ->update($validatedData);

        return redirect('/komponenLKE')->with('success', 'Komponen LKE berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(KomponenLke $komponenLKE)
    {
        KomponenLke::destroy($komponenLKE->id);
        return redirect('/komponenLKE')->with('success', 'Komponen LKE berhasil dihapus');
    }
}
