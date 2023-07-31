@extends('layouts.main')

@section('container')

<div class="container mt-3">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb border-bottom border-dark">
      <li class="breadcrumb-item"><a href="/evaluasiLKE" style="text-decoration:none; color:black"><h4>Evaluasi LKE</h4></a></li>
      <li class="breadcrumb active mt-1" aria-current="page"><h5 class="d-inline" style="text-decoration:none; color:black">&nbsp/ Komponen LKE {{ $unitKerja->namaUnitKerja }}</h5></a></li>
    </ol>
  </nav>
</div>

<div class="row pt-3">
  @foreach($komponenLKEs as $komponenLKE)
    <div class="col-sm-3 mb-3 mb-sm-0 py-2">
      <div class="card">
        <form action="/komponenLKE/{{ $komponenLKE->kodeKomponen }}/edit" class="d-inline">
          @csrf
          <input type="hidden" class="form-control" name="unitKerja" id="unitKerja" value="{{ $unitKerja->namaUnitKerja }}" required>
          <input type="hidden" class="form-control" name="IDunitKerja" id="IDunitKerja" value="{{ $unitKerja->id }}" required>
          <button class="btn btn-dark" style="background-color:#B4923D; color:black">
            <div class="card-body">
              <h4 class="text-center"><b>Nilai : 24.14</b></h4>
              <h5 class="text-center">{{ $komponenLKE->kodeKomponen }}. {{ $komponenLKE->namaKomponen }}</h5>
            </div>
          </button>
        </form>
      </div>
    </div>
  @endforeach
</div>

@endsection