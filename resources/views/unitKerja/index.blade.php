@extends('layouts.main')

@section('container')

<div class="container mt-3">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb border-bottom border-dark">
      <li class="breadcrumb-item active" style="color:black;" aria-current="page"><h4>Pengaturan User Unit Kerja</h4></li>
    </ol>
  </nav>
</div>

<div class="bg-white px-3 mb-3">
  <div class="border-bottom border-1 border-dark mb-3">
    <!-- Button Group -->
    <div class="btn-toolbar justify-content-between">
      <div class="btn-group">
        <button type="button" class="btn btn-primary my-3 rounded-2" data-bs-toggle="modal" data-bs-target="#tambahUnitKerja">
          <span data-feather="file-plus"></span> Tambah Unit Kerja
        </button>

        <button type="button" class="btn btn-primary my-3 ms-2 rounded-2" data-bs-toggle="modal" data-bs-target="#imporUnitKerja">
          <span data-feather="file-plus"></span> Impor Unit Kerja
        </button>
      </div>
      <div class="input-group">
        <form action="/unitKerja">
          <div class="input-group my-3">
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
  
  <!-- Tabel Unit Kerja -->
  <div class="table-responsive">
      <table class="table table-striped table-sm table-bordered">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">@sortablelink('kodeWilayah','Kode Wilayah')&#8645;</th>
            <th scope="col">@sortablelink('kodeUnitKerja','Kode Unit Kerja')&#8645;</th>
            <th scope="col">@sortablelink('wilayah','Wilayah')&#8645;</th>
            <th scope="col">@sortablelink('namaUnitKerja','Nama Unit Kerja')&#8645;</th>
            <th scope="col">@sortablelink('namaPIC','Nama PIC')&#8645;</th>
            <th scope="col">@sortablelink('noTelpPIC','No. Telpon PIC')&#8645;</th>
            <th scope="col">@sortablelink('role','Role')&#8645;</th>
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
              <td>{{ $unitKerja->kodeWilayah }}</td>
              <td>{{ $unitKerja->kodeUnitKerja }}</td>
              <td>{{ $unitKerja->wilayah }}</td>
              <td>{{ $unitKerja->namaUnitKerja }}</td>
              <td>{{ $unitKerja->namaPIC }}</td>
              <td>{{ $unitKerja->noTelpPIC }}</td>
              <td>{{ $unitKerja->role }}</td>
              <td>
                <a href="/unitKerja/{{ $unitKerja->id }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
                {{-- <button type="button" class="badge bg-warning border-0" data-bs-toggle="modal" data-bs-target="#editUnitKerja-{{ $unitKerja->id }}">
                    <span data-feather="edit"></span>
                </button>
                @include('unitKerja.Modal.edit') --}}
                <form action="/unitKerja/{{ $unitKerja->id }}" method="post" class="d-inline">
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
                <p class="text-center fs-6">Unit Kerja tidak ditemukan</p>
          @endif
          </table>
  </div>
</div>

<div class="d-flex justify-content-end">
  {!! $unitKerjas->appends(Request::except('page'))->render() !!}
</div>

@include('unitKerja.modalCreate')
@include('unitKerja.impor')

  <script>
    function Username(){
      var kodeUnitKerja = document.getElementById("kodeUnitKerja")
      var username = document.getElementById("username");
      username.value = kodeUnitKerja.value
    }

    function AnEventHasOccurred() {
      var role = document.getElementById("role");
      var kodeSatkerProv = document.getElementById("kodeSatkerProv");
      var kodeWilayah = document.getElementById("kodeWilayah");

      if(role.options[role.selectedIndex].value === "BPS Kab/Kota") {
        kodeSatkerProv.value = kodeWilayah.value + "00"
      } else if(role.options[role.selectedIndex].value !== "BPS Kab/Kota") {
        kodeSatkerProv.value = ""
      }
    }

    function KodeIKU() {
      var kodeIKU = document.getElementById("ikuUnitKerja_id");
      var kodeUnitKerja = document.getElementById("kodeUnitKerja")
      var role = document.getElementById("role");

      if(role.options[role.selectedIndex].value === "Unit Kerja Pusat") {
        kodeIKU.value = kodeUnitKerja.value
      } else if(role.options[role.selectedIndex].value !== "Unit Kerja Pusat") {
        kodeIKU.value = "9999"
      }
    }
  </script>

@endsection