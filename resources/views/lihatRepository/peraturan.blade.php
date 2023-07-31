@extends('layouts.main')

@section('container')

<div class="container mt-3">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb border-bottom border-dark">
      <li class="breadcrumb-item active" style="color:black;" aria-current="page"><h4>Repository</h4></li>
    </ol>
  </nav>
</div>

<div class="btn-group d-flex border-bottom border-dark rounded-0" role="group" aria-label="Basic example">
    <a class="btn btn-dark rounded-0 flex-fill" style="background-color:#4b3d17" href="/lihatRepository/bukuLHE" role="button">Buku LHE</a>
  <button type="button" class="btn btn-dark rounded-0 flex-fill" style="background-color:#4b3d17" disabled>Peraturan</button>
  <a class="btn btn-dark rounded-0 flex-fill" style="background-color:#4b3d17" href="#" role="button">Surat</a>
  <a class="btn btn-dark rounded-0 flex-fill" style="background-color:#4b3d17" href="#" role="button">Pelatihan</a>
  <a class="btn btn-dark rounded-0 flex-fill" style="background-color:#4b3d17" href="#" role="button">Materi</a>
  <a class="btn btn-dark rounded-0 flex-fill" style="background-color:#4b3d17" href="#" role="button">Template Dokumen</a>
</div>

<div class="row pt-3">
    @foreach($peraturans as $peraturan)
      <div class="col-sm-3 mb-3 mb-sm-0">
          <iframe src="{{ $peraturan->link }}" width="240" height="320" class="pe-3"></iframe>
          <div class="d-flex justify-content-center pe-3">
              <h5>{{ $peraturan->peraturan }}</h5>
          </div>
      </div>  
    @endforeach
</div>

@endsection