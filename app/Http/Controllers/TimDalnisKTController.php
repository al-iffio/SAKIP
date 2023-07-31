<?php

namespace App\Http\Controllers;

use App\Models\TimDalnisKt;
use App\Http\Controllers\Controller;
use App\Models\Pegawai;
use App\Models\TimAtSatker;
use Illuminate\Http\Request;

class TimDalnisKTController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('timDalnisKT.index', [
            'title' => 'Pembagian Tim',
            'timDalnisKTs' => TimDalnisKT::orderBy(
                function($q) {
                    return $q->from('pegawais')
                        ->whereRaw('`pegawais`.id = `tim_dalnis_kts`.dalnis_id' )
                        ->select('namaPegawai');
                }
            )->orderBy(
                function($q) {
                    return $q->from('pegawais')
                        ->whereRaw('`pegawais`.id = `tim_dalnis_kts`.kt_id' )
                        ->select('namaPegawai');
                }
                )->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        return view('timDalnisKT.create',[
            'title' => 'Tambah Data Tim',
            'jumlahInputs' => $request->jumlahInput,
            'dalniss' => Pegawai::where('role', '=', 'Pengendali Teknis')->get(),
            'KTs' => Pegawai::where('role', '=', 'Ketua Tim')->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dalnis_id = $request->dalnis_id;
        $kt_id = $request->kt_id;
        
        for($i=0;$i<count($kt_id);$i++) {
            
            $datasave = [
                'dalnis_id' => $dalnis_id[$i],
                'kt_id' => $kt_id[$i]
            ];
            TimDalnisKt::create($datasave);;
        }
        
        return redirect('/timDalnisKT')->with('success', 'Tim berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(TimDalnisKt $timDalnisKT)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TimDalnisKt $timDalnisKT)
    {
        return view('timDalnisKT.edit',[
            'title' => 'Ubah Data Tim',
            'timDalnisKT' => $timDalnisKT,
            'dalniss' => Pegawai::where('role', '=', 'Pengendali Teknis')->get(),
            'KTs' => Pegawai::where('role', '=', 'Ketua Tim')->get(),
            'timATSatkers' => TimATSatker::where('timDalnisKT_id', $timDalnisKT->id)
            ->orderBy(
                function($q) {
                    return $q->from('pegawais')
                        ->whereRaw('`pegawais`.id = `tim_at_satkers`.at_id' )
                        ->select('namaPegawai');
                }
            )->orderBy(
                function($q) {
                    return $q->from('unit_kerjas')
                        ->whereRaw('`unit_kerjas`.id = `tim_at_satkers`.unitKerja_id' )
                        ->select('kodeUnitKerja');
                }
                )->paginate(10)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TimDalnisKt $timDalnisKT)
    {
        $rules = [
            'dalnis_id' => 'required',
            'kt_id' => 'required|unique:tim_dalnis_kts'
        ];

        $validatedData = $request->validate($rules);

        TimDalnisKt::where('id', $timDalnisKT->id)
            ->update($validatedData);
        return redirect('/timDalnisKT')->with('success', 'Tim berhasil diubah');   
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TimDalnisKt $timDalnisKT)
    {
        TimDalnisKt::destroy($timDalnisKT->id);
        return redirect('/timDalnisKT')->with('success', 'Tim berhasil dihapus');
    }
}
