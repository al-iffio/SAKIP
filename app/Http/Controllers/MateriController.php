<?php

namespace App\Http\Controllers;

use App\Models\Materi;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MateriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('repository.materi.index', [
            'title' => 'Repository',
            'materis' => Materi::filter()->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        return view('repository.materi.create',[
            'title' => 'Tambah Materi',
            'jumlahInputs' => $request->jumlahInput
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dokumenMateri = $request->dokumenMateri;
        $link = $request->link;
        
        for($i=0;$i<count($link);$i++) {
            $datasave = [
                'dokumenMateri' => $dokumenMateri[$i],
                'link' => $link[$i]
            ];
            Materi::create($datasave);
        }
        
        return redirect('/repository/materi')->with('success', 'Dokumen Materi baru berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Materi $materi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Materi $materi)
    {
        return view('repository.materi.edit',[
            'title' => 'Ubah Materi',
            'materi' => $materi
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Materi $materi)
    {
        $rules = [];

        if($request->dokumenMateri != $materi->dokumenMateri) {
            $rules['dokumenMateri'] = 'required|unique:materis';
        }

        if($request->link != $materi->link) {
            $rules['link'] = 'required|unique:materis';
        }

        $validatedData = $request->validate($rules);

        Materi::where('id', $materi->id)
            ->update($validatedData);

        return redirect('/repository/materi')->with('success', 'Dokumen Materi berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Materi $materi)
    {
        Materi::destroy($materi->id);
        return redirect('/repository/materi')->with('success', 'Dokumen Materi berhasil dihapus');
    }
}
