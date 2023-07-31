<!-- Modal Tambah Permindok -->
<div class="modal fade" id="tambahPermindok" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content bg-body-tertiary">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Permindok</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="/permindok" method="post">
            @csrf
            <div class="mb-3 row">
              <label for="namaDokumen" class="col-sm-2 col-form-label">Nama Dokumen</label>
              <div class="col-sm-10 mb-2">
                <input type="text" class="form-control @error('namaDokumen') is-invalid @enderror"
                name="namaDokumen" id="namaDokumen" value="{{ old('namaDokumen') }}" required>
                @error('namaDokumen')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
              <label for="metodePengumpulan" class="col-sm-2 col-form-label">Metode Pengumpulan</label>
              <div class="col-sm-10 mb-2 pt-3">
                <div class="form-check form-check-inline">
                  <input class="form-check-input @error('metodePengumpulan') is-invalid @enderror"
                  type="radio" name="metodePengumpulan" id="metodePengumpulan" value="link" {{ old('metodePengumpulan') == 'link' ? 'checked' : '' }}>
                  <label class="form-check-label" for="metodePengumpulan1">
                    Menyertakan Link
                  </label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input @error('metodePengumpulan') is-invalid @enderror"
                  type="radio" name="metodePengumpulan" id="metodePengumpulan" value="upload" {{ old('metodePengumpulan') == 'upload' ? 'checked' : '' }}>
                  <label class="form-check-label" for="metodePengumpulan2">
                    Mengunggah Dokumen
                  </label>
                  @error('metodePengumpulan')
                  <div class="invalid-feedback d-inline">
                    {{ $message }}
                  </div>
                  @enderror
                </div>
              </div>     
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
              <button type="submit" class="btn btn-primary">Tambah Permindok</button>
            </div>
          </form>
        </div>
      </div>
    </div>
</div>