<?php

namespace App\Http\Controllers;

use App\Models\IndikatorIku;
use App\Models\SasaranIku;
use Illuminate\Http\Request;

class IndikatorIkuController extends Controller
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
        return view('ikuUnitKerja.indikatorIku.create',[
            'title' => 'Tambah Indikator IKU',
            'jumlahInputs' => $request->jumlahInput,
            'namaUnitKerja' => $request->namaUnitKerja,
            'idIKU' => $request->idIKU,
            'sasaranIKUs' => SasaranIku::where('ikuUnitKerja_id', $request->idIKU)->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $ikuUnitKerja_id = $request->ikuUnitKerja_id;
        $sasaranIku_id = $request->sasaranIku_id;
        $kodeIndikator = $request->kodeIndikator;
        $indikator = $request->indikator;
        
        for($i=0;$i<count($indikator);$i++) {
            
            $datasave = [
                'ikuUnitKerja_id' => $ikuUnitKerja_id[$i],
                'sasaranIku_id' => $sasaranIku_id[$i],
                'kodeIndikator' => $kodeIndikator[$i],
                'indikator' => $indikator[$i]
            ];
            IndikatorIku::create($datasave);
        }
        
        return redirect()->route('ikuUnitKerja', ['namaUnitKerja' => $request->namaUnitKerja])->with('indikatorSuccess', 'Indikator IKU berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(IndikatorIku $indikatorIku)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, IndikatorIku $indikatorIku)
    {
        return view('ikuUnitKerja.indikatorIku.edit',[
            'title' => 'Ubah Indikator IKU',
            'namaUnitKerja' => $request->namaUnitKerja,
            'indikatorIKU' => $indikatorIku,
            'idIKU' => $request->idIKU,
            'sasaranIKUs' => SasaranIku::where('ikuUnitKerja_id', $request->idIKU)->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, IndikatorIku $indikatorIku)
    {
        $rules = [
            'kodeIndikator' => 'required|size:4',
            'sasaranIku_id' => 'required'
        ];

        if($request->indikator != $indikatorIku->indikator) {
            $rules['indikator'] = 'required|unique:indikator_ikus';
        }

        $validatedData = $request->validate($rules);

        IndikatorIku::where('id', $indikatorIku->id)
            ->update($validatedData);

        return redirect()->route('ikuUnitKerja', ['namaUnitKerja' => $request->namaUnitKerja])->with('indikatorSuccess', 'Indikator IKU berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, IndikatorIku $indikatorIku)
    {
        IndikatorIku::destroy($indikatorIku->id);
        return redirect()->route('ikuUnitKerja', ['namaUnitKerja' => $request->namaUnitKerja])->with('indikatorSuccess', 'Indikator IKU berhasil dihapus');
    }
}
