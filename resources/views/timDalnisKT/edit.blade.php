@extends('layouts.main')

@section('container')
<div class="container mt-3">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb border-bottom border-dark">
        <li class="breadcrumb-item"><a href="/timDalnisKT" style="text-decoration:none; color:black"
            onclick="return confirm('Batal mengubah tim?')"><h4>Pembagian Tim</h4></a></li>
        <li class="breadcrumb active mt-1" aria-current="page"><h5 class="d-inline" style="text-decoration:none; color:black">&nbsp/ Ubah Tim</h5></li>
    </ol>
  </nav>
</div>            

<div class="border-bottom border-dark p-3 mb-3">
  <form action="/timDalnisKT/{{ $timDalnisKT->id }}" method="post">
    @method('put')
    @csrf
    <div class="mb-3 row">
      <label for="dalnis_id" class="col-sm-2 col-form-label">Nama Pengendali Teknis</label>
      <div class="col-sm-10 mb-2">
        <select class="form-select" name="dalnis_id" id="dalnis_id" required>
          @foreach ( $dalniss as $dalnis )
              @if(old('dalnis_id', $timDalnisKT->dalnis_id) == $dalnis->id)
                  <option value="{{ $dalnis->id }}" selected>{{ $dalnis->namaPegawai }}</option>
              @else
                  <option value="{{ $dalnis->id }}">{{ $dalnis->namaPegawai }}</option>
              @endif  
          @endforeach
        </select>
      </div>
      <label for="kt_id" class="col-sm-2 col-form-label">Nama Ketua Tim</label>
      <div class="col-sm-10 mb-2">
        <select class="form-select  @error('kt_id') is-invalid @enderror" name="kt_id" id="kt_id" required>
          @foreach ( $KTs as $kt )
              @if(old('kt_id', $timDalnisKT->kt_id) == $kt->id)
                  <option value="{{ $kt->id }}" selected>{{ $kt->namaPegawai }}</option>
              @else
                  <option value="{{ $kt->id }}">{{ $kt->namaPegawai }}</option>
              @endif  
          @endforeach
        </select>
        @error('kt_id')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
        @enderror
      </div>      
    </div>
    <div class="modal-footer">
      <a href="/timDalnisKT" class="btn btn-secondary mx-3" onclick="return confirm('Batal mengubah Tim?')">Batal</a>
      <button type="submit" class="btn btn-primary">Ubah Tim</button>
    </div>
  </form> 
</div>

@include('timDalnisKT.timATSatker.index')

@endsection