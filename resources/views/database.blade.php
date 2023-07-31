@extends('layouts.main')

@section('container')

<div class="container mt-3">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb border-bottom border-dark">
      <li class="breadcrumb-item active" style="color:black;" aria-current="page"><h4>Database</h4></li>
    </ol>
  </nav>
</div>

<div class="row pt-3">
    <div class="col-sm-6 mb-3 mb-sm-0">
      <div class="card rounded-0">
        <div class="card-body border-top border-primary border-5">
          <h5 class="card-title">Unduh LKE Seluruh Unit Kerja</h5>
            <a href="#" class="btn btn-primary mb-3 mt-2">
                <span data-feather="download" class="mb-1"></span> Unduh Seluruh LKE
            </a>
          <p class="card-text">Gunakan fitur ini untuk mengunduh seluruh LKE unit kerja yang telah diisi oleh
            anggota tim, ketua tim, dan pengendali teknis
          </p>
        </div>
      </div>
    </div>
    <div class="col-sm-6">
      <div class="card rounded-0">
        <div class="card-body border-top border-primary border-5">
          <h5 class="card-title">Unduh Seluruh Data Tahun Terbaru</h5>
            <a href="#" class="btn btn-primary mb-3 mt-2">
                <span data-feather="download" class="mb-1"></span> Unduh Seluruh Data
            </a>
          <p class="card-text">Gunakan fitur ini untuk mengunduh seluruh data evaluasi pada tahun terbaru</p>
        </div>
      </div>
    </div>
    <div class="col-sm-6 py-4">
        <div class="card rounded-0">
          <div class="card-body border-top border-danger border-5">
            <h5 class="card-title">Buat Evaluasi Baru</h5>
              <a href="#" class="btn btn-danger mb-3 mt-2">
                  <span data-feather="trash" class="mb-1"></span> Hapus Semua Evaluasi
              </a>
            <p class="card-text">
                Gunakan fitur ini untuk membuat evaluasi baru, dengan :
                <ul>
                    <li>Menghapus data nilai akhir panelisasi dan rankingnya pada 2 tahun yang lalu</li>
                    <li>Menghapus semua data tahun lalu, selain nilai akhir panelisasi dan rankingnya</li>
                </ul>
                <b style="color:red">*Jangan lupa untuk mengunduh semua data sebelum menghapusnya</b>
            </p>
          </div>
        </div>
      </div>
</div>

@endsection