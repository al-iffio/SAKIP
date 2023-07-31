@extends('layouts.main')

@section('container')

<div class="container mt-3">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb border-bottom border-dark">
      <li class="breadcrumb-item"><a href="/permindok" style="text-decoration:none; color:black"><h4>Permintaan Dokumen</h4></a></li>
      <li class="breadcrumb active mt-1" aria-current="page"><h5 class="d-inline" style="text-decoration:none; color:black">&nbsp/ {{ $permindok->namaDokumen }}</h5></a></li>
    </ol>
  </nav>
</div>

<div class="bg-white p-3 mb-3">
  <div class="border-bottom border-1 border-dark mb-3">
    <div class="btn-toolbar justify-content-between" role="toolbar" aria-label="Toolbar with button groups">
      <div class="btn-group" role="group">
        <h5 class="mt-1">{{ $permindok->namaDokumen }}</h5>
      </div>
      <div class="input-group">
        <form action="/permindok/{{ $permindok->id }}">
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Search.." name="search" id="cari"
            value="{{ request('search') }}">
            <button class="btn btn-dark" type="submit"><span data-feather="search"></span></button>
          </div>
        </form>
      </div>
    </div>
  </div>
  
  <!-- Tabel Permindok -->
  <div class="table-responsive">
      <table class="table table-striped table-sm table-bordered">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Unit Kerja</th>
            <th scope="col">Status</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @php 
            $no = 1 + (($unitKerjas->currentPage()-1) * $unitKerjas->perPage());
          @endphp
          @if ($unitKerjas->count())
            @foreach ($unitKerjas as $unitKerja)
            <tr>
              <td>{{ $no++ }}</td>
              <td>{{ $unitKerja->namaUnitKerja }}</td>
              <td style="color: red">Belum diunggah</td>
              <td>
                <a href="#" class="badge bg-info"><span data-feather="eye"></span></a>
              </td>
            </tr>
            @endforeach
        </tbody>
        @else
          <table class="table table-striped table-sm table-bordered">
                <p class="text-center fs-6">Unit Kerja tidak ditemukan</p>
          @endif
          </table>
  </div>
</div>

<div class="d-flex justify-content-end">
  {!! $unitKerjas->appends(Request::except('page'))->render() !!}
</div>

<div class="d-flex mb-3 justify-content-end">
  <a href="/permindok" class="btn btn-secondary mx-3">Kembali</a>
</div>

@endsection