<!-- Modal Tambah Repository -->
<div class="modal fade" id="tambahRepository" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content bg-body-tertiary">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Dokumen Materi</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="/repository/materi/create">
            @csrf
            <div class="mb-3 row">
              <label for="jumlahInput" class="col-form-label">Jumlah dokumen materi yang ingin ditambahkan</label>
              <div class="col-sm-10 mb-2">
                <input type="number" min="1" class="form-control" name="jumlahInput" id="jumlahInput" value="{{ old('jumlahInput') }}" required>
                @error('jumlahInput')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>  
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
              <button type="submit" class="btn btn-primary">Tambah Materi</button>
            </div>
          </form>
        </div>
      </div>
    </div>
</div>