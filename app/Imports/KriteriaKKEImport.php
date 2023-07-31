<?php

namespace App\Imports;

use App\Models\KriteriaKke;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;

HeadingRowFormatter::default('none');
class KriteriaKKEImport implements ToModel, WithHeadingRow, WithValidation
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new KriteriaKke([
            'kke_id' => $row['kke_id'],
            'kodeKriteriaKKE' => $row['kodeKriteriaKKE'],
            'kriteria' => $row['kriteria'],
            'nilaiRatarataIKU' => $row['nilaiRatarataIKU'],
            'nilaiPerIKU' => $row['nilaiPerIKU'],
            'tujuan' => $row['tujuan'],
            'sasaran' => $row['sasaran'],
            'indikator' => $row['indikator'],
            'panduanEvaluator' => $row['panduanEvaluator']
        ]);
    }

    public function rules(): array
    {
        return [
            'kodeKriteriaKKE' => 'required|size:2|uppercase|unique:kriteria_kkes',
            'kriteria' => 'required',
            'nilaiRatarataIKU' => 'required',
            'nilaiPerIKU' => 'required',
            'tujuan' => 'required',
            'sasaran' => 'required',
            'indikator' => 'required',
            'panduanEvaluator' => 'required'
        ];
    }
}
