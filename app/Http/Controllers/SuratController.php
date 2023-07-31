<?php

namespace App\Http\Controllers;

use App\Models\Surat;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SuratController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('repository.surat.index', [
            'title' => 'Repository',
            'surats' => Surat::filter()->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        return view('repository.surat.create',[
            'title' => 'Tambah Surat',
            'jumlahInputs' => $request->jumlahInput
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $surat = $request->surat;
        $link = $request->link;
        
        for($i=0;$i<count($link);$i++) {
            $datasave = [
                'surat' => $surat[$i],
                'link' => $link[$i]
            ];
            Surat::create($datasave);
        }
        
        return redirect('/repository/surat')->with('success', 'Surat baru berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Surat $surat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Surat $surat)
    {
        return view('repository.surat.edit',[
            'title' => 'Ubah Surat',
            'surat' => $surat
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Surat $surat)
    {
        $rules = [];

        if($request->surat != $surat->surat) {
            $rules['surat'] = 'required|unique:surats';
        }

        if($request->link != $surat->link) {
            $rules['link'] = 'required|unique:surats';
        }

        $validatedData = $request->validate($rules);

        Surat::where('id', $surat->id)
            ->update($validatedData);

        return redirect('/repository/surat')->with('success', 'Surat berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Surat $surat)
    {
        Surat::destroy($surat->id);
        return redirect('/repository/surat')->with('success', 'Surat berhasil dihapus');
    }
}
