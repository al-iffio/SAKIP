<?php

namespace App\Imports;

use App\Models\KriteriaLke;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;

HeadingRowFormatter::default('none');
class KriteriaLKEImport implements ToModel, WithHeadingRow, WithValidation
{
    use Importable;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */    
    
    public function model(array $row)
    {
        return new KriteriaLke([
            'subKomponenLke_id' => $row['subKomponenLke_id'],
            'kodeKriteriaLKE' => $row['kodeKriteriaLKE'],
            'namaKriteria' => $row['namaKriteria'],
            'bobotKriteria' => $row['bobotKriteria'],
            'panduanEvaluator' => $row['panduanEvaluator'],
            'jenisPenilaian' => $row['jenisPenilaian'],
            'defaultNilai' => $row['defaultNilai'],
            'defaultCatatan' => $row['defaultCatatan'],
            'pilihanNilai' => $row['pilihanNilai'],
            'pilihanNilai' => $row['pilihanNilai'],
            'catatanA' => $row['catatanA'],
            'catatanB' => $row['catatanB'],
            'catatanC' => $row['catatanC'],
            'catatanD' => $row['catatanD'],
            'catatanE' => $row['catatanE'],
            'catatanY' => $row['catatanY'],
            'catatanT' => $row['catatanT'],
            'templateCatatan' => $row['templateCatatan'],
            'kriteriaKKE_id' => $row['kriteriaKKE_id'],
            'templateCatatanKKE' => $row['templateCatatanKKE']
        ]);
    }

    public function rules(): array
    {
        return [
            'subKomponenLke_id' => 'required',         
            'kodeKriteriaLKE' => 'required|unique:kriteria_lkes',
            'namaKriteria' => 'required|unique:kriteria_lkes',
            'bobotKriteria' => 'required|numeric|between:0,100',
            'panduanEvaluator' => 'required',
            'jenisPenilaian' => 'required'
        ];
    }
}
