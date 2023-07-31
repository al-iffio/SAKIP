@extends('layouts.main')

@section('container')
<div class="container mt-3">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb border-bottom border-dark">
        <li class="breadcrumb-item"><a href="/ikuUnitKerja" style="text-decoration:none; color:black"
            onclick="return confirm('Batal mengubah tujuan IKU?')"><h4>Pengaturan IKU</h4></a></li>
        <li class="breadcrumb active mt-1" aria-current="page"><a href="/ikuUnitKerja/{{ $tujuanIKU->ikuUnitKerja->namaUnitKerja }}" style="text-decoration:none; color:black"
            onclick="return confirm('Batal mengubah tujuan IKU?')"><h5>&nbsp/ {{ $tujuanIKU->ikuUnitKerja->namaUnitKerja }}</h5></a></li>
        <li class="breadcrumb active mt-1" aria-current="page"><h5 class="d-inline" style="text-decoration:none; color:black">&nbsp/ Ubah Tujuan</h5></li>
      </ol>
  </nav>
</div>            

<form action="/ikuUnitKerja/tujuanIku/{{ $tujuanIKU->id }}" method="post">
  @method('put')
  @csrf
  <div class="mb-3 row">
    <label for="kodeTujuan" class="col-sm-2 col-form-label">Kode Tujuan</label>
    <div class="col-sm-10 mb-2">
      <input type="text" class="form-control @error('kodeTujuan') is-invalid @enderror"
      name="kodeTujuan" id="kodeTujuan" value="{{ old('kodeTujuan', $tujuanIKU->kodeTujuan) }}" required>
      @error('kodeTujuan')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <label for="tujuan" class="col-sm-2 col-form-label">Tujuan</label>
    <div class="col-sm-10 mb-2">
      <input type="text" class="form-control @error('tujuan') is-invalid @enderror"
      name="tujuan" id="tujuan" value="{{ old('tujuan', $tujuanIKU->tujuan) }}" required>
      @error('tujuan')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <input type="hidden" class="form-control" name="namaUnitKerja" id="namaUnitKerja" value="{{ $namaUnitKerja }}" required>    
  </div>
  <div class="modal-footer">
    <a href="/ikuUnitKerja/{{ $namaUnitKerja }}" class="btn btn-secondary mx-3" onclick="return confirm('Batal mengubah tujuan?')">Batal</a>
    <button type="submit" class="btn btn-primary">Ubah Tujuan</button>
  </div>
</form> 

@endsection