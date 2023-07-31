@extends('layouts.main')

@section('container')

<div class="container mt-3">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb border-bottom border-dark">
      <li class="breadcrumb-item"><a href="/evaluasiKKE" style="text-decoration:none; color:black"><h4>Evaluasi KKE</h4></a></li>
      <li class="breadcrumb active mt-1" aria-current="page"><h5 class="d-inline" style="text-decoration:none; color:black">&nbsp/ {{ $unitKerja->namaUnitKerja }}</h5></li>
    </ol>
  </nav>
</div>

@include('kke.index')

@endsection