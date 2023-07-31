<?php

namespace App\Http\Controllers;

use App\Models\Permindok;
use App\Http\Controllers\Controller;
use App\Models\UnitKerja;
use Illuminate\Http\Request;

class PermindokController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('permindok.index', [
            'title' => 'Permintaan Dokumen',
            'permindoks' => Permindok::filter()->paginate(10)
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
            'namaDokumen' => 'required|unique:permindoks',
            'metodePengumpulan' => 'required'
        ]);

        Permindok::create($validatedData);

        return redirect('/permindok')->with('success', 'Permindok baru berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Permindok $permindok)
    {
        return view('permindok.show', [
            'permindok' => $permindok,
            'title' => $permindok->namaDokumen,
            'unitKerjas' => UnitKerja::filter()->paginate(10)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Permindok $permindok)
    {
        return view('permindok.edit', [
            'permindok' => $permindok,
            'title' => 'Ubah Permindok'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Permindok $permindok)
    {
        $rules = [
            'metodePengumpulan' => 'required'
        ];

        if($request->namaDokumen != $permindok->namaDokumen) {
            $rules['namaDokumen'] = 'required|unique:permindoks';
        }

        $validatedData = $request->validate($rules);

        Permindok::where('id', $permindok->id)
            ->update($validatedData);

        return redirect('/permindok')->with('success', 'Permindok berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Permindok $permindok)
    {
        Permindok::destroy($permindok->id);
        return redirect('/permindok')->with('success', 'Permindok berhasil dihapus');
    }
}
