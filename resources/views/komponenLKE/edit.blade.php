@extends('layouts.main')

@section('container')

@if(auth()->user()->role=="Koordinator")
  <div class="container mt-3">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb border-bottom border-dark">
          <li class="breadcrumb-item"><a href="/komponenLKE" style="text-decoration:none; color:black"
              onclick="return confirm('Batal mengubah Komponen LKE?')"><h4>Pengaturan LKE</h4></a></li>
          <li class="breadcrumb active mt-1" aria-current="page"><h5 class="d-inline" style="text-decoration:none; color:black">&nbsp/ Ubah Komponen LKE</h5></a></li>
      </ol>
    </nav>
  </div>            

  <div class="border-bottom border-dark p-3 mb-3">
    <form action="/komponenLKE/{{ $komponenLKE->kodeKomponen }}" method="post">
      @method('put')
      @csrf
      <div class="mb-3 row">
        <label for="kodeKomponen" class="col-sm-2 col-form-label">Kode Komponen</label>
        <div class="col-sm-10 mb-2">
          <input type="text" class="form-control @error('kodeKomponen') is-invalid @enderror"
          name="kodeKomponen" id="kodeKomponen" value="{{ old('kodeKomponen', $komponenLKE->kodeKomponen) }}" required>
          @error('kodeKomponen')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
        <label for="namaKomponen" class="col-sm-2 col-form-label">Nama Komponen</label>
        <div class="col-sm-10 mb-2">
          <input type="text" class="form-control @error('namaKomponen') is-invalid @enderror"
          name="namaKomponen" id="namaKomponen" value="{{ old('namaKomponen', $komponenLKE->namaKomponen) }}" required>
          @error('namaKomponen')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
        <label for="persentaseNilai" class="col-sm-2 col-form-label">Persentase Nilai Komponen</label>
        <div class="col-sm-10 mb-2">
          <input type="text" class="form-control @error('persentaseNilai') is-invalid @enderror"
          name="persentaseNilai" id="persentaseNilai" value="{{ old('persentaseNilai', $komponenLKE->persentaseNilai) }}" required>
          @error('persentaseNilai')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>          
      </div>
      <div class="modal-footer">
        <a href="/komponenLKE" class="btn btn-secondary mx-3" onclick="return confirm('Batal mengubah Komponen LKE?')">Batal</a>
        <button type="submit" class="btn btn-primary">Ubah Komponen</button>
      </div>
    </form> 
  </div>

  @include('komponenLKE.subKomponenLKE.index')
@endif

@if((auth()->user()->role=="Anggota Tim") || (auth()->user()->role=="Ketua Tim") || (auth()->user()->role=="Pengendali Teknis"))
  <div class="container mt-3">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb border-bottom border-dark">
        <li class="breadcrumb-item"><a href="/evaluasiLKE" style="text-decoration:none; color:black"><h4>Evaluasi LKE</h4></a></li>
        <li class="breadcrumb active mt-1" aria-current="page"><a href="/evaluasiLKE/{{ $IDunitKerja }}"
          style="text-decoration:none; color:black"><h5>&nbsp/ Komponen LKE</h5></a></li>
        <li class="breadcrumb active mt-1" aria-current="page"><h5 class="d-inline" style="text-decoration:none; color:black">
          &nbsp/ Sub Komponen LKE {{ $unitKerja }}</h5></a></li>
      </ol>
    </nav>
  </div>

  <div class="border border-1 p-3 bg-white mb-3">
    <div class="border-bottom border-1 border-dark mb-3">
      <div class="btn-toolbar justify-content-between" role="toolbar" aria-label="Toolbar with button groups">
        <div class="btn-group" role="group">
          <h5>Daftar Sub Komponen LKE</h5>
        </div>
      </div>
    </div>
    
    <!-- Tabel Sub Komponen LKE -->
    <div class="table-responsive">
      <table class="table table-striped table-sm table-bordered">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Kode Sub Komponen</th>
            <th scope="col">Nama Sub Komponen</th>
            <th scope="col">Progress (%)</th>
            <th scope="col">Nilai</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($subKomponenLKEs as $subKomponenLKE)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $subKomponenLKE->kodeSubKomponen }}</td>
              <td>{{ $subKomponenLKE->namaSubKomponen }}</td>
              <td>60</td>
              <td>1.89</td>
              <td>
                <form action="/komponenLKE/subKomponenLKE/{{ $subKomponenLKE->kodeSubKomponen }}" class="d-inline">
                  @csrf
                  <input type="hidden" class="form-control" name="unitKerja" id="unitKerja" value="{{ $unitKerja }}" required>
                  <input type="hidden" class="form-control" name="IDunitKerja" id="IDunitKerja" value="{{ $IDunitKerja }}" required>
                  <button  class="badge bg-info border-0">
                    <span data-feather="eye"></span>
                  </button>
                </form>
              </td>
            </tr>
            @endforeach
        </tbody>
      </table>
    </div>
  </div>

  <div class="d-flex mb-3 justify-content-end">
    <a href="/evaluasiLKE/{{ $IDunitKerja }}" class="btn btn-secondary mx-3">Kembali</a>
  </div>

@endif

@endsection