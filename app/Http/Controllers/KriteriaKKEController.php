<?php

namespace App\Http\Controllers;

use App\Models\KriteriaKke;
use Illuminate\Http\Request;
use App\Imports\KriteriaKKEImport;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class KriteriaKKEController extends Controller
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
        return view('kke.kriteriaKKE.create',[
            'title' => 'Tambah Kriteria KKE',
            'kodeKKE' => $request->kodeKKE,
            'kke_id' => $request->kke_id
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'kodeKriteriaKKE' => 'required|size:2|uppercase|unique:kriteria_kkes',
            'kriteria' => 'required|unique:kriteria_kkes',
            'nilaiRatarataIKU' => 'required',
            'nilaiPerIKU' => 'required',
            'panduanEvaluator' => 'required'
        ];

        if(($request->tujuan || $request->sasaran || $request->indikator) == null ) {
            $rules['level'] = 'required';
        }

        $validatedData = $request->validate($rules);
        $validatedData['tujuan'] = $request->tujuan;
        $validatedData['sasaran'] = $request->sasaran;
        $validatedData['indikator'] = $request->indikator;

        if($request->tujuan == null){
            $validatedData['tujuan'] = 0;
        }

        if($request->sasaran == null){
            $validatedData['sasaran'] = 0;
        }

        if($request->indikator == null){
            $validatedData['indikator'] = 0;
        }

        $validatedData['kke_id'] = $request->kke_id;
        KriteriaKke::create($validatedData);

        return redirect()->route('KKE', ['kodeKKE' => $request->kodeKKE])->with('success', 'Kriteria KKE berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(KriteriaKke $kriteriaKKE)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, KriteriaKke $kriteriaKKE)
    {
        return view('kke.kriteriaKKE.edit',[
            'title' => 'Ubah Kriteria KKE',
            'kodeKKE' => $request->kodeKKE,
            'kriteriaKKE' => $kriteriaKKE
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, KriteriaKke $kriteriaKKE)
    {
        $rules = [
            'nilaiRatarataIKU' => 'required',
            'nilaiPerIKU' => 'required'
        ];

        if(($request->tujuan || $request->sasaran || $request->indikator) == null ) {
            $rules['level'] = 'required';
        }

        if($request->kodeKriteriaKKE != $kriteriaKKE->kodeKriteriaKKE) {
            $rules['kodeKriteriaKKE'] = 'required|size:2|uppercase|unique:kriteria_kkes';
        }

        if($request->kriteria != $kriteriaKKE->kriteria) {
            $rules['kriteria'] = 'required|unique:kriteria_kkes';
        }

        $validatedData = $request->validate($rules);
        $validatedData['tujuan'] = $request->tujuan;
        $validatedData['sasaran'] = $request->sasaran;
        $validatedData['indikator'] = $request->indikator;

        if($request->tujuan == null){
            $validatedData['tujuan'] = 0;
        }

        if($request->sasaran == null){
            $validatedData['sasaran'] = 0;
        }

        if($request->indikator == null){
            $validatedData['indikator'] = 0;
        }

        $validatedData['panduanEvaluator'] = $request->panduanEvaluator;

        KriteriaKKE::where('id', $kriteriaKKE->id)
            ->update($validatedData);

        return redirect()->route('KKE', ['kodeKKE' => $request->kodeKKE])->with('success', 'Kriteria KKE berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, KriteriaKke $kriteriaKKE)
    {
        KriteriaKke::destroy($kriteriaKKE->id);
        return redirect()->route('KKE', ['kodeKKE' => $request->kodeKKE])->with('success', 'Kriteria KKE berhasil dihapus');
    }

    public function deleteAll(Request $request)
    {
        DB::table('kriteria_kkes')->where('kke_id', '=', $request->kke_id)->delete();
        return redirect()->route('KKE', ['kodeKKE' => $request->kodeKKE])->with('success', 'Kriteria KKE berhasil dihapus');
    }

    public function import(Request $request)
    {
        $request->validate([
            'kriteriaKKE' => 'required|mimes:xlsx,xls']);

        Excel::import(new KriteriaKKEImport, request()->file('kriteriaKKE'));
        return redirect()->route('KKE', ['kodeKKE' => $request->kodeKKE])->with('success', 'Kriteria KKE berhasil diimpor');
    }

    public function downloadTemplate()
    {
        $path=public_path('templateExcel/Template_Impor_Kriteria_KKE.zip');
        return response()->download($path);
    }
}
