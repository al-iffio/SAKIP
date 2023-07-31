@extends('layouts.main')

@section('container')

<div class="container mt-3">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb border-bottom border-dark">
      <li class="breadcrumb-item"><a href="/dashboard" style="text-decoration:none; color:black"><h4>Dashboard</h4></a></li>
      <li class="breadcrumb active mt-1" aria-current="page"><a href="/dashboard/hasilDEdanMonevTL" style="text-decoration:none; color:black">
        <h5>&nbsp/ Hasil DE dan Monev TL</h5></a></li>
      <li class="breadcrumb active mt-1" aria-current="page"><h5 class="d-inline" style="text-decoration:none; color:black">
        @php
          $namaProvinsi = $provinsi->namaUnitKerja;
          $namaProvinsi=preg_replace("/BPS /","", $namaProvinsi);
        @endphp
        &nbsp/ Monev TL {{ $namaProvinsi }}</h5>
      </li>
    </ol>
  </nav>
</div>

<div class="btn-group d-flex border-bottom border-dark rounded-0" role="group" aria-label="Basic example">
  <a class="btn btn-dark rounded-0 flex-fill" style="background-color:#4b3d17" href="/dashboard/hasilDEdanMonevTL/hasilDE/{{ $provinsi->id }}" role="button">Hasil Desk Evaluation</a>
  <button type="button" class="btn btn-secondary rounded-0 flex-fill" style="background-color:#4b3d17" disabled>Monev Tindak Lanjut</button>
</div>

@foreach ($dokumenTLs as $dokumenTL)
<div class="bg-white p-3 mb-3">
    <div class="border-bottom border-dark">
        <h6>{{ $loop->iteration }}. {{ $dokumenTL->dokumenTL }}</h6>
    </div>
    
    <!-- Tabel Kriteria TL -->
  <div class="table-responsive">
    <table class="table table-striped table-sm table-bordered">
      <thead>
        <tr>
            <th scope="col">Kode Kriteria TL</th>
            <th scope="col">Kriteria TL</th>
            @foreach ($unitKerjas as $unitKerja)
                <th scope="col">{{ $unitKerja->kodeUnitKerja }}</th>
            @endforeach
        </tr>
      </thead>
      <tbody>
          @foreach ($dokumenTL->kriteriaTL as $kriteriaTL)
          <tr>
            <td>{{ $kriteriaTL->kriteriaLke->kodeKriteriaLKE }}</td>
            <td>{{ $kriteriaTL->kriteriaLke->namaKriteria }}</td>
            @foreach ($unitKerjas as $unitKerja)
                <td>Y</td>
            @endforeach
          </tr>
          @endforeach
      </tbody>
  </table>
</div>
</div>
@endforeach

<div class="d-flex mb-3 justify-content-end">
  <a href="/dashboard/hasilDEdanMonevTL" class="btn btn-secondary mx-3">Kembali</a>
</div>

@endsection