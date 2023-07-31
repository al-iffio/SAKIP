@extends('layouts.main')

@section('container')

<div class="container mt-3">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb border-bottom border-dark">
      <li class="breadcrumb-item"><a href="/dashboard" style="text-decoration:none; color:black"><h4>Dashboard</h4></a></li>
      <li class="breadcrumb active mt-1" aria-current="page"><h5 class="d-inline" style="text-decoration:none; color:black">&nbsp/ Monitoring Panelisasi</h5></li>
    </ol>
  </nav>
</div>

<div class="bg-white p-3 mb-3">
  <div id="panelisasi"></div>
</div>

<div class="row">
    <div class="col-sm-3 mb-3 mb-sm-0">
        <div class="card rounded-2 border-2 border-dark">
            <div class="card-body" style="background-color:#4b3d17">
              <h6 class="text-center my-1 text-white">Inspektorat Utama</h5>
              <h5 class="text-center my-1 text-white">50%</h5>
            </div>
        </div>
    </div>
    <div class="col-sm-3 mb-3 mb-sm-0">
        <div class="card rounded-2 border-2 border-dark">
            <div class="card-body" style="background-color:#B4923D">
              <h6 class="text-center my-1 text-white">Inspektorat Wilayah I</h5>
              <h5 class="text-center my-1 text-white">50%</h5>
            </div>
        </div>
    </div>
    <div class="col-sm-3 mb-3 mb-sm-0">
        <div class="card rounded-2 border-2 border-dark">
            <div class="card-body" style="background-color:#B4923D">
              <h6 class="text-center my-1 text-white">Inspektorat Wilayah II</h5>
              <h5 class="text-center my-1 text-white">50%</h5>
            </div>
        </div>
    </div>
    <div class="col-sm-3 mb-3 mb-sm-0">
        <div class="card rounded-2 border-2 border-dark">
            <div class="card-body" style="background-color:#B4923D">
              <h6 class="text-center my-1 text-white">Inspektorat Wilayah III</h6>
              <h5 class="text-center my-1 text-white">50%</h5>
            </div>
        </div>
    </div>
</div>

<div class="d-flex mb-3 justify-content-end pt-3">
  <a href="/dashboard" class="btn btn-secondary mx-3">Kembali</a>
</div>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
  Highcharts.chart('panelisasi', {
      chart: {
          type: 'bar',
          height: '100%'
      },
      title: {
          text: 'Progress Panelisasi'
      },
      xAxis: {
          title: {
            text: 'Nama Pengendali Teknis'
          },
          categories: {!! json_encode($dalnis) !!}
      },
      yAxis: {
          min: 0,
          title: {
              text: 'Progress Panelisasi (%)'
          }
      },
      plotOptions: {
          series: {
              stacking: 'percent'
          }
      },
      colors: ["#F4F4F4", "#B4923D"],
      series: [{
          name: 'Persentase yang belum dilakukan panelisasi',
          data: {!! json_encode($belumDiisi) !!}
      }, {
          name: 'Persentase yang telah dilakukan panelisasi',
          data: {!! json_encode($sudahDiisi) !!}
      }]
  });
</script>
@endsection