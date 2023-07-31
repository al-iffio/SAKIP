@extends('layouts.main')

@section('container')

@if(auth()->user()->role=="Koordinator")
  <div class="container mt-3">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb border-bottom border-dark">
        <li class="breadcrumb-item active" style="color:black;" aria-current="page"><h4>Pengaturan KKE</h4></li>
      </ol>
    </nav>
  </div>

  <div class="bg-white p-3 mb-3">
    <!-- Button trigger modal -->
    <div class="border-bottom border-1 border-dark mb-3">
      <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#tambahKKE">
        <span data-feather="file-plus"></span> Tambah KKE
      </button>
    </div>
    
    @if(session()->has('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        </button>
      </div>
    @endif
    
    <!-- Tabel KKE -->
    <div class="table-responsive">
        <table class="table table-striped table-sm table-bordered">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Kode KKE</th>
              <th scope="col">Nama KKE</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($kkes as $kke)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $kke->kodeKKE }}</td>
                <td>{{ $kke->namaKKE }}</td>
                <td>
                  <a href="/kke/{{ $kke->kodeKKE }}" class="badge bg-primary"><span data-feather="eye"></span></a>
                  <a href="/kke/{{ $kke->kodeKKE }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
                  <form action="/kke/{{ $kke->kodeKKE }}" method="post" class="d-inline">
                    @csrf
                    @method('delete')
                    <button class="badge bg-danger border-0" onclick="return confirm('Yakin menghapus data?')">
                      <span data-feather="x-circle"></span>
                    </button>
                  </form>
                </td>
              </tr>
              @endforeach
          </tbody>
        </table>
    </div>
  </div>

  @include('kke.modalCreate')
@endif

@if((auth()->user()->role=="Anggota Tim") || (auth()->user()->role=="Ketua Tim") || (auth()->user()->role=="Pengendali Teknis"))
  <div class="container mt-3">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb border-bottom border-dark">
          <li class="breadcrumb-item"><a href="/evaluasiKKE" style="text-decoration:none; color:black"><h4>Evaluasi KKE</h4></a></li>
          <li class="breadcrumb active mt-1" aria-current="page"><h5 class="d-inline" style="text-decoration:none; color:black">&nbsp/ {{ $unitKerja->namaUnitKerja }}</h5></a></li>
      </ol>
    </nav>
  </div> 

  <div class="row pt-3">
    @foreach($kkes as $kke)
      <div class="col-sm-3 mb-3 mb-sm-0 py-2">
        <div class="card">
          <form action="/kke/{{ $kke->kodeKKE }}/edit" class="d-inline">
            @csrf
            <input type="hidden" class="form-control" name="unitKerja" id="unitKerja" value="{{ $unitKerja->namaUnitKerja }}" required>
            <input type="hidden" class="form-control" name="IDunitKerja" id="IDunitKerja" value="{{ $unitKerja->id }}" required>
            <button class="btn btn-dark" style="background-color:#B4923D; color:black">
              <div class="card-body" style="height: 125px; width: 210px">
                <h4 class="text-center"><b>KKE {{ $kke->kodeKKE }}</b></h4>
                <h5 class="text-center">{{ $kke->namaKKE }}</h5>
              </div>
            </button>
          </form>
        </div>
      </div>
    @endforeach
  </div>
@endif

@endsection