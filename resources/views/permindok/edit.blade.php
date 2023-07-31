@extends('layouts.main')

@section('container')
<div class="container mt-3">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb border-bottom border-dark">
        <li class="breadcrumb-item"><a href="/permindok" style="text-decoration:none; color:black"
            onclick="return confirm('Batal mengubah Permindok?')"><h4>Permintaan Dokumen</h4></a></li>
        <li class="breadcrumb active mt-1" aria-current="page"><h5 class="d-inline" style="text-decoration:none; color:black">&nbsp/ Ubah Permintaan Dokumen</h5></a></li>
    </ol>
  </nav>
</div>            

<div class="border-bottom border-dark p-3 mb-3">
  <form action="/permindok/{{ $permindok->id }}" method="post">
    @method('put')
    @csrf
    <div class="mb-3 row">
      <label for="namaDokumen" class="col-sm-2 col-form-label">Nama Dokumen</label>
      <div class="col-sm-10 mb-2">
        <input type="text" class="form-control @error('namaDokumen') is-invalid @enderror"
        name="namaDokumen" id="namaDokumen" value="{{ old('namaDokumen', $permindok->namaDokumen) }}" required>
        @error('namaDokumen')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>
      <label for="metodePengumpulan" class="col-sm-2 col-form-label">Metode Pengumpulan</label>
      <div class="col-sm-10 mb-2 pt-3">
        <div class="form-check form-check-inline">
          <input class="form-check-input @error('metodePengumpulan') is-invalid @enderror"
          type="radio" name="metodePengumpulan" id="metodePengumpulan" value="link" {{ old('metodePengumpulan', $permindok->metodePengumpulan) == 'link' ? 'checked' : '' }}>
          <label class="form-check-label" for="metodePengumpulan1">
            Menyertakan Link
          </label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input @error('metodePengumpulan') is-invalid @enderror"
          type="radio" name="metodePengumpulan" id="metodePengumpulan" value="upload" {{ old('metodePengumpulan', $permindok->metodePengumpulan) == 'upload' ? 'checked' : '' }}>
          <label class="form-check-label" for="metodePengumpulan2">
            Mengunggah Dokumen
          </label>
          @error('metodePengumpulan')
          <div class="invalid-feedback d-inline">
            {{ $message }}
          </div>
          @enderror
        </div>
      </div>            
    </div>
    <div class="modal-footer">
      <a href="/permindok" class="btn btn-secondary mx-3" onclick="return confirm('Batal mengubah Permindok?')">Batal</a>
      <button type="submit" class="btn btn-primary">Ubah Permindok</button>
    </div>
  </form> 
</div>

@endsection