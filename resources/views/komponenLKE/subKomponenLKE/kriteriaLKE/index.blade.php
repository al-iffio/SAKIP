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
        <!-- Button Create Kriteria LKE -->
        <form action="/komponenLKE/subKomponenLKE/kriteriaLKE/create">
          @csrf
          <input type="hidden" class="form-control" name="kodeKomponen" id="kodeKomponen" value="{{ $subKomponenLKE->komponenLKE->kodeKomponen }}" required>
          <input type="hidden" class="form-control" name="kodeSubKomponen" id="kodeSubKomponen" value="{{ $subKomponenLKE->kodeSubKomponen }}" required>
          <input type="hidden" class="form-control" name="subKomponenLke_id" id="subKomponenLke_id" value="{{ $subKomponenLKE->id }}" required>
          <input type="hidden" class="form-control" name="bobotPerKriteria" id="bobotPerKriteria" value="{{ $subKomponenLKE->bobotPerKriteria }}" required>
          <input type="hidden" class="form-control" name="jumlahKriteria" id="jumlahKriteria" value="{{ $subKomponenLKE->kriteriaLke->count() }}" required>
          <input type="hidden" class="form-control" name="persentaseNilaiSub" id="persentaseNilaiSub" value="{{ $subKomponenLKE->persentaseNilaiSub }}" required>
    
          <button class="btn btn-primary mb-3">
            <span data-feather="file-plus"></span> Tambah Kriteria
          </button>
        </form>
      
        <button type="button" class="btn btn-primary mb-3 ms-2 rounded-2" data-bs-toggle="modal" data-bs-target="#imporKriteria">
          <span data-feather="file-plus"></span> Impor Kriteria
        </button>
      </div>
    
      <div class="btn-group">
        <form action="/komponenLKE/subKomponenLKE/kriteriaLKE/deleteAll" method="post">
          @csrf
          <input type="hidden" class="form-control" name="kodeKomponen" id="kodeKomponen" value="{{ $subKomponenLKE->komponenLKE->kodeKomponen }}" required>
          <input type="hidden" class="form-control" name="kodeSubKomponen" id="kodeSubKomponen" value="{{ $subKomponenLKE->kodeSubKomponen }}" required>
          <input type="hidden" class="form-control" name="subKomponenLke_id" id="subKomponenLke_id" value="{{ $subKomponenLKE->id }}" required>
          <button class="btn btn-danger mb-3" onclick="return confirm('Yakin menghapus semua data?')">
            <span data-feather="x-circle"></span> Hapus Semua Kriteria
          </button>
        </form>
      </div>
    </div>  
  </div>

  <!-- Tabel Kriteria LKE -->
  <div class="table-responsive">
      <table class="table table-striped table-sm table-bordered">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Kode Kriteria</th>
            <th scope="col">Kriteria</th>
            <th scope="col">Persentase Nilai Kriteria (%)</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($kriteriaLKEs as $kriteriaLKE)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $kriteriaLKE->kodeKriteriaLKE }}</td>
              <td>{{ $kriteriaLKE->namaKriteria }}</td>
              <td>{{ $kriteriaLKE->bobotKriteria }}</td>
              <td>
                <form action="/komponenLKE/subKomponenLKE/kriteriaLKE/{{ $kriteriaLKE->id }}/edit" class="d-inline">
                  @csrf
                  <input type="hidden" class="form-control" name="kodeKomponen" id="kodeKomponen" value="{{ $kriteriaLKE->subKomponenLke->komponenLKE->kodeKomponen }}" required>
                  <input type="hidden" class="form-control" name="kodeSubKomponen" id="kodeSubKomponen" value="{{ $kriteriaLKE->subKomponenLke->kodeSubKomponen }}" required>           
                  <input type="hidden" class="form-control" name="bobotPerKriteria" id="bobotPerKriteria" value="{{ $subKomponenLKE->bobotPerKriteria }}" required>
                  <input type="hidden" class="form-control" name="jumlahKriteria" id="jumlahKriteria" value="{{ $subKomponenLKE->kriteriaLke->count() }}" required>
                  <input type="hidden" class="form-control" name="persentaseNilaiSub" id="persentaseNilaiSub" value="{{ $subKomponenLKE->persentaseNilaiSub }}" required>
                  <button class="badge bg-warning border-0">
                    <span data-feather="edit"></span>
                  </button>
                </form>
                <form action="/komponenLKE/subKomponenLKE/kriteriaLKE/{{ $kriteriaLKE->id }}" method="post" class="d-inline">
                  @csrf
                  @method('delete')
                  <input type="hidden" class="form-control" name="kodeKomponen" id="kodeKomponen" value="{{ $kriteriaLKE->subKomponenLke->komponenLKE->kodeKomponen }}" required>
                  <input type="hidden" class="form-control" name="kodeSubKomponen" id="kodeSubKomponen" value="{{ $kriteriaLKE->subKomponenLke->kodeSubKomponen }}" required>
                  <input type="hidden" class="form-control" name="id" id="id" value="{{ $kriteriaLKE->subKomponenLke->id }}" required>
                  <button class="badge bg-danger border-0" onclick="return confirm('Yakin menghapus data?')">
                    <span data-feather="x-circle"></span>
                  </button>
                </form>
              </td>
            </tr>
            @endforeach
            <tr>
              <td></td>
              <td colspan="2" class="fw-bold">Total</td>
              <td class="fw-bold">
                @php
                  $persentase = 0;
                @endphp
                @foreach ($kriteriaLKEs as $kriteriaLKE)
                  @php
                    $persentase = $persentase + $kriteriaLKE->bobotKriteria;
                  @endphp
                @endforeach
                {{ $persentase }}
              </td>
              <td></td>
            </tr>
        </tbody>
      </table>
      @if($persentase > $subKomponenLKE->persentaseNilaiSub+0.01)
        <div class="alert alert-danger alert-dismissible fade show bold" role="alert">
          Total persentase nilai kriteria melebihi persentase nilai sub komponen!
        </div>
      @endif
  </div>

  @include('komponenLKE.subKomponenLKE.kriteriaLKE.impor')
  
</div>