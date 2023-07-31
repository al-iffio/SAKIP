<div class="border border-1 p-3 bg-white mb-3">
  @if(session()->has('success'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
    </button>
  </div>
  @endif

  <div class="border-bottom border-1 border-dark mb-3">
    <div class="btn-toolbar justify-content-between">
      <div class="btn-group">
        <!-- Button Create Kriteria KKE -->
        <form action="/kke/kriteriaKKE/create">
          @csrf
          <input type="hidden" class="form-control" name="kodeKKE" id="kodeKKE" value="{{ $kke->kodeKKE }}" required>
          <input type="hidden" class="form-control" name="kke_id" id="kke_id" value="{{ $kke->id }}" required>
          <button class="btn btn-primary mb-3">
            <span data-feather="file-plus"></span> Tambah Kriteria KKE
          </button>
        </form>
      
        <button type="button" class="btn btn-primary mb-3 ms-2 rounded-2" data-bs-toggle="modal" data-bs-target="#imporKriteria">
          <span data-feather="file-plus"></span> Impor Kriteria
        </button>
      </div>
    
      <div class="btn-group">
        <form action="/kke/kriteriaKKE/deleteAll" method="post">
          @csrf
          <input type="hidden" class="form-control" name="kodeKKE" id="kodeKKE" value="{{ $kke->kodeKKE }}" required>
          <input type="hidden" class="form-control" name="kke_id" id="kke_id" value="{{ $kke->id }}" required>
          <button class="btn btn-danger mb-3" onclick="return confirm('Yakin menghapus semua data?')">
            <span data-feather="x-circle"></span> Hapus Semua Kriteria
          </button>
        </form>
      </div>
    </div> 
  </div>
    
    <!-- Tabel Kriteria KKE -->
    <div class="table-responsive">
      <table class="table table-striped table-sm table-bordered">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">ID</th>
            <th scope="col">Kode Kriteria KKE</th>
            <th scope="col">Kriteria</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($kriteriaKKEs as $kriteriaKKE)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $kriteriaKKE->id }}</td>
              <td>{{ $kriteriaKKE->kodeKriteriaKKE }}</td>
              <td>{{ $kriteriaKKE->kriteria }}</td>
              <td>
                <form action="/kke/kriteriaKKE/{{ $kriteriaKKE->id }}/edit" class="d-inline">
                  @csrf
                  <input type="hidden" class="form-control" name="kodeKKE" id="kodeKKE" value="{{ $kke->kodeKKE }}" required>
                  <button class="badge bg-warning border-0">
                    <span data-feather="edit"></span>
                  </button>
                </form>
                {{-- <a href="/ikuUnitKerja/indikatorIku/{{ $indikatorIKU->id }}/edit" class="badge bg-warning">
                  <span data-feather="edit"></span></a> --}}
                <form action="/kke/kriteriaKKE/{{ $kriteriaKKE->id }}" class="d-inline" method="post">
                  @csrf
                  @method('delete')
                  <input type="hidden" class="form-control" name="kodeKKE" id="kodeKKE" value="{{ $kke->kodeKKE }}" required>
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

    @include('kke.kriteriaKKE.impor')

</div>