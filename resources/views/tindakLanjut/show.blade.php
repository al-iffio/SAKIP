@extends('layouts.main')

@section('container')

<div class="container mt-3">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb border-bottom border-dark">
      <li class="breadcrumb-item"><a href="/tindakLanjut" style="text-decoration:none; color:black"><h4>Tindak Lanjut</h4></a></li>
      <li class="breadcrumb active mt-1" aria-current="page"><h5 class="d-inline" style="text-decoration:none; color:black">
        &nbsp/ {{ $dokumenTL->dokumenTL }}</h5></a></li>
  </ol>
  </nav>
</div>

<div class="border border-3 border-black border-bottom-0 border-start-0 border-end-0 bg-white mb-3">
  <div class="border border-1 p-3">
    <h5>{{ $dokumenTL->dokumenTL }}</h5>
  </div>
</div>
@foreach ($kriteriaTLs as $kriteriaTL)
  <div class="border border-1 mb-3 border-secondary-subtle">
    <div class="border-bottom border-black bg-white p-3">
      <h5 class="d-inline">{{ $kriteriaTL->kriteriaLke->kodeKriteriaLKE }}. {{ $kriteriaTL->kriteriaLke->namaKriteria }}</h5>
      <button class="btn btn-toggle btn-sm mb-1 align-items-center border-0 collapsed d-inline float-end"
      data-bs-toggle="collapse"data-bs-target="#kriteriaLKE{{ $kriteriaTL->kriteriaLke->kodeKriteriaLKE }}-collapse">
        <span data-feather="minus" class="align-text-bottom"></span>&nbsp
      </button>
    </div>
    <div class="collapse show" id="kriteriaLKE{{ $kriteriaTL->kriteriaLke->kodeKriteriaLKE }}-collapse">
      <div class="border border-1 p-3 bg-body-tertiary">
        <div class="border-bottom">
          <div class="row">
            <label class="col-sm-2 col-form-label">Nilai</label>
            <div class="col-sm-10 mb-2">
              <input type="text" class="form-control" name="nilai[]"
              id="nilai[]" value="Y" disabled>
            </div>
            <label class="col-sm-2 col-form-label">Catatan</label>
            <div class="col-sm-10 mb-2">
              <textarea type="text" class="form-control" name="catatan[]"
              id="catatan[]" disabled>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quae laudantium ipsam qui molestiae nisi. Ipsa, dicta! Vel ab, quis rerum delectus nesciunt nobis provident minima ea quam dignissimos illo debitis!</textarea>
            </div>
            <div class="col-sm-10 mb-2">
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" name="tindakLanjut[]"
                id="tindakLanjut[]" value="1">
                <label class="form-check-label" for="tindakLanjut[]">Tindak Lanjut</label>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endforeach

<div class="d-flex mb-3 justify-content-end">
  <a href="/tindakLanjut" class="btn btn-success mx-3">Simpan</a>
</div>

@endsection