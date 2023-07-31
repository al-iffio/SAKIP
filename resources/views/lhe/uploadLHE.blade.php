@extends('layouts.main')

@section('container')
<div class="container mt-3">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb border-bottom border-dark">
        <li class="breadcrumb-item"><a href="/lhe/kirimLHE" style="text-decoration:none; color:black"
            onclick="return confirm('Batal mengirim LHE?')"><h4>Laporan Hasil Evaluasi</h4></a></li>
        <li class="breadcrumb active mt-1" aria-current="page"><h5 class="d-inline" style="text-decoration:none; color:black">&nbsp/ Kirim LHE {{ $namaUnitKerja }}</h5></a></li>
    </ol>
  </nav>
</div>            

<div class="border-bottom border-dark p-3 mb-3">
  <form action="#" method="post">
    @method('put')
    @csrf
    <div class="mb-3 row">
      <label for="upload" class="col-sm-2 col-form-label">Laporan Hasil Evaluasi</label>
      <div class="col-sm-10 mb-2">
        <input class="form-control @error('upload') is-invalid @enderror" type="file" id="upload" name="upload" required>
        @error('upload')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>           
    </div>
    <div class="modal-footer">
      <a href="/lhe/kirimLHE" class="btn btn-secondary mx-3" onclick="return confirm('Batal mengirim LHE?')">Batal</a>
      <a href="/lhe/kirimLHE" class="btn btn-primary mx-3">Kirim LHE</a>
    </div>
  </form> 
</div>

@endsection