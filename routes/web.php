<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KKEController;
use App\Http\Controllers\LHEController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SuratController;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\BukuLHEController;
use App\Http\Controllers\HasilDEController;
use App\Http\Controllers\MonevTLController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\DatabaseController;
use App\Http\Controllers\DaftarTimController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DokumenTLController;
use App\Http\Controllers\PelatihanController;
use App\Http\Controllers\PeraturanController;
use App\Http\Controllers\PermindokController;
use App\Http\Controllers\TujuanIkuController;
use App\Http\Controllers\UnitKerjaController;
use App\Http\Controllers\KriteriaTLController;
use App\Http\Controllers\PanelisasiController;
use App\Http\Controllers\RepositoryController;
use App\Http\Controllers\SasaranIkuController;
use App\Http\Controllers\EvaluasiKKEController;
use App\Http\Controllers\EvaluasiLKEController;
use App\Http\Controllers\KomponenLKEController;
use App\Http\Controllers\KriteriaKKEController;
use App\Http\Controllers\KriteriaLKEController;
use App\Http\Controllers\TimATSatkerController;
use App\Http\Controllers\TimDalnisKTController;
use App\Http\Controllers\ikuUnitKerjaController;
use App\Http\Controllers\IndikatorIkuController;
use App\Http\Controllers\TindakLanjutController;
use App\Http\Controllers\EvaluasiLKETLController;
use App\Http\Controllers\RoleUnitKerjaController;
use App\Http\Controllers\SubKomponenLKEController;
use App\Http\Controllers\TemplateDokumenController;
use App\Http\Controllers\PermindokPenilaiController;
use App\Http\Controllers\EvaluasiPanelisasiController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Login
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::group(['middleware' => ['auth','role:BPS Provinsi,BPS Kab/Kota,Unit Kerja Pusat']], function() {
    //Permindok Unit Kerja
    Route::get('/permindokUnitKerja', [RoleUnitKerjaController::class, 'permindok']);
    Route::post('/permindokUnitKerja/editLink', [RoleUnitKerjaController::class, 'editLink']);
    Route::post('/permindokUnitKerja/editUpload', [RoleUnitKerjaController::class, 'editUpload']);
    
    //Tindak Lanjut Unit Kerja
    Route::resource('/tindakLanjut', TindakLanjutController::class);
    
    //LHE Unit Kerja
    Route::get('/LHESatker', [RoleUnitKerjaController::class, 'LHE']);
    
    //Profil
    Route::get('/profil', [RoleUnitKerjaController::class, 'profil']);
});

Route::group(['middleware' => ['auth']], function() {
    //Dashboard
    Route::get('/', [DashboardController::class, 'index']);
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::get('/dashboard/monitoringTLUnitKerja', [DashboardController::class, 'MTLUnitKerja']);
    Route::get('/dashboard/hasilDEdanMonevTL', [DashboardController::class, 'hasilDEdanMonevTL']);
    Route::resource('/dashboard/hasilDEdanMonevTL/hasilDE', HasilDEController::class)->except(['index','create','store','edit','update','destroy']);
    Route::resource('/dashboard/hasilDEdanMonevTL/monevTL', MonevTLController::class)->except(['index','create','store','edit','update','destroy']);
});

