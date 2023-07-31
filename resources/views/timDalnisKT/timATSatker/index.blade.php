{{-- <div class="row justify-content-center border-bottom">
  <div class="col-md-6">
    <form action="/timDalnisKT/timATSatker">
      <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Search.." name="search" id="cari"
        value="{{ request('search') }}">
        <button class="btn btn-dark" type="submit"><span data-feather="search"></span></button>
      </div>
    </form>
  </div>
</div> --}}

<div class="bg-white px-3 mb-3">
  <!-- Button trigger modal -->
  <div class="border-bottom border-1 border-dark mb-3">
    <button type="button" class="btn btn-primary my-3" data-bs-toggle="modal" data-bs-target="#tambahATSatker">
      <span data-feather="file-plus"></span> Tambah Data
    </button>
  </div>

  @if(session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{ session('success') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
      </button>
    </div>
  @endif
  
  <!-- Tabel AT dan Unit Kerja -->
  <div class="table-responsive">
      <table class="table table-striped table-sm table-bordered">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Nama Anggota Tim</th>
            <th scope="col">Unit Kerja</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>  
          @if ($timATSatkers->count())
            @foreach ($timATSatkers as $timATSatker)
            <tr>
              <td>{{ $loop->iteration}}</td>
              <td>{{ $timATSatker->pegawaiAT->namaPegawai }}</td>
              <td>{{ $timATSatker->unitKerja->namaUnitKerja }}</td>
              <td>
                <a href="/timDalnisKT/timATSatker/{{ $timATSatker->id }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
                <form action="/timDalnisKT/timATSatker/{{ $timATSatker->id }}" method="post" class="d-inline">
                  @csrf
                  @method('delete')
                  <input type="hidden" class="form-control" name="timDalnisKT_id" id="timDalnisKT_id" value="{{ $timATSatker->timDalnisKT_id }}" required>
                  <button class="badge bg-danger border-0" onclick="return confirm('Yakin menghapus data?')">
                    <span data-feather="x-circle"></span>
                  </button>
                </form>
              </td>
            </tr>
            @endforeach
        </tbody>
          @else
          <table class="table table-striped table-sm table-bordered">
                <p class="text-center fs-4">Tim tidak ditemukan</p>
          @endif
          </table>
  </div>
</div>

<div class="d-flex justify-content-end">
  {{ $timATSatkers->links() }}
</div>

@include('timDalnisKT.timATSatker.modalCreate')