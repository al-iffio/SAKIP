@extends('layouts.main')

@section('container')

<div class="container mt-3">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb border-bottom border-dark">
      <li class="breadcrumb-item active" style="color:black;" aria-current="page"><h4>Pengaturan IKU</h4></li>
    </ol>
  </nav>
</div>

<div class="bg-white p-3 mb-3">
  <div class="border-bottom border-1 border-dark mb-3">
    <!-- Button Group -->
    <div class="btn-toolbar justify-content-between" role="toolbar" aria-label="Toolbar with button groups">
      <div class="btn-group" role="group">
        <h5 class="mt-1">Daftar Unit Kerja</h5>
      </div>
      <div class="input-group">
        <form action="/ikuUnitKerja">
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Search.." name="search" id="cari"
            value="{{ request('search') }}">
            <button class="btn btn-dark" type="submit"><span data-feather="search"></span></button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Tabel IKU -->
  <div class="table-responsive mt-3">
      <table class="table table-striped table-sm table-bordered">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">ID</th>
            <th scope="col">@sortablelink('namaUnitKerja','Nama Unit Kerja')&#8645;</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @php 
            $no = 1 + (($ikuUnitKerjas->currentPage()-1) * $ikuUnitKerjas->perPage());
          @endphp
          @if ($ikuUnitKerjas->count())
            @foreach ($ikuUnitKerjas as $ikuUnitKerja)
            <tr>
              <td>{{ $no++ }}</td>
              <td>
                @if($ikuUnitKerja->namaUnitKerja != "BPS Seluruh Indonesia")
                  00{{ $ikuUnitKerja->id }}
                @else
                  {{ $ikuUnitKerja->id }}
                @endif
              </td>
              <td>{{ $ikuUnitKerja->namaUnitKerja }}</td>
              <td>
                <a href="/ikuUnitKerja/{{ $ikuUnitKerja->namaUnitKerja }}" class="badge bg-info"><span data-feather="eye"></span></a>
              </td>
            </tr>
            @endforeach
        </tbody>
          @else
          <table class="table table-striped table-sm table-bordered">
                <p class="text-center fs-4">Unit Kerja tidak ditemukan</p>
          @endif
          </table>
  </div>
</div>

<div class="d-flex justify-content-end">
  {!! $ikuUnitKerjas->appends(Request::except('page'))->render() !!}
</div>

@endsection