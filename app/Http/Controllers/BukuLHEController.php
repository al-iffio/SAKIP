<?php

namespace App\Http\Controllers;

use App\Models\BukuLhe;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BukuLHEController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('repository.bukuLHE.index', [
            'title' => 'Repository',
            'bukuLHEs' => BukuLhe::filter()->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        return view('repository.bukuLHE.create',[
            'title' => 'Tambah Buku LHE',
            'jumlahInputs' => $request->jumlahInput
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $bukuLHE = $request->bukuLHE;
        $link = $request->link;
        
        for($i=0;$i<count($link);$i++) {
            $datasave = [
                'bukuLHE' => $bukuLHE[$i],
                'link' => $link[$i]
            ];
            BukuLhe::create($datasave);
        }
        
        return redirect('/repository/bukuLHE')->with('success', 'Buku LHE baru berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(BukuLhe $bukuLHE)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BukuLhe $bukuLHE)
    {
        return view('repository.bukuLHE.edit',[
            'title' => 'Ubah Buku LHE',
            'bukuLHE' => $bukuLHE
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BukuLhe $bukuLHE)
    {
        $rules = [];

        if($request->bukuLHE != $bukuLHE->bukuLHE) {
            $rules['bukuLHE'] = 'required|unique:buku_lhes';
        }

        if($request->link != $bukuLHE->link) {
            $rules['link'] = 'required|unique:buku_lhes';
        }

        $validatedData = $request->validate($rules);

        BukuLhe::where('id', $bukuLHE->id)
            ->update($validatedData);

        return redirect('/repository/bukuLHE')->with('success', 'Buku LHE berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BukuLhe $bukuLHE)
    {
        BukuLhe::destroy($bukuLHE->id);
        return redirect('/repository/bukuLHE')->with('success', 'Buku LHE berhasil dihapus');
    }
}
