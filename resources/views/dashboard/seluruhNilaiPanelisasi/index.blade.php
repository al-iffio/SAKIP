@extends('layouts.main')

@section('container')

<div class="container mt-3">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb border-bottom border-dark">
      <li class="breadcrumb-item"><a href="/dashboard" style="text-decoration:none; color:black"><h4>Dashboard</h4></a></li>
      <li class="breadcrumb active mt-1" aria-current="page"><h5 class="d-inline" style="text-decoration:none; color:black">&nbsp/ Nilai Panelisasi</h5></li>
    </ol>
  </nav>
</div>

<div class="bg-white p-3 mb-3">
  <div class="border-bottom border-1 border-dark mb-3">
    <!-- Button Group -->
    <div class="btn-toolbar justify-content-between" role="toolbar" aria-label="Toolbar with button groups">
      <div class="btn-group" role="group">
        <h5>Daftar Wilayah Provinsi</h5>
      </div>
      <div class="input-group">
        <form action="/dashboard/seluruhNilaiPanelisasi">
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Search.." name="search" id="cari"
            value="{{ request('search') }}">
            <button class="btn btn-dark" type="submit"><span data-feather="search"></span></button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Tabel Wilayah Provinsi -->
  <div class="table-responsive mt-3">
      <table class="table table-striped table-sm table-bordered">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Wilayah Provinsi</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @php 
            $no = 1 + (($provinsis->currentPage()-1) * $provinsis->perPage());
          @endphp
          @if ($provinsis->count())
            @foreach ($provinsis as $provinsi)
            <tr>
              <td>{{ $no++ }}</td>
              <td>
                @php
                  $namaProvinsi = $provinsi->namaUnitKerja;
                  $namaProvinsi=preg_replace("/BPS /","", $namaProvinsi);
                @endphp
                  {{ $namaProvinsi }}</td>
              </td>
              <td>
                <a href="/dashboard/seluruhNilaiPanelisasi/panelisasi/{{ $provinsi->id }}" class="badge bg-info"><span data-feather="eye"></span></a>
              </td>
            </tr>
            @endforeach
        </tbody>
          @else
          <table class="table table-striped table-sm table-bordered">
                <p class="text-center fs-4">Wilayah Provinsi tidak ditemukan</p>
          @endif
          </table>
  </div>
</div>

<div class="d-flex justify-content-end">
  {!! $provinsis->appends(Request::except('page'))->render() !!}
</div>

<div class="d-flex mb-3 justify-content-end pt-3">
    <a href="/dashboard" class="btn btn-secondary mx-3">Kembali</a>
</div>

@endsection