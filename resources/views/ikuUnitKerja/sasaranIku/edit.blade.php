@extends('layouts.main')

@section('container')
<div class="container mt-3">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/ikuUnitKerja" style="text-decoration:none; color:black"
            onclick="return confirm('Batal mengubah sasaran IKU?')"><h4>Pengaturan IKU</h4></a></li>
        <li class="breadcrumb active mt-1" aria-current="page"><a href="/ikuUnitKerja/{{ $sasaranIKU->ikuUnitKerja->namaUnitKerja }}" style="text-decoration:none; color:black"
            onclick="return confirm('Batal mengubah sasaran IKU?')"><h5>&nbsp/ {{ $sasaranIKU->ikuUnitKerja->namaUnitKerja }}</h5></a></li>
        <li class="breadcrumb active mt-1" aria-current="page"><h5 class="d-inline" style="text-decoration:none; color:black">&nbsp/ Ubah Sasaran</h5></li>
      </ol>
  </nav>
</div>            

<form action="/ikuUnitKerja/sasaranIku/{{ $sasaranIKU->id }}" method="post">
  @method('put')
  @csrf
  <div class="mb-3 row">
    <label for="tujuanIku_id" class="col-sm-2 col-form-label">Kode Tujuan</label>
    <div class="col-sm-10 mb-2">
      <select class="form-select" name="tujuanIku_id">
        @foreach ( $tujuanIKUs as $tujuanIKU )
            @if(old('tujuanIku_id', $sasaranIKU->tujuanIku_id) == $tujuanIKU->id)
                <option value="{{ $tujuanIKU->id }}" selected>{{ $tujuanIKU->kodeTujuan }}</option>
            @else
                <option value="{{ $tujuanIKU->id }}">{{ $tujuanIKU->kodeTujuan }}</option>
            @endif  
        @endforeach
      </select>
    </div>
    <label for="kodeSasaran" class="col-sm-2 col-form-label">Kode Sasaran</label>
    <div class="col-sm-10 mb-2">
      <input type="text" class="form-control @error('kodeSasaran') is-invalid @enderror"
      name="kodeSasaran" id="kodeSasaran" value="{{ old('kodeSasaran', $sasaranIKU->kodeSasaran) }}" required>
      @error('kodeSasaran')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <label for="sasaran" class="col-sm-2 col-form-label">Sasaran</label>
    <div class="col-sm-10 mb-2">
      <input type="text" class="form-control @error('sasaran') is-invalid @enderror"
      name="sasaran" id="sasaran" value="{{ old('sasaran', $sasaranIKU->sasaran) }}" required>
      @error('sasaran')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <input type="hidden" class="form-control" name="namaUnitKerja" id="namaUnitKerja" value="{{ $namaUnitKerja }}" required>    
  </div>
  <div class="modal-footer">
    <a href="/ikuUnitKerja/{{ $namaUnitKerja }}" class="btn btn-secondary mx-3" onclick="return confirm('Batal mengubah sasaran?')">Batal</a>
    <button type="submit" class="btn btn-primary">Ubah Sasaran</button>
  </div>
</form> 

@endsection