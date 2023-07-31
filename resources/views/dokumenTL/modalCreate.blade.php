<!-- Modal Tambah Dokumen TL -->
<div class="modal fade" id="tambahDokumenTL" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content bg-body-tertiary">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Dokumen Tindak Lanjut</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="/dokumenTL" method="post">
            @csrf
            <div class="mb-3 row">
              <label for="dokumenTL" class="col-sm-2 col-form-label">Dokumen TL</label>
              <div class="col-sm-10 mb-2">
                <input type="text" class="form-control @error('dokumenTL') is-invalid @enderror"
                name="dokumenTL" id="dokumenTL" value="{{ old('dokumenTL') }}" required>
                @error('dokumenTL')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>    
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
              <button type="submit" class="btn btn-primary">Buat Dokumen TL</button>
            </div>
          </form>
        </div>
      </div>
    </div>
</div>