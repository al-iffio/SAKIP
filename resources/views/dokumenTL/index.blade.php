@extends('layouts.main')

@section('container')

<div class="container mt-3">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb border-bottom border-dark">
      <li class="breadcrumb-item active" style="color:black;" aria-current="page"><h4>Tindak Lanjut</h4></li>
    </ol>
  </nav>
</div>

<div class="bg-white p-3 mb-3">
  <div class="border-bottom border-1 border-dark mb-3">
    <!-- Button Group -->
    <div class="btn-toolbar justify-content-between" role="toolbar" aria-label="Toolbar with button groups">
      <div class="btn-group" role="group" aria-label="First group">
        <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#tambahDokumenTL">
          <span data-feather="file-plus"></span> Tambah Dokumen TL
        </button>
      </div>
      <div class="input-group">
        <form action="/dokumenTL">
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Search.." name="search" id="cari"
            value="{{ request('search') }}">
            <button class="btn btn-dark" type="submit"><span data-feather="search"></span></button>
          </div>
        </form>
      </div>
    </div>
  </div>
  
  @if(session()->has('success'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
    </button>
  </div>
  @endif
  
  <!-- Tabel Dokumen TL -->
  <div class="table-responsive">
      <table class="table table-striped table-sm table-bordered">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Dokumen Tindak Lanjut</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
            @if ($dokumenTLs->count())
              @foreach ($dokumenTLs as $dokumenTL)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $dokumenTL->dokumenTL }}</td>
                <td>
                  <a href="/dokumenTL/{{ $dokumenTL->id }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
                  <form action="/dokumenTL/{{ $dokumenTL->id }}" method="post" class="d-inline">
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
                  <p class="text-center fs-6">Dokumen Tindak Lanjut tidak ditemukan</p>
            @endif
      </table>
  </div>
</div>

@include('dokumenTL.modalCreate')

@endsection