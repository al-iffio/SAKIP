<!-- Modal Tambah Indikator -->
<div class="modal fade" id="tambahIndikator" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content bg-body-tertiary">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Indikator</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="/ikuUnitKerja/indikatorIku/create">
            @csrf
            <div class="mb-3 row">
              <input type="hidden" class="form-control" name="idIKU" id="idIKU" value="{{ $ikuUnitKerja->id }}" required>
              <input type="hidden" class="form-control" name="namaUnitKerja" id="namaUnitKerja" value="{{ $ikuUnitKerja->namaUnitKerja }}" required>
              <label for="jumlahInput" class="col-form-label">Jumlah Indikator yang ingin ditambahkan</label>
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
              <button type="submit" class="btn btn-primary">Tambah Indikator</button>
            </div>
          </form>
        </div>
      </div>
    </div>
</div>