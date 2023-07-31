@extends('layouts.main')

@section('container')
<div class="container mt-3">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb border-bottom border-dark">
        <li class="breadcrumb-item"><a href="/permindokUnitKerja" style="text-decoration:none; color:black"
            onclick="return confirm('Batal mengubah Permindok?')"><h4>Permintaan Dokumen</h4></a></li>
        <li class="breadcrumb active mt-1" aria-current="page"><h5 class="d-inline" style="text-decoration:none; color:black">&nbsp/ Pengumpulan Dokumen {{ $namaDokumen }}</h5></a></li>
    </ol>
  </nav>
</div>            

<div class="border-bottom border-dark p-3 mb-3">
  <form action="#" method="post">
    @method('put')
    @csrf
    <div class="mb-3 row">
      <label for="link" class="col-sm-2 col-form-label">Link {{ $namaDokumen }}</label>
      <div class="col-sm-10 mb-2">
        <input type="text" class="form-control @error('link') is-invalid @enderror"
        name="link" id="link" value="{{ old('link') }}" required>
        @error('link')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>           
    </div>
    <div class="modal-footer">
      <a href="/permindokUnitKerja" class="btn btn-secondary mx-3" onclick="return confirm('Batal mengubah Permindok?')">Batal</a>
      <a href="/permindokUnitKerja" class="btn btn-primary mx-3">Ubah Permindok</a>
    </div>
  </form> 
</div>

@endsection