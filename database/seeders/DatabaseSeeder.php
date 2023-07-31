<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Kke;
use App\Models\User;
use App\Models\Pegawai;
use App\Models\Provinsi;
use App\Models\TujuanIku;
use App\Models\UnitKerja;
use App\Models\SasaranIku;
use App\Models\KomponenLke;
use App\Models\KriteriaKke;
use App\Models\KriteriaLke;
use App\Models\TimAtSatker;
use Illuminate\Support\Str;
use App\Models\ikuUnitKerja;
use App\Models\IndikatorIku;
use App\Models\SubKomponenLke;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // UnitKerja::create([
        //     'ikuUnitKerja_id' => '9999',
        //     'kodeWilayah' => '11',
        //     'kodeUnitKerja' => '1100',
        //     'wilayah' => 'III',
        //     'namaUnitKerja' => 'BPS Provinsi Aceh',
        //     'namaPIC' => fake()->name(),
        //     'noTelpPIC' => fake()->numerify('08##########'),
        //     'role' => 'BPS Provinsi'
        // ]);

        // UnitKerja::create([
        //     'ikuUnitKerja_id' => '9999',
        //     'kodeWilayah' => '11',
        //     'kodeUnitKerja' => '1101',
        //     'wilayah' => 'III',
        //     'namaUnitKerja' => 'BPS Kabupaten Simeulue',
        //     'namaPIC' => fake()->name(),
        //     'noTelpPIC' => fake()->numerify('08##########'),
        //     'role' => 'BPS Kab/Kota',
        //     'kodeSatkerProv' => '1100'
        // ]);

        // UnitKerja::create([
        //     'ikuUnitKerja_id' => '0026',
        //     'kodeWilayah' => '00',
        //     'kodeUnitKerja' => '0026',
        //     'wilayah' => 'III',
        //     'namaUnitKerja' => 'Pusat Pendidikan Pelatihan',
        //     'namaPIC' => fake()->name(),
        //     'noTelpPIC' => fake()->numerify('08##########'),
        //     'role' => 'Unit Kerja Pusat'
        // ]);

        // Pegawai::create([
        //     'nip' => fake()->numerify('##################'),
        //     'namaPegawai' => fake()->name(),
        //     'role' => 'Anggota Tim'
        // ]);

        // Pegawai::create([
        //     'nip' => fake()->numerify('##################'),
        //     'namaPegawai' => fake()->name(),
        //     'role' => 'Ketua Tim'
        // ]);

        // Pegawai::create([
        //     'nip' => fake()->numerify('##################'),
        //     'namaPegawai' => fake()->name(),
        //     'role' => 'Pengendali Teknis'
        // ]);

        // ikuUnitKerja::create([
        //     'id' => '9999',
        //     'namaUnitKerja' => 'BPS Seluruh Indonesia'
        // ]);

        // ikuUnitKerja::create([
        //     'id' => '0026',
        //     'namaUnitKerja' => 'Pusat Pendidikan Pelatihan'
        // ]);

        // User::create([
        //     'username' => '1100',
        //     'role' => 'BPS Provinsi',
        //     'password' => Str::password(8)
        // ]);

        // User::create([
        //     'username' => '1101',
        //     'role' => 'BPS Kab/Kota',
        //     'password' => Str::password(8),
        //     'kodeSatkerProv' => '1100'
        // ]);

        // User::create([
        //     'username' => '0026',
        //     'role' => 'Unit Kerja Pusat',
        //     'password' => Str::password(8)
        // ]);

        // User::create([
        //     'username' => '028385489018745346',
        //     'role' => 'Anggota Tim',
        //     'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        // ]);

        // User::create([
        //     'username' => '935373908486314841',
        //     'role' => 'Ketua Tim',
        //     'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        // ]);

        // User::create([
        //     'username' => '752924136230945772',
        //     'role' => 'Pengendali Teknis',
        //     'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        // ]);

        // User::create([
        //     'username' => '617085640457285607',
        //     'role' => 'Anggota Tim',
        //     'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        // ]);

        // User::create([
        //     'username' => '619724456188551412',
        //     'role' => 'Ketua Tim',
        //     'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        // ]);

        // User::create([
        //     'username' => '252175383442523537',
        //     'role' => 'Pengendali Teknis',
        //     'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        // ]);

        // User::create([
        //     'username' => '951588825257263068',
        //     'role' => 'Anggota Tim',
        //     'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        // ]);

        // User::create([
        //     'username' => '131053620214761436',
        //     'role' => 'Ketua Tim',
        //     'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        // ]);

        // User::create([
        //     'username' => '568014328431893031',
        //     'role' => 'Pengendali Teknis',
        //     'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        // ]);

        // User::create([
        //     'username' => '501377218291516924',
        //     'role' => 'Kepala Unit Kerja BPS Provinsi',
        //     'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        // ]);

        // Provinsi::create([
        //     'kodeWilayah' => '11',
        //     'provinsi' => 'Provinsi Aceh'
        // ]);
        
        // Kke::create([
        //     'kodeKKE' => 'A',
        //     'namaKKE' => 'Perencanaan Kinerja'
        // ]);

        // Kke::create([
        //     'kodeKKE' => 'C',
        //     'namaKKE' => 'Pelaporan Kinerja'
        // ]);

        // KriteriaKke::create([
        //     'kke_id' => '1',
        //     'kodeKriteriaKKE' => 'A1',
        //     'kriteria' => 'Rencana Strategis',
        //     'nilaiRatarataIKU' => 'None',
        //     'nilaiPerIKU' => '0-100',
        //     'tujuan' => '0',
        //     'sasaran' => '0',
        //     'indikator' => '1',
        //     'panduanEvaluator' => 'Diisi sesuai angka target tahunan dalam Renstra'
        // ]);

        // KriteriaKke::create([
        //     'kke_id' => '1',
        //     'kodeKriteriaKKE' => 'A2',
        //     'kriteria' => 'Renstra menyajikan IKU',
        //     'nilaiRatarataIKU' => 'ABCDE',
        //     'nilaiPerIKU' => 'Y/T',
        //     'tujuan' => '1',
        //     'sasaran' => '1',
        //     'indikator' => '1',
        //     'panduanEvaluator' => 'Diisi "1" jika tujuan/sasaran/indikator = IKU'
        // ]);
        
        // KriteriaKke::create([
        //     'kke_id' => '1',
        //     'kodeKriteriaKKE' => 'A3',
        //     'kriteria' => 'Renstra digunakan sebagai acuan penyusunan dokumen rencana kinerja tahunan',
        //     'nilaiRatarataIKU' => 'Y/T',
        //     'nilaiPerIKU' => 'Y/T',
        //     'tujuan' => '0',
        //     'sasaran' => '0',
        //     'indikator' => '1',
        //     'panduanEvaluator' => 'Diisi "1" jika tujuan/sasaran/indikator dalam notulen pembahasan PK, mempertimbangkan target Renstra tahun 2022'
        // ]);
        
        // KomponenLke::create([
        //     'kodeKomponen' => 'A',
        //     'namaKomponen' => 'Perencanaan Kinerja',
        //     'persentaseNilai' => '30'
        // ]);

        // KomponenLke::create([
        //     'kodeKomponen' => 'B',
        //     'namaKomponen' => 'Pengukuran Kinerja',
        //     'persentaseNilai' => '25'
        // ]);

        // KomponenLke::create([
        //     'kodeKomponen' => 'C',
        //     'namaKomponen' => 'Pelaporan Kinerja',
        //     'persentaseNilai' => '15'
        // ]);

        // SubKomponenLke::create([
        //     'komponenLke_id' => '1',
        //     'kodeSubKomponen' => 'A.I',
        //     'namaSubKomponen' => 'Pemenuhan Perencanaan Strategis',
        //     'persentaseNilaiSub' => '20',
        //     'bobotPerKriteria' => 'Sama'
        // ]);

        // SubKomponenLke::create([
        //     'komponenLke_id' => '1',
        //     'kodeSubKomponen' => 'A.II',
        //     'namaSubKomponen' => 'Kualitas Renstra',
        //     'persentaseNilaiSub' => '5',
        //     'bobotPerKriteria' => 'Berbeda'
        // ]);

        // SubKomponenLke::create([
        //     'komponenLke_id' => '1',
        //     'kodeSubKomponen' => 'A.III',
        //     'namaSubKomponen' => 'Implementasi Renstra',
        //     'persentaseNilaiSub' => '3',
        //     'bobotPerKriteria' => 'Sama'
        // ]);
        
        // SubKomponenLke::create([
        //     'komponenLke_id' => '2',
        //     'kodeSubKomponen' => 'B.I',
        //     'namaSubKomponen' => 'Pemenuhan Pengukuran',
        //     'persentaseNilaiSub' => '5',
        //     'bobotPerKriteria' => 'Berbeda'
        // ]);

        // SubKomponenLke::create([
        //     'komponenLke_id' => '2',
        //     'kodeSubKomponen' => 'B.II',
        //     'namaSubKomponen' => 'Kualitas Pengukuran',
        //     'persentaseNilaiSub' => '12.5',
        //     'bobotPerKriteria' => 'Sama'
        // ]);

        // SubKomponenLke::create([
        //     'komponenLke_id' => '2',
        //     'kodeSubKomponen' => 'B.III',
        //     'namaSubKomponen' => 'Implementasi Pengukuran',
        //     'persentaseNilaiSub' => '7.5',
        //     'bobotPerKriteria' => 'Berbeda'
        // ]);
        
        // KriteriaLke::create([
        //     'subKomponenLke_id' => '1',
        //     'kodeKriteriaLKE' => 'A.I.1',
        //     'namaKriteria' => 'Rencana Strategis telah disusun',
        //     'bobotKriteria' => '1',
        //     'panduanEvaluator' => 'Renstra Reviu 2020 - 2024 yang telah ditandatangani oleh Eselon I/Eselon II

        //     Teknik Penilaian:
        //     Cek apakah dokumen Renstra Reviu telah ada dan telah ditandatangani oleh Eselon I/Eselon II?
            
        //     Kriteria Penilaian :
        //     "Y" apabila dokumen Renstra Reviu telah ada dan telah ditandatangani oleh Eselon I/Eselon II ; atau
            
        //     "T" apabila tidak ada dokumen Renstra Reviu; atau
        //     "T" apabila ada dokumen Renstra Reviu tetapi tidak ditandatangani oleh Eselon I/Eselon II',
        //     'jenisPenilaian' => 'Default',
        //     'defaultNilai' => 'Y',
        //     'defaultCatatan' => 'Rencana Strategis Reviu telah ditandatangani oleh Eselon I/Eselon II',
        // ]);

        // KriteriaLke::create([
        //     'subKomponenLke_id' => '1',
        //     'kodeKriteriaLKE' => 'A.I.2',
        //     'namaKriteria' => 'Renstra telah memuat tujuan',
        //     'bobotKriteria' => '1',
        //     'panduanEvaluator' => 'Renstra Reviu 2020 - 2024 yang telah memuat tujuan

        //     Teknik Penilaian:
        //     Telaah apakah dokumen Renstra Reviu telah menyajikan tujuan?
            
        //     Kriteria Penilaian :
        //     "Y" apabila Renstra Reviu telah menyajikan tujuan;
            
        //     "T" apabila Renstra Reviu telah ada namun tidak menyajikan tujuan atau
        //     "T" apabila poin A.I.a.1 (Renstra Reviu telah disusun) bernilai "T".',
        //     'jenisPenilaian' => 'Default',
        //     'defaultNilai' => 'Y',
        //     'defaultCatatan' => 'Rencana Strategis Reviu telah memuat tujuan',
        // ]);

        // KriteriaLke::create([
        //     'subKomponenLke_id' => '1',
        //     'kodeKriteriaLKE' => 'A.I.3',
        //     'namaKriteria' => 'Tujuan yang ditetapkan telah dilengkapi dengan ukuran keberhasilan (indikator)',
        //     'bobotKriteria' => '1',
        //     'panduanEvaluator' => 'Renstra Reviu 2020 - 2024 yang telah memuat tujuan yang dilengkapi dengan ukuran keberhasilan (indikator kinerja tujuan)

        //     Teknik Penilaian:
        //     1. Telaah dokumen Renstra Reviu, apakah tujuan telah dilengkapi dengan ukuran keberhasilan (indikator kinerja tujuan)?
        //     2. Hitung berapa persentase tujuan yang dilengkapi dengan indikator kinerja tujuan?
            
        //     Penjelasan:
        //     Ukuran keberhasilan tujuan adalah ukuran atau parameter terukur yang merepresentasikan tercapai/terwujud atau tidaknya tujuan yang ditetapkan (indikator kinerja tujuan)
            
        //     Kriteria Penilaian :
        //     "A" apabila seluruh tujuan telah dilengkapi dengan ukuran keberhasilan (indikator kinerja tujuan) (100%);
        //     "B" apabila > 90% tujuan telah dilengkapi dengan ukuran keberhasilan (indikator kinerja tujuan);
        //     "C" apabila 75% < tujuan yang telah dilengkapi dengan ukuran keberhasilan (indikator kinerja tujuan) ≤ 90%;
        //     "D" apabila 20% < tujuan yang telah dilengkapi dengan ukuran keberhasilan (indikator kinerja tujuan) ≤ 75% atau Renstra mengacu pada IKU BPS (IKU untuk Kepala BPS)
        //     "E" apabila apabila tujuan yang telah dilengkapi dengan ukuran keberhasilan (indikator kinerja tujuan) ≤ 20% dan/atau apabila poin A.I.a.1 - A..1.a.2 bernilai “T” (dokumen Renstra Reviu atau tujuan Renstra Reviu tidak ada).',
        //     'jenisPenilaian' => 'Default',
        //     'defaultNilai' => 'B',
        //     'defaultCatatan' => 'Rencana Strategis Reviu telah dilengkapi dengan ukuran keberhasilan',
        // ]);

        // TujuanIku::create([
        //     'ikuUnitKerja_id' => '0026',
        //     'kodeTujuan' => 'T1',
        //     'tujuan' => 'Meningkatkan layanan pendidikan dan pelatihan yang adaptif'
        // ]);

        // TujuanIku::create([
        //     'ikuUnitKerja_id' => '0026',
        //     'kodeTujuan' => 'T2',
        //     'tujuan' => 'Meningkatkan kompetensi SDM'
        // ]);

        // SasaranIku::create([
        //     'ikuUnitKerja_id' => '0026',
        //     'tujuanIku_id' => '1',
        //     'kodeSasaran' => 'S11',
        //     'sasaran' => 'Terwujudnya layanan pendidikan dan pelatihan yang sesuai dengan perkembangan ilmu pengetahuan, teknologi informasi mutakhir, dan aturan yang berlaku'
        // ]);
        
        // SasaranIku::create([
        //     'ikuUnitKerja_id' => '0026',
        //     'tujuanIku_id' => '1',
        //     'kodeSasaran' => 'S12',
        //     'sasaran' => 'Terwujudnya layanan pendidikan dan pelatihan Statistik Sektoral dalam kerangka Satu Data Indonesia'
        // ]);

        // SasaranIku::create([
        //     'ikuUnitKerja_id' => '0026',
        //     'tujuanIku_id' => '2',
        //     'kodeSasaran' => 'S21',
        //     'sasaran' => 'Terwujudnya SDM Pusdiklat BPS yang melakukan peningkatan kompetensi'
        // ]);

        // IndikatorIku::create([
        //     'ikuUnitKerja_id' => '0026',
        //     'sasaranIku_id' => '1',
        //     'kodeIndikator' => 'I111',
        //     'indikator' => 'Persentase kepuasan peserta diklat terhadap penyelenggaraan diklat'
        // ]);

        // IndikatorIku::create([
        //     'ikuUnitKerja_id' => '0026',
        //     'sasaranIku_id' => '2',
        //     'kodeIndikator' => 'I121',
        //     'indikator' => 'Persentase peserta yang telah menyelesaikan pelatihan Statistik Sektoral'
        // ]);

        // IndikatorIku::create([
        //     'ikuUnitKerja_id' => '0026',
        //     'sasaranIku_id' => '3',
        //     'kodeIndikator' => 'I211',
        //     'indikator' => 'Persentase SDM Pusdiklat yang melakukan peningkatan kompetensi'
        // ]);
    }
}
