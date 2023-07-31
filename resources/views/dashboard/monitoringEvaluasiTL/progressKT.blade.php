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

<div class="btn-group d-flex border-bottom border-dark rounded-0" role="group" aria-label="Basic example">
  <a class="btn btn-dark rounded-0 flex-fill" style="background-color:#4b3d17" href="/dashboard/monitoringEvaluasiTL/progressAT" role="button">Progress Anggota Tim</a>
  <button type="button" class="btn btn-secondary rounded-0 flex-fill" style="background-color:#4b3d17" disabled>Progress Ketua Tim</button>
  <a class="btn btn-dark rounded-0 flex-fill" style="background-color:#4b3d17" href="/dashboard/monitoringEvaluasiTL/progressDalnis" role="button">Progress Pengendali Teknis</a>
</div>

<div class="bg-white p-3 mb-3">
  <div id="progressKT"></div>
</div>

<div class="d-flex mb-3 justify-content-end">
  <a href="/dashboard" class="btn btn-secondary mx-3">Kembali</a>
</div>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
  Highcharts.chart('progressKT', {
      chart: {
          type: 'bar',
          height: '100%'
      },
      title: {
          text: 'Progress Evaluasi Ketua Tim'
      },
      xAxis: {
          title: {
            text: 'Nama Ketua Tim'
          },
          categories: {!! json_encode($kt) !!}
      },
      yAxis: {
          min: 0,
          title: {
              text: 'Progress Ketua Tim (%)'
          }
      },
      plotOptions: {
          series: {
              stacking: 'percent'
          }
      },
      colors: ["#F4F4F4", "#B4923D"],
      series: [{
          name: 'Persentase yang belum dievaluasi',
          data: {!! json_encode($belumDiisi) !!}
      }, {
          name: 'Persentase yang telah dievaluasi',
          data: {!! json_encode($sudahDiisi) !!}
      }]
  });
</script>

@endsection