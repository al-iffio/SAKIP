<div class="border border-1 p-3 bg-white mb-3">
  @if(session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{ session('success') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
      </button>
    </div>
  @endif

  <!-- Button trigger modal -->
  <div class="border-bottom border-1 border-dark mb-3">
    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#tambahSubKomponen">
      <span data-feather="file-plus"></span> Tambah Sub Komponen
    </button>
  </div>

  <!-- Tabel Sub Komponen LKE -->
  <div class="table-responsive">
      <table class="table table-striped table-sm table-bordered">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Kode Sub Komponen</th>
            <th scope="col">Nama Sub Komponen</th>
            <th scope="col">Jumlah Kriteria</th>
            <th scope="col">Persentase Nilai Sub Komponen (%)</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($subKomponenLKEs as $subKomponenLKE)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $subKomponenLKE->kodeSubKomponen }}</td>
              <td>{{ $subKomponenLKE->namaSubKomponen }}</td>
              <td>{{ $subKomponenLKE->kriteriaLKE->count() }}</td>
              <td>{{ $subKomponenLKE->persentaseNilaiSub }}</td>
              <td>
                <a href="/komponenLKE/subKomponenLKE/{{ $subKomponenLKE->kodeSubKomponen }}" class="badge bg-info"><span data-feather="eye"></span></a>
                <form action="/komponenLKE/subKomponenLKE/{{ $subKomponenLKE->kodeSubKomponen }}/edit" class="d-inline">
                  @csrf
                  <input type="hidden" class="form-control" name="kodeKomponen" id="kodeKomponen" value="{{ $komponenLKE->kodeKomponen }}" required>
                  <button class="badge bg-warning border-0">
                    <span data-feather="edit"></span>
                  </button>
                </form>
                <form action="/komponenLKE/subKomponenLKE/{{ $subKomponenLKE->kodeSubKomponen }}" method="post" class="d-inline">
                  @csrf
                  @method('delete')
                  <input type="hidden" class="form-control" name="kodeKomponen" id="kodeKomponen" value="{{ $komponenLKE->kodeKomponen }}" required>
                  <button class="badge bg-danger border-0" onclick="return confirm('Yakin menghapus data?')">
                    <span data-feather="x-circle"></span>
                  </button>
                </form>
              </td>
            </tr>
            @endforeach
            <tr>
              <td></td>
              <td colspan="3" class="fw-bold">Total</td>
              <td class="fw-bold">
                @php
                  $persentase = 0;
                @endphp
                @foreach ($subKomponenLKEs as $subKomponenLKE)
                  @php
                    $persentase = $persentase + $subKomponenLKE->persentaseNilaiSub
                  @endphp
                @endforeach
                {{ $persentase }}
              </td>
              <td></td>
            </tr>
        </tbody>
      </table>

      @if($persentase > $komponenLKE->persentaseNilai)
        <div class="alert alert-danger alert-dismissible fade show bold" role="alert">
          Total persentase nilai sub komponen melebihi persentase nilai komponen!
        </div>
      @endif
  </div>

  @include('komponenLKE.subKomponenLKE.modalCreate')
  
</div>