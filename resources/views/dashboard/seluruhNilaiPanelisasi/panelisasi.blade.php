@extends('layouts.main')

@section('container')

<div class="container mt-3">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb border-bottom border-dark">
      <li class="breadcrumb-item"><a href="/dashboard" style="text-decoration:none; color:black"><h4>Dashboard</h4></a></li>
      <li class="breadcrumb active mt-1" aria-current="page"><a href="/dashboard/seluruhNilaiPanelisasi" style="text-decoration:none; color:black">
        <h5>&nbsp/ Nilai Panelisasi</h5></a></li>
      <li class="breadcrumb active mt-1" aria-current="page"><h5 class="d-inline" style="text-decoration:none; color:black">
        @php
          $namaProvinsi = $provinsi->namaUnitKerja;
          $namaProvinsi=preg_replace("/BPS /","", $namaProvinsi);
        @endphp
        &nbsp/ {{ $namaProvinsi }}</h5>
      </li>
    </ol>
  </nav>
</div>


<div class="bg-white p-3 mb-3">
    <div class="border-bottom border-1 border-dark mb-3">
        <div class="btn-toolbar justify-content-between" role="toolbar" aria-label="Toolbar with button groups">
          <div class="btn-group" role="group">
            <h5 class="mt-1">{{ $namaProvinsi }}</h5>
          </div>
        </div>
      </div>
    
    <!-- Tabel Panelisasi -->
  <div class="table-responsive">
    <table class="table table-striped table-sm table-bordered">
      <thead>
        <tr>
            <th scope="col" rowspan="2" class="align-middle">Kode</th>
            <th scope="col" rowspan="2" class="align-middle">Komponen/Sub Komponen/Kriteria</th>
            @foreach ($unitKerjas as $unitKerja)
                <th scope="col" colspan="2">{{ $unitKerja->kodeUnitKerja }} {{ $unitKerja->namaUnitKerja }}</th>
            @endforeach
        </tr>
        <tr>
            @foreach ($unitKerjas as $unitKerja)
                <th scope="col">Nilai Tim</th>
                <th scope="col">Nilai Panelisasi</th>
            @endforeach
        </tr>
      </thead>
      <tbody>
            @foreach ($komponenLKEs as $komponenLKE)
                <tr>
                    <td>{{ $komponenLKE->kodeKomponen }}</td>
                    <td>{{ $komponenLKE->namaKomponen }}</td>
                    @foreach ($unitKerjas as $unitKerja)
                        <td>19.69</td>
                        <td>19.38</td>
                    @endforeach
                </tr>
                @foreach ($komponenLKE->subKomponenLke as $subKomponenLKE)
                    <tr>
                        <td>{{ $subKomponenLKE->kodeSubKomponen }}</td>
                        <td>{{ $subKomponenLKE->namaSubKomponen }}</td>
                        @foreach ($unitKerjas as $unitKerja)
                            <td>19.69</td>
                            <td>19.38</td>
                        @endforeach
                    </tr>
                    @foreach ($subKomponenLKE->kriteriaLke as $kriteriaLKE)
                        <tr>
                            <td>{{ $kriteriaLKE->kodeKriteriaLKE }}</td>
                            <td>{{ $kriteriaLKE->namaKriteria }}</td>
                            @foreach ($unitKerjas as $unitKerja)
                                <td>19.69</td>
                                <td>19.38</td>
                            @endforeach
                        </tr>
                    @endforeach
                @endforeach
            @endforeach
      </tbody>
  </table>
</div>
</div>


<div class="d-flex mb-3 justify-content-end">
  <a href="/dashboard/seluruhNilaiPanelisasi" class="btn btn-secondary mx-3">Kembali</a>
</div>

@endsection