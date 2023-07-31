@extends('layouts.main')

@section('container')

<div class="container mt-3">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb border-bottom border-dark">
        <li class="breadcrumb-item active" style="color:black;" aria-current="page"><h4>Laporan Hasil Evaluasi</h4></li>
    </ol>
  </nav>
</div>


<div class="bg-white px-3 py-3 mb-3">
    <form action="" method="post">
        @csrf
        <div class="mb-3 row">
          <label for="unduhLHE" class="col-sm-2 col-form-label">Unduh LHE :</label>
          <div class="col-sm-10 mb-2">
            <button type="button" class="btn btn-primary">
                <span data-feather="download" class="align-text-bottom mb-1"></span> Unduh
            </button>
          </div>
          <label for="feedback" class="col-sm-2 col-form-label">Feedback :</label>
          <div class="col-sm-10 mb-2">
            <textarea class="form-control" name="feedback" id="feedback">{{ old('feedback',
            "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quae laudantium ipsam qui molestiae nisi. Ipsa, dicta! Vel ab, quis rerum delectus nesciunt nobis provident minima ea quam dignissimos illo debitis!"
            ) }}</textarea>
            @error('feedback')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>     
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-warning">
            <span data-feather="edit" class="align-text-bottom mb-1"></span> Ubah
          </button>
        </div>
      </form>
</div>


@endsection