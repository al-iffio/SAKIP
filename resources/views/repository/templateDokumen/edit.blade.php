@extends('layouts.main')

@section('container')
<div class="container mt-3">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb border-bottom border-dark">
        <li class="breadcrumb-item"><a href="/repository/templateDokumen" style="text-decoration:none; color:black"
            onclick="return confirm('Batal mengubah Template Dokumen?')"><h4>Repository</h4></a></li>
        <li class="breadcrumb active mt-1" aria-current="page"><h5 class="d-inline" style="text-decoration:none; color:black">&nbsp/ Ubah Template Dokumen</h5></li>
      </ol>
  </nav>
</div>            

<form action="/repository/templateDokumen/{{ $templateDokumen->id }}" method="post">
  @method('put')
  @csrf
  <div class="mb-3 row">
    <label for="templateDokumen" class="col-sm-2 col-form-label">Nama Template Dokumen</label>
    <div class="col-sm-10 mb-2">
      <input type="text" class="form-control @error('templateDokumen') is-invalid @enderror"
      name="templateDokumen" id="templateDokumen" value="{{ old('templateDokumen', $templateDokumen->templateDokumen) }}" required>
      @error('templateDokumen')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <label for="link" class="col-sm-2 col-form-label">Link Template Dokumen</label>
    <div class="col-sm-10 mb-2">
      <input type="text" class="form-control @error('link') is-invalid @enderror"
      name="link" id="link" value="{{ old('link', $templateDokumen->link) }}" required>
      @error('link')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
  </div>
  <div class="modal-footer">
    <a href="/repository/templateDokumen" class="btn btn-secondary mx-3" onclick="return confirm('Batal mengubah Template Dokumen?')">Batal</a>
    <button type="submit" class="btn btn-primary">Ubah Template Dokumen</button>
  </div>
</form>
@endsection