<?php

namespace App\Http\Controllers;

use App\Models\Permindok;
use App\Models\UnitKerja;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoleUnitKerjaController extends Controller
{
    public function permindok()
    {
        return view('permindokUnitKerja.index', [
            'title' => 'Permintaan Dokumen',
            'permindoks' => Permindok::filter()->paginate(10)
        ]);
    }

    public function editLink(Request $request)
    {
        return view('permindokUnitKerja.editLink', [
            'title' => 'Ubah Permintaan Dokumen',
            'namaDokumen' => $request->namaDokumen 
        ]);
    }

    public function editUpload(Request $request)
    {
        return view('permindokUnitKerja.editUpload', [
            'title' => 'Ubah Permintaan Dokumen',
            'namaDokumen' => $request->namaDokumen 
        ]);
    }

    public function LHE()
    {
        return view('LHESatker', [
            'title' => 'LHE'
        ]);
    }

    public function profil()
    {
        $unitKerja = UnitKerja::where('kodeUnitKerja', auth()->user()->username)->get();
        $unitKerja = $unitKerja[0];
        return view('profil', [
            'title' => 'Profil',
            'unitKerja' => $unitKerja
        ]);
    }    
}
