@extends('layouts.main')

@section('container')
<div class="container mt-3">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb border-bottom border-dark">
      <li class="breadcrumb-item"><a href="/timDalnisKT" style="text-decoration:none; color:black"
          onclick="return confirm('Batal menambah tim?')"><h4>Pembagian Tim</h4></a></li>
      <li class="breadcrumb active mt-1" aria-current="page"><a href="/timDalnisKT/{{ $timATSatker->timDalnisKT->id }}/edit" style="text-decoration:none; color:black"
          onclick="return confirm('Batal menambah tim?')"><h5>&nbsp/ Ubah Tim Dalnis KT</h5></a></li>
      <li class="breadcrumb active mt-1" aria-current="page"><h5 class="d-inline" style="text-decoration:none; color:black">&nbsp/ Ubah Data</h5></li>
    </ol>
  </nav>
</div>            

<div class="border-bottom border-dark p-3 mb-3">
  <form action="/timDalnisKT/timATSatker/{{ $timATSatker->id }}" method="post">
    @method('put')
    @csrf
    <div class="mb-3 row">
      <input type="hidden" class="form-control" name="timDalnisKT_id" id="timDalnisKT_id" value="{{ $timATSatker->timDalnisKT->id }}" required>
      <label for="at_id" class="col-sm-2 col-form-label">Nama Anggota Tim</label>
      <div class="col-sm-10 mb-2">
        <select class="form-select" name="at_id" id="at_id" required>
          @foreach ( $ATs as $at )
              @if(old('at_id', $timATSatker->at_id) == $at->id)
                  <option value="{{ $at->id }}" selected>{{ $at->namaPegawai }}</option>
              @else
                  <option value="{{ $at->id }}">{{ $at->namaPegawai }}</option>
              @endif  
          @endforeach
        </select>
      </div>
      <label for="unitKerja_id" class="col-sm-2 col-form-label">Nama Unit Kerja</label>
      <div class="col-sm-10 mb-2">
        <select class="form-select @error('kt_id') is-invalid @enderror" name="unitKerja_id" id="unitKerja_id" required>
          @foreach ( $unitKerjas as $unitKerja )
              @if(old('unitKerja_id', $timATSatker->unitKerja_id) == $unitKerja->id)
                  <option value="{{ $unitKerja->id }}" selected>{{ $unitKerja->namaUnitKerja }}</option>
              @else
                  <option value="{{ $unitKerja->id }}">{{ $unitKerja->namaUnitKerja }}</option>
              @endif  
          @endforeach
        </select>
        @error('unitKerja_id')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
        @enderror
      </div>      
    </div>
    <div class="modal-footer">
      <a href="/timDalnisKT/{{ $timATSatker->timDalnisKT->id }}/edit" class="btn btn-secondary mx-3" onclick="return confirm('Batal mengubah Tim?')">Batal</a>
      <button type="submit" class="btn btn-primary">Ubah Tim</button>
    </div>
  </form> 
</div>

@endsection