<?php

namespace App\Http\Controllers;

use App\Models\Pelatihan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PelatihanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('repository.pelatihan.index', [
            'title' => 'Repository',
            'pelatihans' => Pelatihan::filter()->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        return view('repository.pelatihan.create',[
            'title' => 'Tambah Pelatihan',
            'jumlahInputs' => $request->jumlahInput
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dokumenPelatihan = $request->dokumenPelatihan;
        $link = $request->link;
        
        for($i=0;$i<count($link);$i++) {
            $datasave = [
                'dokumenPelatihan' => $dokumenPelatihan[$i],
                'link' => $link[$i]
            ];
            Pelatihan::create($datasave);
        }
        
        return redirect('/repository/pelatihan')->with('success', 'Dokumen Pelatihan baru berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pelatihan $pelatihan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pelatihan $pelatihan)
    {
        return view('repository.pelatihan.edit',[
            'title' => 'Ubah Pelatihan',
            'pelatihan' => $pelatihan
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pelatihan $pelatihan)
    {
        $rules = [];

        if($request->dokumenPelatihan != $pelatihan->dokumenPelatihan) {
            $rules['dokumenPelatihan'] = 'required|unique:pelatihans';
        }

        if($request->link != $pelatihan->link) {
            $rules['link'] = 'required|unique:pelatihans';
        }

        $validatedData = $request->validate($rules);

        Pelatihan::where('id', $pelatihan->id)
            ->update($validatedData);

        return redirect('/repository/pelatihan')->with('success', 'Dokumen Pelatihan berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pelatihan $pelatihan)
    {
        Pelatihan::destroy($pelatihan->id);
        return redirect('/repository/pelatihan')->with('success', 'Dokumen Pelatihan berhasil dihapus');
    }
}
