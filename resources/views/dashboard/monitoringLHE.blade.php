@extends('layouts.main')

@section('container')

<div class="container mt-3">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb border-bottom border-dark">
      <li class="breadcrumb-item"><a href="/dashboard" style="text-decoration:none; color:black"><h4>Dashboard</h4></a></li>
      <li class="breadcrumb active mt-1" aria-current="page"><h5 class="d-inline" style="text-decoration:none; color:black">&nbsp/ Monitoring LHE</h5></li>
    </ol>
  </nav>
</div>

{{-- <div class="row justify-content-center border-bottom">
  <div class="col-md-6">
    <form action="/unitKerja">
      <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Search.." name="search" id="cari"
        value="{{ request('search') }}">
        <button class="btn btn-dark" type="submit"><span data-feather="search"></span></button>
      </div>
    </form>
  </div>
</div> --}}

<div class="bg-white px-3 pt-3 mb-3">
  <!-- Tabel Unit Kerja -->
  <div class="table-responsive">
      <table class="table table-striped table-sm table-bordered">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Kode Unit Kerja</th>
            <th scope="col">Wilayah</th>
            <th scope="col">Nama Unit Kerja</th>
            <th scope="col">Nama Anggota Tim</th>
            <th scope="col">Nama Ketua Tim</th>
            <th scope="col">Nama Pengendali Teknis</th>
            <th scope="col">Status</th>
          </tr>
        </thead>
        <tbody>
          @php 
            $no = 1 + (($tims->currentPage()-1) * $tims->perPage());
          @endphp

            @foreach ($tims as $tim)
            <tr>
              <td>{{ $no++ }}</td>
              <td>{{ $tim->unitKerja->kodeUnitKerja }}</td>
              <td>{{ $tim->unitKerja->wilayah }}</td>
              <td>{{ $tim->unitKerja->namaUnitKerja }}</td>
              <td>{{ $tim->pegawaiAT->namaPegawai }}</td>
              <td>{{ $tim->timDalnisKT->pegawaiKT->namaPegawai }}</td>
              <td>{{ $tim->timDalnisKT->pegawaiDalnis->namaPegawai }}</td>
              <td style="color: red">Belum dikirim</td>
            </tr>
            @endforeach
        </tbody>
    </table>
  </div>
</div>

<div class="d-flex justify-content-end">
  {!! $tims->appends(Request::except('page'))->render() !!}
</div>

<div class="d-flex mb-3 justify-content-end pt-3">
    <a href="/dashboard" class="btn btn-secondary mx-3">Kembali</a>
</div>

@endsection