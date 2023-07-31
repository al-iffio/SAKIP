@extends('layouts.main')

@section('container')

<div class="container mt-3">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb border-bottom border-dark">
        <li class="breadcrumb-item"><a href="/dashboard" style="text-decoration:none; color:black"><h4>Laporan Hasil Evaluasi</h4></a></li>
      </ol>
    </nav>
</div>

<div class="btn-group d-flex border-bottom border-3 border-dark rounded-0" role="group" aria-label="Basic example">
    @if((auth()->user()->role=="Ketua Tim") || (auth()->user()->role=="Pengendali Teknis"))
        @if(auth()->user()->role=="Pengendali Teknis")
            <a class="btn btn-dark rounded-0 flex-fill" style="background-color:#4b3d17" href="/lhe/generateLHE" role="button">Generate LHE</a>
        @endif
        <a class="btn btn-dark rounded-0 flex-fill" style="background-color:#4b3d17" href="/lhe/kirimLHE" role="button">Kirim LHE</a>
    @endif
    <button type="button" class="btn btn-secondary rounded-0 flex-fill" style="background-color:#4b3d17" disabled>Feedback LHE</button>
</div>

<div class="bg-white p-3 mb-3">
    <div class="border-bottom border-1 border-dark mb-3">
      <!-- Button Group -->
      <div class="btn-toolbar justify-content-between" role="toolbar" aria-label="Toolbar with button groups">
        <div class="btn-group" role="group" aria-label="First group">
          <div class="btn-group" role="group">
            <h5 class="mt-1">Daftar Unit Kerja</h5>
          </div>
        </div>
        <div class="input-group">
          <form action="/lhe/feedbackLHE">
            <div class="input-group mb-3">
              <input type="text" class="form-control" placeholder="Search.." name="search" id="cari"
              value="{{ request('search') }}">
              <button class="btn btn-dark" type="submit"><span data-feather="search"></span></button>
            </div>
          </form>
        </div>
      </div>
    </div>
  
    <div class="table-responsive">
      <table class="table table-striped table-sm table-bordered">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Nama Unit Kerja</th>
            <th scope="col">Feedback</th>
          </tr>
        </thead>
        <tbody>
          @php 
            $no = 1 + (($unitKerjas->currentPage()-1) * $unitKerjas->perPage());
          @endphp
  
          @if ($unitKerjas->count())
            @foreach ($unitKerjas as $unitKerja)
            <tr>
              <td>{{ $no++ }}</td>
              <td>{{ $unitKerja->namaUnitKerja }}</td>
              <td>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique, nihil. Accusamus magnam quasi explicabo, et perferendis voluptas voluptatum doloremque illo voluptates neque laudantium quis facere quas aspernatur ipsam porro eaque?
              </td>
            </tr>
            @endforeach
        </tbody>
          @else
          <table class="table table-striped table-sm table-bordered">
                <p class="text-center fs-6">Unit Kerja tidak ditemukan</p>
          @endif
          </table>
    </div>
</div>

<div class="d-flex justify-content-end">
    {!! $unitKerjas->appends(Request::except('page'))->render() !!}
</div>

@endsection