@extends('layouts.main')

@section('container')

<div class="container mt-3">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb border-bottom border-dark">
      <li class="breadcrumb-item active" style="color:black;" aria-current="page"><h4>Pengaturan LKE</h4></li>
    </ol>
  </nav>
</div>

<div class="bg-white p-3 mb-3">
  <!-- Button trigger modal -->
  <div class="border-bottom border-1 border-dark mb-3">
    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#tambahKomponen">
      <span data-feather="file-plus"></span> Tambah Komponen
    </button>
  </div>
  
  @if(session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{ session('success') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
      </button>
    </div>
  @endif

  <!-- Tabel Komponen LKE -->
  <div class="table-responsive">
      <table class="table table-striped table-sm table-bordered">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Kode Komponen</th>
            <th scope="col">Nama Komponen</th>
            <th scope="col">Jumlah Sub Komponen</th>
            <th scope="col">Persentase Nilai Komponen (%)</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($komponenLKEs as $komponenLKE)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td class="text-uppercase">{{ $komponenLKE->kodeKomponen }}</td>
              <td>{{ $komponenLKE->namaKomponen }}</td>
              <td>{{ $komponenLKE->subKomponenLKE->count() }}</td>
              <td>{{ $komponenLKE->persentaseNilai }}</td>
              <td>
                <a href="/komponenLKE/{{ $komponenLKE->kodeKomponen }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
                <form action="/komponenLKE/{{ $komponenLKE->kodeKomponen }}" method="post" class="d-inline">
                  @csrf
                  @method('delete')
                  <button class="badge bg-danger border-0" onclick="return confirm('Yakin menghapus data?')">
                    <span data-feather="x-circle"></span>
                  </button>
                </form>
              </td>
            </tr>
            @endforeach
            <tr>
              <td></td>
              <td colspan="3" class="fw-bold">Total</td>
              <td class="fw-bold">
                @php
                  $persentase = 0;
                @endphp
                @foreach ($komponenLKEs as $komponenLKE)
                  @php
                    $persentase = $persentase + $komponenLKE->persentaseNilai
                  @endphp
                @endforeach
                {{ $persentase }}
              </td>
              <td></td>
            </tr>
        </tbody>
      </table>
      </tbody>
    </table>
  
    @if($persentase > 100)
          <div class="alert alert-danger alert-dismissible fade show bold" role="alert">
            Total persentase melebihi 100%!
          </div>
        @endif
  </div>
</div>

@include('komponenLKE.modalCreate')

@endsection