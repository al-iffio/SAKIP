@extends('layouts.main')

@section('container')

<div class="container mt-3">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb border-bottom border-dark">
      <li class="breadcrumb-item active" style="color:black;" aria-current="page"><h4>Pengaturan User Pegawai</h4></li>
    </ol>
  </nav>
</div>

<div class="bg-white p-3 mb-3">
  <div class="border-bottom border-1 border-dark mb-3">
    <!-- Button Group -->
    <div class="btn-toolbar justify-content-between" role="toolbar" aria-label="Toolbar with button groups">
      <div class="btn-group" role="group">
      </div>
      <div class="input-group">
        <form action="/pegawai">
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
    <div class="alert alert-success alert-dismissible fade show mt-1" role="alert">
      {{ session('success') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
      </button>
    </div>
  @endif
  
  <!-- Tabel Pegawai -->
  <div class="table-responsive mt-3">
      <table class="table table-striped table-sm table-bordered">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">@sortablelink('nip','NIP')&#8645;</th>
            <th scope="col">@sortablelink('namaPegawai','Nama Pegawai')&#8645;</th>
            <th scope="col">@sortablelink('role','Role')&#8645;</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @php 
            $no = 1 + (($pegawais->currentPage()-1) * $pegawais->perPage());
          @endphp
          @if ($pegawais->count())
            @foreach ($pegawais as $pegawai)
            <tr>
              <td>{{ $no++ }}</td>
              <td>{{ $pegawai->nip }}</td>
              <td>{{ $pegawai->namaPegawai }}</td>
              <td>{{ $pegawai->role }}</td>
              <td>
                <a href="/pegawai/{{ $pegawai->id }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
              </td>
            </tr>
            @endforeach
        </tbody>
          @else
          <table class="table table-striped table-sm table-bordered">
                <p class="text-center fs-6">Pegawai tidak ditemukan</p>
          @endif
          </table>
  </div>
</div>

<div class="d-flex justify-content-end">
  {!! $pegawais->appends(Request::except('page'))->render() !!}
</div>

@endsection