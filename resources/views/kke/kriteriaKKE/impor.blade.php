<!-- Modal Tambah Kriteria -->
<div class="modal fade" id="imporKriteria" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Impor Kriteria</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p class="text-center">
            Untuk impor data kriteria dari file excel, silahkan unduh templatenya dahulu
          </p>
          <div class="d-grid gap-2 d-md-flex justify-content-md-center">
            <form action="/kke/kriteriaKKE/downloadTemplate" method="post">
              @csrf
              <button type="submit" class="btn btn-primary">
                <span data-feather="download"></span> Unduh Template
              </button>
            </form>
          </div>
          <form action="/kke/kriteriaKKE/import" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" class="form-control" name="kodeKKE" id="kodeKKE" value="{{ $kke->kodeKKE }}" required>
            <div class="my-3">
              <input class="form-control @error('kriteriaKKE') is-invalid @enderror" type="file" id="kriteriaKKE" name="kriteriaKKE"
              accept=".xlsx,.xls">
              @if ($errors->any())
                <div class="alert alert-danger mt-3" role="alert">
                    @foreach($errors->all() as $error)
                    {{ $error }} <br>
                    @endforeach      
                </div>
              @endif
            </div> 
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
              <button type="submit" class="btn btn-primary">Impor Kriteria</button>
            </div>
          </form>
        </div>
      </div>
    </div>
</div>