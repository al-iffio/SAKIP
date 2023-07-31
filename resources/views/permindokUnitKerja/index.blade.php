@extends('layouts.main')

@section('container')

<div class="container mt-3">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb border-bottom border-dark">
      <li class="breadcrumb-item active" style="color:black;" aria-current="page"><h4>Permintaan Dokumen</h4></li>
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
        <form action="/permindokUnitKerja">
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
  
  <!-- Tabel Permindok -->
  <div class="table-responsive">
      <table class="table table-striped table-sm table-bordered">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Nama Dokumen</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @php 
            $no = 1 + (($permindoks->currentPage()-1) * $permindoks->perPage());
          @endphp
          @if ($permindoks->count())
            @foreach ($permindoks as $permindok)
              <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $permindok->namaDokumen }}</td>
                <td>
                    <a href="#" class="badge bg-info"><span data-feather="eye"></span></a>
                    @if($permindok->metodePengumpulan == "link")
                    <form action="/permindokUnitKerja/editLink" method="post" class="d-inline">
                      @csrf
                      <input type="hidden" class="form-control" name="namaDokumen" id="namaDokumen" value="{{ $permindok->namaDokumen }}" required>
                      <button class="badge bg-warning border-0">
                        <span data-feather="edit"></span>
                      </button>
                    </form>
                    @endif
                    @if($permindok->metodePengumpulan == "upload")
                    <form action="/permindokUnitKerja/editUpload" method="post" class="d-inline">
                      @csrf
                      <input type="hidden" class="form-control" name="namaDokumen" id="namaDokumen" value="{{ $permindok->namaDokumen }}" required>
                      <button class="badge bg-warning border-0">
                        <span data-feather="edit"></span>
                      </button>
                    </form>
                    @endif
                </td>
              </tr>
            @endforeach
        </tbody>
        @else
          <table class="table table-striped table-sm table-bordered">
            <p class="text-center fs-6">Dokumen tidak ditemukan</p>
        @endif
        </table>
  </div>
</div>

<div class="d-flex justify-content-end">
  {!! $permindoks->appends(Request::except('page'))->render() !!}
</div>

@endsection