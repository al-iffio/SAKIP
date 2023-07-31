@extends('layouts.main')

@section('container')

<div class="container mt-3">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb border-bottom border-dark">
      <li class="breadcrumb-item active" style="color:black;" aria-current="page"><h4>Repository</h4></li>
    </ol>
  </nav>
</div>

<div class="btn-group d-flex border-bottom border-dark rounded-0" role="group" aria-label="Basic example">
  <a class="btn btn-dark rounded-0 flex-fill" style="background-color:#4b3d17" href="/repository/bukuLHE" role="button">Buku LHE</a>
  <button type="button" class="btn btn-dark rounded-0 flex-fill" style="background-color:#4b3d17" disabled>Peraturan</button>
  <a class="btn btn-dark rounded-0 flex-fill" style="background-color:#4b3d17" href="/repository/surat" role="button">Surat</a>
  <a class="btn btn-dark rounded-0 flex-fill" style="background-color:#4b3d17" href="/repository/pelatihan" role="button">Pelatihan</a>
  <a class="btn btn-dark rounded-0 flex-fill" style="background-color:#4b3d17" href="/repository/materi" role="button">Materi</a>
  <a class="btn btn-dark rounded-0 flex-fill" style="background-color:#4b3d17" href="/repository/templateDokumen" role="button">Template Dokumen</a>
</div>

<div class="bg-white p-3 mb-3">
  <div class="border-bottom border-1 border-dark mb-3">
    <!-- Button Group -->
    <div class="btn-toolbar justify-content-between" role="toolbar" aria-label="Toolbar with button groups">
      <div class="btn-group" role="group">
        <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#tambahRepository">
          <span data-feather="file-plus"></span> Tambah Data
        </button>
      </div>
      <div class="input-group">
        <form action="/repository/peraturan">
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
  
  <!-- Tabel Repository -->
  <div class="table-responsive">
      <table class="table table-striped table-sm table-bordered">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Nama Peraturan</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @php 
            $no = 1 + (($peraturans->currentPage()-1) * $peraturans->perPage());
          @endphp
          @if ($peraturans->count())
            @foreach ($peraturans as $peraturan)
            <tr>
              <td>{{ $no++ }}</td>
              <td>{{ $peraturan->peraturan }}</td>
              <td>
                <a href="{{ $peraturan->link }}" target="_blank" class="badge bg-info"><span data-feather="eye"></span></a>
                <a href="/repository/peraturan/{{ $peraturan->id }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
                <form action="/repository/peraturan/{{ $peraturan->id }}" method="post" class="d-inline">
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
                <p class="text-center fs-6">Peraturan tidak ditemukan</p>
        @endif
          </table>
  </div>
</div>

<div class="d-flex justify-content-end">
  {!! $peraturans->appends(Request::except('page'))->render() !!}
</div>

@include('repository.peraturan.modalCreate')

@endsection