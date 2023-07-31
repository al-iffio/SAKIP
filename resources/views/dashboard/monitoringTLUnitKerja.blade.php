@extends('layouts.main')

@section('container')

<div class="container mt-3">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb border-bottom border-dark">
      <li class="breadcrumb-item"><a href="/dashboard" style="text-decoration:none; color:black"><h4>Dashboard</h4></a></li>
      <li class="breadcrumb active mt-1" aria-current="page"><h5 class="d-inline" style="text-decoration:none; color:black">&nbsp/ Monitoring Evaluasi TL</h5></li>
    </ol>
  </nav>
</div>

<div class="bg-white p-3 mb-3">
    <div class="border-bottom border-1 border-dark mb-3">
        <!-- Button Group -->
        <div class="btn-toolbar justify-content-between" role="toolbar" aria-label="Toolbar with button groups">
          <div class="btn-group" role="group">
            <h5 class="mt-2">Progress Tindak Lanjut Unit Kerja</h5>
          </div>
          <div class="input-group mb-3">
            <label for="wilayah" class="col-form-label me-3"><h6>Filter :</h6></label>
            <select class="form-select rounded-1" name="wilayah" id="wilayah">
              <option value="Semua">Seluruh Unit Kerja</option>
              <option value="Rata-rata">Rata-rata per Provinsi</option>
              @foreach($provinsis as $provinsi)
                <option value="{{ $provinsi->kodeWilayah }}">
                  @php
                    $namaProvinsi = $provinsi->namaUnitKerja;
                    $namaProvinsi=preg_replace("/BPS /","", $namaProvinsi);
                  @endphp
                  {{ $namaProvinsi }}
                </option>
              @endforeach
            </select>
          </div>
        </div>
    </div>

    <div class="bg-white p-3 mb-3">
      <div id="TLUnitKerja"></div>
    </div>
</div>

<div class="d-flex mb-3 justify-content-end">
  <a href="/dashboard" class="btn btn-secondary mx-3">Kembali</a>
</div>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
  Highcharts.chart('TLUnitKerja', {
      chart: {
          type: 'bar',
          height: '100%'
      },
      title: {
          text: 'Progress Tindak Lanjut Unit Kerja'
      },
      xAxis: {
          title: {
            text: 'Nama Unit Kerja'
          },
          categories: {!! json_encode($unitKerja) !!}
      },
      yAxis: {
          min: 0,
          title: {
              text: 'Progress Tindak Lanjut Unit Kerja (%)'
          }
      },
      plotOptions: {
          series: {
              stacking: 'percent'
          }
      },
      colors: ["#F4F4F4", "#B4923D"],
      series: [{
          name: 'Persentase yang belum ditindaklanjuti',
          data: {!! json_encode($belumDiisi) !!}
      }, {
          name: 'Persentase yang telah ditindaklanjuti',
          data: {!! json_encode($sudahDiisi) !!}
      }]
  });
</script>
@endsection