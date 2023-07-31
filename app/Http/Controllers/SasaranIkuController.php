<?php

namespace App\Http\Controllers;

use App\Models\SasaranIku;
use App\Models\TujuanIku;
use Illuminate\Http\Request;

class SasaranIkuController extends Controller
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
        return view('ikuUnitKerja.sasaranIku.create',[
            'title' => 'Tambah Sasaran IKU',
            'jumlahInputs' => $request->jumlahInput,
            'namaUnitKerja' => $request->namaUnitKerja,
            'idIKU' => $request->idIKU,
            'tujuanIKUs' => TujuanIku::where('ikuUnitKerja_id', $request->idIKU)->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $ikuUnitKerja_id = $request->ikuUnitKerja_id;
        $tujuanIku_id = $request->tujuanIku_id;
        $kodeSasaran = $request->kodeSasaran;
        $sasaran = $request->sasaran;
        
        for($i=0;$i<count($sasaran);$i++) {
            
            $datasave = [
                'ikuUnitKerja_id' => $ikuUnitKerja_id[$i],
                'tujuanIku_id' => $tujuanIku_id[$i],
                'kodeSasaran' => $kodeSasaran[$i],
                'sasaran' => $sasaran[$i]
            ];
            SasaranIku::create($datasave);;
        }
        
        return redirect()->route('ikuUnitKerja', ['namaUnitKerja' => $request->namaUnitKerja])->with('sasaranSuccess', 'Sasaran IKU berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(SasaranIku $sasaranIku)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, SasaranIku $sasaranIku)
    {
        return view('ikuUnitKerja.sasaranIku.edit',[
            'title' => 'Ubah Sasaran IKU',
            'namaUnitKerja' => $request->namaUnitKerja,
            'sasaranIKU' => $sasaranIku,
            'idIKU' => $request->idIKU,
            'tujuanIKUs' => TujuanIku::where('ikuUnitKerja_id', $request->idIKU)->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SasaranIku $sasaranIku)
    {
        $rules = [
            'kodeSasaran' => 'required|size:3',
            'tujuanIku_id' => 'required'
        ];

        if($request->sasaran != $sasaranIku->sasaran) {
            $rules['sasaran'] = 'required|unique:sasaran_ikus';
        }

        $validatedData = $request->validate($rules);

        SasaranIku::where('id', $sasaranIku->id)
            ->update($validatedData);

        return redirect()->route('ikuUnitKerja', ['namaUnitKerja' => $request->namaUnitKerja])->with('sasaranSuccess', 'Sasaran IKU berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, SasaranIku $sasaranIku)
    {
        SasaranIku::destroy($sasaranIku->id);
        return redirect()->route('ikuUnitKerja', ['namaUnitKerja' => $request->namaUnitKerja])->with('sasaranSuccess', 'Sasaran IKU berhasil dihapus');
    }
}
