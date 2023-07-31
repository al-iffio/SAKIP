@extends('layouts.main')

@section('container')
<div class="container mt-3">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb border-bottom border-dark">
        <li class="breadcrumb-item"><a href="/dokumenTL" style="text-decoration:none; color:black"
            onclick="return confirm('Batal mengubah dokumen tindak lanjut?')"><h4>Tindak Lanjut</h4></a></li>
        <li class="breadcrumb active mt-1" aria-current="page"><h5 class="d-inline" style="text-decoration:none; color:black">&nbsp/ Ubah Dokumen TL</h5></a></li>
    </ol>
  </nav>
</div>            

<div class="border-bottom border-dark p-3 mb-3">
  <form action="/dokumenTL/{{ $dokumenTL->id }}" method="post">
    @method('put')
    @csrf
    <div class="mb-3 row">
      <label for="dokumenTL" class="col-sm-2 col-form-label">Dokumen TL</label>
      <div class="col-sm-10 mb-2">
        <input type="text" class="form-control @error('dokumenTL') is-invalid @enderror"
        name="dokumenTL" id="dokumenTL" value="{{ old('dokumenTL', $dokumenTL->dokumenTL) }}" required>
        @error('dokumenTL')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>           
    </div>
    <div class="modal-footer">
      <a href="/dokumenTL" class="btn btn-secondary mx-3" onclick="return confirm('Batal mengubah Dokumen TL?')">Batal</a>
      <button type="submit" class="btn btn-primary">Ubah Dokumen TL</button>
    </div>
  </form> 
</div>

@include('dokumenTL.kriteriaTL.index')

@endsection