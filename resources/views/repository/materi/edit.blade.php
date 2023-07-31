@extends('layouts.main')

@section('container')
<div class="container mt-3">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb border-bottom border-dark">
        <li class="breadcrumb-item"><a href="/repository/materi" style="text-decoration:none; color:black"
            onclick="return confirm('Batal mengubah Materi?')"><h4>Repository</h4></a></li>
        <li class="breadcrumb active mt-1" aria-current="page"><h5 class="d-inline" style="text-decoration:none; color:black">&nbsp/ Ubah Materi</h5></li>
      </ol>
  </nav>
</div>            

<form action="/repository/materi/{{ $materi->id }}" method="post">
  @method('put')
  @csrf
  <div class="mb-3 row">
    <label for="materi" class="col-sm-2 col-form-label">Nama Dokumen Materi</label>
    <div class="col-sm-10 mb-2">
      <input type="text" class="form-control @error('dokumenMateri') is-invalid @enderror"
      name="dokumenMateri" id="dokumenMateri" value="{{ old('dokumenMateri', $materi->dokumenMateri) }}" required>
      @error('dokumenMateri')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <label for="link" class="col-sm-2 col-form-label">Link Materi</label>
    <div class="col-sm-10 mb-2">
      <input type="text" class="form-control @error('link') is-invalid @enderror"
      name="link" id="link" value="{{ old('link', $materi->link) }}" required>
      @error('link')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
  </div>
  <div class="modal-footer">
    <a href="/repository/materi" class="btn btn-secondary mx-3" onclick="return confirm('Batal mengubah Dokumen Materi?')">Batal</a>
    <button type="submit" class="btn btn-primary">Ubah Materi</button>
  </div>
</form> 

@endsection