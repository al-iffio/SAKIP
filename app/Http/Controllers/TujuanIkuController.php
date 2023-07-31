<?php

namespace App\Http\Controllers;

use App\Models\TujuanIku;
use Illuminate\Http\Request;

class TujuanIkuController extends Controller
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
        return view('ikuUnitKerja.tujuanIku.create',[
            'title' => 'Tambah Tujuan IKU',
            'jumlahInputs' => $request->jumlahInput,
            'namaUnitKerja' => $request->namaUnitKerja,
            'idIKU' => $request->idIKU
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $ikuUnitKerja_id = $request->ikuUnitKerja_id;
        $kodeTujuan = $request->kodeTujuan;
        $tujuan = $request->tujuan;
        
        for($i=0;$i<count($tujuan);$i++) {
            
            $datasave = [
                'ikuUnitKerja_id' => $ikuUnitKerja_id[$i],
                'kodeTujuan' => $kodeTujuan[$i],
                'tujuan' => $tujuan[$i]
            ];
            TujuanIku::create($datasave);
        }
        
        return redirect()->route('ikuUnitKerja', ['namaUnitKerja' => $request->namaUnitKerja])->with('tujuanSuccess', 'Tujuan IKU berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(TujuanIku $tujuanIku)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, TujuanIku $tujuanIku)
    {
        return view('ikuUnitKerja.tujuanIku.edit',[
            'title' => 'Ubah Tujuan IKU',
            'namaUnitKerja' => $request->namaUnitKerja,
            'tujuanIKU' => $tujuanIku
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TujuanIku $tujuanIku)
    {
        $rules = ['kodeTujuan' => 'required|size:2'];

        if($request->tujuan != $tujuanIku->tujuan) {
            $rules['tujuan'] = 'required|unique:tujuan_ikus';
        }

        $validatedData = $request->validate($rules);

        TujuanIku::where('id', $tujuanIku->id)
            ->update($validatedData);

        return redirect()->route('ikuUnitKerja', ['namaUnitKerja' => $request->namaUnitKerja])->with('tujuanSuccess', 'Tujuan IKU berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, TujuanIku $tujuanIku)
    {
        TujuanIku::destroy($tujuanIku->id);
        return redirect()->route('ikuUnitKerja', ['namaUnitKerja' => $request->namaUnitKerja])->with('tujuanSuccess', 'Tujuan IKU berhasil dihapus');
    }
}
