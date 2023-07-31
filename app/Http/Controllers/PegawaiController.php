<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pegawai;
use App\Models\UnitKerja;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pegawai.index', [
            'title' => 'Pengaturan Pegawai',
            'pegawais' => Pegawai::sortable()->filter()->paginate(10)
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Pegawai $pegawai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pegawai $pegawai)
    {
        return view('pegawai.edit', [
            'pegawai' => $pegawai,
            'title' => 'Ubah Pegawai',
            'unitKerjas' => UnitKerja::where('role', '=', 'BPS Kab/Kota')
                                            ->orWhere('role', '=', 'BPS Provinsi')
                                            ->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pegawai $pegawai)
    {
        $rules = ['role' => 'required'];
        
        if(($request->role == "Kepala Unit Kerja BPS Kab/Kota")||($request->role == "Kepala Unit Kerja BPS Provinsi")) {
            if($request->satker_id != $pegawai->satker_id) {
                $rules['satker_id'] = 'required|unique:pegawais';
            } else {
                $rules = [
                    'satker_id' => 'required|unique:pegawais'
                ];
            }
        } else {
            $rules['satker_id'] = 'nullable';
        }

        $validatedData = $request->validate($rules);

        if(($request->role != "Kepala Unit Kerja BPS Kab/Kota")&&($request->role != "Kepala Unit Kerja BPS Provinsi")) {
            $validatedData['satker_id'] = null;
        }

        Pegawai::where('id', $pegawai->id)->update($validatedData);
        User::where('username', $pegawai->nip)->update(['role' => $request->role]);

        return redirect('/pegawai')->with('success', 'Pegawai berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pegawai $pegawai)
    {
        //
    }
}
