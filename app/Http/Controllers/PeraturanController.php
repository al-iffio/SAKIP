<?php

namespace App\Http\Controllers;

use App\Models\Peraturan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PeraturanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('repository.peraturan.index', [
            'title' => 'Repository',
            'peraturans' => Peraturan::filter()->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        return view('repository.peraturan.create',[
            'title' => 'Tambah Peraturan',
            'jumlahInputs' => $request->jumlahInput
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $peraturan = $request->peraturan;
        $link = $request->link;
        
        for($i=0;$i<count($link);$i++) {
            $datasave = [
                'peraturan' => $peraturan[$i],
                'link' => $link[$i]
            ];
            Peraturan::create($datasave);
        }
        
        return redirect('/repository/peraturan')->with('success', 'Peraturan baru berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Peraturan $peraturan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Peraturan $peraturan)
    {
        return view('repository.peraturan.edit',[
            'title' => 'Ubah Peraturan',
            'peraturan' => $peraturan
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Peraturan $peraturan)
    {
        $rules = [];

        if($request->peraturan != $peraturan->peraturan) {
            $rules['peraturan'] = 'required|unique:peraturans';
        }

        if($request->link != $peraturan->link) {
            $rules['link'] = 'required|unique:peraturans';
        }

        $validatedData = $request->validate($rules);

        Peraturan::where('id', $peraturan->id)
            ->update($validatedData);

        return redirect('/repository/peraturan')->with('success', 'Peraturan berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Peraturan $peraturan)
    {
        Peraturan::destroy($peraturan->id);
        return redirect('/repository/peraturan')->with('success', 'Peraturan berhasil dihapus');
    }
}
