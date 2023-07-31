<div class="border border-1 p-3 bg-white mb-3">
  @if(session()->has('tujuanSuccess'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('tujuanSuccess') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
    </button>
  </div>
  @endif
  <!-- Button trigger modal Tujuan -->
  <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#tambahTujuan">
      <span data-feather="file-plus"></span> Tambah Tujuan
    </button>
    
    <!-- Tabel Tujuan IKU -->
    <div class="table-responsive">
      <table class="table table-striped table-sm table-bordered">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Kode Tujuan</th>
            <th scope="col">Tujuan</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($tujuanIKUs as $tujuanIKU)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $tujuanIKU->kodeTujuan }}</td>
              <td>{{ $tujuanIKU->tujuan }}</td>
              <td>
                <form action="/ikuUnitKerja/tujuanIku/{{ $tujuanIKU->id }}/edit" class="d-inline">
                  @csrf
                  <input type="hidden" class="form-control" name="namaUnitKerja" id="namaUnitKerja" value="{{ $ikuUnitKerja->namaUnitKerja }}" required>
                  <button class="badge bg-warning border-0">
                    <span data-feather="edit"></span>
                  </button>
                </form>
                {{-- <a href="/unitKerja/{{ $tujuanIKU->id }}/edit" class="badge bg-warning">
                  <span data-feather="edit"></span></a> --}}
                <form action="/ikuUnitKerja/tujuanIku/{{ $tujuanIKU->id }}" method="post" class="d-inline">
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
    
    @include('ikuUnitKerja.tujuanIku.modalCreate')
</div>