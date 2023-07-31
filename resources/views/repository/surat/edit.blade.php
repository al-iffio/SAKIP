@extends('layouts.main')

@section('container')
<div class="container mt-3">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb border-bottom border-dark">
        <li class="breadcrumb-item"><a href="/repository/surat" style="text-decoration:none; color:black"
            onclick="return confirm('Batal mengubah Surat?')"><h4>Repository</h4></a></li>
        <li class="breadcrumb active mt-1" aria-current="page"><h5 class="d-inline" style="text-decoration:none; color:black">&nbsp/ Ubah Surat</h5></li>
      </ol>
  </nav>
</div>            

<form action="/repository/surat/{{ $surat->id }}" method="post">
  @method('put')
  @csrf
  <div class="mb-3 row">
    <label for="surat" class="col-sm-2 col-form-label">Nama Surat</label>
    <div class="col-sm-10 mb-2">
      <input type="text" class="form-control @error('surat') is-invalid @enderror"
      name="surat" id="surat" value="{{ old('surat', $surat->surat) }}" required>
      @error('surat')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <label for="link" class="col-sm-2 col-form-label">Link Surat</label>
    <div class="col-sm-10 mb-2">
      <input type="text" class="form-control @error('link') is-invalid @enderror"
      name="link" id="link" value="{{ old('link', $surat->link) }}" required>
      @error('link')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
  </div>
  <div class="modal-footer">
    <a href="/repository/surat" class="btn btn-secondary mx-3" onclick="return confirm('Batal mengubah Surat?')">Batal</a>
    <button type="submit" class="btn btn-primary">Ubah Surat</button>
  </div>
</form> 

@endsection