<?php

namespace App\Http\Controllers;

use App\Models\UnitKerja;
use App\Models\TimAtSatker;
use App\Models\TimDalnisKt;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index', [
            "title" => "Dashboard"
        ]);
    }

    public function MEProgressAT()
    {
        $ATs = TimATSatker::distinct()->get(['at_id']);
        $at = [];
        foreach($ATs as $anggotaTim){
            $at[] = $anggotaTim->pegawaiAT->namaPegawai;
        }

        $sudahDiisi = [];
        foreach($ATs as $anggotaTim){
            $sudahDiisi[] = 50;
        }

        $belumDiisi = [];
        foreach($ATs as $anggotaTim){
            $belumDiisi[] = 50;
        }

        return view('dashboard.monitoringEvaluasi.progressAT', [
            'title' => 'Monitoring Evaluasi',
            'at' => $at,
            'sudahDiisi' => $sudahDiisi,
            'belumDiisi' => $belumDiisi
        ]);
    }

    public function MEProgressKT()
    {
        $KTs = TimDalnisKt::all();
        $kt = [];
        foreach($KTs as $ketuaTim){
            $kt[] = $ketuaTim->pegawaiKT->namaPegawai;
        }

        $sudahDiisi = [];
        foreach($KTs as $ketuaTim){
            $sudahDiisi[] = 50;
        }

        $belumDiisi = [];
        foreach($KTs as $ketuaTim){
            $belumDiisi[] = 50;
        }

        return view('dashboard.monitoringEvaluasi.progressKT', [
            'title' => 'Monitoring Evaluasi',
            'kt' => $kt,
            'sudahDiisi' => $sudahDiisi,
            'belumDiisi' => $belumDiisi
        ]);
    }

    public function MEProgressDalnis()
    {
        $Dalnis = TimDalnisKt::distinct()->get(['dalnis_id']);
        $dalnis = [];
        foreach($Dalnis as $pengendaliTeknis){
            $dalnis[] = $pengendaliTeknis->pegawaiDalnis->namaPegawai;
        }

        $sudahDiisi = [];
        foreach($Dalnis as $pengendaliTeknis){
            $sudahDiisi[] = 50;
        }

        $belumDiisi = [];
        foreach($Dalnis as $pengendaliTeknis){
            $belumDiisi[] = 50;
        }

        return view('dashboard.monitoringEvaluasi.progressDalnis', [
            'title' => 'Monitoring Evaluasi',
            'dalnis' => $dalnis,
            'belumDiisi' => $belumDiisi,
            'sudahDiisi' => $sudahDiisi
        ]);
    }

    public function METLProgressAT()
    {
        $ATs = TimATSatker::distinct()->get(['at_id']);
        $at = [];
        foreach($ATs as $anggotaTim){
            $at[] = $anggotaTim->pegawaiAT->namaPegawai;
        }

        $sudahDiisi = [];
        foreach($ATs as $anggotaTim){
            $sudahDiisi[] = 50;
        }

        $belumDiisi = [];
        foreach($ATs as $anggotaTim){
            $belumDiisi[] = 50;
        }

        return view('dashboard.monitoringEvaluasiTL.progressAT', [
            'title' => 'Monitoring Evaluasi TL',
            'at' => $at,
            'sudahDiisi' => $sudahDiisi,
            'belumDiisi' => $belumDiisi
        ]);
    }

    public function METLProgressKT()
    {
        $KTs = TimDalnisKt::all();
        $kt = [];
        foreach($KTs as $ketuaTim){
            $kt[] = $ketuaTim->pegawaiKT->namaPegawai;
        }

        $sudahDiisi = [];
        foreach($KTs as $ketuaTim){
            $sudahDiisi[] = 50;
        }

        $belumDiisi = [];
        foreach($KTs as $ketuaTim){
            $belumDiisi[] = 50;
        }

        return view('dashboard.monitoringEvaluasiTL.progressKT', [
            'title' => 'Monitoring Evaluasi TL',
            'kt' => $kt,
            'sudahDiisi' => $sudahDiisi,
            'belumDiisi' => $belumDiisi
        ]);
    }

    public function METLProgressDalnis()
    {
        $Dalnis = TimDalnisKt::distinct()->get(['dalnis_id']);
        $dalnis = [];
        foreach($Dalnis as $pengendaliTeknis){
            $dalnis[] = $pengendaliTeknis->pegawaiDalnis->namaPegawai;
        }

        $sudahDiisi = [];
        foreach($Dalnis as $pengendaliTeknis){
            $sudahDiisi[] = 50;
        }

        $belumDiisi = [];
        foreach($Dalnis as $pengendaliTeknis){
            $belumDiisi[] = 50;
        }
        
        return view('dashboard.monitoringEvaluasiTL.progressDalnis', [
            'title' => 'Monitoring Evaluasi TL',
            'dalnis' => $dalnis,
            'belumDiisi' => $belumDiisi,
            'sudahDiisi' => $sudahDiisi
        ]);
    }

    public function MTLUnitKerja()
    {
        $Satker = UnitKerja::all();
        $unitKerja = [];
        foreach($Satker as $satuanKerja){
            $unitKerja[] = $satuanKerja->namaUnitKerja;
        }

        $sudahDiisi = [];
        foreach($Satker as $satuanKerja){
            $sudahDiisi[] = 50;
        }

        $belumDiisi = [];
        foreach($Satker as $satuanKerja){
            $belumDiisi[] = 50;
        }

        return view('dashboard.monitoringTLUnitKerja', [
            'title' => 'Monitoring TL Unit Kerja',
            'unitKerja' => $unitKerja,
            'belumDiisi' => $belumDiisi,
            'sudahDiisi' => $sudahDiisi,
            'provinsis' => UnitKerja::where('role', 'BPS Provinsi')->orderBy('kodeWilayah')->get()
        ]);
    }

    public function MPanelisasi()
    {
        $Dalnis = TimDalnisKt::distinct()->get(['dalnis_id']);
        $dalnis = [];
        foreach($Dalnis as $pengendaliTeknis){
            $dalnis[] = $pengendaliTeknis->pegawaiDalnis->namaPegawai;
        }

        $sudahDiisi = [];
        foreach($Dalnis as $pengendaliTeknis){
            $sudahDiisi[] = 50;
        }

        $belumDiisi = [];
        foreach($Dalnis as $pengendaliTeknis){
            $belumDiisi[] = 50;
        }

        return view('dashboard.monitoringPanelisasi', [
            'title' => 'Monitoring Panelisasi',
            'dalnis' => $dalnis,
            'belumDiisi' => $belumDiisi,
            'sudahDiisi' => $sudahDiisi
        ]);
    }

    public function hasilDEdanMonevTL()
    {
        return view('dashboard.hasilDEdanMonevTL.index', [
            'title' => 'Hasil DE dan Monev TL',
            'provinsis' => UnitKerja::where('role', 'BPS Provinsi')->orderBy('kodeWilayah')->filter()->paginate(10)
        ]);
    }

    public function MLHE()
    {
        return view('dashboard.monitoringLHE', [
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
    
    public function seluruhNilaiPanelisasi()
    {
        return view('dashboard.seluruhNilaiPanelisasi.index', [
            'title' => 'Seluruh Nilai Panelisasi',
            'provinsis' => UnitKerja::where('role', 'BPS Provinsi')->orderBy('kodeWilayah')->filter()->paginate(10)
        ]);
    }

    public function panelisasi()
    {
        return view('dashboard.hasilPanelisasi', [
            'title' => 'Hasil Panelisasi',
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
