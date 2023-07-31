<?php

namespace App\Http\Controllers;

use App\Models\BukuLhe;
use App\Models\Peraturan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RepositoryController extends Controller
{
    public function bukuLHE()
    {
        return view('lihatRepository.bukuLHE', [
            'title' => 'Repository',
            'bukuLHEs' => BukuLhe::all()
        ]);
    }

    public function peraturan()
    {
        return view('lihatRepository.peraturan', [
            'title' => 'Repository',
            'peraturans' => Peraturan::all()
        ]);
    }
}
