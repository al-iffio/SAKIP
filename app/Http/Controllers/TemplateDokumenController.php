<?php

namespace App\Http\Controllers;

use App\Models\TemplateDokumen;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TemplateDokumenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('repository.templateDokumen.index', [
            'title' => 'Repository',
            'templateDokumens' => TemplateDokumen::filter()->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        return view('repository.templateDokumen.create',[
            'title' => 'Tambah Template Dokumen',
            'jumlahInputs' => $request->jumlahInput
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $templateDokumen = $request->templateDokumen;
        $link = $request->link;
        
        for($i=0;$i<count($link);$i++) {
            $datasave = [
                'templateDokumen' => $templateDokumen[$i],
                'link' => $link[$i]
            ];
            TemplateDokumen::create($datasave);
        }
        
        return redirect('/repository/templateDokumen')->with('success', 'Template Dokumen baru berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(TemplateDokumen $templateDokuman)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TemplateDokumen $templateDokuman)
    {
        return view('repository.templateDokumen.edit',[
            'title' => 'Ubah Template Dokumen',
            'templateDokumen' => $templateDokuman
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TemplateDokumen $templateDokuman)
    {
        $rules = [];

        if($request->templateDokumen != $templateDokuman->templateDokumen) {
            $rules['templateDokumen'] = 'required|unique:template_dokumens';
        }

        if($request->link != $templateDokuman->link) {
            $rules['link'] = 'required|unique:template_dokumens';
        }

        $validatedData = $request->validate($rules);

        TemplateDokumen::where('id', $templateDokuman->id)
            ->update($validatedData);

        return redirect('/repository/templateDokumen')->with('success', 'Template Dokumen berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TemplateDokumen $templateDokuman)
    {
        TemplateDokumen::destroy($templateDokuman->id);
        return redirect('/repository/templateDokumen')->with('success', 'Template Dokumen berhasil dihapus');
    }
}
