@extends('layouts.main')

@section('container')
<div class="container mt-3">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb border-bottom border-dark">
      <li class="breadcrumb-item"><a href="/dokumenTL" style="text-decoration:none; color:black"
          onclick="return confirm('Batal mengubah dokumen tindak lanjut?')"><h4>Tindak Lanjut</h4></a></li>
      <li class="breadcrumb active mt-1" aria-current="page"><a href="/dokumenTL/{{ $kriteriaTL->dokumenTL->id }}/edit" style="text-decoration:none; color:black"
          onclick="return confirm('Batal mengubah kriteria tindak lanjut?')"><h5>&nbsp/ Ubah Dokumen TL</h5></a></li>
      <li class="breadcrumb active mt-1" aria-current="page"><h5 class="d-inline" style="text-decoration:none; color:black">&nbsp/ Ubah Kriteria TL</h5></li>
    </ol>
  </nav>
</div>            

<form action="/dokumenTL/kriteriaTL/{{ $kriteriaTL->id }}" method="post">
  @method('put')
  @csrf
  <div class="mb-3 row">
    <input type="hidden" class="form-control" name="dokumenTL_id" id="dokumenTL_id" value="{{ $kriteriaTL->dokumenTL->id }}" required>
    <label for="kriteriaLKE_id" class="col-sm-2 col-form-label">Kriteria TL</label>
    <div class="col-sm-10 mb-2">
      <select class="form-select @error('kriteriaLKE_id') is-invalid @enderror" name="kriteriaLKE_id" id="kriteriaLKE_id" required>
        @foreach ( $kriteriaLKEs as $kriteriaLKE )
            @if(old('kriteriaLKE_id', $kriteriaTL->kriteriaLKE_id) == $kriteriaLKE->id)
                <option value="{{ $kriteriaLKE->id }}" selected>{{ $kriteriaLKE->namaKriteria }}</option>
            @else
                <option value="{{ $kriteriaLKE->id }}">{{ $kriteriaLKE->namaKriteria }}</option>
            @endif  
        @endforeach
      </select>
      @error('kriteriaLKE_id')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
      @enderror
    </div>
  </div>
  <div class="modal-footer">
    <a href="/dokumenTL/{{ $kriteriaTL->dokumenTL->id }}/edit" class="btn btn-secondary mx-3" onclick="return confirm('Batal mengubah kriteria tindak lanjut?')">Batal</a>
    <button type="submit" class="btn btn-primary">Ubah Kriteria TL</button>
  </div>
</form> 

@endsection