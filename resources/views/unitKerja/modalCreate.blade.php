<!-- Modal Tambah Unit Kerja -->
<div class="modal fade" id="tambahUnitKerja" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content bg-body-tertiary">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Unit Kerja</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="/unitKerja" method="post">
            @csrf
            <div class="mb-3 row">
              <label for="kodeWilayah" class="col-sm-2 col-form-label">Kode Wilayah</label>
              <div class="col-sm-10 mb-2">
                <input type="text" class="form-control @error('kodeWilayah') is-invalid @enderror"
                name="kodeWilayah" id="kodeWilayah" onkeyup="AnEventHasOccurred()" value="{{ old('kodeWilayah') }}" required>
                @error('kodeWilayah')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
              <label for="kodeUnitKerja" class="col-sm-2 col-form-label">Kode Unit Kerja</label>
              <div class="col-sm-10 mb-2">
                <input type="text" class="form-control @error('kodeUnitKerja') is-invalid @enderror"
                name="kodeUnitKerja" id="kodeUnitKerja" onkeyup="Username(); KodeIKU()" value="{{ old('kodeUnitKerja') }}" required>
                @error('kodeUnitKerja')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
              <label for="wilayah" class="col-sm-2 col-form-label">Wilayah</label>
              <div class="col-sm-10 mb-2">
                <select class="form-select @error('wilayah') is-invalid @enderror"
                name="wilayah" id="wilayah" required>
                  <option selected disabled>Pilih Wilayah</option>
                  <option @if(old('wilayah') == "I") selected @endif value="I">I</option>
                  <option @if(old('wilayah') == "II") selected @endif value="II">II</option>
                  <option @if(old('wilayah') == "III") selected @endif value="III">III</option>
                </select>
                @error('wilayah')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
              <label for="namaUnitKerja" class="col-sm-2 col-form-label">Nama Unit Kerja</label>
              <div class="col-sm-10 mb-2">
                <input type="text" class="form-control @error('namaUnitKerja') is-invalid @enderror"
                name="namaUnitKerja" id="namaUnitKerja" value="{{ old('namaUnitKerja') }}" required>
                @error('namaUnitKerja')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
              <input type="hidden" class="form-control" name="username" id="username" value="{{ old('username') }}">
              <label for="namaPIC" class="col-sm-2 col-form-label">Nama PIC</label>
              <div class="col-sm-10 mb-2">
                <input type="text" class="form-control @error('namaPIC') is-invalid @enderror"
                name="namaPIC" id="namaPIC" value="{{ old('namaPIC') }}">
                @error('namaPIC')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
              <label for="noTelpPIC" class="col-sm-2 col-form-label">No. Telepon PIC</label>
              <div class="col-sm-10 mb-2">
                <input type="text" class="form-control @error('noTelpPIC') is-invalid @enderror"
                name="noTelpPIC" id="noTelpPIC" value="{{ old('noTelpPIC') }}">
                @error('noTelpPIC')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
              <label for="role" class="col-sm-2 col-form-label">Role</label>
              <div class="col-sm-10 mb-2">
                <select class="form-select @error('role') is-invalid @enderror"
                name="role" id="role" onchange="AnEventHasOccurred(); KodeIKU()" value="{{ old('role') }}" required>
                  <option selected disabled>Pilih Role</option>
                  <option @if(old('role') == "BPS Kab/Kota") selected @endif value="BPS Kab/Kota">BPS Kab/Kota</option>
                  <option @if(old('role') == "BPS Provinsi") selected @endif value="BPS Provinsi">BPS Provinsi</option>
                  <option @if(old('role') == "Unit Kerja Pusat") selected @endif value="Unit Kerja Pusat">Unit Kerja Pusat</option>
                </select>
                @error('role')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
              <input type="hidden" class="form-control" name="kodeSatkerProv" id="kodeSatkerProv" value="{{ old('kodeSatkerProv') }}">
              <input type="hidden" class="form-control" name="ikuUnitKerja_id" id="ikuUnitKerja_id" value="{{ old('ikuUnitKerja_id') }}">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
              <button type="submit" class="btn btn-primary">Tambah Unit Kerja</button>
            </div>
          </form>
        </div>
      </div>
    </div>
</div>