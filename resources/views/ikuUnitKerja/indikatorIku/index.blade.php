<div class="border border-1 p-3 bg-white mb-3">
  @if(session()->has('indikatorSuccess'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('indikatorSuccess') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
    </button>
  </div>
  @endif
  <!-- Button trigger modal Indikator -->
  <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#tambahIndikator">
      <span data-feather="file-plus"></span> Tambah Indikator
    </button>
    
    <!-- Tabel Indikator IKU -->
    <div class="table-responsive">
      <table class="table table-striped table-sm table-bordered">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Kode Tujuan</th>
            <th scope="col">Kode Sasaran</th>
            <th scope="col">Kode Indikator</th>
            <th scope="col">Indikator</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($indikatorIKUs as $indikatorIKU)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $indikatorIKU->sasaranIku->tujuanIku->kodeTujuan }}</td>
              <td>{{ $indikatorIKU->sasaranIku->kodeSasaran }}</td>
              <td>{{ $indikatorIKU->kodeIndikator }}</td>
              <td>{{ $indikatorIKU->indikator }}</td>
              <td>
                <form action="/ikuUnitKerja/indikatorIku/{{ $indikatorIKU->id }}/edit" class="d-inline">
                  @csrf
                  <input type="hidden" class="form-control" name="idIKU" id="idIKU" value="{{ $ikuUnitKerja->id }}" required>
                  <input type="hidden" class="form-control" name="namaUnitKerja" id="namaUnitKerja" value="{{ $ikuUnitKerja->namaUnitKerja }}" required>
                  <button class="badge bg-warning border-0">
                    <span data-feather="edit"></span>
                  </button>
                </form>
                {{-- <a href="/ikuUnitKerja/indikatorIku/{{ $indikatorIKU->id }}/edit" class="badge bg-warning">
                  <span data-feather="edit"></span></a> --}}
                <form action="/ikuUnitKerja/indikatorIku/{{ $indikatorIKU->id }}" class="d-inline" method="post">
                  @csrf
                  @method('delete')
                  <input type="hidden" class="form-control" name="namaUnitKerja" id="namaUnitKerja" value="{{ $ikuUnitKerja->namaUnitKerja }}" required>
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
    
    @include('ikuUnitKerja.indikatorIku.modalCreate')
</div>