<?php

namespace App\Http\Controllers;

use App\Models\KriteriaLke;
use Illuminate\Http\Request;
use App\Models\SubKomponenLke;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class SubKomponenLKEController extends Controller
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
        $validatedData = $request->validate([
            'kodeSubKomponen' => 'required|unique:sub_komponen_lkes',
            'namaSubKomponen' => 'required|unique:sub_komponen_lkes',
            'persentaseNilaiSub' => 'required|numeric|between:0,100',
            'bobotPerKriteria' => 'required',
            'komponenLke_id' => 'required',
        ]);

        SubKomponenLke::create($validatedData);

        return redirect()->route('KomponenLKE', ['kodeKomponen' => $request->kodeKomponen])->with('success', 'Sub Komponen LKE berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, SubKomponenLke $subKomponenLKE)
    {
        return view('komponenLKE.subKomponenLKE.show',[
            'title' => 'Lihat Sub Komponen LKE',
            'subKomponenLKE' => $subKomponenLKE,
            'unitKerja' => $request->unitKerja,
            'IDunitKerja' => $request->IDunitKerja,
            'kriteriaLKEs' => KriteriaLke::where('subKomponenLke_id', $subKomponenLKE->id)->get()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, SubKomponenLke $subKomponenLKE)
    {
        return view('komponenLKE.subKomponenLKE.edit',[
            'title' => 'Ubah Sub Komponen LKE',
            'kodeKomponen' => $request->kodeKomponen,
            'subKomponenLKE' => $subKomponenLKE,
            'kriteriaLKEs' => KriteriaLke::where('subKomponenLke_id', $subKomponenLKE->id)
            ->orderBy('kodeKriteriaLKE')
            ->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SubKomponenLke $subKomponenLKE)
    {
        $rules = [
            'persentaseNilaiSub' => 'required|numeric|between:0,100',
            'bobotPerKriteria' => 'required'
        ];

        if($request->kodeSubKomponen != $subKomponenLKE->kodeSubKomponen) {
            $rules['kodeSubKomponen'] = 'required|unique:sub_komponen_lkes';
        }

        if($request->namaSubKomponen != $subKomponenLKE->namaSubKomponen) {
            $rules['namaSubKomponen'] = 'required|unique:sub_komponen_lkes';
        }

        $validatedData = $request->validate($rules);

        SubKomponenLke::where('id', $subKomponenLKE->id)
            ->update($validatedData);

        if($request->bobotPerKriteria == 'Sama') {
            $jumlah = $subKomponenLKE->kriteriaLKE->count();
            if($jumlah == 0) {
                $jumlah = 1;
            }
            $bobot = $request->persentaseNilaiSub/$jumlah;
            KriteriaLke::where('subKomponenLke_id', $request->id)
            ->update(['bobotKriteria' => $bobot]);
        } 
        
        return redirect()->route('KomponenLKE', ['kodeKomponen' => $request->kodeKomponen])->with('success', 'Sub Komponen LKE berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, SubKomponenLke $subKomponenLKE)
    {
        SubKomponenLke::destroy($subKomponenLKE->id);
        return redirect()->route('KomponenLKE', ['kodeKomponen' => $request->kodeKomponen])->with('success', 'Sub Komponen LKE berhasil dihapus');
    }

    public function nilaiAngka(Request $request)
    {
        $nilai = $request->nilai;

        for ($i=0; $i<count($nilai); $i++) {
            if($nilai[$i] == "A") {
                $nilaiAngka[$i] = 1;
            } elseif($nilai[$i] == "B") {
                $nilaiAngka[$i] = 0.75;
            } elseif($nilai[$i] == "C") {
                $nilaiAngka[$i] = 0.5;
            } elseif($nilai[$i] == "D") {
                $nilaiAngka[$i] = 0.25;
            } elseif($nilai[$i] == "E") {
                $nilaiAngka[$i] = 0;
            }
        }
        return response()->json($nilaiAngka[]);
    }

    public function hasilShow(Request $request)
    {
        return dd($request);
    }
}
