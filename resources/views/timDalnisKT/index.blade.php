@extends('layouts.main')

@section('container')

<div class="container mt-3">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb border-bottom border-dark">
      <li class="breadcrumb-item active" style="color:black;" aria-current="page"><h4>Pembagian Tim</h4></li>
    </ol>
  </nav>
</div>

{{-- <div class="row justify-content-center border-bottom">
  <div class="col-md-6">
    <form action="/timDalnisKT">
      <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Search.." name="search" id="cari"
        value="{{ request('search') }}">
        <button class="btn btn-dark" type="submit"><span data-feather="search"></span></button>
      </div>
    </form>
  </div>
</div> --}}

<div class="bg-white px-3 mb-3">
  <!-- Button trigger modal -->
  <div class="border-bottom border-1 border-dark mb-3">
    <button type="button" class="btn btn-primary my-3" data-bs-toggle="modal" data-bs-target="#tambahDalnisKT">
      <span data-feather="file-plus"></span> Tambah Data
    </button>
  </div>

  @if(session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{ session('success') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
      </button>
    </div>
  @endif
  
  <!-- Tabel Dalnis dan KT -->
  <div class="table-responsive">
      <table class="table table-striped table-sm table-bordered">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Nama Pengendali Teknis</th>
            <th scope="col">Nama Ketua Tim</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
          {{-- @php 
            $no = 1 + (($timDalnisKTs->currentPage()-1) * $timDalnisKTs->perPage());
          @endphp --}}
  
          @if ($timDalnisKTs->count())
            @foreach ($timDalnisKTs as $timDalnisKT)
            <tr>
              <td>{{ $loop->iteration}}</td>
              <td>{{ $timDalnisKT->pegawaiDalnis->namaPegawai }}</td>
              <td>{{ $timDalnisKT->pegawaiKT->namaPegawai }}</td>
              <td>
                <a href="/timDalnisKT/{{ $timDalnisKT->id }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
                <form action="/timDalnisKT/{{ $timDalnisKT->id }}" method="post" class="d-inline">
                  @csrf
                  @method('delete')
                  <button class="badge bg-danger border-0" onclick="return confirm('Yakin menghapus data?')">
                    <span data-feather="x-circle"></span>
                  </button>
                </form>
              </td>
            </tr>
            @endforeach
        </tbody>
          @else
          <table class="table table-striped table-sm table-bordered">
                <p class="text-center fs-4">Tim tidak ditemukan</p>
          @endif
          </table>
  </div>
</div>

<div class="d-flex justify-content-end">
  {{ $timDalnisKTs->links() }}
</div>

@include('timDalnisKT.modalCreate')

@endsection