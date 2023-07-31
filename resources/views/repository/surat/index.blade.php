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
  <a class="btn btn-dark rounded-0 flex-fill" style="background-color:#4b3d17" href="/repository/peraturan" role="button">Peraturan</a>
  <button type="button" class="btn btn-dark rounded-0 flex-fill" style="background-color:#4b3d17" disabled>Surat</button>
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
        <form action="/repository/surat">
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
            <th scope="col">Nama Surat</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @php 
            $no = 1 + (($surats->currentPage()-1) * $surats->perPage());
          @endphp
          @if ($surats->count())
            @foreach ($surats as $surat)
            <tr>
              <td>{{ $no++ }}</td>
              <td>{{ $surat->surat }}</td>
              <td>
                <a href="{{ $surat->link }}" target="_blank" class="badge bg-info"><span data-feather="eye"></span></a>
                <a href="/repository/surat/{{ $surat->id }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
                <form action="/repository/surat/{{ $surat->id }}" method="post" class="d-inline">
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
                <p class="text-center fs-6">Surat tidak ditemukan</p>
        @endif
          </table>
  </div>
</div>

<div class="d-flex justify-content-end">
  {!! $surats->appends(Request::except('page'))->render() !!}
</div>

@include('repository.surat.modalCreate')

@endsection