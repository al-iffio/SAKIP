<div class="border border-1 p-3 bg-white mb-3">
  @if(session()->has('sasaranSuccess'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('sasaranSuccess') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
    </button>
  </div>
  @endif
  <!-- Button trigger modal Sasaran -->
  <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#tambahSasaran">
      <span data-feather="file-plus"></span> Tambah Sasaran
    </button>
    
    <!-- Tabel Sasaran IKU -->
    <div class="table-responsive">
      <table class="table table-striped table-sm table-bordered">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Kode Tujuan</th>
            <th scope="col">Kode Sasaran</th>
            <th scope="col">Sasaran</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($sasaranIKUs as $sasaranIKU)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $sasaranIKU->tujuanIku->kodeTujuan }}</td>
              <td>{{ $sasaranIKU->kodeSasaran }}</td>
              <td>{{ $sasaranIKU->sasaran }}</td>
              <td>
                <form action="/ikuUnitKerja/sasaranIku/{{ $sasaranIKU->id }}/edit" class="d-inline">
                  @csrf
                  <input type="hidden" class="form-control" name="idIKU" id="idIKU" value="{{ $ikuUnitKerja->id }}" required>
                  <input type="hidden" class="form-control" name="namaUnitKerja" id="namaUnitKerja" value="{{ $ikuUnitKerja->namaUnitKerja }}" required>
                  <button class="badge bg-warning border-0">
                    <span data-feather="edit"></span>
                  </button>
                </form>
                {{-- <a href="/ikuUnitKerja/sasaranIku/{{ $sasaranIKU->id }}/edit" class="badge bg-warning">
                  <span data-feather="edit"></span></a> --}}
                <form action="/ikuUnitKerja/sasaranIku/{{ $sasaranIKU->id }}" class="d-inline" method="post">
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
    
    @include('ikuUnitKerja.sasaranIku.modalCreate')
</div>