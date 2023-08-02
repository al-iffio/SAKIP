-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Agu 2023 pada 04.32
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `evaluasi_akip`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku_lhes`
--

CREATE TABLE `buku_lhes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bukuLHE` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `buku_lhes`
--

INSERT IGNORE INTO `buku_lhes` (`id`, `bukuLHE`, `link`, `created_at`, `updated_at`) VALUES
(1, 'Provinsi 2023', 'https://drive.google.com/file/d/1wymjP_cvRs5-68FRRJSodsDbci5hyoYj/preview', '2023-06-17 02:53:46', '2023-06-19 20:52:18'),
(3, 'Kabupaten/Kota 2022', 'https://drive.google.com/file/d/14Xd-lLurYNginn5bH0-s4sq87jDrJgsC/preview', '2023-06-19 20:39:39', '2023-06-19 20:39:39'),
(4, 'Provinsi 2021', 'https://drive.google.com/file/d/1UYftS61sMuOYy1jxJgFqJccEaNBvRqgi/preview', '2023-06-19 20:39:39', '2023-06-19 20:39:39'),
(6, 'Kabupaten/Kota 2020', 'https://drive.google.com/file/d/1tMDBwozkFCKjnw8pSsxNpF-NozpQfOW-/preview', '2023-07-27 20:40:15', '2023-07-27 20:46:53');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dokumen_tls`
--

CREATE TABLE `dokumen_tls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `dokumenTL` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `dokumen_tls`
--

INSERT IGNORE INTO `dokumen_tls` (`id`, `dokumenTL`, `created_at`, `updated_at`) VALUES
(1, 'Dokumen penetapan target renstra', '2023-06-12 19:20:39', '2023-06-15 11:20:54'),
(3, 'Dokumentasi rapat reviu renstra', '2023-06-18 04:26:14', '2023-06-18 04:26:14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `iku_unit_kerjas`
--

CREATE TABLE `iku_unit_kerjas` (
  `id` varchar(4) NOT NULL,
  `namaUnitKerja` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `iku_unit_kerjas`
--

INSERT IGNORE INTO `iku_unit_kerjas` (`id`, `namaUnitKerja`, `created_at`, `updated_at`) VALUES
('0026', 'Pusat Pendidikan Pelatihan', '2023-06-12 09:46:15', '2023-06-12 09:46:15'),
('9999', 'BPS Seluruh Indonesia', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `indikator_ikus`
--

CREATE TABLE `indikator_ikus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ikuUnitKerja_id` bigint(20) UNSIGNED NOT NULL,
  `sasaranIku_id` bigint(20) UNSIGNED NOT NULL,
  `kodeIndikator` char(4) NOT NULL,
  `indikator` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `indikator_ikus`
--

INSERT IGNORE INTO `indikator_ikus` (`id`, `ikuUnitKerja_id`, `sasaranIku_id`, `kodeIndikator`, `indikator`, `created_at`, `updated_at`) VALUES
(1, 26, 1, 'I111', 'Persentase kepuasan peserta diklat terhadap penyelenggaraan diklat', '2023-06-12 09:46:15', '2023-06-12 09:46:15'),
(2, 26, 2, 'I121', 'Persentase peserta yang telah menyelesaikan pelatihan Statistik Sektoral', '2023-06-12 09:46:15', '2023-06-12 09:46:15'),
(3, 26, 3, 'I211', 'Persentase SDM Pusdiklat yang melakukan peningkatan kompetensi', '2023-06-12 09:46:15', '2023-06-12 09:46:15'),
(4, 9999, 4, 'I111', 'Indikator 1 blackbox', '2023-07-26 20:24:47', '2023-07-26 20:24:47');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kkes`
--

CREATE TABLE `kkes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kodeKKE` char(1) NOT NULL,
  `namaKKE` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kkes`
--

INSERT IGNORE INTO `kkes` (`id`, `kodeKKE`, `namaKKE`, `created_at`, `updated_at`) VALUES
(1, 'A', 'Perencanaan Kinerja', '2023-06-12 09:46:15', '2023-06-14 02:00:27'),
(2, 'C', 'Pelaporan Kinerja', '2023-06-12 09:46:15', '2023-06-12 09:46:15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `komponen_lkes`
--

CREATE TABLE `komponen_lkes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kodeKomponen` char(1) NOT NULL,
  `namaKomponen` varchar(255) NOT NULL,
  `persentaseNilai` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `komponen_lkes`
--

INSERT IGNORE INTO `komponen_lkes` (`id`, `kodeKomponen`, `namaKomponen`, `persentaseNilai`, `created_at`, `updated_at`) VALUES
(1, 'A', 'Perencanaan Kinerja', 30, '2023-06-12 09:46:15', '2023-06-12 09:46:15'),
(2, 'B', 'Pengukuran Kinerja', 25, '2023-06-12 09:46:15', '2023-06-12 09:46:15'),
(3, 'C', 'Pelaporan Kinerja', 15, '2023-06-12 09:46:15', '2023-06-12 09:46:15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kriteria_kkes`
--

CREATE TABLE `kriteria_kkes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kke_id` bigint(20) UNSIGNED NOT NULL,
  `kodeKriteriaKKE` char(2) NOT NULL,
  `kriteria` varchar(255) NOT NULL,
  `nilaiRatarataIKU` varchar(255) NOT NULL,
  `nilaiPerIKU` varchar(255) NOT NULL,
  `tujuan` tinyint(1) NOT NULL,
  `sasaran` tinyint(1) NOT NULL,
  `indikator` tinyint(1) NOT NULL,
  `panduanEvaluator` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kriteria_kkes`
--

INSERT IGNORE INTO `kriteria_kkes` (`id`, `kke_id`, `kodeKriteriaKKE`, `kriteria`, `nilaiRatarataIKU`, `nilaiPerIKU`, `tujuan`, `sasaran`, `indikator`, `panduanEvaluator`, `created_at`, `updated_at`) VALUES
(1, 1, 'A1', 'Rencana Strategis', 'None', '0-100', 0, 0, 1, 'Diisi sesuai angka target tahunan dalam Renstra', '2023-06-12 09:46:15', '2023-06-12 09:46:15'),
(2, 1, 'A2', 'Renstra menyajikan IKU', 'ABCDE', 'Y/T', 1, 1, 1, 'Diisi \"1\" jika tujuan/sasaran/indikator = IKU', '2023-06-12 09:46:15', '2023-06-12 09:46:15'),
(3, 1, 'A3', 'Renstra digunakan sebagai acuan penyusunan dokumen rencana kinerja tahunan', 'Y/T', 'Y/T', 0, 0, 1, 'Diisi \"1\" jika tujuan/sasaran/indikator dalam notulen pembahasan PK, mempertimbangkan target Renstra tahun 2022', '2023-06-12 09:46:15', '2023-06-12 09:46:15'),
(6, 2, 'C1', 'Laporan Kinerja menyajikan evaluasi dan analisis mengenai capaian kinerja', 'ABCDE', 'Y/T', 0, 0, 1, 'Diisi Y jika kriteria X1 dan X2 bernilai Y, jika salah satu atau kedua kriteria tersebut bernilai T, maka diisi Y', '2023-07-29 03:57:22', '2023-07-29 03:57:22'),
(16, 1, 'X1', 'Rencana Strategis 2020', 'None', '0-100', 0, 0, 1, 'Diisi sesuai angka target tahunan dalam Renstra', '2023-07-30 19:53:48', '2023-07-30 19:53:48'),
(17, 1, 'X2', 'Rencana Strategis Menyajikan IKU', 'ABCDE', 'Y/T', 1, 1, 1, 'Diisi \"Ya\" jika tujuan/sasaran/indikator =  IKU', '2023-07-30 19:53:48', '2023-07-30 19:53:48');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kriteria_lkes`
--

