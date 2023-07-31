@extends('layouts.main')

@section('container')
<div class="container mt-3">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb border-bottom border-dark">
        <li class="breadcrumb-item"><a href="/repository/peraturan" style="text-decoration:none; color:black"
            onclick="return confirm('Batal mengubah Peraturan?')"><h4>Repository</h4></a></li>
        <li class="breadcrumb active mt-1" aria-current="page"><h5 class="d-inline" style="text-decoration:none; color:black">&nbsp/ Ubah Peraturan</h5></li>
      </ol>
  </nav>
</div>            

<form action="/repository/peraturan/{{ $peraturan->id }}" method="post">
  @method('put')
  @csrf
  <div class="mb-3 row">
    <label for="peraturan" class="col-sm-2 col-form-label">Nama Peraturan</label>
    <div class="col-sm-10 mb-2">
      <input type="text" class="form-control @error('peraturan') is-invalid @enderror"
      name="peraturan" id="peraturan" value="{{ old('peraturan', $peraturan->peraturan) }}" required>
      @error('peraturan')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <label for="link" class="col-sm-2 col-form-label">Link Peraturan</label>
    <div class="col-sm-10 mb-2">
      <input type="text" class="form-control @error('link') is-invalid @enderror"
      name="link" id="link" value="{{ old('link', $peraturan->link) }}" required>
      @error('link')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
  </div>
  <div class="modal-footer">
    <a href="/repository/peraturan" class="btn btn-secondary mx-3" onclick="return confirm('Batal mengubah Peraturan?')">Batal</a>
    <button type="submit" class="btn btn-primary">Ubah Peraturan</button>
  </div>
</form> 

@endsection