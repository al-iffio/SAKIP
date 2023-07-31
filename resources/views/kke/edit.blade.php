@extends('layouts.main')

@section('container')

@if(auth()->user()->role=="Koordinator")
  <div class="container mt-3">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb border-bottom border-dark">
          <li class="breadcrumb-item"><a href="/kke" style="text-decoration:none; color:black"
              onclick="return confirm('Batal mengubah KKE?')"><h4>Pengaturan KKE</h4></a></li>
          <li class="breadcrumb active mt-1" aria-current="page"><h5 class="d-inline" style="text-decoration:none; color:black">&nbsp/ Ubah KKE</h5></a></li>
      </ol>
    </nav>
  </div>            

  <div class="border-bottom border-dark p-3 mb-3">
    <form action="/kke/{{ $kke->kodeKKE }}" method="post">
      @method('put')
      @csrf
      <div class="mb-3 row">
        <label for="idKriteria" class="col-sm-2 col-form-label">ID KKE</label>
        <div class="col-sm-10 mb-2">
          <input type="text" class="form-control @error('Kriteria') is-invalid @enderror"
          name="Kriteria" id="idKriteria" value="{{ old('idKriteria', $kke->id) }}" disabled>
          @error('idKriteria')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
        <label for="kodeKKE" class="col-sm-2 col-form-label">Kode KKE</label>
        <div class="col-sm-10 mb-2">
          <input type="text" class="form-control @error('kodeKKE') is-invalid @enderror"
          name="kodeKKE" id="kodeKKE" value="{{ old('kodeKKE', $kke->kodeKKE) }}" required>
          @error('kodeKKE')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
        <label for="namaKKE" class="col-sm-2 col-form-label">Nama KKE</label>
        <div class="col-sm-10 mb-2">
          <input type="text" class="form-control @error('namaKKE') is-invalid @enderror"
          name="namaKKE" id="namaKKE" value="{{ old('namaKKE', $kke->namaKKE) }}" required>
          @error('namaKKE')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>            
      </div>
      <div class="modal-footer">
        <a href="/kke" class="btn btn-secondary mx-3" onclick="return confirm('Batal mengubah KKE?')">Batal</a>
        <button type="submit" class="btn btn-primary">Ubah KKE</button>
      </div>
    </form> 
  </div>

  @include('kke.kriteriaKKE.index')
@endif

@if((auth()->user()->role=="Anggota Tim") || (auth()->user()->role=="Ketua Tim") || (auth()->user()->role=="Pengendali Teknis"))
  <div class="container mt-3">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb border-bottom border-dark">
          <li class="breadcrumb-item"><a href="/evaluasiKKE" style="text-decoration:none; color:black"><h4>Evaluasi KKE</h4></a></li>
          <li class="breadcrumb active mt-1" aria-current="page"><a href="/evaluasiKKE/{{ $IDunitKerja }}"
          style="text-decoration:none; color:black"><h5>&nbsp/ {{ $unitKerja }}</h5></a></li>
          <li class="breadcrumb active mt-1" aria-current="page"><h5 class="d-inline" style="text-decoration:none; color:black">&nbsp/ KKE {{ $kke->kodeKKE }}</h5></a></li>
      </ol>
    </nav>
  </div>

  <div class="border border-1 p-3 bg-white mb-3">
    <div class="border-bottom border-1 border-dark mb-3">
      <div class="btn-toolbar justify-content-between">
        <div class="btn-group">
          <form action="/kke/{{ $kke->kodeKKE }}">
            @csrf
            <input type="hidden" class="form-control" name="unitKerja" id="unitKerja" value="{{ $unitKerja }}" required>
            <input type="hidden" class="form-control" name="IDunitKerja" id="IDunitKerja" value="{{ $IDunitKerja }}" required>
            <button class="btn btn-primary mb-3">
              <span data-feather="file-text" class="mb-1"></span> Evaluasi KKE
            </button>
          </form>
        </div>
      </div> 
    </div>
      
      <!-- Tabel Kriteria KKE -->
      <div class="table-responsive">
        <table class="table table-striped table-sm table-bordered">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Kriteria</th>
              <th scope="col">Nilai</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($kriteriaKKEs as $kriteriaKKE)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $kriteriaKKE->kriteria }}</td>
                <td>
                    @if(($kriteriaKKE->nilaiRatarataIKU == "ABCDE") || ($kriteriaKKE->nilaiRatarataIKU == "BCDE"))
                        B
                    @endif
                    @if($kriteriaKKE->nilaiRatarataIKU == "Y/T")
                        T
                    @endif
                    @if($kriteriaKKE->nilaiRatarataIKU == "None")
                        -
                    @endif
                </td>
              </tr>
              @endforeach
          </tbody>
        </table>
      </div>
  </div>

  <div class="d-flex mb-3 justify-content-end">
    <a href="/evaluasiKKE/{{ $IDunitKerja }}" class="btn btn-secondary mx-3">Kembali</a>
  </div>
@endif

@endsection