CREATE TABLE `kriteria_lkes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subKomponenLke_id` bigint(20) UNSIGNED NOT NULL,
  `kodeKriteriaLKE` char(255) NOT NULL,
  `namaKriteria` varchar(255) NOT NULL,
  `bobotKriteria` double NOT NULL,
  `panduanEvaluator` text NOT NULL,
  `jenisPenilaian` varchar(255) NOT NULL,
  `defaultNilai` char(1) DEFAULT NULL,
  `defaultCatatan` text DEFAULT NULL,
  `pilihanNilai` varchar(255) DEFAULT NULL,
  `catatanPerNilai` tinyint(1) DEFAULT NULL,
  `catatanA` text DEFAULT NULL,
  `catatanB` text DEFAULT NULL,
  `catatanC` text DEFAULT NULL,
  `catatanD` text DEFAULT NULL,
  `catatanE` text DEFAULT NULL,
  `catatanY` text DEFAULT NULL,
  `catatanT` text DEFAULT NULL,
  `templateCatatan` text DEFAULT NULL,
  `kriteriaKKE_id` bigint(20) UNSIGNED DEFAULT NULL,
  `templateCatatanKKE` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kriteria_lkes`
--

INSERT IGNORE INTO `kriteria_lkes` (`id`, `subKomponenLke_id`, `kodeKriteriaLKE`, `namaKriteria`, `bobotKriteria`, `panduanEvaluator`, `jenisPenilaian`, `defaultNilai`, `defaultCatatan`, `pilihanNilai`, `catatanPerNilai`, `catatanA`, `catatanB`, `catatanC`, `catatanD`, `catatanE`, `catatanY`, `catatanT`, `templateCatatan`, `kriteriaKKE_id`, `templateCatatanKKE`, `created_at`, `updated_at`) VALUES
(1, 1, 'A.I.1', 'Rencana Strategis telah disusun', 10, 'Renstra Reviu 2020 - 2024 yang telah ditandatangani oleh Eselon I/Eselon II\n\n            Teknik Penilaian:\n            Cek apakah dokumen Renstra Reviu telah ada dan telah ditandatangani oleh Eselon I/Eselon II?\n            \n            Kriteria Penilaian :\n            \"Y\" apabila dokumen Renstra Reviu telah ada dan telah ditandatangani oleh Eselon I/Eselon II ; atau\n            \n            \"T\" apabila tidak ada dokumen Renstra Reviu; atau\n            \"T\" apabila ada dokumen Renstra Reviu tetapi tidak ditandatangani oleh Eselon I/Eselon II', 'Default', 'Y', 'Rencana Strategis Reviu telah ditandatangani oleh Eselon I/Eselon II', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-06-12 09:46:15', '2023-08-01 00:12:11'),
(2, 1, 'A.I.2', 'Renstra telah memuat tujuan', 10, 'Renstra Reviu 2020 - 2024 yang telah memuat tujuan\n\n            Teknik Penilaian:\n            Telaah apakah dokumen Renstra Reviu telah menyajikan tujuan?\n            \n            Kriteria Penilaian :\n            \"Y\" apabila Renstra Reviu telah menyajikan tujuan;\n            \n            \"T\" apabila Renstra Reviu telah ada namun tidak menyajikan tujuan atau\n            \"T\" apabila poin A.I.a.1 (Renstra Reviu telah disusun) bernilai \"T\".', 'Default', 'Y', 'Rencana Strategis Reviu telah memuat tujuan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-06-12 09:46:15', '2023-08-01 00:12:11'),
(134, 3, 'A.III.1', 'Telah terdapat indikator kinerja utama (IKU) sebagai ukuran kinerja secara formal ', 0.6, 'Perka IKU (Terupdate)\n\nTelaah apakah dokumen IKU BPS Provinsi/ Kabupaten/Kota merupakan IKU dengan Perka terbaru yang diformalkan?\n\nKriteria Penilaian :\n\"Y\" apabila BPS Provinsi atau BPS Kabupaten/Kota telah memiliki IKU dengan Perka terbaru yang diformalkan;\n\"T\" apabila BPS Provinsi atau BPS Kabupaten/Kota tidak memiliki IKU dengan Perka terbaru yang diformalkan.', 'Default', 'Y', 'Satuan kerja telah menggunakan Perka BPS Nomor 3 Tahun 2022 tentang Perubahan atas Peraturan Kepala Badan Pusat Statistik Nomor 38 Tahun 2020 tentang Indikator Kinerja Utama di Lingkungan Badan Pusat Statistik Tahun 2020-2024 (terbaru)', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-30 19:50:40', '2023-07-30 19:50:41'),
(135, 3, 'A.III.2', 'Telah terdapat ukuran kinerja tingkat eselon III dan IV sebagai turunan kinerja atasannya', 0.6, 'PK KF dan SKF\n\nTelaah apakah terdapat dokumen Perjanjian Kinerja KF dan SKF\n\nKriteria Penilaian :\n\"A\" apabila lebih dari 90% KF dan SKF telah memiliki ukuran kinerja yang terukur;\n\"B\" apabila 75% < KF dan SKF yang memiliki ukuran kinerja yang terukur ≤ 90%;\n\"C\" apabila 40% < KF dan SKF yang memiliki ukuran kinerja yang terukur ≤ 75%;\n\"D\" apabila 10% < KF dan SKF yang memiliki ukuran kinerja yang terukur ≤ 40%\n\"E\" apabila KF dan SKF yang memiliki ukuran kinerja yang terukur ≤ 10%', 'Manual', NULL, NULL, 'ABCDE', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'a. PK tahun 2022 telah/belum disusun sesuai dengan Perka No. 3 tahun 2022\nb. PK tahun 2022 telah/belum disusun secara lengkap (PK Kepala dan PK Kabag Umum (untuk BPS Provinsi) atau PK Kepala dan PK Kasubbag Umum (Untuk BPS Kab/Kota)) pada website pada menu PPID dipublikasikan melalui website pada direktori PPID --> Informasi Terbuka Berkala --> Program dan Kegiatan\n\nSatuan kerja telah/belum menyusun PK tahun 2022 (jika poin a dan/atau b belum, maka \"belum\") ', NULL, NULL, '2023-07-30 19:50:40', '2023-07-30 19:50:41'),
(136, 3, 'A.III.3', 'Indikator Kinerja Utama telah dipublikasikan', 0.6, 'Akses website yang menunjukkan telah mengupload Perka IKU (Terupdate)\n\nCek apakah Perka IKU terbaru telah di-upload ke dalam website BPS Provinsi/Kabupaten/Kota?\"\n\nKriteria Penilaian :\n\"Y\" apabila Perka IKU terbaru telah diupload dalam website BPS Provinsi/Kabupaten/Kota\n\"T\"apabila Perka IKU terbaru tidak diupload dalam website BPS Provinsi/Kabupaten/Kota dan/atau nilai B.I.1 bernilai “T” (dokumen IKU tidak ada).', 'Manual', NULL, NULL, 'Y/T', NULL, NULL, NULL, NULL, NULL, NULL, 'Indikator Kinerja Utama telah dipubilkasikan secara lengkap pada website pada menu PPID dipublikasikan melalui website pada direktori PPID --> Informasi Terbuka Berkala --> Program dan Kegiatan ', 'Indikator Kinerja Utama belum dipubilkasikan secara lengkap pada website pada menu PPID dipublikasikan melalui website pada direktori PPID --> Informasi Terbuka Berkala --> Program dan Kegiatan ', NULL, NULL, NULL, '2023-07-30 19:50:40', '2023-07-30 19:50:41'),
(137, 3, 'A.III.4', 'Informasi yang disajikan telah digunakan untuk penilaian kinerja ', 0.6, 'LAKIN 2021 (Bab III Akuntabilitas Kinerja yang menunjukkan ada evaluasi dan analisis data kinerja)\n\nDimana analisis dan evaluasi sesuai/selaras dengan notulensi rapat kinerja triwulan IV FRA\n\nDokumen yang dilengkapi : undangan, daftar hadir, notulen kegiatan rapat triwulanan sebelum FRA dikirimkan\n\nTelaah kertas kerja penilaian pegawai dan/atau penetapan reward and punishment apakah informasi kinerja yang disajikan dalam Laporan Kinerja telah digunakan untuk menilai dan menyimpulkan kinerja serta dijadikan dasar reward dan punishment pegawai\n\n\nTelah digunakan untuk penilaian kinerja, artinya: informasi capaian kinerja yang disajikan dalam Laporan Kinerja dijadikan dasar untuk menilai dan menyimpulkan kinerja serta dijadikan dasar reward dan punishment\n\nPemilihan A, B, C, D, atau E didasarkan pada professional judgement dengan tetap memperhatikan kriteria yang ditetapkan.\nSebagai ilustrasi:\n\"A\" apabila pemanfaatan bersifat ekstensif dan menyeluruh\n\"B\" apabila pemanfaatan bersifat ekstensif namun belum menyeluruh (sebagian)\n\"C\" apabila pemanfaatan hanya bersifat sebagian\n\"D\" apabila kurang dimanfaatkan\n\"E\" apabila tidak ada pemanfaatan dan/atau C.I.1 bernilai \"T\" (laporan kinerja tidak/belum disusun)', 'Manual', NULL, NULL, 'ABCDE', NULL, 'Satker telah memiliki mekanisme reward and punishment. (khusus tahun 2021)\n\nPenilaian reward and punishment telah dilengkapi dengan kertas kerja penilaian reward and punishment.\na. Kriteria penilaian reward and punishment telah sesuai dengan kertas kerja penilaian reward and punishment\nb. Kriteria penilaian telah terkait dengan kinerja yaitu ...................', 'Satker telah memiliki mekanisme reward and punishment. (khusus tahun 2021)\n\nPenilaian reward and punishment telah dilengkapi dengan kertas kerja penilaian reward and punishment.\na. Kriteria penilaian reward and punishment telah/belum sesuai dengan kertas kerja penilaian reward and punishment\nb. Kriteria penilaian telah/belum terkait dengan kinerja yaitu ...................', 'Satker telah memiliki mekanisme reward and punishment. (khusus tahun 2021)\n\nPenilaian reward and punishment telah dilengkapi dengan kertas kerja penilaian reward and punishment.\na. Kriteria penilaian reward and punishment belum sesuai dengan kertas kerja penilaian reward and punishment\nb. Kriteria penilaian belum terkait dengan kinerja yaitu ...................', 'Satker telah memiliki mekanisme reward and punishment. (khusus tahun 2021)\n\nPenilaian reward and punishment belum dilengkapi dengan kertas kerja penilaian reward and punishment.', 'Satker belum memiliki mekanisme reward and punishment. (khusus tahun 2021)', NULL, NULL, NULL, NULL, NULL, '2023-07-30 19:50:40', '2023-07-30 19:50:41'),
(138, 3, 'A.III.5', 'Laporan Kinerja menyajikan evaluasi dan analisis mengenai capaian kinerja ', 0.6, 'Laporan Kinerja tahun 2021\nFRA Triwulan IV tahun 2021\nnotulen rapat triwulan IV tahun 2021\n\nTelaah Bab III Laporan Kinerja apakah telah disajikan evaluasi dan analisis mengenai seluruh capaian kinerja tahun 2021 (per tujuan atau per sasaran atau per indikator kinerja sasaran)\n\nformat notulen dapat beragam yang penting substansi notulen FRA TW IV 2021 menjelaskan tentang analisis pencapaian kinerja\n\nMenyajikan evaluasi dan analisis mengenai capaian kinerja, artinya:\nLaporan Kinerja menguraikan hasil evaluasi dan analisis tentang capaian2 kinerja outcome atau output penting, bukan hanya proses atau realisasi kegiatan2 yang ada di dokumen anggaran (DIPA)\n\nKriteria Penilaian :\n\"A\" apabila Laporan Kinerja menyajikan lebih dari 90% sasaran yang dievaluasi dan dianalisis capaiannya bersifat kinerja (outcome), bukan proses;\n\"B\" apabila 75% < sasaran yang dievaluasi dan dianalisis capaiannya bersifat kinerja (outcome), bukan proses ≤ 90% atau Laporan Kinerja menyajikan IKU terbaru dan seluruh IKS dijelaskan evaluasi dan analisisnya;\n\"C\" apabila 40% < sasaran yang dievaluasi dan dianalisis capaiannya bersifat kinerja (outcome), bukan proses ≤ 75% atau Laporan Kinerja menyajikan IKU terbaru, namun hanya sampai tujuan/sasaran yang dijelaskan evaluasi dan analisisnya; atau Laporan Kinerja menyajikan IKU tahun 2017 dan seluruh IKS dijelaskan evaluasi dan analisisnya;\n\"D\" apabila 10% < sasaran yang dievaluasi dan dianalisis capaiannya bersifat kinerja (outcome), bukan proses ≤ 40% atau Laporan Kinerja menyajikan IKU terbaru (2020) namun tidak dijelaskan evaluasi dan analisisnya (hanya membaca tabel perbandingan) atau Laporan Kinerja menyajikan IKU tahun 2017 namun hanya sampai tujuan/sasaran dijelaskan evaluasi dan analisisnya atau Laporan Kinerja menyajikan IKU tahun 2016 Laporan Kinerja menyajikan IKU Badan Pusat Statistik (instansi);\n\"E\" apabila sasaran yang dievaluasi dan dianalisis capaiannya bersifat kinerja (outcome), bukan proses ≤ 10% dan/atau C.I.1 bernilai \"T\" (laporan kinerja tidak/belum disusun) dan/atau Perjanjian Kinerja tidak ada.', 'KKE', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6, '1. Laporan kinerja telah/belum menyajikan kendala dan solusi untuk tiap indikator kinerja sasaran.\n(Jika Laporan Kinerja menjelaskan kendala dan solusi untuk tiap indikator kinerja sasaran, maka jawab \"telah\")\n(Jika Laporan Kinerja tidak menjelaskan kendala dan solusi untuk tiap indikator kinerja sasaran, maka jawab \"belum\", dan sebutkan indikator kinerja sasaran apa yang tidak ada kendala dan solusinya)\n\n2. Notulen pembahasan capaian kinerja triwulan IV 2021 telah/belum menyajikan kendala dan solusi untuk tiap indikator kinerja sasaran.\n (JIka tidak ada notulen pembahasan capaian kinerja Triwulan IV tahun 2021 maka tuliskan \"Tidak ada notulen pembahasan capaian kinerja Triwulan IV tahun 2021)\n(Jika ada notulen dan notulen menjelaskan kendala dan solusi untuk tiap indikator kinerja sasaran, maka jawab \"telah\")\n(Jika ada notulen namun notulen tidak menjelaskan kendala dan solusi untuk tiap indikator kinerja sasaran, maka jawab \"belum\", dan sebutkan indikator kinerja sasaran apa yang tidak ada kendala dan solusinya)\n\n3. Analisis kendala dan solusi tiap indikator kinerja sasaran antara Laporan Kinerja dan Notulen pembahasan capaian kinerja triwulan IV telah/belum konsisten. \n(JIka tidak ada notulen pembahasan capaian kinerja Triwulan IV tahun 2021 maka tuliskan \"Tidak ada notulen pembahasan capaian kinerja Triwulan IV tahun 2021)\n(Jika kendala dan solusi tiap indikator kinerja sasaran antara Laporan Kinerja dan Notulen pembahasan capaian kinerja triwulan IV konsisten, maka jawab \"telah\")\n(Jika kendala dan solusi tiap indikator kinerja sasaran antara Laporan Kinerja dan Notulen pembahasan capaian kinerja triwulan IV ada yang tidak konsisten, maka sebutkan indikator kinerja sasaran mana yang penjelasannya tidak konsisten)\n\nLaporan Kinerja telah/belum menyajikan evaluasi dan analisis mengenai capaian kinerja. (Jika salah satu atau seluruh poin 1-3 belum, maka jawab \"belum\")', '2023-07-30 19:50:40', '2023-07-30 19:50:41');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kriteria_tls`
--

