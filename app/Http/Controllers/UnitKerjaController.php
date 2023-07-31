<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UnitKerja;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UnitKerjaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('unitKerja.index', [
            'title' => 'Pengaturan Unit Kerja',
            'unitKerjas' => UnitKerja::sortable()->filter()->paginate(10)
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
        $request->validate([
            'kodeWilayah' => 'required|numeric|digits:2',
            'kodeUnitKerja' => 'required|unique:unit_kerjas|numeric|digits:4',
            'wilayah' => 'required',
            'namaUnitKerja' => 'required|unique:unit_kerjas',
            'username' => 'required|unique:users|digits:4',
            'namaPIC' => 'nullable',
            'noTelpPIC' => 'nullable|min_digits:10|max_digits:13',
            'role' => 'required',
            'kodeSatkerProv' => 'nullable|digits:4',
            'ikuUnitKerja_id' => 'required|digits:4'
        ]);
        
        DB::beginTransaction();

        $unitKerja = new UnitKerja;
        $unitKerja->kodeWilayah = $request->kodeWilayah;
        $unitKerja->kodeUnitKerja = $request->kodeUnitKerja;
        $unitKerja->wilayah = $request->wilayah;
        $unitKerja->namaUnitKerja = $request->namaUnitKerja;
        $unitKerja->namaPIC = $request->namaPIC;
        $unitKerja->noTelpPIC = $request->noTelpPIC;
        $unitKerja->role = $request->role;
        $unitKerja->kodeSatkerProv = $request->kodeSatkerProv;
        $unitKerja->ikuUnitKerja_id = $request->ikuUnitKerja_id;
        $unitKerja->save();

        if($request->role == "Unit Kerja Pusat"){
            $iku = [
                'id' => $request->ikuUnitKerja_id,
                'namaUnitKerja' => $request->namaUnitKerja
            ];
            DB::table('iku_unit_kerjas')->insert($iku);
        }

        $password = Str::password(8);
        $password = bcrypt($password);
        $validatedDataUser = [
            'name' => $request->namaUnitKerja,
            'username' => $request->username,
            'role' => $request->role,
            'password' => $password
        ];

        User::create($validatedDataUser);
        DB::commit();

        return redirect('/unitKerja')->with('success', 'Unit Kerja berhasil ditambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(UnitKerja $unitKerja)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UnitKerja $unitKerja)
    {
        return view('unitKerja.edit', [
            'unitKerja' => $unitKerja,
            'title' => 'Ubah Unit Kerja'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UnitKerja $unitKerja)
    {
        $rules = [
            'kodeWilayah' => 'required|numeric|digits:2',
            'wilayah' => 'required',
            'namaPIC' => 'nullable',
            'noTelpPIC' => 'nullable|min_digits:10|max_digits:13',
            'role' => 'required',
            'kodeSatkerProv' => 'nullable|digits:4',
        ];

        if($request->kodeUnitKerja != $unitKerja->kodeUnitKerja) {
            $rules['kodeUnitKerja'] = 'required|unique:unit_kerjas|numeric|digits:4';
        }

        if($request->namaUnitKerja != $unitKerja->namaUnitKerja) {
            $rules['namaUnitKerja'] = 'required|unique:unit_kerjas';
        }
        
        if($request->username != $unitKerja->kodeUnitKerja) {
            $rulesUser['username'] = 'required|unique:users|digits:4';
            $validatedDataUser = $request->validate($rulesUser);
        }
        
        DB::beginTransaction();
        
        if($request->role != $unitKerja->role) {
            if($request->role == "Unit Kerja Pusat") {
                $iku = [
                    'id' => $request->ikuUnitKerja_id,
                    'namaUnitKerja' => $request->namaUnitKerja
                ];
                DB::table('iku_unit_kerjas')->insert($iku);
            } else if ($unitKerja->role == "Unit Kerja Pusat") {
                DB::table('iku_unit_kerjas')->where('id', '=', $unitKerja->kodeUnitKerja)->delete();
            }
        } else {
            $iku = [
                'id' => $request->ikuUnitKerja_id,
                'namaUnitKerja' => $request->namaUnitKerja
            ];
            DB::table('iku_unit_kerjas')->where('id', $unitKerja->kodeUnitKerja)->update($iku);
        }       

        $validatedData = $request->validate($rules);

        $validatedDataUser = [
            'name' => $request->namaUnitKerja,
            'username' => $request->kodeUnitKerja,
            'role' => $request->role
        ];

        UnitKerja::where('id', $unitKerja->id)->update($validatedData);
        DB::table('users')->where('username', $unitKerja->kodeUnitKerja)->update($validatedDataUser);
        DB::commit();

        return redirect('/unitKerja')->with('success', 'Unit Kerja berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UnitKerja $unitKerja)
    {
        DB::beginTransaction();
        if($unitKerja->role == "Unit Kerja Pusat") {
            DB::table('iku_unit_kerjas')->where('id', '=', $unitKerja->kodeUnitKerja)->delete();
            DB::table('tujuan_ikus')->where('ikuUnitKerja_id', '=', $unitKerja->kodeUnitKerja)->delete();
        }
        DB::table('unit_kerjas')->where('id', '=', $unitKerja->id)->delete();
        DB::table('users')->where('username', '=', $unitKerja->kodeUnitKerja)->delete();
        DB::commit();
        return redirect('/unitKerja')->with('success', 'Unit Kerja berhasil dihapus');
    }
}