Route::group(['middleware' => ['auth', 'role:BPS Provinsi,BPS Kab/Kota,Unit Kerja Pusat,
Kepala Unit Kerja BPS Provinsi,Kepala Unit Kerja BPS Kab/Kota,Anggota Tim,Ketua Tim,Pengendali Teknis,Inspektur']], function() {
    //Repository selain Koordinator
    Route::get('/lihatRepository', [RepositoryController::class, 'bukuLHE']);
    Route::get('/lihatRepository/bukuLHE', [RepositoryController::class, 'bukuLHE']);
    Route::get('/lihatRepository/peraturan', [RepositoryController::class, 'peraturan']);
});

Route::group(['middleware' => ['auth','role:Anggota Tim']], function() {
    //KKE
    Route::resource('/evaluasiKKE', EvaluasiKKEController::class)->except(['create','store','edit','update','destroy']);
});

Route::group(['middleware' => ['auth','role:Ketua Tim,Pengendali Teknis']], function() {
    //LHE
    Route::get('/lhe/kirimLHE', [LHEController::class, 'kirim']);
    Route::post('/lhe/uploadLHE', [LHEController::class, 'upload']);

    //Panelisasi
    Route::resource('/evaluasiPanelisasi', EvaluasiPanelisasiController::class);
});

Route::group(['middleware' => ['auth','role:Pengendali Teknis']], function() {
    //LHE
    Route::get('/lhe/generateLHE', [LHEController::class, 'generate']);
});

Route::group(['middleware' => ['auth','role:Anggota Tim,Ketua Tim,Pengendali Teknis']], function() {
    //Permindok
    Route::resource('/permindokPenilai', PermindokPenilaiController::class)->except(['create','store','edit','update','destroy']);
    
    //LKE
    Route::resource('/evaluasiLKE', EvaluasiLKEController::class);
    Route::get('/evaluasiLKE/{id}', [KomponenLKEController::class, 'show'])->name('UnitKerja');

    //LKE TL
    Route::resource('/evaluasi_LKETL', EvaluasiLKETLController::class);

    //LHE
    Route::get('/lhe', [LHEController::class, 'feedback']);
    Route::get('/lhe/feedbackLHE', [LHEController::class, 'feedback']);
});

Route::group(['middleware' => ['auth','role:Anggota Tim,Ketua Tim,Pengendali Teknis,Koordinator']], function() {
    //LKE
    Route::resource('/komponenLKE', KomponenLKEController::class);
    Route::get('/komponenLKE/{kodeKomponen}/edit', [KomponenLKEController::class, 'edit'])->name('KomponenLKE');
    Route::resource('/komponenLKE/subKomponenLKE', SubKomponenLKEController::class);
    Route::get('/komponenLKE/subKomponenLKE/{kodeSubKomponen}/edit', [SubKomponenLKEController::class, 'edit'])->name('SubKomponenLKE');
    Route::resource('/komponenLKE/subKomponenLKE/kriteriaLKE', KriteriaLKEController::class);

    //KKE
    Route::resource('/kke', KKEController::class);
    Route::resource('/kke/kriteriaKKE', KriteriaKKEController::class);
    Route::get('/kke/{kodeKKE}/edit', [KKEController::class, 'edit'])->name('KKE');
});

Route::group(['middleware' => ['auth','role:Koordinator,Anggota Tim,Ketua Tim,Pengendali Teknis,Inspektur']], function() {
    //Dashboard
    Route::get('/dashboard/monitoringEvaluasi/progressAT', [DashboardController::class, 'MEProgressAT']);
    Route::get('/dashboard/monitoringEvaluasi/progressKT', [DashboardController::class, 'MEProgressKT']);
    Route::get('/dashboard/monitoringEvaluasi/progressDalnis', [DashboardController::class, 'MEProgressDalnis']);
    Route::get('/dashboard/monitoringEvaluasiTL/progressAT', [DashboardController::class, 'METLProgressAT']);
    Route::get('/dashboard/monitoringEvaluasiTL/progressKT', [DashboardController::class, 'METLProgressKT']);
    Route::get('/dashboard/monitoringEvaluasiTL/progressDalnis', [DashboardController::class, 'METLProgressDalnis']);
    Route::get('/dashboard/monitoringPanelisasi', [DashboardController::class, 'MPanelisasi']);
    Route::get('/dashboard/monitoringLHE', [DashboardController::class, 'MLHE']);
});

Route::group(['middleware' => ['auth','role:Koordinator,Ketua Tim,Pengendali Teknis,Inspektur']], function() {
    //Dashboard
    Route::get('/dashboard/seluruhNilaiPanelisasi', [DashboardController::class, 'seluruhNilaiPanelisasi']);
    Route::resource('/dashboard/seluruhNilaiPanelisasi/panelisasi', PanelisasiController::class)->except(['index','create','store','edit','update','destroy']);
    Route::get('/dashboard/hasilPanelisasi', [DashboardController::class, 'panelisasi']);
});

Route::group(['middleware' => ['auth','role:Koordinator']], function() {
    //Pengaturan User
    Route::resource('/unitKerja', UnitKerjaController::class);
    Route::resource('/pegawai', PegawaiController::class);
    
    //Pengaturan IKU
    Route::resource('/ikuUnitKerja', ikuUnitKerjaController::class);
    Route::get('/ikuUnitKerja/{namaUnitKerja}', [ikuUnitKerjaController::class, 'show'])->name('ikuUnitKerja');
    Route::resource('/ikuUnitKerja/tujuanIku', TujuanIkuController::class);
    Route::resource('/ikuUnitKerja/sasaranIku', SasaranIkuController::class);
    Route::resource('/ikuUnitKerja/indikatorIku', IndikatorIkuController::class);
    
    //Pengaturan KKE
    Route::post('/kke/kriteriaKKE/deleteAll', [KriteriaKKEController::class, 'deleteAll']);
    Route::post('/kke/kriteriaKKE/import', [KriteriaKKEController::class, 'import']);
    Route::post('/kke/kriteriaKKE/downloadTemplate', [KriteriaKKEController::class, 'downloadTemplate']);
    
    //Pengaturan LKE
    Route::post('/komponenLKE/subKomponenLKE/nilaiAngka', [SubKomponenLKEController::class, 'nilaiAngka']);
    Route::post('/komponenLKE/subKomponenLKE/hasilShow', [SubKomponenLKEController::class, 'hasilShow']);
    Route::post('/komponenLKE/subKomponenLKE/kriteriaLKE/deleteAll', [KriteriaLKEController::class, 'deleteAll']);
    Route::post('/komponenLKE/subKomponenLKE/kriteriaLKE/import', [KriteriaLKEController::class, 'import']);
    Route::post('/komponenLKE/subKomponenLKE/kriteriaLKE/downloadTemplate', [KriteriaLKEController::class, 'downloadTemplate']);
    
    //Pembagian Tim
    Route::resource('/timDalnisKT', TimDalnisKTController::class);
    Route::resource('/timDalnisKT/timATSatker', TimATSatkerController::class);
    Route::get('/timDalnisKT/{id}/edit', [TimDalnisKTController::class, 'edit'])->name('TimDalnisKT');
    Route::get('/daftarTim', [DaftarTimController::class, 'index']);
    
    //Tindak Lanjut
    Route::resource('/dokumenTL', DokumenTLController::class);
    Route::resource('/dokumenTL/kriteriaTL', KriteriaTLController::class);
    Route::get('/dokumenTL/{id}/edit', [DokumenTLController::class, 'edit'])->name('DokumenTL');
    
    //Permindok
    Route::resource('/permindok', PermindokController::class);
    
    //Repository
    //Route::resource('/repository', BukuLHEController::class);
    Route::resource('/repository/bukuLHE', BukuLHEController::class);
    Route::resource('/repository/peraturan', PeraturanController::class);
    Route::resource('/repository/surat', SuratController::class);
    Route::resource('/repository/pelatihan', PelatihanController::class);
    Route::resource('/repository/materi', MateriController::class);
    Route::resource('/repository/templateDokumen', TemplateDokumenController::class);
    
    //Database
    Route::get('/database', [DatabaseController::class, 'index']);
});