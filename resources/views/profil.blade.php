@extends('layouts.main')

@section('container')

<div class="container mt-3">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb border-bottom border-dark">
        <li class="breadcrumb-item active" style="color:black;" aria-current="page"><h4>Profil</h4></li>
      </ol>
  </nav>
</div>

<div class="row">
    <div class="mb-3 mb-sm-0 d-flex">
        <div class="bg-white px-3 pt-3 mb-5 mx-3 flex-fill">
            <h5 class="border-bottom border-dark pb-3">Profil Lengkap</h5>
                <label class="col-form-label">Kode Wilayah</label>
                <div class="mb-2">
                    <input type="text" class="form-control" value="{{ $unitKerja->kodeWilayah }}" disabled>
                </div>
                <label class="col-form-label">Kode Unit Kerja</label>
                <div class="mb-2">
                    <input type="text" class="form-control" value="{{$unitKerja->kodeUnitKerja}}" disabled>
                </div>
                <label class="col-form-label">Wilayah</label>
                <div class="mb-2">
                    <input type="text" class="form-control" value="{{ $unitKerja->wilayah }}" disabled>
                </div>
                <label class="col-form-label">Nama Unit Kerja</label>
                <div class="mb-2">
                    <input type="text" class="form-control" value="{{ $unitKerja->namaUnitKerja }}" disabled>
                </div>
                <label class="col-form-label">Nama PIC</label>
                <div class="mb-2">
                    <input type="text" class="form-control" value="{{ $unitKerja->namaPIC }}" disabled>
                </div>
                <label class="col-form-label">Nomor Telepon PIC</label>
                <div class="mb-2">
                    <input type="text" class="form-control" value="{{ $unitKerja->noTelpPIC }}" disabled>
                </div>
                <div class="modal-footer my-3">
                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#profil">
                        <span data-feather="edit"></span> Edit Profil
                    </button>
                </div>
        </div>

        <div class="bg-white px-3 pt-3 mb-5 mx-3 flex-fill">
            <h5 class="border-bottom border-dark pb-3">Ubah Password</h5>
                <label class="col-form-label">Password Lama</label>
                <div class="mb-2">
                    <input type="text" class="form-control">
                </div>
                <label class="col-form-label">Password Baru</label>
                <div class="mb-2">
                    <input type="text" class="form-control">
                </div>
                <label class="col-form-label">Konfirmasi Password Baru</label>
                <div class="mb-2">
                    <input type="text" class="form-control">
                </div>
                <div class="modal-footer pt-5">
                    <button type="submit" class="btn btn-warning">
                      <span data-feather="edit" class="align-text-bottom mb-1"></span> Ubah Password
                    </button>
                </div>
        </div>
    </div>
</div>

<!-- Modal Profil -->
<div class="modal fade" id="profil" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content bg-body-tertiary">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Profil</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form>
            @csrf
            <div class="mb-3 row">
              <label for="namaPIC" class="col-sm-2 col-form-label">Nama PIC</label>
              <div class="col-sm-10 mb-2">
                <input type="text" class="form-control @error('namaPIC') is-invalid @enderror"
                name="namaPIC" id="namaPIC" value="{{ $unitKerja->namaPIC }}">
                @error('kodeWilayah')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
              <label for="noTelpPIC" class="col-sm-2 col-form-label">Nomor Telepon PIC</label>
              <div class="col-sm-10 mb-2">
                <input type="text" class="form-control @error('noTelpPIC') is-invalid @enderror"
                name="noTelpPIC" id="noTelpPIC" value="{{ $unitKerja->noTelpPIC }}">
                @error('noTelpPIC')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
              <button type="submit" class="btn btn-warning">Ubah Profil</button>
            </div>
          </form>
        </div>
      </div>
    </div>
</div>

@endsection