@extends('layouts.main')

@section('container')

<div class="container mt-3">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb border-bottom border-dark">
        <li class="breadcrumb-item"><a href="/dashboard" style="text-decoration:none; color:black"><h4>Dashboard</h4></a></li>
        <li class="breadcrumb active mt-1" aria-current="page"><h5 class="d-inline" style="text-decoration:none; color:black">&nbsp/ Hasil Panelisasi</h5></li>
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
            <th scope="col">Kode Unit Kerja</th>
            <th scope="col">Nama Unit Kerja</th>
            <th scope="col">Nama Anggota Tim</th>
            <th scope="col">Nama Ketua Tim</th>
            <th scope="col">Nama Pengendali Teknis</th>
            <th scope="col">Nilai {{ date('Y')-1 }}</th>
            <th scope="col">Nilai {{ date('Y') }}</th>
            <th scope="col">Selisih</th>
            <th scope="col">Rank {{ date('Y')-1 }}</th>
            <th scope="col">Rank {{ date('Y') }}</th>
          </tr>
        </thead>
        <tbody>
          @php 
            $no = 1 + (($tims->currentPage()-1) * $tims->perPage());
          @endphp

            @foreach ($tims as $tim)
            <tr>
              <td>{{ $tim->unitKerja->kodeUnitKerja }}</td>
              <td>{{ $tim->unitKerja->namaUnitKerja }}</td>
              <td>{{ $tim->pegawaiAT->namaPegawai }}</td>
              <td>{{ $tim->timDalnisKT->pegawaiKT->namaPegawai }}</td>
              <td>{{ $tim->timDalnisKT->pegawaiDalnis->namaPegawai }}</td>
              <td>66.88</td>
              <td>67.67</td>
              <td style="background-color: green; color: white">0.79</td>
              <td>77</td>
              <td>294</td>
            </tr>
            @endforeach
        </tbody>
    </table>
  </div>

    Keterangan :
    <div class="d-flex justify-content-start mb-1">
      <div class="px-2 bd-highlight" style="background-color: green; color: white">XX</div>&nbsp = Selisih antara nilai {{ date('Y')-1 }} dan {{ date('Y') }} antara 0 hingga 5 poin
    </div>
    <div class="d-flex justify-content-start mb-1">
        <div class="px-2 bd-highlight" style="background-color: orange; color: white">XX</div>&nbsp = Selisih antara nilai {{ date('Y')-1 }} dan {{ date('Y') }} antara 5 hingga 10 poin
    </div>
    <div class="d-flex justify-content-start mb-1">
        <div class="px-2 bd-highlight" style="background-color: pink; color: black">XX</div>&nbsp = Selisih antara nilai {{ date('Y')-1 }} dan {{ date('Y') }} lebih dari 10 poin
    </div>
    <div class="d-flex justify-content-start mb-1 pb-3">
        <div class="px-2 bd-highlight" style="background-color: white; color: red">XX</div>&nbsp = Terjadi penurunan nilai dari tahun {{ date('Y')-1 }} ke {{ date('Y') }}
    </div>

</div>

<div class="d-flex justify-content-end">
  {!! $tims->appends(Request::except('page'))->render() !!}
</div>

<div class="d-flex mb-3 justify-content-end pt-3">
    <a href="/dashboard" class="btn btn-secondary mx-3">Kembali</a>
</div>

@endsection