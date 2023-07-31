<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TimAtSatker;

class DaftarTimController extends Controller
{
    public function index()
    {
        return view('daftarTim', [
            'title' => 'Daftar Tim',
            'tims' => TimATSatker::orderBy(
                function($q) {
                    return $q->from('unit_kerjas')
                        ->whereRaw('`unit_kerjas`.id = `tim_at_satkers`.unitKerja_id' )
                        ->select('kodeUnitKerja');
                }
            )->paginate(10)
        ]);
    }
}
