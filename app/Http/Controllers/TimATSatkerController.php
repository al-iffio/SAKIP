<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\UnitKerja;
use App\Models\TimAtSatker;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TimATSatkerController extends Controller
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
        return view('timDalnisKT.timATSatker.create',[
            'title' => 'Tambah Data Tim',
            'jumlahInputs' => $request->jumlahInput,
            'id' => $request->id,
            'ATs' => Pegawai::where('role', '=', 'Anggota Tim')->get(),
            'unitKerjas' => UnitKerja::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $timDalnisKT_id = $request->timDalnisKT_id;
        $at_id = $request->at_id;
        $unitKerja_id = $request->unitKerja_id;
        
        for($i=0;$i<count($unitKerja_id);$i++) {
            
            $datasave = [
                'timDalnisKT_id' => $timDalnisKT_id[$i],
                'at_id' => $at_id[$i],
                'unitKerja_id' => $unitKerja_id[$i]
            ];
            TimAtSatker::create($datasave);;
        }
        
        return redirect()->route('TimDalnisKT', ['id' => $request->timDalnisKT_id[0]])->with('success', 'Tim berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(TimAtSatker $timATSatker)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TimAtSatker $timATSatker)
    {
        return view('timDalnisKT.timATSatker.edit',[
            'title' => 'Ubah Data Tim',
            'timATSatker' => $timATSatker,
            'ATs' => Pegawai::where('role', '=', 'Anggota Tim')->get(),
            'unitKerjas' => UnitKerja::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TimAtSatker $timATSatker)
    {
        $rules = [
            'at_id' => 'required',
            'unitKerja_id' => 'required|unique:tim_at_satkers'
        ];

        $validatedData = $request->validate($rules);

        TimATSatker::where('id', $timATSatker->id)
            ->update($validatedData);
        
        return redirect()->route('TimDalnisKT', ['id' => $request->timDalnisKT_id])->with('success', 'Tim berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, TimAtSatker $timATSatker)
    {
        TimAtSatker::destroy($timATSatker->id);
        return redirect()->route('TimDalnisKT', ['id' => $request->timDalnisKT_id])->with('success', 'Tim berhasil dihapus');
    }
}
