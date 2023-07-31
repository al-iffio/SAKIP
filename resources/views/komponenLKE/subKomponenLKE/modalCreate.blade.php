<!-- Modal Tambah Sub Komponen -->
<div class="modal fade" id="tambahSubKomponen" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content bg-body-tertiary">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Sub Komponen</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="/komponenLKE/subKomponenLKE" method="post">
            @csrf
            <div class="mb-3 row">
              <input type="hidden" class="form-control" name="kodeKomponen" id="kodeKomponen" value="{{ $komponenLKE->kodeKomponen }}" required>
              <input type="hidden" class="form-control" name="komponenLke_id" id="komponenLke_id" value="{{ $komponenLKE->id }}" required>
              <label for="kodeSubKomponen" class="col-sm-2 col-form-label">Kode Sub Komponen</label>
              <div class="col-sm-10 mb-2">
                <input type="text" class="form-control @error('kodeSubKomponen') is-invalid @enderror"
                name="kodeSubKomponen" id="kodeSubKomponen" value="{{ old('kodeSubKomponen') }}" placeholder="{{ $komponenLKE->kodeKomponen }}..." required>
                @error('kodeSubKomponen')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
              <label for="namaSubKomponen" class="col-sm-2 col-form-label">Nama Sub Komponen</label>
              <div class="col-sm-10 mb-2">
                <input type="text" class="form-control @error('namaSubKomponen') is-invalid @enderror"
                name="namaSubKomponen" id="namaSubKomponen" value="{{ old('namaSubKomponen') }}" required>
                @error('namaSubKomponen')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
              <label for="persentaseNilaiSub" class="col-sm-2 col-form-label">Persentase Nilai Sub Komponen</label>
              <div class="col-sm-10 mb-2">
                <input type="text" class="form-control @error('persentaseNilaiSub') is-invalid @enderror"
                name="persentaseNilaiSub" id="persentaseNilaiSub" value="{{ old('persentaseNilaiSub') }}" required>
                @error('persentaseNilaiSub')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
              <label for="bobotPerKriteria" class="col-sm-2 col-form-label">Bobot per Kriteria</label>
              <div class="col-sm-10 mb-2">
                <div class="form-check form-check-inline">
                  <input class="form-check-input @error('bobotPerKriteria') is-invalid @enderror"
                  type="radio" name="bobotPerKriteria" id="bobotPerKriteria" value="Sama" {{ old('bobotPerKriteria') == 'Sama' ? 'checked' : '' }}>
                  <label class="form-check-label" for="nilaiPerIKU1">
                    Sama
                  </label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input @error('bobotPerKriteria') is-invalid @enderror"
                  type="radio" name="bobotPerKriteria" id="bobotPerKriteria" value="Berbeda" {{ old('bobotPerKriteria') == 'Berbeda' ? 'checked' : '' }}>
                  <label class="form-check-label" for="nilaiPerIKU2">
                    Berbeda
                  </label>
                  @error('bobotPerKriteria')
                  <div class="invalid-feedback d-inline">
                    {{ $message }}
                  </div>
                  @enderror
                </div>         
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
              <button type="submit" class="btn btn-primary">Buat Sub Komponen</button>
            </div>
          </form>
        </div>
      </div>
    </div>
</div>