@extends('layouts.main')

@section('container')
<div class="container mt-3">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb border-bottom border-dark">
      <li class="breadcrumb-item"><a href="/unitKerja" style="text-decoration:none; color:black"><h4>Pengaturan User Unit Kerja</h4></a></li>
      <li class="breadcrumb active mt-1" aria-current="page"><h5 class="d-inline" style="text-decoration:none; color:black">&nbsp/ Ubah Unit Kerja</h5></li>
    </ol>
  </nav>
</div>            

<form action="/unitKerja/{{ $unitKerja->id }}" method="post">
  @method('put')
  @csrf
  <div class="mb-3 row">
    <label for="kodeWilayah" class="col-sm-2 col-form-label">Kode Wilayah</label>
    <div class="col-sm-10 mb-2">
      <input type="text" class="form-control @error('kodeWilayah') is-invalid @enderror"
      name="kodeWilayah" id="kodeWilayah" onkeyup="AnEventHasOccurred()" value="{{ old('kodeWilayah', $unitKerja->kodeWilayah) }}" required>
      @error('kodeWilayah')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <label for="kodeUnitKerja" class="col-sm-2 col-form-label">Kode Unit Kerja</label>
    <div class="col-sm-10 mb-2">
      <input type="text" class="form-control @error('kodeUnitKerja') is-invalid @enderror"
      name="kodeUnitKerja" id="kodeUnitKerja" onkeyup="Username(); KodeIKU()" value="{{ old('kodeUnitKerja', $unitKerja->kodeUnitKerja) }}" required>
      @error('kodeUnitKerja')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <label for="wilayah" class="col-sm-2 col-form-label">Wilayah</label>
    <div class="col-sm-10 mb-2">
      <select class="form-select @error('wilayah') is-invalid @enderror"
      name="wilayah" id="wilayah" required>
        <option @if(old('wilayah', $unitKerja->wilayah) == "I") selected @endif value="I">I</option>
        <option @if(old('wilayah', $unitKerja->wilayah) == "II") selected @endif value="II">II</option>
        <option @if(old('wilayah', $unitKerja->wilayah) == "III") selected @endif value="III">III</option>
      </select>
      @error('wilayah')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <label for="namaUnitKerja" class="col-sm-2 col-form-label">Nama Unit Kerja</label>
    <div class="col-sm-10 mb-2">
      <input type="text" class="form-control @error('namaUnitKerja') is-invalid @enderror"
      name="namaUnitKerja" id="namaUnitKerja" value="{{ old('namaUnitKerja', $unitKerja->namaUnitKerja) }}" required>
      @error('namaUnitKerja')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <input type="hidden" class="form-control" name="username" id="username" value="{{ old('username', $unitKerja->kodeUnitKerja) }}">
    <label for="namaPIC" class="col-sm-2 col-form-label">Nama PIC</label>
    <div class="col-sm-10 mb-2">
      <input type="text" class="form-control @error('namaPIC') is-invalid @enderror"
      name="namaPIC" id="namaPIC" value="{{ old('namaPIC', $unitKerja->namaPIC) }}">
      @error('namaPIC')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <label for="noTelpPIC" class="col-sm-2 col-form-label">No. Telepon PIC</label>
    <div class="col-sm-10 mb-2">
      <input type="text" class="form-control @error('noTelpPIC') is-invalid @enderror"
      name="noTelpPIC" id="noTelpPIC" value="{{ old('noTelpPIC', $unitKerja->noTelpPIC) }}">
      @error('noTelpPIC')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <label for="role" class="col-sm-2 col-form-label">Role</label>
    <div class="col-sm-10 mb-2">
      <select class="form-select @error('role') is-invalid @enderror"
      name="role" id="role" onchange="KodeIKU(); AnEventHasOccurred();" required>
        <option @if(old('role', $unitKerja->role) == "BPS Kab/Kota") selected @endif value="BPS Kab/Kota">BPS Kab/Kota</option>
        <option @if(old('role', $unitKerja->role) == "BPS Provinsi") selected @endif value="BPS Provinsi">BPS Provinsi</option>
        <option @if(old('role', $unitKerja->role) == "Unit Kerja Pusat") selected @endif value="Unit Kerja Pusat">Unit Kerja Pusat</option>
      </select>
      @error('role')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <input type="hidden" class="form-control" name="kodeSatkerProv" id="kodeSatkerProv" value="{{ old('kodeSatkerProv', $unitKerja->kodeSatkerProv) }}">    
    <input type="hidden" class="form-control" name="ikuUnitKerja_id" id="ikuUnitKerja_id" value="{{ old('ikuUnitKerja_id', $unitKerja->ikuUnitKerja_id) }}"> 
  </div>
  <div class="modal-footer">
    <a href="/unitKerja" class="btn btn-secondary mx-3" onclick="return confirm('Batal mengubah unit kerja?')">Batal</a>
    <button type="submit" class="btn btn-primary">Ubah Unit Kerja</button>
  </div>
</form>  

  <script>
    function Username(){
      var kodeUnitKerja = document.getElementById("kodeUnitKerja")
      var username = document.getElementById("username");
      username.value = kodeUnitKerja.value
    }

    function AnEventHasOccurred() {
      var role = document.getElementById("role");
      var kodeSatkerProv = document.getElementById("kodeSatkerProv");
      var kodeWilayah = document.getElementById("kodeWilayah");

      if(role.options[role.selectedIndex].value === "BPS Kab/Kota") {
        kodeSatkerProv.value = kodeWilayah.value + "00"
      } else if(role.options[role.selectedIndex].value !== "BPS Kab/Kota") {
        kodeSatkerProv.value = ""
      }
    }

    function KodeIKU() {
      var kodeIKU = document.getElementById("ikuUnitKerja_id");
      var kodeUnitKerja = document.getElementById("kodeUnitKerja");
      var role = document.getElementById("role");

      if(role.options[role.selectedIndex].value === "Unit Kerja Pusat") {
        kodeIKU.value = kodeUnitKerja.value
      } else if(role.options[role.selectedIndex].value !== "Unit Kerja Pusat") {
        kodeIKU.value = "9999"
      }
    }
  </script>  

@endsection