CREATE TABLE `kriteria_tls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `dokumenTL_id` bigint(20) UNSIGNED NOT NULL,
  `kriteriaLKE_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kriteria_tls`
--

INSERT IGNORE INTO `kriteria_tls` (`id`, `dokumenTL_id`, `kriteriaLKE_id`, `created_at`, `updated_at`) VALUES
(2, 1, 1, '2023-06-15 09:53:20', '2023-06-15 09:53:20'),
(4, 3, 2, '2023-06-18 04:45:19', '2023-07-27 23:44:01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `materis`
--

CREATE TABLE `materis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `dokumenMateri` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `materis`
--

INSERT IGNORE INTO `materis` (`id`, `dokumenMateri`, `link`, `created_at`, `updated_at`) VALUES
(1, '17022022 Workshop Evaluasi SAKIP 2022', 'https://drive.google.com/file/d/1svJ_2RHHwbDa8sTHAtMCSOzWesR_AM7z/preview', '2023-06-17 08:06:24', '2023-06-17 08:06:24'),
(2, 'Evaluasi Hasil Evaluasi SAKIP 2021', 'https://drive.google.com/file/d/11f_D6Iv9RXCLn5mVZr50Gl5Q3fgh1OfI/preview', '2023-06-17 08:06:24', '2023-06-17 08:06:24'),
(3, 'blackbox1', 'https://drive.google.com/file/d/11f_D6Iv9RXCLn5mVZr50Gl5Q3fgh1OfI/preview', '2023-07-27 21:11:14', '2023-07-27 21:11:14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT IGNORE INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_04_25_090912_create_unit_kerjas_table', 1),
(6, '2023_04_27_140357_create_pegawais_table', 1),
(7, '2023_04_27_154705_create_iku_unit_kerjas_table', 1),
(8, '2023_04_30_053259_create_tujuan_ikus_table', 1),
(9, '2023_05_09_075814_create_sasaran_ikus_table', 1),
(10, '2023_05_09_134022_create_indikator_ikus_table', 1),
(11, '2023_05_10_144334_create_kkes_table', 1),
(12, '2023_05_10_154857_create_kriteria_kkes_table', 1),
(13, '2023_05_16_110859_create_komponen_lkes_table', 1),
(14, '2023_05_20_032535_create_sub_komponen_lkes_table', 1),
(15, '2023_05_20_064420_create_kriteria_lkes_table', 1),
(16, '2023_05_28_052736_create_tim_dalnis_kts_table', 1),
(17, '2023_06_12_160628_create_tim_at_satkers_table', 1),
(18, '2023_06_13_010602_create_dokumen_tls_table', 2),
(19, '2023_06_15_154837_create_kriteria_tls_table', 3),
(20, '2023_06_17_032639_create_permindoks_table', 4),
(21, '2023_06_17_075946_create_buku_lhes_table', 5),
(22, '2023_06_17_080503_create_peraturans_table', 5),
(23, '2023_06_17_080557_create_surats_table', 5),
(24, '2023_06_17_080745_create_pelatihans_table', 5),
(25, '2023_06_17_080908_create_materis_table', 5),
(26, '2023_06_17_080950_create_template_dokumens_table', 5),
(27, '2023_06_18_064429_create_provinsis_table', 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawais`
--

CREATE TABLE `pegawais` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nip` char(18) NOT NULL,
  `namaPegawai` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `satker_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pegawais`
--

INSERT IGNORE INTO `pegawais` (`id`, `nip`, `namaPegawai`, `role`, `satker_id`, `created_at`, `updated_at`) VALUES
(1, '028385489018745346', 'Oni Mala Kuswandari', 'Anggota Tim', NULL, '2023-06-12 09:46:14', '2023-06-12 09:46:14'),
(2, '935373908486314841', 'Slamet Adiarja Prabowo M.M.', 'Ketua Tim', NULL, '2023-06-12 09:46:14', '2023-06-12 09:46:14'),
(3, '752924136230945772', 'Gandewa Putra', 'Pengendali Teknis', NULL, '2023-06-12 09:46:14', '2023-06-12 09:46:14'),
(4, '617085640457285607', 'Irma Puput Pertiwi', 'Anggota Tim', NULL, '2023-06-12 09:49:36', '2023-06-12 09:49:36'),
(5, '619724456188551412', 'Amalia Aryani', 'Ketua Tim', NULL, '2023-06-12 09:49:36', '2023-06-12 09:49:36'),
(6, '252175383442523537', 'Asirwanda Hutagalung', 'Pengendali Teknis', NULL, '2023-06-12 09:49:36', '2023-06-12 09:49:36'),
(7, '951588825257263068', 'Halim Gamanto Waluyo', 'Anggota Tim', NULL, '2023-06-12 09:49:36', '2023-06-12 09:49:36'),
(8, '131053620214761436', 'Keisha Rina Wahyuni S.Psi', 'Ketua Tim', NULL, '2023-06-12 09:49:36', '2023-06-12 09:49:36'),
(9, '568014328431893031', 'Oskar Sirait', 'Pengendali Teknis', NULL, '2023-06-12 09:49:36', '2023-06-12 09:49:36'),
(10, '501377218291516924', 'Irma Uyainah', 'Koordinator', NULL, '2023-06-12 09:49:36', '2023-06-18 09:39:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelatihans`
--

CREATE TABLE `pelatihans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `dokumenPelatihan` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pelatihans`
--

INSERT IGNORE INTO `pelatihans` (`id`, `dokumenPelatihan`, `link`, `created_at`, `updated_at`) VALUES
(1, '15012022 PKS Asistensi SAKIP 2022', 'https://drive.google.com/file/d/1qnhJizilGM3l1_i6OZyNsoWAbNv8NtBr/preview', '2023-06-17 05:18:24', '2023-06-17 05:18:24'),
(2, '07042022 PKS Evaluasi SAKIP 2022 Sesi 1', 'https://drive.google.com/file/d/1VvBZPcP0v11t4kldiG3RwKJ-ggN2wlf7/view', '2023-06-17 05:18:24', '2023-06-17 05:18:24'),
(3, 'blackbox1', 'https://drive.google.com/file/d/1VvBZPcP0v11t4kldiG3RwKJ-ggN2wlf7/view', '2023-07-27 21:08:51', '2023-07-27 21:08:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peraturans`
--

CREATE TABLE `peraturans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `peraturan` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `peraturans`
--

INSERT IGNORE INTO `peraturans` (`id`, `peraturan`, `link`, `created_at`, `updated_at`) VALUES
(1, 'Permen PANRB 88 2021 tentang Evaluasi Akuntabilitas Kinerja Instansi Pemerintah', 'https://drive.google.com/file/d/1exsLaYJ9UQL1EgYqYX_GtEJCE-uoM0Og/preview', '2023-06-17 04:07:29', '2023-07-27 22:18:07'),
(2, 'Perka BPS 9 2015 tentang Pedoman Penyusunan SAKIP di Lingkungan BPS', 'https://drive.google.com/file/d/1eGtF7YFqQR3gWKqDQxQZbIzvPqmWA0kN/preview', '2023-06-17 04:07:29', '2023-07-27 22:17:40'),
(5, 'blackbox testing 1', 'https://drive.google.com/file/d/1eGtF7YFqQR3gWKqDQxQZbIzvPqmWA0kN/preview', '2023-07-30 21:01:41', '2023-07-30 21:01:41');

-- --------------------------------------------------------

--
-- Struktur dari tabel `permindoks`
--

CREATE TABLE `permindoks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `namaDokumen` varchar(255) NOT NULL,
  `metodePengumpulan` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `permindoks`
--

INSERT IGNORE INTO `permindoks` (`id`, `namaDokumen`, `metodePengumpulan`, `created_at`, `updated_at`) VALUES
(1, 'Rencana Strategis', 'link', '2023-06-16 21:53:51', '2023-06-19 08:34:48'),
(3, 'Perjanjian Kinerja 2022', 'upload', '2023-06-17 02:45:02', '2023-06-17 02:45:02'),
(4, 'Contoh permindok', 'link', '2023-06-25 23:14:26', '2023-06-25 23:14:55');

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sasaran_ikus`
--

CREATE TABLE `sasaran_ikus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ikuUnitKerja_id` bigint(20) UNSIGNED NOT NULL,
  `tujuanIku_id` bigint(20) UNSIGNED NOT NULL,
  `kodeSasaran` char(3) NOT NULL,
  `sasaran` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sasaran_ikus`
--

INSERT IGNORE INTO `sasaran_ikus` (`id`, `ikuUnitKerja_id`, `tujuanIku_id`, `kodeSasaran`, `sasaran`, `created_at`, `updated_at`) VALUES
(1, 26, 1, 'S11', 'Terwujudnya layanan pendidikan dan pelatihan yang sesuai dengan perkembangan ilmu pengetahuan, teknologi informasi mutakhir, dan aturan yang berlaku', '2023-06-12 09:46:15', '2023-06-12 09:46:15'),
(2, 26, 1, 'S12', 'Terwujudnya layanan pendidikan dan pelatihan Statistik Sektoral dalam kerangka Satu Data Indonesia', '2023-06-12 09:46:15', '2023-06-12 09:46:15'),
(3, 26, 2, 'S21', 'Terwujudnya SDM Pusdiklat BPS yang melakukan peningkatan kompetensi', '2023-06-12 09:46:15', '2023-06-12 09:46:15'),
(4, 9999, 5, 'S11', 'Sasaran 1 blackbox', '2023-07-26 20:12:12', '2023-07-26 20:12:12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sub_komponen_lkes`
--

CREATE TABLE `sub_komponen_lkes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `komponenLke_id` bigint(20) UNSIGNED NOT NULL,
  `kodeSubKomponen` varchar(255) NOT NULL,
  `namaSubKomponen` varchar(255) NOT NULL,
  `persentaseNilaiSub` double NOT NULL,
  `bobotPerKriteria` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sub_komponen_lkes`
--

INSERT IGNORE INTO `sub_komponen_lkes` (`id`, `komponenLke_id`, `kodeSubKomponen`, `namaSubKomponen`, `persentaseNilaiSub`, `bobotPerKriteria`, `created_at`, `updated_at`) VALUES
(1, 1, 'A.I', 'Pemenuhan Perencanaan Strategis', 20, 'Sama', '2023-06-12 09:46:15', '2023-06-12 09:46:15'),
(2, 1, 'A.II', 'Kualitas Renstra', 5, 'Berbeda', '2023-06-12 09:46:15', '2023-06-12 09:46:15'),
(3, 1, 'A.III', 'Implementasi Renstra', 3, 'Sama', '2023-06-12 09:46:15', '2023-06-12 09:46:15'),
(5, 2, 'B.II', 'Kualitas Pengukuran', 12.5, 'Berbeda', '2023-06-12 09:46:15', '2023-06-16 22:13:05'),
(6, 2, 'B.III', 'Implementasi Pengukuran', 7.5, 'Berbeda', '2023-06-12 09:46:15', '2023-06-12 09:46:15'),
(8, 2, 'B.I', 'Pemenuhan Pengukuran', 5, 'Berbeda', '2023-06-16 22:13:53', '2023-06-16 22:13:53');

-- --------------------------------------------------------

--
-- Struktur dari tabel `surats`
--

CREATE TABLE `surats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `surat` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `surats`
--

INSERT IGNORE INTO `surats` (`id`, `surat`, `link`, `created_at`, `updated_at`) VALUES
(1, 'Permintaan Dokumen Evaluasi atas Implementasi SAKIP tahap 1 2022', 'https://drive.google.com/file/d/1jCJykJgusRoEjYR3IjWnAGkPgFMmlegz/preview', '2023-06-17 04:26:26', '2023-06-17 04:26:26'),
(2, 'Permintaan Dokumen Evaluasi atas Implementasi SAKIP tahap 2 tahun 2022', 'https://drive.google.com/file/d/1g-kZ2Sva82Hq989w4MCBRbFolWWCwmQ9/preview', '2023-06-17 04:26:26', '2023-06-17 04:26:26'),
(3, 'blackbox1', 'https://drive.google.com/file/d/1jCJykJgusRoEjYR3IjWnAGkPgFMmlegz/preview', '2023-07-27 21:05:00', '2023-07-27 21:05:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `template_dokumens`
--

CREATE TABLE `template_dokumens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `templateDokumen` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `template_dokumens`
--

INSERT IGNORE INTO `template_dokumens` (`id`, `templateDokumen`, `link`, `created_at`, `updated_at`) VALUES
(1, 'Contoh Format Notulensi', 'https://docs.google.com/spreadsheets/d/1bwH4TlRNzGBhcKo4IbUtpjKnQ4cq0jgMi84-1Px86So/edit#gid=1071714643', '2023-06-17 08:41:38', '2023-06-17 08:41:38'),
(2, 'Template LHE Implementasi SAKIP BPS Provinsi 2022', 'https://drive.google.com/file/d/1Fjr2a1IjGVm8GXdCRGFgWqGF5EKDHN9a/preview', '2023-06-17 08:41:38', '2023-06-17 08:41:38'),
(5, 'blackbox1', 'https://docs.google.com/spreadsheets/d/1bwH4TlRNzGBhcKo4IbUtpjKnQ4cq0jgMi84-1Px86So/edit#gid=1071714643', '2023-07-30 21:04:10', '2023-07-30 21:04:10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tim_at_satkers`
--

CREATE TABLE `tim_at_satkers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `timDalnisKT_id` bigint(20) UNSIGNED NOT NULL,
  `at_id` bigint(20) UNSIGNED NOT NULL,
  `unitKerja_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tim_at_satkers`
--

INSERT IGNORE INTO `tim_at_satkers` (`id`, `timDalnisKT_id`, `at_id`, `unitKerja_id`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 8, '2023-06-12 10:31:53', '2023-06-25 02:53:44'),
(3, 3, 4, 6, '2023-06-12 11:00:39', '2023-06-25 02:53:01'),
(5, 3, 4, 1, '2023-06-12 11:07:15', '2023-06-12 11:07:15'),
(6, 3, 7, 3, '2023-06-12 11:07:30', '2023-06-12 11:31:20'),
(7, 3, 7, 2, '2023-06-12 11:09:55', '2023-06-12 11:09:55'),
(8, 3, 7, 8, '2023-06-25 23:16:28', '2023-06-25 23:16:28'),
(9, 3, 7, 6, '2023-06-25 23:16:28', '2023-06-25 23:16:28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tim_dalnis_kts`
--

CREATE TABLE `tim_dalnis_kts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `dalnis_id` bigint(20) UNSIGNED NOT NULL,
  `kt_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tim_dalnis_kts`
--

INSERT IGNORE INTO `tim_dalnis_kts` (`id`, `dalnis_id`, `kt_id`, `created_at`, `updated_at`) VALUES
(1, 3, 5, '2023-06-12 09:46:30', '2023-06-19 04:43:47'),
(3, 6, 8, '2023-06-12 09:50:15', '2023-06-12 09:50:15'),
(4, 3, 2, '2023-06-25 23:15:42', '2023-06-25 23:15:42'),
(6, 9, 2, '2023-07-26 17:26:16', '2023-07-26 17:26:16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tujuan_ikus`
--

CREATE TABLE `tujuan_ikus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ikuUnitKerja_id` bigint(20) UNSIGNED NOT NULL,
  `kodeTujuan` char(2) NOT NULL,
  `tujuan` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tujuan_ikus`
--

INSERT IGNORE INTO `tujuan_ikus` (`id`, `ikuUnitKerja_id`, `kodeTujuan`, `tujuan`, `created_at`, `updated_at`) VALUES
(1, 26, 'T1', 'Meningkatkan layanan pendidikan dan pelatihan yang adaptif', '2023-06-12 09:46:15', '2023-06-12 09:46:15'),
(2, 26, 'T2', 'Meningkatkan kompetensi SDM', '2023-06-12 09:46:15', '2023-06-12 09:46:15'),
(5, 9999, 'T1', 'Tujuan blackbox 1', '2023-07-26 20:02:55', '2023-07-26 20:02:55');

-- --------------------------------------------------------

--
-- Struktur dari tabel `unit_kerjas`
--

CREATE TABLE `unit_kerjas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ikuUnitKerja_id` bigint(20) UNSIGNED NOT NULL,
  `kodeWilayah` char(2) NOT NULL,
  `kodeUnitKerja` char(4) NOT NULL,
  `wilayah` varchar(3) NOT NULL,
  `namaUnitKerja` varchar(255) NOT NULL,
  `namaPIC` varchar(255) DEFAULT NULL,
  `noTelpPIC` varchar(255) DEFAULT NULL,
  `role` varchar(255) NOT NULL,
  `kodeSatkerProv` char(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `unit_kerjas`
--

INSERT IGNORE INTO `unit_kerjas` (`id`, `ikuUnitKerja_id`, `kodeWilayah`, `kodeUnitKerja`, `wilayah`, `namaUnitKerja`, `namaPIC`, `noTelpPIC`, `role`, `kodeSatkerProv`, `created_at`, `updated_at`) VALUES
(1, 9999, '11', '1100', 'III', 'BPS Provinsi Aceh', 'Uda Waskita S.Psi', '082140622510', 'BPS Provinsi', NULL, '2023-06-12 09:46:14', '2023-06-12 09:46:14'),
(2, 9999, '11', '1101', 'III', 'BPS Kabupaten Simeulue', 'Nilam Padmasari', '089877205159', 'BPS Kab/Kota', '1100', '2023-06-12 09:46:14', '2023-06-12 09:46:14'),
(3, 26, '00', '0026', 'III', 'Pusat Pendidikan Pelatihan', 'Kani Zulaika S.T.', '083466190188', 'Unit Kerja Pusat', NULL, '2023-06-12 09:46:14', '2023-06-12 09:46:14'),
(6, 9999, '12', '1200', 'II', 'BPS Provinsi Sumatera Utara', NULL, NULL, 'BPS Provinsi', NULL, '2023-06-18 01:55:06', '2023-06-18 02:51:12'),
(8, 9999, '12', '1201', 'II', 'BPS Kabupaten Nias', NULL, NULL, 'BPS Kab/Kota', '1200', '2023-06-25 02:15:03', '2023-06-25 02:19:35'),
(16, 9999, '99', '9999', 'II', 'BPS Kabupaten XXXX', NULL, NULL, 'BPS Kab/Kota', '9900', '2023-07-30 20:08:26', '2023-07-30 20:08:26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT IGNORE INTO `users` (`id`, `name`, `username`, `role`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(24, 'BPS Provinsi Aceh', '1100', 'BPS Provinsi', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, '2023-06-18 01:52:32', '2023-06-18 01:52:32'),
(25, 'BPS Kabupaten Simeulue', '1101', 'BPS Kab/Kota', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, '2023-06-18 01:52:32', '2023-06-18 01:52:32'),
(26, 'Pusat Pendidikan Pelatihan', '0026', 'Unit Kerja Pusat', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, '2023-06-18 01:52:32', '2023-06-18 01:52:32'),
(27, 'Anggota Tim', 'at', 'Anggota Tim', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, '2023-06-18 01:52:32', '2023-06-18 01:52:32'),
(28, 'Ketua Tim', 'kt', 'Ketua Tim', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, '2023-06-18 01:52:32', '2023-06-18 01:52:32'),
(29, 'Pengendali Teknis', 'dalnis', 'Pengendali Teknis', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, '2023-06-18 01:52:32', '2023-06-18 01:52:32'),
(30, 'Inspektur', 'inspektur', 'Inspektur', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, '2023-06-18 01:52:32', '2023-06-18 01:52:32'),
(31, 'Kepala BPS Kabupaten Simeulue', 'kepalaBPS1101', 'Kepala Unit Kerja BPS Kab/Kota', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, '2023-06-18 01:52:32', '2023-06-18 01:52:32'),
(32, 'Kepala BPS Provinsi Aceh', 'kepalaBPS1100', 'Kepala Unit Kerja BPS Provinsi', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, '2023-06-18 01:52:32', '2023-06-18 01:52:32'),
(33, '', '951588825257263068', 'Anggota Tim', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, '2023-06-18 01:52:32', '2023-06-18 01:52:32'),
(34, '', '131053620214761436', 'Ketua Tim', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, '2023-06-18 01:52:32', '2023-06-18 01:52:32'),
(35, '', '568014328431893031', 'Pengendali Teknis', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, '2023-06-18 01:52:32', '2023-06-18 01:52:32'),
(36, 'Koordinator', 'koor', 'Koordinator', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, '2023-06-18 01:52:32', '2023-06-18 09:39:51'),
(37, 'BPS Provinsi Sumatera Utara', '1200', 'BPS Provinsi', '$2a$12$gUeuYD1Z8ffPszhk0tMemOI3tSo3HzlDsoTTpAOeqzTvEbr/z2ZqS', NULL, '2023-06-18 01:55:06', '2023-06-18 01:55:06'),
(38, 'BPS Kabupaten Nias', '1201', 'BPS Kab/Kota', '$2y$10$uRjO/quGswapgzhII2/aSef3btQNVZD1ZIP6vLZfl.0uOJ2jsVVn6', NULL, '2023-06-25 02:15:04', '2023-06-25 02:15:04'),
(45, 'BPS Kabupaten XXXX', '9999', 'BPS Kab/Kota', '$2y$10$4H9rsn.x9wn/Uqk7hVVTKeidRZqxbodu3Is.EZVQCe9shlPnaDVzS', NULL, '2023-07-30 20:08:26', '2023-07-30 20:08:26');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `buku_lhes`
--
ALTER TABLE `buku_lhes`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `dokumen_tls`
--
ALTER TABLE `dokumen_tls`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `iku_unit_kerjas`
--
ALTER TABLE `iku_unit_kerjas`
  ADD UNIQUE KEY `iku_unit_kerjas_id_unique` (`id`),
  ADD UNIQUE KEY `iku_unit_kerjas_namaunitkerja_unique` (`namaUnitKerja`);

--
-- Indeks untuk tabel `indikator_ikus`
--
ALTER TABLE `indikator_ikus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sasaranIku_id` (`sasaranIku_id`);

--
-- Indeks untuk tabel `kkes`
--
ALTER TABLE `kkes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kkes_kodekke_unique` (`kodeKKE`),
  ADD UNIQUE KEY `kkes_namakke_unique` (`namaKKE`);

--
-- Indeks untuk tabel `komponen_lkes`
--
ALTER TABLE `komponen_lkes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `komponen_lkes_kodekomponen_unique` (`kodeKomponen`),
  ADD UNIQUE KEY `komponen_lkes_namakomponen_unique` (`namaKomponen`);

--
-- Indeks untuk tabel `kriteria_kkes`
--
ALTER TABLE `kriteria_kkes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kriteria_kkes_kodekriteriakke_unique` (`kodeKriteriaKKE`),
  ADD KEY `kke_id` (`kke_id`);

--
-- Indeks untuk tabel `kriteria_lkes`
--
ALTER TABLE `kriteria_lkes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kriteria_lkes_kodekriterialke_unique` (`kodeKriteriaLKE`),
  ADD UNIQUE KEY `kriteria_lkes_namakriteria_unique` (`namaKriteria`),
  ADD KEY `subKomponenLke_id` (`subKomponenLke_id`),
  ADD KEY `kriteriaKKE_id` (`kriteriaKKE_id`);

--
-- Indeks untuk tabel `kriteria_tls`
--
ALTER TABLE `kriteria_tls`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dokumenTL_id` (`dokumenTL_id`),
  ADD KEY `kriteriaLke_id` (`kriteriaLKE_id`);

--
-- Indeks untuk tabel `materis`
--
ALTER TABLE `materis`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `pegawais`
--
ALTER TABLE `pegawais`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pegawais_nip_unique` (`nip`),
  ADD UNIQUE KEY `pegawais_namapegawai_unique` (`namaPegawai`),
  ADD UNIQUE KEY `pegawais_satker_id_unique` (`satker_id`);

--
-- Indeks untuk tabel `pelatihans`
--
ALTER TABLE `pelatihans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `peraturans`
--
ALTER TABLE `peraturans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `permindoks`
--
ALTER TABLE `permindoks`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `sasaran_ikus`
--
ALTER TABLE `sasaran_ikus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tujuanIku_id` (`tujuanIku_id`);

--
-- Indeks untuk tabel `sub_komponen_lkes`
--
ALTER TABLE `sub_komponen_lkes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sub_komponen_lkes_kodesubkomponen_unique` (`kodeSubKomponen`),
  ADD UNIQUE KEY `sub_komponen_lkes_namasubkomponen_unique` (`namaSubKomponen`),
  ADD KEY `komponenLke_id` (`komponenLke_id`);

--
-- Indeks untuk tabel `surats`
--
ALTER TABLE `surats`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `template_dokumens`
--
ALTER TABLE `template_dokumens`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tim_at_satkers`
--
ALTER TABLE `tim_at_satkers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `timDalnisKT_id` (`timDalnisKT_id`),
  ADD KEY `at_id` (`at_id`),
  ADD KEY `unitKerja_id` (`unitKerja_id`);

--
-- Indeks untuk tabel `tim_dalnis_kts`
--
ALTER TABLE `tim_dalnis_kts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dalnis_id` (`dalnis_id`),
  ADD KEY `kt_id` (`kt_id`);

--
-- Indeks untuk tabel `tujuan_ikus`
--
ALTER TABLE `tujuan_ikus`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `unit_kerjas`
--
ALTER TABLE `unit_kerjas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unit_kerjas_kodeunitkerja_unique` (`kodeUnitKerja`),
  ADD UNIQUE KEY `unit_kerjas_namaunitkerja_unique` (`namaUnitKerja`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `buku_lhes`
--
ALTER TABLE `buku_lhes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `dokumen_tls`
--
ALTER TABLE `dokumen_tls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `indikator_ikus`
--
ALTER TABLE `indikator_ikus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `kkes`
--
ALTER TABLE `kkes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `komponen_lkes`
--
ALTER TABLE `komponen_lkes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `kriteria_kkes`
--
ALTER TABLE `kriteria_kkes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `kriteria_lkes`
--
ALTER TABLE `kriteria_lkes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=139;

--
-- AUTO_INCREMENT untuk tabel `kriteria_tls`
--
ALTER TABLE `kriteria_tls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `materis`
--
ALTER TABLE `materis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `pegawais`
--
ALTER TABLE `pegawais`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `pelatihans`
--
ALTER TABLE `pelatihans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `peraturans`
--
ALTER TABLE `peraturans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `permindoks`
--
ALTER TABLE `permindoks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `sasaran_ikus`
--
ALTER TABLE `sasaran_ikus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `sub_komponen_lkes`
--
ALTER TABLE `sub_komponen_lkes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `surats`
--
ALTER TABLE `surats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `template_dokumens`
--
ALTER TABLE `template_dokumens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tim_at_satkers`
--
ALTER TABLE `tim_at_satkers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tim_dalnis_kts`
--
ALTER TABLE `tim_dalnis_kts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tujuan_ikus`
--
ALTER TABLE `tujuan_ikus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `unit_kerjas`
--
ALTER TABLE `unit_kerjas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `indikator_ikus`
--
ALTER TABLE `indikator_ikus`
  ADD CONSTRAINT `sasaranIku_id` FOREIGN KEY (`sasaranIku_id`) REFERENCES `sasaran_ikus` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kriteria_kkes`
--
ALTER TABLE `kriteria_kkes`
  ADD CONSTRAINT `kke_id` FOREIGN KEY (`kke_id`) REFERENCES `kkes` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kriteria_lkes`
--
ALTER TABLE `kriteria_lkes`
  ADD CONSTRAINT `kriteriaKKE_id` FOREIGN KEY (`kriteriaKKE_id`) REFERENCES `kriteria_kkes` (`id`),
  ADD CONSTRAINT `subKomponenLke_id` FOREIGN KEY (`subKomponenLke_id`) REFERENCES `sub_komponen_lkes` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kriteria_tls`
--
ALTER TABLE `kriteria_tls`
  ADD CONSTRAINT `dokumenTL_id` FOREIGN KEY (`dokumenTL_id`) REFERENCES `dokumen_tls` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `kriteriaLke_id` FOREIGN KEY (`kriteriaLKE_id`) REFERENCES `kriteria_lkes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pegawais`
--
ALTER TABLE `pegawais`
  ADD CONSTRAINT `satker_id` FOREIGN KEY (`satker_id`) REFERENCES `unit_kerjas` (`id`);

--
-- Ketidakleluasaan untuk tabel `sasaran_ikus`
--
ALTER TABLE `sasaran_ikus`
  ADD CONSTRAINT `tujuanIku_id` FOREIGN KEY (`tujuanIku_id`) REFERENCES `tujuan_ikus` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `sub_komponen_lkes`
--
ALTER TABLE `sub_komponen_lkes`
  ADD CONSTRAINT `komponenLke_id` FOREIGN KEY (`komponenLke_id`) REFERENCES `komponen_lkes` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tim_at_satkers`
--
ALTER TABLE `tim_at_satkers`
  ADD CONSTRAINT `at_id` FOREIGN KEY (`at_id`) REFERENCES `pegawais` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `timDalnisKT_id` FOREIGN KEY (`timDalnisKT_id`) REFERENCES `tim_dalnis_kts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `unitKerja_id` FOREIGN KEY (`unitKerja_id`) REFERENCES `unit_kerjas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tim_dalnis_kts`
--
ALTER TABLE `tim_dalnis_kts`
  ADD CONSTRAINT `dalnis_id` FOREIGN KEY (`dalnis_id`) REFERENCES `pegawais` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kt_id` FOREIGN KEY (`kt_id`) REFERENCES `pegawais` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
