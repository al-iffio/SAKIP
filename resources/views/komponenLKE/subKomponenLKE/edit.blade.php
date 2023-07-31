@extends('layouts.main')

@section('container')
<div class="container mt-3">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb border-bottom border-dark">
        <li class="breadcrumb-item"><a href="/komponenLKE" style="text-decoration:none; color:black"
            onclick="return confirm('Batal mengubah Komponen LKE?')"><h4>Pengaturan LKE</h4></a></li>
        <li class="breadcrumb active mt-1" aria-current="page"><a href="/komponenLKE/{{ $subKomponenLKE->komponenLke->kodeKomponen }}/edit" style="text-decoration:none; color:black"
            onclick="return confirm('Batal mengubah Sub Komponen LKE?')"><h5>&nbsp/ Ubah Komponen LKE</h5></a></li>
        <li class="breadcrumb active mt-1" aria-current="page"><h5 class="d-inline" style="text-decoration:none; color:black">&nbsp/ Ubah Sub Komponen LKE</h5></a></li>
    </ol>
  </nav>
</div>            

<div class="border-bottom border-dark p-3 mb-3">
  <form action="/komponenLKE/subKomponenLKE/{{ $subKomponenLKE->kodeSubKomponen }}" method="post">
    @method('put')
    @csrf
    <div class="mb-3 row">
      <input type="hidden" class="form-control" name="kodeKomponen" id="kodeKomponen" value="{{ $subKomponenLKE->komponenLke->kodeKomponen }}" required>
      <input type="hidden" class="form-control" name="id" id="id" value="{{ $subKomponenLKE->id }}" required>
      <label for="idSubKomponen" class="col-sm-2 col-form-label">ID Sub Komponen</label>
      <div class="col-sm-10 mb-2">
        <input type="text" class="form-control" name="idSubKomponen" id="idSubKomponen" value="{{ $subKomponenLKE->id }}" disabled>
      </div>
      <label for="kodeSubKomponen" class="col-sm-2 col-form-label">Kode Sub Komponen</label>
      <div class="col-sm-10 mb-2">
        <input type="text" class="form-control @error('kodeSubKomponen') is-invalid @enderror"
        name="kodeSubKomponen" id="kodeSubKomponen" value="{{ old('kodeSubKomponen', $subKomponenLKE->kodeSubKomponen) }}" required>
        @error('kodeSubKomponen')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>
      <label for="namaSubKomponen" class="col-sm-2 col-form-label">Nama Sub Komponen</label>
      <div class="col-sm-10 mb-2">
        <input type="text" class="form-control @error('namaSubKomponen') is-invalid @enderror"
        name="namaSubKomponen" id="namaSubKomponen" value="{{ old('namaSubKomponen', $subKomponenLKE->namaSubKomponen) }}" required>
        @error('namaSubKomponen')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>
      <label for="persentaseNilaiSub" class="col-sm-2 col-form-label">Persentase Nilai Sub Komponen</label>
      <div class="col-sm-10 mb-2">
        <input type="text" class="form-control @error('persentaseNilaiSub') is-invalid @enderror"
        name="persentaseNilaiSub" id="persentaseNilaiSub" value="{{ old('persentaseNilaiSub', $subKomponenLKE->persentaseNilaiSub) }}" required>
        @error('persentaseNilaiSub')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>
      <label for="bobotPerKriteria" class="col-sm-2 col-form-label">Bobot per Kriteria</label>
        <div class="col-sm-10 mb-2">
          <div class="form-check form-check-inline">
            <input class="form-check-input @error('bobotPerKriteria') is-invalid @enderror"
            type="radio" name="bobotPerKriteria" id="bobotPerKriteria" value="Sama" {{ old('bobotPerKriteria', $subKomponenLKE->bobotPerKriteria) == 'Sama' ? 'checked' : '' }}>
              <label class="form-check-label" for="nilaiPerIKU1">
                Sama
              </label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input @error('bobotPerKriteria') is-invalid @enderror"
            type="radio" name="bobotPerKriteria" id="bobotPerKriteria" value="Berbeda" {{ old('bobotPerKriteria', $subKomponenLKE->bobotPerKriteria) == 'Berbeda' ? 'checked' : '' }}>
              <label class="form-check-label" for="nilaiPerIKU2">
                Berbeda
              </label>
              @error('bobotPerKriteria')
                <div class="invalid-feedback d-inline">
                  {{ $message }}
                </div>
              @enderror
          </div>
        </div>           
      </div>
    <div class="modal-footer">
      
      <a href="/komponenLKE/{{ $subKomponenLKE->komponenLke->kodeKomponen }}/edit" class="btn btn-secondary mx-3" onclick="return confirm('Batal mengubah Komponen LKE?')">
        @php
          if($subKomponenLKE->bobotPerKriteria == 'Sama') {
              $jumlah = $subKomponenLKE->kriteriaLKE->count();
              if($jumlah == 0) {
                  $jumlah = 1;
              }
              $bobot = $subKomponenLKE->persentaseNilaiSub/$jumlah;
              App\Models\KriteriaLke::where('subKomponenLke_id', $subKomponenLKE->id)
              ->update(['bobotKriteria' => $bobot]);
          }       
        @endphp
        Batal
      </a>
      <button type="submit" class="btn btn-primary">Ubah Sub Komponen</button>
    </div>
  </form>
</div>

@include('komponenLKE.subKomponenLKE.kriteriaLKE.index')

@endsection