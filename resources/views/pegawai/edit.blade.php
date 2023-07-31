@extends('layouts.main')

@section('container')
<div class="container mt-3">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb border-bottom border-dark">
      <li class="breadcrumb-item"><a href="/pegawai" style="text-decoration:none; color:black" onclick="return confirm('Batal mengubah unit kerja?')"><h4>Pengaturan User Pegawai</h4></a></li>
      <li class="breadcrumb active mt-1" aria-current="page"><h5 class="d-inline" style="text-decoration:none; color:black">&nbsp/ Ubah Pegawai</h5></li>
    </ol>
  </nav>
</div>            

<form action="/pegawai/{{ $pegawai->id }}" method="post">
    @method('put')
    @csrf
    <div class="mb-3 row">
      <label for="nip" class="col-sm-2 col-form-label">NIP</label>
      <div class="col-sm-10 mb-2">
        <input type="text" class="form-control" name="nip" id="nip" value="{{ $pegawai->nip }}" disabled>
      </div>
      <label for="namaPegawai" class="col-sm-2 col-form-label">Nama Pegawai</label>
      <div class="col-sm-10 mb-2">
        <input type="text" class="form-control" name="namaPegawai" id="namaPegawai" value="{{ $pegawai->namaPegawai }}" disabled>
      </div>
      <label for="role" class="col-sm-2 col-form-label">Role</label>
      <div class="col-sm-10 mb-2">
        <select class="form-select" name="role" id="role" onchange="UnitKerja()" required>
          <option @if(old('role', $pegawai->role) == "Anggota Tim") selected @endif value="Anggota Tim">Anggota Tim</option>
          <option @if(old('role', $pegawai->role) == "Ketua Tim") selected @endif value="Ketua Tim">Ketua Tim</option>
          <option @if(old('role', $pegawai->role) == "Pengendali Teknis") selected @endif value="Pengendali Teknis">Pengendali Teknis</option>
          <option @if(old('role', $pegawai->role) == "Inspektur") selected @endif value="Inspektur">Inspektur</option>
          <option @if(old('role', $pegawai->role) == "Kepala Unit Kerja BPS Kab/Kota") selected @endif value="Kepala Unit Kerja BPS Kab/Kota">Kepala Unit Kerja BPS Kab/Kota</option>
          <option @if(old('role', $pegawai->role) == "Kepala Unit Kerja BPS Provinsi") selected @endif value="Kepala Unit Kerja BPS Provinsi">Kepala Unit Kerja BPS Provinsi</option>
          <option @if(old('role', $pegawai->role) == "Koordinator") selected @endif value="Koordinator">Koordinator</option>
        </select>
      </div>
      @if(($pegawai->role == "Kepala Unit Kerja BPS Kab/Kota")||($pegawai->role == "Kepala Unit Kerja BPS Provinsi"))
        <label for="satker_id" class="col-sm-2 col-form-label" id="unitKerja">
          Unit Kerja
        </label>
        <div class="col-sm-10 mb-2">
          <select class="form-select @error('satker_id') is-invalid @enderror" name="satker_id" id="satker_id">
            @foreach ( $unitKerjas as $unitKerja )
              @if(old('satker_id', $pegawai->satker_id) == $unitKerja->id)
                <option value="{{ $unitKerja->id }}" selected>{{ $unitKerja->namaUnitKerja }}</option>
              @else
                <option value="{{ $unitKerja->id }}">{{ $unitKerja->namaUnitKerja }}</option>
              @endif  
            @endforeach
          </select>
          @error('satker_id')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
      @else
        <label for="satker_id" class="col-sm-2 col-form-label" id="unitKerja" style="display:none">
          Unit Kerja
        </label>
        <div class="col-sm-10 mb-2">
          <select class="form-select @error('satker_id') is-invalid @enderror" name="satker_id" id="satker_id" style="display:none">
            <option selected disabled>Pilih Unit Kerja BPS</option>
            @foreach ( $unitKerjas as $unitKerja )
              @if(old('satker_id', $pegawai->satker_id) == $unitKerja->id)
                <option value="{{ $unitKerja->id }}" selected>{{ $unitKerja->namaUnitKerja }}</option>
              @else
                <option value="{{ $unitKerja->id }}">{{ $unitKerja->namaUnitKerja }}</option>
              @endif  
            @endforeach
          </select>
          @error('satker_id')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
      @endif
    </div>
    <div class="modal-footer">
        <a href="/pegawai" class="btn btn-secondary mx-3" onclick="return confirm('Batal mengubah pegawai?')">Batal</a>
        <button type="submit" class="btn btn-primary">Ubah Pegawai</button>
    </div>
</form>

<script>
  function UnitKerja() {
    if ((document.getElementById("role").value === "Kepala Unit Kerja BPS Kab/Kota")||(document.getElementById("role").value === "Kepala Unit Kerja BPS Provinsi")) {
      document.getElementById("unitKerja").style.display = "block";
      document.getElementById("satker_id").style.display = "block";
    } else {
      document.getElementById("unitKerja").style.display = "none";
      document.getElementById("satker_id").style.display = "none";
    }
  }
</script>

@endsection