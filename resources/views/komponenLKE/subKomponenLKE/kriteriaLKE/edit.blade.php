@extends('layouts.main')

@section('container')
<div class="container mt-3">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/komponenLKE" style="text-decoration:none; color:black"
          onclick="return confirm('Batal mengubah Komponen LKE?')"><h4>Pengaturan LKE</h4></a></li>
      <li class="breadcrumb active mt-1" aria-current="page"><a href="/komponenLKE/{{ $kodeKomponen }}/edit" style="text-decoration:none; color:black"
          onclick="return confirm('Batal mengubah Sub Komponen LKE?')"><h5>&nbsp/ Ubah Komponen LKE</h5></a></li>
      <li class="breadcrumb active mt-1" aria-current="page"><a href="/komponenLKE/subKomponenLKE/{{ $kodeSubKomponen }}/edit" style="text-decoration:none; color:black"
          onclick="return confirm('Batal menambah Kriteria LKE?')"><h5>&nbsp/ Ubah Sub Komponen LKE</h5></a></li>    
      <li class="breadcrumb active mt-1" aria-current="page"><h5 class="d-inline" style="text-decoration:none; color:black">&nbsp/ Ubah Kriteria LKE</h5></a></li>
    </ol>
  </nav>
</div>            

<form action="/komponenLKE/subKomponenLKE/kriteriaLKE/{{ $kriteriaLKE->id }}" method="post">
    @method('put')
    @csrf
    <div class="mb-3 row">
      <input type="hidden" class="form-control" name="kodeKomponen" id="kodeKomponen" value="{{ $kodeKomponen }}" required> 
      <input type="hidden" class="form-control" name="kodeSubKomponen" id="kodeSubKomponen" value="{{ $kodeSubKomponen }}" required> 
      <label for="kodeKriteriaLKE" class="col-sm-2 col-form-label">Kode Kriteria</label>
      <div class="col-sm-12 mb-2">
        <input type="text" class="form-control @error('kodeKriteriaLKE') is-invalid @enderror"
        name="kodeKriteriaLKE" id="kodeKriteriaLKE" value="{{ old('kodeKriteriaLKE', $kriteriaLKE->kodeKriteriaLKE) }}" placeholder="{{ $kodeSubKomponen }}..." required autofocus>
        @error('kodeKriteriaLKE')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>
      <label for="namaKriteria" class="col-sm-2 col-form-label">Nama Kriteria</label>
      <div class="col-sm-12 mb-2">
        <input type="text" class="form-control @error('namaKriteria') is-invalid @enderror"
        name="namaKriteria" id="namaKriteria" value="{{ old('namaKriteria', $kriteriaLKE->namaKriteria) }}" required>
        @error('namaKriteria')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>
      <label for="bobotKriteria" class="col-sm-2 col-form-label">Bobot Kriteria</label>
      @if($bobotPerKriteria == 'Sama')
        @php
          $bobot = $persentaseNilaiSub/$jumlahKriteria;
        @endphp
        <div class="col-sm-12 mb-2">
          <input type="text" class="form-control @error('bobotKriteria') is-invalid @enderror"
          name="bobotKriteria" id="bobotKriteria" value="{{ $bobot }}" disabled>
          <input type="hidden" class="form-control @error('bobotKriteria') is-invalid @enderror"
          name="bobotKriteria" id="bobotKriteria" value="{{ $bobot }}">
          @error('bobotKriteria')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
      @else
        <div class="col-sm-12 mb-2">
          <input type="text" class="form-control @error('bobotKriteria') is-invalid @enderror"
          name="bobotKriteria" id="bobotKriteria" value="{{ old('bobotKriteria', $kriteriaLKE->bobotKriteria) }}" required>
          @error('bobotKriteria')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
      @endif
      <label for="panduanEvaluator" class="col-sm-2 col-form-label">Panduan Evaluator</label>
      <div class="col-sm-12 mb-2">
        <textarea class="form-control @error('panduanEvaluator') is-invalid @enderror"
        name="panduanEvaluator" id="panduanEvaluator">{{ old('panduanEvaluator', $kriteriaLKE->panduanEvaluator) }}</textarea>
        @error('panduanEvaluator')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>
      <label for="jenisPenilaian" class="col-sm-2 col-form-label">Jenis Penilaian</label>
      <div class="col-sm-12 mb-2">
        <select class="form-select @error('jenisPenilaian') is-invalid @enderror"
          name="jenisPenilaian" id="jenisPenilaian" onchange="JenisPenilaian()" required>
            <option @if($kriteriaLKE->jenisPenilaian == "Default") selected @endif value="Default">Default</option>
            <option @if($kriteriaLKE->jenisPenilaian == "Manual") selected @endif value="Manual">Manual</option>
            <option @if($kriteriaLKE->jenisPenilaian == "KKE") selected @endif value="KKE">KKE</option>
        </select>
        @error('jenisPenilaian')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror    
      </div>
      {{-- DEFAULT --}}
      @if($kriteriaLKE->jenisPenilaian == "Default")
        <div id="default">
          <label for="defaultNilai" class="col-sm-2 col-form-label">Default Nilai</label>
          <div class="col-sm-12 mb-2">
            <select class="form-select @error('defaultNilai') is-invalid @enderror"
            name="defaultNilai" id="defaultNilai" onchange="JenisPenilaian()" required>
              <option @if(old('defaultNilai', $kriteriaLKE->defaultNilai) == "A") selected @endif value="A">A</option>
              <option @if(old('defaultNilai', $kriteriaLKE->defaultNilai) == "B") selected @endif value="B">B</option>
              <option @if(old('defaultNilai', $kriteriaLKE->defaultNilai) == "C") selected @endif value="C">C</option>
              <option @if(old('defaultNilai', $kriteriaLKE->defaultNilai) == "D") selected @endif value="D">D</option>
              <option @if(old('defaultNilai', $kriteriaLKE->defaultNilai) == "E") selected @endif value="E">E</option>
              <option @if(old('defaultNilai', $kriteriaLKE->defaultNilai) == "Y") selected @endif value="Y">Y</option>
              <option @if(old('defaultNilai', $kriteriaLKE->defaultNilai) == "T") selected @endif value="T">T</option>
            </select>
            @error('defaultNilai')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <label for="defaultCatatan" class="col-sm-2 col-form-label">Default Catatan</label>
          <textarea class="form-control @error('defaultCatatan') is-invalid @enderror"
          name="defaultCatatan" id="defaultCatatan">{{ old('defaultCatatan', $kriteriaLKE->defaultCatatan) }}</textarea>
          @error('defaultCatatan')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
        <div id="manual" style="display:none">    
          <label for="pilihanNilai" class="col-sm-2 col-form-label">Pilihan Nilai</label>
          <div class="col-sm-12 mb-2">
            <select class="form-select @error('pilihanNilai') is-invalid @enderror"
            name="pilihanNilai" id="pilihanNilai" onchange="PilihanNilai()" required>
              <option selected disabled>Pilihan Nilai</option>
              <option @if(old('pilihanNilai', $kriteriaLKE->pilihanNilai) == "ABCDE") selected @endif value="ABCDE">ABCDE</option>
              <option @if(old('pilihanNilai', $kriteriaLKE->pilihanNilai) == "Y/T") selected @endif value="Y/T">Y/T</option>
            </select>
            @error('pilihanNilai')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror    
          </div>
          <label for="catatanPerNilai" class="col-sm-2 col-form-label">Gunakan Catatan per Nilai</label>
          <div class="col-sm-12 mb-2">
            <select class="form-select @error('catatanPerNilai') is-invalid @enderror"
            name="catatanPerNilai" id="catatanPerNilai" onchange="CatatanPerNilai(); UlangPilihanNilai()">
              <option selected disabled>Ya/Tidak</option>
              <option @if(old('catatanPerNilai', $kriteriaLKE->catatanPerNilai) == "1") selected @endif value="1">Ya</option>
              <option @if(old('catatanPerNilai', $kriteriaLKE->catatanPerNilai) == "0") selected @endif value="0">Tidak</option>
            </select>
            @error('catatanPerNilai')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror    
          </div>
          <div id="tidak" style="display:none">
            <label for="templateCatatan" class="col-sm-2 col-form-label">Template Catatan</label>
            <textarea class="form-control @error('templateCatatan') is-invalid @enderror"
            name="templateCatatan" id="templateCatatan">{{ old('templateCatatan', $kriteriaLKE->templateCatatan) }}</textarea>
            @error('templateCatatan')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
          <div id="ya" style="display:none">
            <div id="ABCDE" style="display:none">
              <label for="catatanA" class="col-sm-2 col-form-label">Catatan A</label>
              <textarea class="form-control @error('catatanA') is-invalid @enderror"
              name="catatanA" id="catatanA">{{ old('catatanA', $kriteriaLKE->catatanA) }}</textarea>
              @error('catatanA')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
              <label for="catatanB" class="col-sm-2 col-form-label">Catatan B</label>
              <textarea class="form-control @error('catatanB') is-invalid @enderror"
              name="catatanB" id="catatanB">{{ old('catatanB', $kriteriaLKE->catatanB) }}</textarea>
              @error('catatanB')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
              <label for="catatanC" class="col-sm-2 col-form-label">Catatan C</label>
              <textarea class="form-control @error('catatanC') is-invalid @enderror"
              name="catatanC" id="catatanC">{{ old('catatanC', $kriteriaLKE->catatanC) }}</textarea>
              @error('catatanC')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
              <label for="catatanD" class="col-sm-2 col-form-label">Catatan D</label>
              <textarea class="form-control @error('catatanD') is-invalid @enderror"
              name="catatanD" id="catatanD">{{ old('catatanD', $kriteriaLKE->catatanD) }}</textarea>
              @error('catatanD')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
              <label for="catatanE" class="col-sm-2 col-form-label">Catatan E</label>
              <textarea class="form-control @error('catatanE') is-invalid @enderror"
              name="catatanE" id="catatanE">{{ old('catatanE', $kriteriaLKE->catatanE) }}</textarea>
              @error('catatanE')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
            <div id="Y/T" style="display:none">
              <label for="catatanY" class="col-sm-2 col-form-label">Catatan Y</label>
              <textarea class="form-control @error('catatanY') is-invalid @enderror"
              name="catatanY" id="catatanY">{{ old('catatanY', $kriteriaLKE->catatanY) }}</textarea>
              @error('catatanY')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
              <label for="catatanT" class="col-sm-2 col-form-label">Catatan T</label>
              <textarea class="form-control @error('catatanT') is-invalid @enderror"
              name="catatanT" id="catatanT">{{ old('catatanT', $kriteriaLKE->catatanT) }}</textarea>
              @error('catatanT')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
          </div>
        </div>
        <div id="kke" style="display:none">
          <label for="kriteriaKKE_id" class="form-label">Kode Kriteria KKE</label>
            <select class="form-select @error('kriteriaKKE_id') is-invalid @enderror"
            name="kriteriaKKE_id" id="kriteriaKKE_id">
              <option selected disabled>Pilih Kriteria KKE</option>
              @foreach ( $kriteriaKKEs as $kriteriaKKE )
                @if(old('kriteriaKKE_id', $kriteriaLKE->kriteriaKKE_id) == $kriteriaKKE->id)
                  <option value="{{ $kriteriaKKE->id }}" selected>{{ $kriteriaKKE->kriteria }}</option>
                @else
                  <option value="{{ $kriteriaKKE->id }}">{{ $kriteriaKKE->kriteria }}</option>
                @endif  
              @endforeach
            </select>
            <label for="templateCatatanKKE" class="col-sm-2 col-form-label">Template Catatan</label>
            <textarea class="form-control @error('templateCatatanKKE') is-invalid @enderror"
            name="templateCatatanKKE" id="templateCatatanKKE">{{ old('templateCatatanKKE', $kriteriaLKE->templateCatatanKKE) }}</textarea>
            @error('templateCatatanKKE')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
        </div>
      @endif
      {{-- MANUAL --}}
      @if($kriteriaLKE->jenisPenilaian == "Manual")
        <div id="default" style="display:none">
          <label for="defaultNilai" class="col-sm-2 col-form-label">Default Nilai</label>
          <div class="col-sm-12 mb-2">
            <select class="form-select @error('defaultNilai') is-invalid @enderror"
            name="defaultNilai" id="defaultNilai" onchange="JenisPenilaian()" required>
              <option selected disabled>Pilih Default Nilai</option>
              <option @if(old('defaultNilai') == "A") selected @endif value="A">A</option>
              <option @if(old('defaultNilai') == "B") selected @endif value="B">B</option>
              <option @if(old('defaultNilai') == "C") selected @endif value="C">C</option>
              <option @if(old('defaultNilai') == "D") selected @endif value="D">D</option>
              <option @if(old('defaultNilai') == "E") selected @endif value="E">E</option>
              <option @if(old('defaultNilai') == "Y") selected @endif value="Y">Y</option>
              <option @if(old('defaultNilai') == "T") selected @endif value="T">T</option>
            </select>
            @error('defaultNilai')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror    
          </div>
          <label for="defaultCatatan" class="col-sm-2 col-form-label">Default Catatan</label>
          <textarea class="form-control @error('defaultCatatan') is-invalid @enderror"
          name="defaultCatatan" id="defaultCatatan">{{ old('defaultCatatan', $kriteriaLKE->defaultCatatan) }}</textarea>
          @error('defaultCatatan')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
        <div id="manual">
          <label for="pilihanNilai" class="col-sm-2 col-form-label">Pilihan Nilai</label>
          <div class="col-sm-12 mb-2">
            <select class="form-select @error('pilihanNilai') is-invalid @enderror"
            name="pilihanNilai" id="pilihanNilai" onchange="PilihanNilai()" required>
              <option @if($kriteriaLKE->pilihanNilai == "ABCDE") selected @endif value="ABCDE">ABCDE</option>
              <option @if($kriteriaLKE->pilihanNilai == "Y/T") selected @endif value="Y/T">Y/T</option>
            </select>
            @error('pilihanNilai')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror    
          </div>
          <label for="catatanPerNilai" class="col-sm-2 col-form-label">Gunakan Catatan per Nilai</label>
          <div class="col-sm-12 mb-2">
            <select class="form-select @error('catatanPerNilai') is-invalid @enderror"
              name="catatanPerNilai" id="catatanPerNilai" onchange="CatatanPerNilai()">
              <option selected disabled>Ya/Tidak</option>
              <option @if($kriteriaLKE->catatanPerNilai == "1") selected @endif value="1">Ya</option>
              <option @if($kriteriaLKE->catatanPerNilai == "0") selected @endif value="0">Tidak</option>
            </select>
            @error('catatanPerNilai')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror    
          </div>
          {{-- CATATAN PER NILAI --}}
          @if($kriteriaLKE->catatanPerNilai == 1)
            <div id="tidak" style="display:none">
              <label for="templateCatatan" class="col-sm-2 col-form-label">Template Catatan</label>
              <textarea class="form-control @error('templateCatatan') is-invalid @enderror"
              name="templateCatatan" id="templateCatatan">{{ old('templateCatatan', $kriteriaLKE->templateCatatan) }}</textarea>
              @error('templateCatatan')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
            <div id="ya">
              @if($kriteriaLKE->pilihanNilai == "ABCDE")
                <div id="ABCDE">
                  <label for="catatanA" class="col-sm-2 col-form-label">Catatan A</label>
                  <textarea class="form-control @error('catatanA') is-invalid @enderror"
                  name="catatanA" id="catatanA">{{ old('catatanA', $kriteriaLKE->catatanA) }}</textarea>
                  @error('catatanA')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                  <label for="catatanB" class="col-sm-2 col-form-label">Catatan B</label>
                  <textarea class="form-control @error('catatanB') is-invalid @enderror"
                  name="catatanB" id="catatanB">{{ old('catatanB', $kriteriaLKE->catatanB) }}</textarea>
                  @error('catatanB')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                  <label for="catatanC" class="col-sm-2 col-form-label">Catatan C</label>
                  <textarea class="form-control @error('catatanC') is-invalid @enderror"
                  name="catatanC" id="catatanC">{{ old('catatanC', $kriteriaLKE->catatanC) }}</textarea>
                  @error('catatanC')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                  <label for="catatanD" class="col-sm-2 col-form-label">Catatan D</label>
                  <textarea class="form-control @error('catatanD') is-invalid @enderror"
                  name="catatanD" id="catatanD">{{ old('catatanD', $kriteriaLKE->catatanD) }}</textarea>
                  @error('catatanD')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                  <label for="catatanE" class="col-sm-2 col-form-label">Catatan E</label>
                  <textarea class="form-control @error('catatanE') is-invalid @enderror"
                  name="catatanE" id="catatanE">{{ old('catatanE', $kriteriaLKE->catatanE) }}</textarea>
                  @error('catatanE')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>
                <div id="Y/T" style="display:none">
                  <label for="catatanY" class="col-sm-2 col-form-label">Catatan Y</label>
                  <textarea class="form-control @error('catatanY') is-invalid @enderror"
                  name="catatanY" id="catatanY">{{ old('catatanY', $kriteriaLKE->catatanY) }}</textarea>
                  @error('catatanY')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                  <label for="catatanT" class="col-sm-2 col-form-label">Catatan T</label>
                  <textarea class="form-control @error('catatanT') is-invalid @enderror"
                  name="catatanT" id="catatanT">{{ old('catatanT', $kriteriaLKE->catatanT) }}</textarea>
                  @error('catatanT')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>
              @else
                <div id="ABCDE" style="display:none">
                  <label for="catatanA" class="col-sm-2 col-form-label">Catatan A</label>
                  <textarea class="form-control @error('catatanA') is-invalid @enderror"
                  name="catatanA" id="catatanA">{{ old('catatanA', $kriteriaLKE->catatanA) }}</textarea>
                  @error('catatanA')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                  <label for="catatanB" class="col-sm-2 col-form-label">Catatan B</label>
                  <textarea class="form-control @error('catatanB') is-invalid @enderror"
                  name="catatanB" id="catatanB">{{ old('catatanB', $kriteriaLKE->catatanB) }}</textarea>
                  @error('catatanB')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                  <label for="catatanC" class="col-sm-2 col-form-label">Catatan C</label>
                  <textarea class="form-control @error('catatanC') is-invalid @enderror"
                  name="catatanC" id="catatanC">{{ old('catatanC', $kriteriaLKE->catatanC) }}</textarea>
                  @error('catatanC')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                  <label for="catatanD" class="col-sm-2 col-form-label">Catatan D</label>
                  <textarea class="form-control @error('catatanD') is-invalid @enderror"
                  name="catatanD" id="catatanD">{{ old('catatanD', $kriteriaLKE->catatanD) }}</textarea>
                  @error('catatanD')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                  <label for="catatanE" class="col-sm-2 col-form-label">Catatan E</label>
                  <textarea class="form-control @error('catatanE') is-invalid @enderror"
                  name="catatanE" id="catatanE">{{ old('catatanE', $kriteriaLKE->catatanE) }}</textarea>
                  @error('catatanE')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>
                <div id="Y/T">
                  <label for="catatanY" class="col-sm-2 col-form-label">Catatan Y</label>
                  <textarea class="form-control @error('catatanY') is-invalid @enderror"
                  name="catatanY" id="catatanY">{{ old('catatanY', $kriteriaLKE->catatanY) }}</textarea>
                  @error('catatanY')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                  <label for="catatanT" class="col-sm-2 col-form-label">Catatan T</label>
                  <textarea class="form-control @error('catatanT') is-invalid @enderror"
                  name="catatanT" id="catatanT">{{ old('catatanT', $kriteriaLKE->catatanT) }}</textarea>
                  @error('catatanT')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>
              @endif
            </div>
          @else
            <div id="tidak">
              <label for="templateCatatan" class="col-sm-2 col-form-label">Template Catatan</label>
              <textarea class="form-control @error('templateCatatan') is-invalid @enderror"
              name="templateCatatan" id="templateCatatan">{{ old('templateCatatan', $kriteriaLKE->templateCatatan) }}</textarea>
              @error('templateCatatan')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
            <div id="ya" style="display:none">
              @if($kriteriaLKE->pilihanNilai == "ABCDE")
                <div id="ABCDE">
                  <label for="catatanA" class="col-sm-2 col-form-label">Catatan A</label>
                  <textarea class="form-control @error('catatanA') is-invalid @enderror"
                  name="catatanA" id="catatanA">{{ old('catatanA', $kriteriaLKE->catatanA) }}</textarea>
                  @error('catatanA')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                  <label for="catatanB" class="col-sm-2 col-form-label">Catatan B</label>
                  <textarea class="form-control @error('catatanB') is-invalid @enderror"
                  name="catatanB" id="catatanB">{{ old('catatanB', $kriteriaLKE->catatanB) }}</textarea>
                  @error('catatanB')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                  <label for="catatanC" class="col-sm-2 col-form-label">Catatan C</label>
                  <textarea class="form-control @error('catatanC') is-invalid @enderror"
                  name="catatanC" id="catatanC">{{ old('catatanC', $kriteriaLKE->catatanC) }}</textarea>
                  @error('catatanC')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                  <label for="catatanD" class="col-sm-2 col-form-label">Catatan D</label>
                  <textarea class="form-control @error('catatanD') is-invalid @enderror"
                  name="catatanD" id="catatanD">{{ old('catatanD', $kriteriaLKE->catatanD) }}</textarea>
                  @error('catatanD')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                  <label for="catatanE" class="col-sm-2 col-form-label">Catatan E</label>
                  <textarea class="form-control @error('catatanE') is-invalid @enderror"
                  name="catatanE" id="catatanE">{{ old('catatanE', $kriteriaLKE->catatanE) }}</textarea>
                  @error('catatanE')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>
                <div id="Y/T" style="display:none">
                  <label for="catatanY" class="col-sm-2 col-form-label">Catatan Y</label>
                  <textarea class="form-control @error('catatanY') is-invalid @enderror"
                  name="catatanY" id="catatanY">{{ old('catatanY', $kriteriaLKE->catatanY) }}</textarea>
                  @error('catatanY')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                  <label for="catatanT" class="col-sm-2 col-form-label">Catatan T</label>
                  <textarea class="form-control @error('catatanT') is-invalid @enderror"
                  name="catatanT" id="catatanT">{{ old('catatanT', $kriteriaLKE->catatanT) }}</textarea>
                  @error('catatanT')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>
              @else
                <div id="ABCDE" style="display:none">
                  <label for="catatanA" class="col-sm-2 col-form-label">Catatan A</label>
                  <textarea class="form-control @error('catatanA') is-invalid @enderror"
                  name="catatanA" id="catatanA">{{ old('catatanA', $kriteriaLKE->catatanA) }}</textarea>
                  @error('catatanA')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                  <label for="catatanB" class="col-sm-2 col-form-label">Catatan B</label>
                  <textarea class="form-control @error('catatanB') is-invalid @enderror"
                  name="catatanB" id="catatanB">{{ old('catatanB', $kriteriaLKE->catatanB) }}</textarea>
                  @error('catatanB')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                  <label for="catatanC" class="col-sm-2 col-form-label">Catatan C</label>
                  <textarea class="form-control @error('catatanC') is-invalid @enderror"
                  name="catatanC" id="catatanC">{{ old('catatanC', $kriteriaLKE->catatanC) }}</textarea>
                  @error('catatanC')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                  <label for="catatanD" class="col-sm-2 col-form-label">Catatan D</label>
                  <textarea class="form-control @error('catatanD') is-invalid @enderror"
                  name="catatanD" id="catatanD">{{ old('catatanD', $kriteriaLKE->catatanD) }}</textarea>
                  @error('catatanD')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                  <label for="catatanE" class="col-sm-2 col-form-label">Catatan E</label>
                  <textarea class="form-control @error('catatanE') is-invalid @enderror"
                  name="catatanE" id="catatanE">{{ old('catatanE', $kriteriaLKE->catatanE) }}</textarea>
                  @error('catatanE')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>
                <div id="Y/T">
                  <label for="catatanY" class="col-sm-2 col-form-label">Catatan Y</label>
                  <textarea class="form-control @error('catatanY') is-invalid @enderror"
                  name="catatanY" id="catatanY">{{ old('catatanY', $kriteriaLKE->catatanY) }}</textarea>
                  @error('catatanY')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                  <label for="catatanT" class="col-sm-2 col-form-label">Catatan T</label>
                  <textarea class="form-control @error('catatanT') is-invalid @enderror"
                  name="catatanT" id="catatanT">{{ old('catatanT', $kriteriaLKE->catatanT) }}</textarea>
                  @error('catatanT')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>
              @endif
            </div>
          @endif
        </div>
        <div id="kke" style="display:none">
          <label for="kriteriaKKE_id" class="form-label">Kode Kriteria KKE</label>
            <select class="form-select @error('kriteriaKKE_id') is-invalid @enderror"
            name="kriteriaKKE_id" id="kriteriaKKE_id">
              @foreach ( $kriteriaKKEs as $kriteriaKKE )
                @if(old('kriteriaKKE_id', $kriteriaLKE->kriteriaKKE_id) == $kriteriaKKE->id)
                  <option value="{{ $kriteriaKKE->id }}" selected>{{ $kriteriaKKE->kriteria }}</option>
                @else
                  <option value="{{ $kriteriaKKE->id }}">{{ $kriteriaKKE->kriteria }}</option>
                @endif  
              @endforeach
            </select>
            <label for="templateCatatanKKE" class="col-sm-2 col-form-label">Template Catatan</label>
            <textarea class="form-control @error('templateCatatanKKE') is-invalid @enderror"
            name="templateCatatanKKE" id="templateCatatanKKE">{{ old('templateCatatanKKE', $kriteriaLKE->templateCatatanKKE) }}</textarea>
            @error('templateCatatanKKE')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
        </div>
      @endif
      {{-- KKE --}}
      @if($kriteriaLKE->jenisPenilaian == "KKE")
        <div id="default" style="display:none">
          <label for="defaultNilai" class="col-sm-2 col-form-label">Default Nilai</label>
          <div class="col-sm-12 mb-2">
            <select class="form-select @error('defaultNilai') is-invalid @enderror"
            name="defaultNilai" id="defaultNilai" onchange="JenisPenilaian()" required>
              <option selected disabled>Pilih Default Nilai</option>
              <option @if(old('defaultNilai') == "A") selected @endif value="A">A</option>
              <option @if(old('defaultNilai') == "B") selected @endif value="B">B</option>
              <option @if(old('defaultNilai') == "C") selected @endif value="C">C</option>
              <option @if(old('defaultNilai') == "D") selected @endif value="D">D</option>
              <option @if(old('defaultNilai') == "E") selected @endif value="E">E</option>
              <option @if(old('defaultNilai') == "Y") selected @endif value="Y">Y</option>
              <option @if(old('defaultNilai') == "T") selected @endif value="T">T</option>
            </select>
            @error('defaultNilai')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror    
          </div>
          <label for="defaultCatatan" class="col-sm-2 col-form-label">Default Catatan</label>
          <textarea class="form-control @error('defaultCatatan') is-invalid @enderror"
          name="defaultCatatan" id="defaultCatatan">{{ old('defaultCatatan', $kriteriaLKE->defaultCatatan) }}</textarea>
          @error('defaultCatatan')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
        <div id="manual" style="display:none">    
          <label for="pilihanNilai" class="col-sm-2 col-form-label">Pilihan Nilai</label>
          <div class="col-sm-12 mb-2">
            <select class="form-select @error('pilihanNilai') is-invalid @enderror"
            name="pilihanNilai" id="pilihanNilai" onchange="PilihanNilai()" required>
              <option selected disabled>Pilihan Nilai</option>
              <option @if(old('pilihanNilai', $kriteriaLKE->pilihanNilai) == "ABCDE") selected @endif value="ABCDE">ABCDE</option>
              <option @if(old('pilihanNilai', $kriteriaLKE->pilihanNilai) == "Y/T") selected @endif value="Y/T">Y/T</option>
            </select>
            @error('pilihanNilai')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror    
          </div>
          <label for="catatanPerNilai" class="col-sm-2 col-form-label">Gunakan Catatan per Nilai</label>
          <div class="col-sm-12 mb-2">
            <select class="form-select @error('catatanPerNilai') is-invalid @enderror"
            name="catatanPerNilai" id="catatanPerNilai" onchange="CatatanPerNilai(); UlangPilihanNilai()">
              <option selected disabled>Ya/Tidak</option>
              <option @if(old('catatanPerNilai', $kriteriaLKE->catatanPerNilai) == "1") selected @endif value="1">Ya</option>
              <option @if(old('catatanPerNilai', $kriteriaLKE->catatanPerNilai) == "0") selected @endif value="0">Tidak</option>
            </select>
            @error('catatanPerNilai')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror    
          </div>
          <div id="tidak" style="display:none">
            <label for="templateCatatan" class="col-sm-2 col-form-label">Template Catatan</label>
            <textarea class="form-control @error('templateCatatan') is-invalid @enderror"
            name="templateCatatan" id="templateCatatan">{{ old('templateCatatan', $kriteriaLKE->templateCatatan) }}</textarea>
            @error('templateCatatan')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
          <div id="ya" style="display:none">
            <div id="ABCDE" style="display:none">
              <label for="catatanA" class="col-sm-2 col-form-label">Catatan A</label>
              <textarea class="form-control @error('catatanA') is-invalid @enderror"
              name="catatanA" id="catatanA">{{ old('catatanA', $kriteriaLKE->catatanA) }}</textarea>
              @error('catatanA')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
              <label for="catatanB" class="col-sm-2 col-form-label">Catatan B</label>
              <textarea class="form-control @error('catatanB') is-invalid @enderror"
              name="catatanB" id="catatanB">{{ old('catatanB', $kriteriaLKE->catatanB) }}</textarea>
              @error('catatanB')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
              <label for="catatanC" class="col-sm-2 col-form-label">Catatan C</label>
              <textarea class="form-control @error('catatanC') is-invalid @enderror"
              name="catatanC" id="catatanC">{{ old('catatanC', $kriteriaLKE->catatanC) }}</textarea>
              @error('catatanC')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
              <label for="catatanD" class="col-sm-2 col-form-label">Catatan D</label>
              <textarea class="form-control @error('catatanD') is-invalid @enderror"
              name="catatanD" id="catatanD">{{ old('catatanD', $kriteriaLKE->catatanD) }}</textarea>
              @error('catatanD')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
              <label for="catatanE" class="col-sm-2 col-form-label">Catatan E</label>
              <textarea class="form-control @error('catatanE') is-invalid @enderror"
              name="catatanE" id="catatanE">{{ old('catatanE', $kriteriaLKE->catatanE) }}</textarea>
              @error('catatanE')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
            <div id="Y/T" style="display:none">
              <label for="catatanY" class="col-sm-2 col-form-label">Catatan Y</label>
              <textarea class="form-control @error('catatanY') is-invalid @enderror"
              name="catatanY" id="catatanY">{{ old('catatanY', $kriteriaLKE->catatanY) }}</textarea>
              @error('catatanY')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
              <label for="catatanT" class="col-sm-2 col-form-label">Catatan T</label>
              <textarea class="form-control @error('catatanT') is-invalid @enderror"
              name="catatanT" id="catatanT">{{ old('catatanT', $kriteriaLKE->catatanT) }}</textarea>
              @error('catatanT')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
          </div>
        </div>
        <div id="kke">
          <label for="kriteriaKKE_id" class="form-label">Kode Kriteria KKE</label>
            <select class="form-select @error('kriteriaKKE_id') is-invalid @enderror"
            name="kriteriaKKE_id" id="kriteriaKKE_id">
              @foreach ( $kriteriaKKEs as $kriteriaKKE )
                @if(old('kriteriaKKE_id', $kriteriaLKE->kriteriaKKE_id) == $kriteriaKKE->id)
                  <option value="{{ $kriteriaKKE->id }}" selected>{{ $kriteriaKKE->kriteria }}</option>
                @else
                  <option value="{{ $kriteriaKKE->id }}">{{ $kriteriaKKE->kriteria }}</option>
                @endif  
              @endforeach
            </select>
            <label for="templateCatatanKKE" class="col-sm-2 col-form-label">Template Catatan</label>
            <textarea class="form-control @error('templateCatatanKKE') is-invalid @enderror"
            name="templateCatatanKKE" id="templateCatatanKKE">{{ old('templateCatatanKKE', $kriteriaLKE->templateCatatanKKE) }}</textarea>
            @error('templateCatatanKKE')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
        </div>
      @endif
    </div>
    <div class="modal-footer mb-3">
      <a href="/komponenLKE/subKomponenLKE/{{ $kodeSubKomponen }}/edit" class="btn btn-secondary mx-3" onclick="return confirm('Batal menambah kriteria LKE?')">Batal</a>
      <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
