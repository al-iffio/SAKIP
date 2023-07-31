@extends('layouts.main')

@section('container')
<div class="container mt-3">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb border-bottom border-dark">
        <li class="breadcrumb-item"><a href="/repository/bukuLHE" style="text-decoration:none; color:black"
            onclick="return confirm('Batal mengubah Buku LHE?')"><h4>Repository</h4></a></li>
        <li class="breadcrumb active mt-1" aria-current="page"><h5 class="d-inline" style="text-decoration:none; color:black">&nbsp/ Ubah Buku LHE</h5></li>
      </ol>
  </nav>
</div>            

<form action="/repository/bukuLHE/{{ $bukuLHE->id }}" method="post">
  @method('put')
  @csrf
  <div class="mb-3 row">
    <label for="bukuLHE" class="col-sm-2 col-form-label">Nama Buku LHE</label>
    <div class="col-sm-10 mb-2">
      <input type="text" class="form-control @error('bukuLHE') is-invalid @enderror"
      name="bukuLHE" id="bukuLHE" value="{{ old('bukuLHE', $bukuLHE->bukuLHE) }}" required>
      @error('bukuLHE')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <label for="link" class="col-sm-2 col-form-label">Link Buku LHE</label>
    <div class="col-sm-10 mb-2">
      <input type="text" class="form-control @error('link') is-invalid @enderror"
      name="link" id="link" value="{{ old('link', $bukuLHE->link) }}" required>
      @error('link')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
  </div>
  <div class="modal-footer">
    <a href="/repository/bukuLHE" class="btn btn-secondary mx-3" onclick="return confirm('Batal mengubah Buku LHE?')">Batal</a>
    <button type="submit" class="btn btn-primary">Ubah Buku LHE</button>
  </div>
</form> 

@endsection