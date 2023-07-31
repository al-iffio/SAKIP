@extends('layouts.main')

@section('container')
<div class="container mt-3">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb border-bottom border-dark">
        <li class="breadcrumb-item"><a href="/ikuUnitKerja" style="text-decoration:none; color:black"><h4>Pengaturan IKU</h4></a></li>
        <li class="breadcrumb active mt-1" aria-current="page"><h5 class="d-inline" style="text-decoration:none; color:black">&nbsp/ {{ $ikuUnitKerja->namaUnitKerja }}</h5></li>
      </ol>
    </nav>
</div>

@include('ikuUnitKerja.tujuanIku.index')
@include('ikuUnitKerja.sasaranIku.index')
@include('ikuUnitKerja.indikatorIku.index')

<div class="d-flex mb-3 justify-content-end">
  <a href="/ikuUnitKerja" class="btn btn-secondary mx-3">Kembali</a>
</div>

@endsection