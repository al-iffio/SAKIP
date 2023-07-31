<!-- Modal Tambah KKE -->
<div class="modal fade" id="tambahKKE" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content bg-body-tertiary">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah KKE</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="/kke" method="post">
            @csrf
            <div class="mb-3 row">
              <label for="kodeKKE" class="col-sm-2 col-form-label">Kode KKE</label>
              <div class="col-sm-10 mb-2">
                <input type="text" class="form-control @error('kodeKKE') is-invalid @enderror"
                name="kodeKKE" id="kodeKKE" value="{{ old('kodeKKE') }}" required>
                @error('kodeKKE')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
              <label for="namaKKE" class="col-sm-2 col-form-label">Nama KKE</label>
              <div class="col-sm-10 mb-2">
                <input type="text" class="form-control @error('namaKKE') is-invalid @enderror"
                name="namaKKE" id="namaKKE" value="{{ old('namaKKE') }}" required>
                @error('namaKKE')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>     
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
              <button type="submit" class="btn btn-primary">Buat KKE</button>
            </div>
          </form>
        </div>
      </div>
    </div>
</div>