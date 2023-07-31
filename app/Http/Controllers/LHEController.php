<?php

namespace App\Http\Controllers;

use App\Models\UnitKerja;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LHEController extends Controller
{
    public function generate()
    {
        return view('lhe.generateLHE', [
            'title' => 'LHE',
            'unitKerjas' => UnitKerja::orderBy('kodeWilayah')->filter()->paginate(10)
        ]);
    }

    public function kirim()
    {
        return view('lhe.kirimLHE', [
            'title' => 'LHE',
            'unitKerjas' => UnitKerja::orderBy('kodeWilayah')->filter()->paginate(10)
        ]);
    }

    public function feedback()
    {
        return view('lhe.feedbackLHE', [
            'title' => 'LHE',
            'unitKerjas' => UnitKerja::orderBy('kodeWilayah')->filter()->paginate(10)
        ]);
    }

    public function upload(Request $request)
    {
        return view('lhe.uploadLHE', [
            'title' => 'LHE',
            'namaUnitKerja' => $request->namaUnitKerja
        ]);
    }
}
