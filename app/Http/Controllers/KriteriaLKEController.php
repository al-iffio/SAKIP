<?php

namespace App\Http\Controllers;

use App\Models\KriteriaKke;
use App\Models\KriteriaLke;
use Illuminate\Http\Request;
use App\Imports\KriteriaLKEImport;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class KriteriaLKEController extends Controller
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
        return view('komponenLKE.subKomponenLKE.kriteriaLKE.create',[
            'title' => 'Tambah Kriteria LKE',
            'kodeKomponen' => $request->kodeKomponen,
            'kodeSubKomponen' => $request->kodeSubKomponen,
            'subKomponenLke_id' => $request->subKomponenLke_id,
            'bobotPerKriteria' => $request->bobotPerKriteria,
            'jumlahKriteria' => $request->jumlahKriteria,
            'persentaseNilaiSub' => $request->persentaseNilaiSub,
            'kriteriaKKEs' => KriteriaKke::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if($request->jenisPenilaian == "Default") {
            $validatedData = $request->validate([
                'subKomponenLke_id' => 'required',
                'kodeKriteriaLKE' => 'required|unique:kriteria_lkes',
                'namaKriteria' => 'required|unique:kriteria_lkes',
                'bobotKriteria' => 'required|numeric|between:0,100',
                'panduanEvaluator' => 'required',
                'jenisPenilaian' => 'required',
                'defaultNilai' => 'required',
                'defaultCatatan' => 'required',
            ]);
            $validatedData['pilihanNilai'] = null;
            $validatedData['catatanPerNilai'] = null;
            $validatedData['catatanA'] = null;
            $validatedData['catatanB'] = null;
            $validatedData['catatanC'] = null;
            $validatedData['catatanD'] = null;
            $validatedData['catatanE'] = null;
            $validatedData['catatanY'] = null;
            $validatedData['catatanT'] = null;
            $validatedData['templateCatatan'] = null;
            $validatedData['kriteriaKKE_id'] = null;
            $validatedData['templateCatatanKKE'] = null;
        } elseif ($request->jenisPenilaian == "Manual") {
            if($request->pilihanNilai == "ABCDE" && $request->catatanPerNilai == 1) {
                $validatedData = $request->validate([
                    'subKomponenLke_id' => 'required',
                    'kodeKriteriaLKE' => 'required|unique:kriteria_lkes',
                    'namaKriteria' => 'required|unique:kriteria_lkes',
                    'bobotKriteria' => 'required|numeric|between:0,100',
                    'panduanEvaluator' => 'required',
                    'jenisPenilaian' => 'required',
                    'pilihanNilai' => 'required',
                    'catatanPerNilai' => 'required',
                    'catatanA' => 'required',
                    'catatanB' => 'required',
                    'catatanC' => 'required',
                    'catatanD' => 'required',
                    'catatanE' => 'required',
                ]);
                $validatedData['defaultNilai'] = null;
                $validatedData['defaultCatatan'] = null;
                $validatedData['catatanY'] = null;
                $validatedData['catatanT'] = null;
                $validatedData['templateCatatan'] = null;
                $validatedData['kriteriaKKE_id'] = null;
                $validatedData['templateCatatanKKE'] = null;
            } elseif ($request->pilihanNilai == "Y/T" && $request->catatanPerNilai == 1) {
                $validatedData = $request->validate([
                    'subKomponenLke_id' => 'required',
                    'kodeKriteriaLKE' => 'required|unique:kriteria_lkes',
                    'namaKriteria' => 'required|unique:kriteria_lkes',
                    'bobotKriteria' => 'required|numeric|between:0,100',
                    'panduanEvaluator' => 'required',
                    'jenisPenilaian' => 'required',
                    'pilihanNilai' => 'required',
                    'catatanPerNilai' => 'required',
                    'catatanY' => 'required',
                    'catatanT' => 'required'
                ]);
                $validatedData['defaultNilai'] = null;
                $validatedData['defaultCatatan'] = null;
                $validatedData['catatanA'] = null;
                $validatedData['catatanB'] = null;
                $validatedData['catatanC'] = null;
                $validatedData['catatanD'] = null;
                $validatedData['catatanE'] = null;
                $validatedData['templateCatatan'] = null;
                $validatedData['kriteriaKKE_id'] = null;
                $validatedData['templateCatatanKKE'] = null;
            } elseif ($request->catatanPerNilai == 0) {
                $validatedData = $request->validate([
                    'subKomponenLke_id' => 'required',
                    'kodeKriteriaLKE' => 'required|unique:kriteria_lkes',
                    'namaKriteria' => 'required|unique:kriteria_lkes',
                    'bobotKriteria' => 'required|numeric|between:0,100',
                    'panduanEvaluator' => 'required',
                    'jenisPenilaian' => 'required',
                    'pilihanNilai' => 'required',
                    'catatanPerNilai' => 'required',
                    'templateCatatan' => 'required',
                ]);
                $validatedData['defaultNilai'] = null;
                $validatedData['defaultCatatan'] = null;
                $validatedData['catatanA'] = null;
                $validatedData['catatanB'] = null;
                $validatedData['catatanC'] = null;
                $validatedData['catatanD'] = null;
                $validatedData['catatanE'] = null;
                $validatedData['catatanY'] = null;
                $validatedData['catatanT'] = null;
                $validatedData['kriteriaKKE_id'] = null;
                $validatedData['templateCatatanKKE'] = null;
            }
        } else {
            $validatedData = $request->validate([
                'subKomponenLke_id' => 'required',
                'kodeKriteriaLKE' => 'required|unique:kriteria_lkes',
                'namaKriteria' => 'required|unique:kriteria_lkes',
                'bobotKriteria' => 'required|numeric|between:0,100',
                'panduanEvaluator' => 'required',
                'jenisPenilaian' => 'required',
                'kriteriaKKE_id' => 'required',
                'templateCatatanKKE' => 'required',
            ]);
            $validatedData['defaultNilai'] = null;
            $validatedData['defaultCatatan'] = null;
            $validatedData['pilihanNilai'] = null;
            $validatedData['catatanPerNilai'] = null;
            $validatedData['catatanA'] = null;
            $validatedData['catatanB'] = null;
            $validatedData['catatanC'] = null;
            $validatedData['catatanD'] = null;
            $validatedData['catatanE'] = null;
            $validatedData['catatanY'] = null;
            $validatedData['catatanT'] = null;
            $validatedData['templateCatatan'] = null;
        }

        KriteriaLke::create($validatedData);

        if($request->bobotPerKriteria == 'Sama') {
            $jumlah = $request->jumlahKriteria;
            if($jumlah == 0) {
                $jumlah = 1;
            }
            $bobot = $request->persentaseNilaiSub/($jumlah+1);
            for($i=1; $i<=$jumlah; $i++) {
                KriteriaLke::where('subKomponenLKE_id', $request->subKomponenLke_id)
                ->update(['bobotKriteria' => $bobot]);
            }
        }

        return redirect()->route('SubKomponenLKE', [
            'kodeKomponen' => $request->kodeKomponen,
            'kodeSubKomponen' => $request->kodeSubKomponen])
            ->with('success', 'Kriteria LKE berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(KriteriaLke $kriteriaLKE)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, KriteriaLke $kriteriaLKE)
    {
        return view('komponenLKE.subKomponenLKE.kriteriaLKE.edit',[
            'title' => 'Ubah Kriteria LKE',
            'kodeKomponen' => $request->kodeKomponen,
            'kodeSubKomponen' => $request->kodeSubKomponen,
            'kriteriaKKEs' => KriteriaKke::all(),
            'kriteriaLKE' => $kriteriaLKE,
            'bobotPerKriteria' => $request->bobotPerKriteria,
            'jumlahKriteria' => $request->jumlahKriteria,
            'persentaseNilaiSub' => $request->persentaseNilaiSub
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, KriteriaLke $kriteriaLKE)
    {
        if($request->jenisPenilaian == "Default") {
            $rules = [
                'bobotKriteria' => 'required|numeric|between:0,100',
                'panduanEvaluator' => 'required',
                'jenisPenilaian' => 'required',
                'defaultNilai' => 'required',
                'defaultCatatan' => 'required',
            ];
        } elseif ($request->jenisPenilaian == "Manual") {
            if($request->pilihanNilai == "ABCDE" && $request->catatanPerNilai == 1) {
                $rules = [
                    'bobotKriteria' => 'required|numeric|between:0,100',
                    'panduanEvaluator' => 'required',
                    'jenisPenilaian' => 'required',
                    'pilihanNilai' => 'required',
                    'catatanPerNilai' => 'required',
                    'catatanA' => 'required',
                    'catatanB' => 'required',
                    'catatanC' => 'required',
                    'catatanD' => 'required',
                    'catatanE' => 'required',
                ];
            } elseif ($request->pilihanNilai == "Y/T" && $request->catatanPerNilai == 1) {
                $rules = [
                    'bobotKriteria' => 'required|numeric|between:0,100',
                    'panduanEvaluator' => 'required',
                    'jenisPenilaian' => 'required',
                    'pilihanNilai' => 'required',
                    'catatanPerNilai' => 'required',
                    'catatanY' => 'required',
                    'catatanT' => 'required'
                ];
            } elseif ($request->catatanPerNilai == 0) {
                $rules = [
                    'bobotKriteria' => 'required|numeric|between:0,100',
                    'panduanEvaluator' => 'required',
                    'jenisPenilaian' => 'required',
                    'pilihanNilai' => 'required',
                    'catatanPerNilai' => 'required',
                    'templateCatatan' => 'required',
                ];
            }
        } else {
            $rules = [
                'bobotKriteria' => 'required|numeric|between:0,100',
                'panduanEvaluator' => 'required',
                'jenisPenilaian' => 'required',
                'kriteriaKKE_id' => 'required',
                'templateCatatanKKE' => 'required',
            ];
        }

        if($request->kodeKriteriaLKE != $kriteriaLKE->kodeKriteriaLKE) {
            $rules['kodeKriteriaLKE'] = 'required|unique:kriteria_lkes';
        }

        if($request->namaKriteria != $kriteriaLKE->namaKriteria) {
            $rules['namaKriteria'] = 'required|unique:kriteria_lkes';
        }

        $validatedData = $request->validate($rules);

        if($request->jenisPenilaian == "Default") {
            $validatedData['pilihanNilai'] = null;
            $validatedData['catatanPerNilai'] = null;
            $validatedData['catatanA'] = null;
            $validatedData['catatanB'] = null;
            $validatedData['catatanC'] = null;
            $validatedData['catatanD'] = null;
            $validatedData['catatanE'] = null;
            $validatedData['catatanY'] = null;
            $validatedData['catatanT'] = null;
            $validatedData['templateCatatan'] = null;
            $validatedData['kriteriaKKE_id'] = null;
            $validatedData['templateCatatanKKE'] = null;
        } elseif ($request->jenisPenilaian == "Manual") {
            if($request->pilihanNilai == "ABCDE" && $request->catatanPerNilai == 1) {
                $validatedData['defaultNilai'] = null;
                $validatedData['defaultCatatan'] = null;
                $validatedData['catatanY'] = null;
                $validatedData['catatanT'] = null;
                $validatedData['templateCatatan'] = null;
                $validatedData['kriteriaKKE_id'] = null;
                $validatedData['templateCatatanKKE'] = null;
            } elseif ($request->pilihanNilai == "Y/T" && $request->catatanPerNilai == 1) {
                $validatedData['defaultNilai'] = null;
                $validatedData['defaultCatatan'] = null;
                $validatedData['catatanA'] = null;
                $validatedData['catatanB'] = null;
                $validatedData['catatanC'] = null;
                $validatedData['catatanD'] = null;
                $validatedData['catatanE'] = null;
                $validatedData['templateCatatan'] = null;
                $validatedData['kriteriaKKE_id'] = null;
                $validatedData['templateCatatanKKE'] = null;
            } elseif ($request->catatanPerNilai == 0) {
                $validatedData['defaultNilai'] = null;
                $validatedData['defaultCatatan'] = null;
                $validatedData['catatanA'] = null;
                $validatedData['catatanB'] = null;
                $validatedData['catatanC'] = null;
                $validatedData['catatanD'] = null;
                $validatedData['catatanE'] = null;
                $validatedData['catatanY'] = null;
                $validatedData['catatanT'] = null;
                $validatedData['kriteriaKKE_id'] = null;
                $validatedData['templateCatatanKKE'] = null;
            }
        } else {
            $validatedData['defaultNilai'] = null;
            $validatedData['defaultCatatan'] = null;
            $validatedData['pilihanNilai'] = null;
            $validatedData['catatanPerNilai'] = null;
            $validatedData['catatanA'] = null;
            $validatedData['catatanB'] = null;
            $validatedData['catatanC'] = null;
            $validatedData['catatanD'] = null;
            $validatedData['catatanE'] = null;
            $validatedData['catatanY'] = null;
            $validatedData['catatanT'] = null;
            $validatedData['templateCatatan'] = null;
        }

        KriteriaLke::where('id', $kriteriaLKE->id)
            ->update($validatedData);

        return redirect()->route('SubKomponenLKE', [
            'kodeKomponen' => $request->kodeKomponen,
            'kodeSubKomponen' => $request->kodeSubKomponen])
            ->with('success', 'Kriteria LKE berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, KriteriaLke $kriteriaLKE)
    {
        KriteriaLke::destroy($kriteriaLKE->id);

        if($kriteriaLKE->subKomponenLke->bobotPerKriteria == 'Sama') {
            $jumlah = $kriteriaLKE->subKomponenLke->kriteriaLKE->count();
            if($jumlah == 0) {
                $jumlah = 1;
            }
            $bobot = $kriteriaLKE->subKomponenLke->persentaseNilaiSub/$jumlah;
            KriteriaLke::where('subKomponenLke_id', $request->id)
            ->update(['bobotKriteria' => $bobot]);
        }

        return redirect()->route('SubKomponenLKE', [
            'kodeKomponen' => $request->kodeKomponen,
            'kodeSubKomponen' => $request->kodeSubKomponen])
            ->with('success', 'Kriteria LKE berhasil dihapus');
    }

    public function deleteAll(Request $request)
    {
        DB::table('kriteria_lkes')->where('subKomponenLke_id', '=', $request->subKomponenLke_id)->delete();
        return redirect()->route('SubKomponenLKE', [
            'kodeKomponen' => $request->kodeKomponen,
            'kodeSubKomponen' => $request->kodeSubKomponen])
            ->with('success', 'Seluruh kriteria LKE pada Sub Komponen ini berhasil dihapus');
    }

    public function import(Request $request)
    {
        $request->validate([
            'kriteriaLKE' => 'required|mimes:xlsx,xls']);

        Excel::import(new KriteriaLKEImport, request()->file('kriteriaLKE'));
        return redirect()->route('SubKomponenLKE', [
            'kodeKomponen' => $request->kodeKomponen,
            'kodeSubKomponen' => $request->kodeSubKomponen])
            ->with('success', 'Kriteria LKE berhasil diimpor');
    }

    public function downloadTemplate()
    {
        //$path=public_path('templateExcel/TemplateImporKriteriaLKE.zip');
        $path=public_path('templateExcel/Template_Impor_Kriteria_LKE.zip');
        return response()->download($path);
    }

}
