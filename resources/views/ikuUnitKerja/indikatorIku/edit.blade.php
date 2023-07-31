@extends('layouts.main')

@section('container')
<div class="container mt-3">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/ikuUnitKerja" style="text-decoration:none; color:black"
            onclick="return confirm('Batal mengubah indikator IKU?')"><h4>Pengaturan IKU</h4></a></li>
        <li class="breadcrumb active mt-1" aria-current="page"><a href="/ikuUnitKerja/{{ $indikatorIKU->ikuUnitKerja->namaUnitKerja }}" style="text-decoration:none; color:black"
            onclick="return confirm('Batal mengubah indikator IKU?')"><h5>&nbsp/ {{ $indikatorIKU->ikuUnitKerja->namaUnitKerja }}</h5></a></li>
        <li class="breadcrumb active mt-1" aria-current="page"><h5 class="d-inline" style="text-decoration:none; color:black">&nbsp/ Ubah Indikator</h5></li>
      </ol>
  </nav>
</div>            

<form action="/ikuUnitKerja/indikatorIku/{{ $indikatorIKU->id }}" method="post">
  @method('put')
  @csrf
  <div class="mb-3 row">
    <label for="sasaranIku_id" class="col-sm-2 col-form-label">Kode Sasaran</label>
    <div class="col-sm-10 mb-2">
      <select class="form-select" name="sasaranIku_id">
        @foreach ( $sasaranIKUs as $sasaranIKU )
            @if(old('sasaranIku_id', $indikatorIKU->sasaranIku_id) == $sasaranIKU->id)
                <option value="{{ $sasaranIKU->id }}" selected>{{ $sasaranIKU->kodeSasaran }}</option>
            @else
                <option value="{{ $sasaranIKU->id }}">{{ $sasaranIKU->kodeSasaran }}</option>
            @endif  
        @endforeach
      </select>
    </div>
    <label for="kodeIndikator" class="col-sm-2 col-form-label">Kode Indikator</label>
    <div class="col-sm-10 mb-2">
      <input type="text" class="form-control @error('kodeIndikator') is-invalid @enderror"
      name="kodeIndikator" id="kodeIndikator" value="{{ old('kodeIndikator', $indikatorIKU->kodeIndikator) }}" required>
      @error('kodeIndikator')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <label for="indikator" class="col-sm-2 col-form-label">Indikator</label>
    <div class="col-sm-10 mb-2">
      <input type="text" class="form-control @error('indikator') is-invalid @enderror"
      name="indikator" id="indikator" value="{{ old('indikator', $indikatorIKU->indikator) }}" required>
      @error('indikator')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <input type="hidden" class="form-control" name="namaUnitKerja" id="namaUnitKerja" value="{{ $namaUnitKerja }}" required>    
  </div>
  <div class="modal-footer">
    <a href="/ikuUnitKerja/{{ $namaUnitKerja }}" class="btn btn-secondary mx-3" onclick="return confirm('Batal mengubah indikator?')">Batal</a>
    <button type="submit" class="btn btn-primary">Ubah Indikator</button>
  </div>
</form> 

@endsection