</form>  

<script>
  function JenisPenilaian() {
    if (document.getElementById("jenisPenilaian").value === "Default") {
      document.getElementById("default").style.display = "block"
      document.getElementById("manual").style.display = "none"
      document.getElementById("kke").style.display = "none"
    } else if (document.getElementById("jenisPenilaian").value === "Manual") {
      document.getElementById("default").style.display = "none"
      document.getElementById("manual").style.display = "block"
      document.getElementById("kke").style.display = "none"
      // if (document.getElementById("pilihanNilai").value === "ABCDE") {
      //   document.getElementById("catatanY").disabled = true
      //   document.getElementById("catatanT").disabled = true
      // } else if (document.getElementById("pilihanNilai").value === "Y/T") {
      //   document.getElementById("catatanA").disabled = true
      //   document.getElementById("catatanB").disabled = true
      //   document.getElementById("catatanC").disabled = true
      //   document.getElementById("catatanD").disabled = true
      //   document.getElementById("catatanE").disabled = true
      // }
    } else if (document.getElementById("jenisPenilaian").value === "KKE") {
      document.getElementById("default").style.display = "none"
      document.getElementById("manual").style.display = "none"
      document.getElementById("kke").style.display = "block"
    }
  }

  function PilihanNilai() {
    if (document.getElementById("pilihanNilai").value === "ABCDE") {
      document.getElementById("ABCDE").style.display = "block"
      document.getElementById("Y/T").style.display = "none"
    } else {
      document.getElementById("ABCDE").style.display = "none"
      document.getElementById("Y/T").style.display = "block"
    }
  }

  function CatatanPerNilai() {
    if (document.getElementById("catatanPerNilai").value === "1") {
      document.getElementById("ya").style.display = "block"
      document.getElementById("tidak").style.display = "none"
    } else {
      document.getElementById("ya").style.display = "none"
      document.getElementById("tidak").style.display = "block"
    }
  }

  function UlangPilihanNilai() {
    document.getElementById("pilihanNilai").value === null
  }
</script>
@endsection