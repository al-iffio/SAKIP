@extends('layouts.main')

@section('container')
<div class="container mt-3">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb border-bottom border-dark">
        <li class="breadcrumb-item"><a href="/repository/pelatihan" style="text-decoration:none; color:black"
            onclick="return confirm('Batal mengubah Dokumen Pelatihan?')"><h4>Repository</h4></a></li>
        <li class="breadcrumb active mt-1" aria-current="page"><h5 class="d-inline" style="text-decoration:none; color:black">&nbsp/ Ubah Dokumen Pelatihan</h5></li>
      </ol>
  </nav>
</div>            

<form action="/repository/pelatihan/{{ $pelatihan->id }}" method="post">
  @method('put')
  @csrf
  <div class="mb-3 row">
    <label for="pelatihan" class="col-sm-2 col-form-label">Nama Dokumen Pelatihan</label>
    <div class="col-sm-10 mb-2">
      <input type="text" class="form-control @error('dokumenPelatihan') is-invalid @enderror"
      name="dokumenPelatihan" id="dokumenPelatihan" value="{{ old('dokumenPelatihan', $pelatihan->dokumenPelatihan) }}" required>
      @error('dokumenPelatihan')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <label for="link" class="col-sm-2 col-form-label">Link Dokumen Pelatihan</label>
    <div class="col-sm-10 mb-2">
      <input type="text" class="form-control @error('link') is-invalid @enderror"
      name="link" id="link" value="{{ old('link', $pelatihan->link) }}" required>
      @error('link')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
  </div>
  <div class="modal-footer">
    <a href="/repository/pelatihan" class="btn btn-secondary mx-3" onclick="return confirm('Batal mengubah Dokumen Pelatihan?')">Batal</a>
    <button type="submit" class="btn btn-primary">Ubah Dokumen Pelatihan</button>
  </div>
</form> 

@endsection