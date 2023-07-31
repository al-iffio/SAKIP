<div class="border border-1 p-3 bg-white mb-3">
  @if(session()->has('success'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
    </button>
  </div>
  @endif

  <!-- Button trigger modal -->
  <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#tambahKriteriaTL">
      <span data-feather="file-plus"></span> Tambah Kriteria TL
    </button>
    
    <!-- Tabel Kriteria TL -->
    <div class="table-responsive">
      <table class="table table-striped table-sm table-bordered">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Kode Kriteria</th>
            <th scope="col">Kriteria Tindak Lanjut</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($kriteriaTLs as $kriteriaTL)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $kriteriaTL->kriteriaLke->kodeKriteriaLKE }}</td>
              <td>{{ $kriteriaTL->kriteriaLke->namaKriteria }}</td>
              <td>
                <a href="/dokumenTL/kriteriaTL/{{ $kriteriaTL->id }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
                <form action="/dokumenTL/kriteriaTL/{{ $kriteriaTL->id }}" method="post" class="d-inline">
                  @csrf
                  @method('delete')
                  <input type="hidden" class="form-control" name="dokumenTL_id" id="dokumenTL_id" value="{{ $dokumenTL->id }}" required>
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
    
    @include('dokumenTL.kriteriaTL.modalCreate')
</div>