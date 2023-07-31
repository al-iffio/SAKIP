@extends('layouts.main')

@section('container')
<div class="container mt-3">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb border-bottom border-dark">
      <li class="breadcrumb-item"><a href="/kke" style="text-decoration:none; color:black"
          onclick="return confirm('Batal menambah kriteria KKE?')"><h4>Pengaturan KKE</h4></a></li>
      <li class="breadcrumb active mt-1" aria-current="page"><a href="/kke/{{ $kodeKKE }}/edit" style="text-decoration:none; color:black"
          onclick="return confirm('Batal menambah kriteria KKE?')"><h5>&nbsp/ Ubah Kriteria KKE</h5></a></li>
      <li class="breadcrumb active mt-1" aria-current="page"><h5 class="d-inline" style="text-decoration:none; color:black">&nbsp/ Ubah Kriteria KKE</h5></li>
    </ol>
  </nav>
</div>            

<form action="/kke/kriteriaKKE/{{ $kriteriaKKE->id }}" method="post">
    @method('put')
    @csrf
    <div class="mb-3 row">
      <input type="hidden" class="form-control" name="kodeKKE" id="kodeKKE" value="{{ $kodeKKE }}" required>
      <label for="kodeKriteriaKKE" class="col-sm-2 col-form-label">Kode Kriteria KKE</label>
      <div class="col-sm-10 mb-2">
        <input type="text" class="form-control @error('kodeKriteriaKKE') is-invalid @enderror" placeholder="{{ $kodeKKE }}..."
        name="kodeKriteriaKKE" id="kodeKriteriaKKE" value="{{ old('kodeKriteriaKKE', $kriteriaKKE->kodeKriteriaKKE) }}" required>
        @error('kodeKriteriaKKE')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>
      <label for="kriteria" class="col-sm-2 col-form-label">Kriteria</label>
      <div class="col-sm-10 mb-2">
        <input type="text" class="form-control @error('kriteria') is-invalid @enderror"
        name="kriteria" id="kriteria" value="{{ old('kriteria', $kriteriaKKE->kriteria) }}" required>
        @error('kriteria')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>
      <label for="nilaiRatarataIKU" class="col-sm-2 col-form-label">Nilai Rata-Rata IKU</label>
      <div class="col-sm-10 mb-2">
        <div class="form-check form-check-inline">
          <input class="form-check-input @error('nilaiRatarataIKU') is-invalid @enderror"
          type="radio" name="nilaiRatarataIKU" id="nilaiRatarataIKU" value="None" {{ old('nilaiRatarataIKU', $kriteriaKKE->nilaiRatarataIKU) == 'None' ? 'checked' : '' }}>
          <label class="form-check-label" for="nilaiRatarataIKU1">
            None
          </label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input @error('nilaiRatarataIKU') is-invalid @enderror"
          type="radio" name="nilaiRatarataIKU" id="nilaiRatarataIKU" value="ABCDE" {{ old('nilaiRatarataIKU', $kriteriaKKE->nilaiRatarataIKU) == 'ABCDE' ? 'checked' : '' }}>
          <label class="form-check-label" for="nilaiRatarataIKU2">
            ABCDE
          </label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input @error('nilaiRatarataIKU') is-invalid @enderror"
          type="radio" name="nilaiRatarataIKU" id="nilaiRatarataIKU" value="BCDE" {{ old('nilaiRatarataIKU', $kriteriaKKE->nilaiRatarataIKU) == 'BCDE' ? 'checked' : '' }}>
          <label class="form-check-label" for="nilaiRatarataIKU3">
            BCDE
          </label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input @error('nilaiRatarataIKU') is-invalid @enderror"
          type="radio" name="nilaiRatarataIKU" id="nilaiRatarataIKU" value="Y/T" {{ old('nilaiRatarataIKU', $kriteriaKKE->nilaiRatarataIKU) == 'Y/T' ? 'checked' : '' }}>
          <label class="form-check-label" for="nilaiRatarataIKU4">
            Y/T
          </label>
        </div>
        @error('nilaiRatarataIKU')
        <div class="invalid-feedback d-inline">
          {{ $message }}
        </div>
        @enderror
      </div>
      <label for="nilaiPerIKU" class="col-sm-2 col-form-label">Nilai per IKU</label>
      <div class="col-sm-10 mb-2">
        <div class="form-check form-check-inline">
          <input class="form-check-input @error('nilaiPerIKU') is-invalid @enderror"
          type="radio" name="nilaiPerIKU" id="nilaiPerIKU" value="Y/T" {{ old('nilaiPerIKU', $kriteriaKKE->nilaiPerIKU) == 'Y/T' ? 'checked' : '' }}>
          <label class="form-check-label" for="nilaiPerIKU1">
            Y/T
          </label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input @error('nilaiPerIKU') is-invalid @enderror"
          type="radio" name="nilaiPerIKU" id="nilaiPerIKU" value="0-100" {{ old('nilaiPerIKU', $kriteriaKKE->nilaiPerIKU) == '0-100' ? 'checked' : '' }}>
          <label class="form-check-label" for="nilaiPerIKU2">
            0-100
          </label>
          @error('nilaiPerIKU')
          <div class="invalid-feedback d-inline">
            {{ $message }}
          </div>
          @enderror
        </div>
      </div>
      <label for="level" class="col-sm-2 col-form-label">Level</label>
      <div class="col-sm-10 mb-2">
        <div class="form-check form-check-inline">
          <input class="form-check-input @error('level') is-invalid @enderror"
          type="checkbox" name="tujuan" id="tujuan" value="1" @checked(old('tujuan', $kriteriaKKE->tujuan))>
          <label class="form-check-label" for="inlineCheckbox1">Tujuan</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input @error('level') is-invalid @enderror"
          type="checkbox" name="sasaran" id="sasaran" value="1" @checked(old('sasaran', $kriteriaKKE->sasaran))>
          <label class="form-check-label" for="inlineCheckbox2">Sasaran</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input @error('level') is-invalid @enderror"
          type="checkbox" name="indikator" id="indikator" value="1" @checked(old('indikator', $kriteriaKKE->indikator))>
          <label class="form-check-label" for="inlineCheckbox3">Indikator</label>
          @error('level')
          <div class="invalid-feedback d-inline">
            {{ $message }}
          </div>
          @enderror
        </div>
      </div>
      <label for="panduanEvaluator" class="col-sm-2 col-form-label">Panduan Evaluator</label>
      <div class="col-sm-10 mb-2">
        <textarea class="form-control @error('panduanEvaluator') is-invalid @enderror"
        name="panduanEvaluator" id="panduanEvaluator">{{ old('panduanEvaluator', $kriteriaKKE->panduanEvaluator) }}</textarea>
        @error('panduanEvaluator')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>        
    </div>
    <div class="modal-footer">
      <a href="/kke/{{ $kodeKKE }}/edit" class="btn btn-secondary mx-3" onclick="return confirm('Batal menambah kriteria KKE?')">Batal</a>
      <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
</form>  

@endsection