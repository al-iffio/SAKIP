<!-- Modal Tambah Unit Kerja -->
<div class="modal fade" id="imporUnitKerja" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Impor Unit Kerja</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p class="text-center">
            Untuk impor data unit kerja dari file excel, silahkan unduh templatenya dahulu
          </p>
          <div class="d-grid gap-2 d-md-flex justify-content-md-center">
            <form action="#" method="post">
              @csrf
              <button type="submit" class="btn btn-primary">
                <span data-feather="download"></span> Unduh Template
              </button>
            </form>
          </div>
          <div class="my-3">
            <input class="form-control @error('unitKerja') is-invalid @enderror" type="file" id="unitKerja" name="unitKerja"
            accept=".xlsx,.xls">
            {{-- @if ($errors->any())
            <div class="alert alert-danger mt-3" role="alert">
              Gagal mengimpor Unit Kerja
               Pastikan kembali : <br>
                - Semua kolom telah terisi <br>
                - Kode kriteria hanya terdiri dari 2 karakter <br>
                - Kode kriteria tidak boleh sama <br>
            </div>
            @endif --}}
          </div> 
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary">Impor Unit Kerja</button>
          </div>
          <form method="post" enctype="multipart/form-data">
            @csrf
          </form>
        </div>
      </div>
    </div>
</div>