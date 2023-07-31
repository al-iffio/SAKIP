<!-- Modal Tambah Komponen -->
<div class="modal fade" id="tambahKomponen" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content bg-body-tertiary">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Komponen</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="/komponenLKE" method="post">
            @csrf
            <div class="mb-3 row">
              <label for="kodeKomponen" class="col-sm-2 col-form-label">Kode Komponen</label>
              <div class="col-sm-10 mb-2">
                <input type="text" class="form-control @error('kodeKomponen') is-invalid @enderror"
                name="kodeKomponen" id="kodeKomponen" value="{{ old('kodeKomponen') }}" required>
                @error('kodeKomponen')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
              <label for="namaKomponen" class="col-sm-2 col-form-label">Nama Komponen</label>
              <div class="col-sm-10 mb-2">
                <input type="text" class="form-control @error('namaKomponen') is-invalid @enderror"
                name="namaKomponen" id="namaKomponen" value="{{ old('namaKomponen') }}" required>
                @error('namaKomponen')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
              <label for="persentaseNilai" class="col-sm-2 col-form-label">Persentase Nilai Komponen</label>
              <div class="col-sm-10 mb-2">
                <input type="text" class="form-control @error('persentaseNilai') is-invalid @enderror"
                name="persentaseNilai" id="persentaseNilai" value="{{ old('persentaseNilai') }}" required>
                @error('persentaseNilai')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>          
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
              <button type="submit" class="btn btn-primary">Buat Komponen</button>
            </div>
          </form>
        </div>
      </div>
    </div>
</div>