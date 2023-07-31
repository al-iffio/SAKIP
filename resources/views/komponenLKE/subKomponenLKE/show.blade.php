@extends('layouts.main')

@section('container')

@if(auth()->user()->role=="Koordinator")
  <div class="container mt-3">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb border-bottom border-dark">
        <li class="breadcrumb-item"><a href="/komponenLKE" style="text-decoration:none; color:black"><h4>Pengaturan LKE</h4></a></li>
        <li class="breadcrumb active mt-1" aria-current="page"><a href="/komponenLKE/{{ $subKomponenLKE->komponenLke->kodeKomponen }}/edit"
          style="text-decoration:none; color:black"><h5>&nbsp/ Ubah Komponen LKE</h5></a></li>
        <li class="breadcrumb active mt-1" aria-current="page"><h5 class="d-inline" style="text-decoration:none; color:black">
          &nbsp/ Lihat Sub Komponen LKE</h5></a></li>
    </ol>
    </nav>
  </div>
@endif

@if((auth()->user()->role=="Anggota Tim") || (auth()->user()->role=="Ketua Tim") || (auth()->user()->role=="Pengendali Teknis"))
  <div class="container mt-3">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb border-bottom border-dark">
        <li class="breadcrumb-item mt-1"><a href="/evaluasiLKE" style="text-decoration:none; color:black"><h4>Evaluasi LKE</h4></a></li>
        <li class="breadcrumb active mt-2" aria-current="page"><a href="/evaluasiLKE/{{ $IDunitKerja }}"
          style="text-decoration:none; color:black"><h5>&nbsp/ Komponen LKE</h5></a></li>
        <li class="breadcrumb active" aria-current="page">
          <form action="/komponenLKE/{{ $subKomponenLKE->komponenLke->kodeKomponen }}/edit" class="d-inline">
            @csrf
            <input type="hidden" class="form-control" name="unitKerja" id="unitKerja" value="{{ $unitKerja }}" required>
            <input type="hidden" class="form-control" name="IDunitKerja" id="IDunitKerja" value="{{ $IDunitKerja }}" required>
            <button  class="btn btn-link" style="text-decoration:none; color:black">
              <h5>/ Sub Komponen LKE</h5>
            </button>
          </form>
        </li>
        <li class="breadcrumb active mt-2" aria-current="page"><h5 class="d-inline" style="text-decoration:none; color:black">
          / Kriteria LKE {{ $unitKerja }}</h5></a></li>
      </ol>
    </nav>
  </div>
@endif

<div class="border border-3 border-black border-bottom-0 border-start-0 border-end-0 bg-white mb-3">
  <div class="border border-1 p-3">
    <h5>{{ $subKomponenLKE->kodeSubKomponen }}. {{ $subKomponenLKE->namaSubKomponen }}</h5>
  </div>
</div>
@foreach ($kriteriaLKEs as $kriteriaLKE)
  <div class="border border-1 mb-3 border-secondary-subtle">
    <div class="border-bottom border-black bg-white p-3">
      <h5 class="d-inline">{{ $kriteriaLKE->kodeKriteriaLKE }}. {{ $kriteriaLKE->namaKriteria }}</h5>
      <button class="btn btn-toggle btn-sm mb-1 align-items-center border-0 collapsed d-inline float-end"
      data-bs-toggle="collapse"data-bs-target="#kriteriaLKE{{ $kriteriaLKE->kodeKriteriaLKE }}-collapse">
        <span data-feather="minus" class="align-text-bottom"></span>&nbsp
      </button>
    </div>
    <div class="collapse show" id="kriteriaLKE{{ $kriteriaLKE->kodeKriteriaLKE }}-collapse">
      <div class="border border-1 p-3 bg-body-tertiary">
        <div class="border-bottom">
          {{-- DEFALUT --}}
          @if($kriteriaLKE->jenisPenilaian == "Default")
            <div class="row">
              <label class="col-sm-2 col-form-label">Nilai</label>
              <div class="col-sm-10 mb-2">
                <input type="text" class="form-control" name="nilai[]"
                id="nilai[]" value="{{ $kriteriaLKE->defaultNilai }}" disabled>
                <input type="hidden" class="form-control nilai" name="nilai[]"
                id="nilai[]" value="{{ $kriteriaLKE->defaultNilai }}">
              </div>
              <label class="col-sm-2 col-form-label">Nilai Angka</label>
              <div class="col-sm-10 mb-2">
                @php
                  if($kriteriaLKE->defaultNilai == "A" || $kriteriaLKE->defaultNilai == "Y") {
                    $nilaiAngka = 1;
                  } elseif($kriteriaLKE->defaultNilai == "B") {
                    $nilaiAngka = 0.75;
                  } elseif($kriteriaLKE->defaultNilai == "C") {
                    $nilaiAngka = 0.5;
                  } elseif($kriteriaLKE->defaultNilai == "D") {
                    $nilaiAngka = 0.25;
                  } elseif($kriteriaLKE->defaultNilai == "E" || $kriteriaLKE->defaultNilai == "T") {
                    $nilaiAngka = 0;
                  }
                @endphp
                <input type="text" class="form-control" name="nilaiAngka[]"
                id="nilaiAngka[]" value="{{ $nilaiAngka }}" disabled>
                <input type="hidden" class="form-control" name="nilaiAngka[]"
                id="nilaiAngka[]" value="{{ $nilaiAngka }}">
              </div>
              <label class="col-sm-2 col-form-label">Catatan</label>
              <div class="col-sm-10 mb-2">
                <textarea type="text" class="form-control" name="catatan[]"
                id="catatan[]" disabled>{{ $kriteriaLKE->defaultCatatan }}</textarea>
                <textarea type="text" class="form-control" name="catatan[]"
                id="catatan[]" hidden>{{ $kriteriaLKE->defaultCatatan }}</textarea>
              </div>
              @if(auth()->user()->role!="Anggota Tim")
                <div class="col-sm-10 mb-2">
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="kunci[]"
                    id="kunci[]" value="1" checked disabled>
                    <input class="form-check-input" type="checkbox" name="kunci[]"
                    id="kunci[]" value="1" checked hidden>
                    <label class="form-check-label" for="kunci[]">Kunci</label>
                  </div>
                </div>
              @endif
            </div>
          @endif
          {{-- MANUAL ABCDE DENGAN CATATAN PER NILAI --}}
          @if($kriteriaLKE->jenisPenilaian == "Manual" && $kriteriaLKE->catatanPerNilai == 1 && $kriteriaLKE->pilihanNilai == "ABCDE")
            <div class="row">
              <label class="col-sm-2 col-form-label">Nilai</label>
              <div class="col-sm-10 mb-2">
                <select class="form-select @error('nilai') is-invalid @enderror" name="nilai" id="nilai">
                  <option selected disabled>Pilih Nilai</option>
                  <option @if(old('nilai') == "A") selected @endif value="A">A</option>
                  <option @if(old('nilai') == "B") selected @endif value="B">B</option>
                  <option @if(old('nilai') == "C") selected @endif value="C">C</option>
                  <option @if(old('nilai') == "D") selected @endif value="D">D</option>
                  <option @if(old('nilai') == "E") selected @endif value="E">E</option>
              </select>
              </div>
              <label class="col-sm-2 col-form-label">Nilai Angka</label>
              <div class="col-sm-10 mb-2">
                <input type="text" class="form-control" name="nilaiAngka[]"
                id="nilaiAngka[]" disabled>
                <input type="hidden" class="form-control" name="nilaiAngka[]"
                id="nilaiAngka[]">
              </div>
              <label class="col-sm-2 col-form-label">Catatan</label>
                <div class="col-sm-10 mb-2">
                  <textarea type="text" class="form-control" name="catatan[]"
                  id="catatan[]" disabled>{{ $kriteriaLKE->defaultCatatan }}</textarea>
                  <textarea type="text" class="form-control" name="catatan[]"
                  id="catatan[]" hidden>{{ $kriteriaLKE->defaultCatatan }}</textarea>
                </div>
                <div class="col-sm-10 mb-2">
                  @if(auth()->user()->role!="Anggota Tim")
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="checkbox" name="kunci[]" id="kunci[]" value="1">
                      <label class="form-check-label" for="kunci[]">Kunci</label>
                    </div>
                  @endif
                </div>
            </div>
          @endif
          {{-- MANUAL Y/T DENGAN CATATAN PER NILAI --}}
          @if($kriteriaLKE->jenisPenilaian == "Manual" && $kriteriaLKE->catatanPerNilai == 1 && $kriteriaLKE->pilihanNilai == "Y/T")
            <div class="row">
              <label class="col-sm-2 col-form-label">Nilai</label>
              <div class="col-sm-10 mb-2">
                <select class="form-select @error('nilai') is-invalid @enderror" name="nilai" id="nilai">
                  <option selected disabled>Pilih Nilai</option>
                  <option @if(old('nilai') == "Y") selected @endif value="Y">Y</option>
                  <option @if(old('nilai') == "T") selected @endif value="T">T</option>
              </select>
              </div>
              <label class="col-sm-2 col-form-label">Nilai Angka</label>
              <div class="col-sm-10 mb-2">
                <input type="text" class="form-control" name="nilaiAngka[]"
                id="nilaiAngka[]" disabled>
                <input type="hidden" class="form-control" name="nilaiAngka[]"
                id="nilaiAngka[]">
              </div>
              <label class="col-sm-2 col-form-label">Catatan</label>
                <div class="col-sm-10 mb-2">
                  <textarea type="text" class="form-control" name="catatan[]"
                  id="catatan[]" disabled>{{ $kriteriaLKE->defaultCatatan }}</textarea>
                  <textarea type="text" class="form-control" name="catatan[]"
                  id="catatan[]" hidden>{{ $kriteriaLKE->defaultCatatan }}</textarea>
                </div>
                <div class="col-sm-10 mb-2">
                  @if(auth()->user()->role!="Anggota Tim")
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="checkbox" name="kunci[]" id="kunci[]" value="1">
                      <label class="form-check-label" for="kunci[]">Kunci</label>
                    </div>
                  @endif
                </div>
            </div>
          @endif
          {{-- MANUAL ABCDE TANPA CATATAN PER NILAI --}}
          @if($kriteriaLKE->jenisPenilaian == "Manual" && $kriteriaLKE->catatanPerNilai == 0 && $kriteriaLKE->pilihanNilai == "ABCDE")
            <div class="row">
              <label class="col-sm-2 col-form-label">Nilai</label>
              <div class="col-sm-10 mb-2">
                <select class="form-select @error('nilai') is-invalid @enderror" name="nilai" id="nilai">
                  <option selected disabled>Pilih Nilai</option>
                  <option @if(old('nilai') == "A") selected @endif value="A">A</option>
                  <option @if(old('nilai') == "B") selected @endif value="B">B</option>
                  <option @if(old('nilai') == "C") selected @endif value="C">C</option>
                  <option @if(old('nilai') == "D") selected @endif value="D">D</option>
                  <option @if(old('nilai') == "E") selected @endif value="E">E</option>
              </select>
              </div>
              <label class="col-sm-2 col-form-label">Nilai Angka</label>
              <div class="col-sm-10 mb-2">
                <input type="text" class="form-control" name="nilaiAngka[]"
                id="nilaiAngka[]" disabled>
                <input type="hidden" class="form-control" name="nilaiAngka[]"
                id="nilaiAngka[]">
              </div>
              <label class="col-sm-2 col-form-label">Catatan</label>
                <div class="col-sm-10 mb-2">
                  <textarea type="text" class="form-control" name="catatan[]"
                  id="catatan[]">{{ $kriteriaLKE->templateCatatan }}</textarea>
                </div>
                <div class="col-sm-10 mb-2">
                  @if(auth()->user()->role!="Anggota Tim")
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="checkbox" name="kunci[]" id="kunci[]" value="1">
                      <label class="form-check-label" for="kunci[]">Kunci</label>
                    </div>
                  @endif
                </div>
            </div>
          @endif
          {{-- MANUAL Y/T TANPA CATATAN PER NILAI --}}
          @if($kriteriaLKE->jenisPenilaian == "Manual" && $kriteriaLKE->catatanPerNilai == 0 && $kriteriaLKE->pilihanNilai == "Y/T")
            <div class="row">
              <label class="col-sm-2 col-form-label">Nilai</label>
              <div class="col-sm-10 mb-2">
                <select class="form-select @error('nilai') is-invalid @enderror" name="nilai" id="nilai">
                  <option selected disabled>Pilih Nilai</option>
                  <option @if(old('nilai') == "Y") selected @endif value="Y">Y</option>
                  <option @if(old('nilai') == "T") selected @endif value="T">T</option>
              </select>
              </div>
              <label class="col-sm-2 col-form-label">Nilai Angka</label>
              <div class="col-sm-10 mb-2">
                <input type="text" class="form-control" name="nilaiAngka[]"
                id="nilaiAngka[]" disabled>
                <input type="hidden" class="form-control" name="nilaiAngka[]"
                id="nilaiAngka[]">
              </div>
              <label class="col-sm-2 col-form-label">Catatan</label>
                <div class="col-sm-10 mb-2">
                  <textarea type="text" class="form-control" name="catatan[]"
                  id="catatan[]">{{ $kriteriaLKE->templateCatatan }}</textarea>
                </div>
                <div class="col-sm-10 mb-2">
                  @if(auth()->user()->role!="Anggota Tim")
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="checkbox" name="kunci[]" id="kunci[]" value="1">
                      <label class="form-check-label" for="kunci[]">Kunci</label>
                    </div>
                  @endif
                </div>
            </div>
          @endif
          {{-- KKE --}}
          @if($kriteriaLKE->jenisPenilaian == "KKE")
            <div class="row">
              <label class="col-sm-2 col-form-label">Nilai</label>
              <div class="col-sm-10 mb-2">
                <input type="text" class="form-control" name="nilai[]"
                id="nilai[]" value="" disabled>
                <input type="hidden" class="form-control nilai" name="nilai[]"
                id="nilai[]" value="">
              </div>
              <label class="col-sm-2 col-form-label">Nilai Angka</label>
              <div class="col-sm-10 mb-2">
                <input type="text" class="form-control" name="nilaiAngka[]"
                id="nilaiAngka[]" disabled>
                <input type="hidden" class="form-control" name="nilaiAngka[]"
                id="nilaiAngka[]">
              </div>
              <label class="col-sm-2 col-form-label">Catatan</label>
                <div class="col-sm-10 mb-2">
                  <textarea type="text" class="form-control" name="catatan[]"
                  id="catatan[]">{{ $kriteriaLKE->templateCatatan }}</textarea>
                </div>
                <div class="col-sm-10 mb-2">
                  @if(auth()->user()->role!="Anggota Tim")
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="checkbox" name="kunci[]" id="kunci[]" value="1">
                      <label class="form-check-label" for="kunci[]">Kunci</label>
                    </div>
                  @endif
                </div>
            </div>
          @endif
          <button class="btn btn-toggle btn-sm mb-1 align-items-center border-0 collapsed"
          data-bs-toggle="collapse"data-bs-target="#panduanEvaluator{{ $kriteriaLKE->kodeKriteriaLKE }}-collapse">
            <span data-feather="info" class="align-text-bottom"></span>&nbsp Panduan Evaluator
          </button>
          <div class="collapse px-4 mb-2" id="panduanEvaluator{{ $kriteriaLKE->kodeKriteriaLKE }}-collapse">
            <textarea type="text" class="form-control" disabled>{{ $kriteriaLKE->panduanEvaluator }}</textarea>
              &nbsp 
          </div>
        </div>
      </div>
    </div>
  </div>
@endforeach
{{-- <form action="/komponenLKE/subKomponenLKE/hasilShow" method="post">
  @csrf
  <button type="submit" class="btn btn-primary">Simpan</button>
</form> --}}
{{-- SATU
<input type="text" class="form-control" name="nilaiHuruf" id="nilaiHuruf" onkeyup="NilaiHuruf()">
SATU
<input type="text" class="form-control" name="angkaNilai" id="angkaNilai" disabled>
DUA
<input type="text" class="form-control" name="nilaiHuruf" id="nilaiHuruf" onkeyup="NilaiHuruf()">
DUA
<input type="text" class="form-control" name="angkaNilai" id="angkaNilai" disabled> --}}
@if(auth()->user()->role=="Koordinator")
  <div class="d-flex mb-3 justify-content-end">
    <a href="/komponenLKE/{{ $subKomponenLKE->komponenLke->kodeKomponen }}/edit" class="btn btn-secondary mx-3">Kembali</a>
  </div>
@endif

@if(auth()->user()->role!="Koordinator")
  <div class="d-flex mb-3 justify-content-end">
    <form action="/komponenLKE/{{ $subKomponenLKE->komponenLke->kodeKomponen }}/edit" class="d-inline">
      @csrf
      <input type="hidden" class="form-control" name="unitKerja" id="unitKerja" value="{{ $unitKerja }}" required>
      <input type="hidden" class="form-control" name="IDunitKerja" id="IDunitKerja" value="{{ $IDunitKerja }}" required>
      <button  class="btn btn-success mx-3">
        Simpan
      </button>
    </form>
  </div>
@endif

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script type="text/javascript">
// function NilaiAngka(){
//   var nilai = document.getElementById("nilai")
//   var nilaiAngka = document.getElementById("nilaiAngka")
//   if(nilai.value === "A") {
//     nilaiAngka.value = 1;
//   } else if(nilai.value === "B") {
//     nilaiAngka.value = 0.75;
//   } else if(nilai.value === "C") {
//     nilaiAngka.value = 0.5;
//   } else if(nilai.value === "D") {
//     nilaiAngka.value = 0.25;
//   } else if(nilai.value === "E") {
//     nilaiAngka.value = 0;
//   }
// }
// function NilaiHuruf(){
//   var nilaiHuruf = document.getElementById("nilaiHuruf")
//   var angkaNilai = document.getElementById("angkaNilai");
//   angkaNilai.value = nilaiHuruf.value
// }
  // function NilaiAngka() {
  //   var nilai = $("#nilai[]").val();
  //   $.ajax({
  //     url:'{!! URL::to('/komponenLKE/subKomponenLKE/nilaiAngka') !!}',
  //     data: "nilai[]=" + nilai ,
  //     method: 'get',
  //     dataType: 'json',
  //       success: function(data)
  //       {
  //         $("#nilaiAngka").val(data)
  //       }
  //   })
  // }

  // $(document).ready(function() {
  //   $(document).on('change','nilai[]',function(){
  //     console.log("berubah kok");

  //     var nilai = $(this).val();
  //     console.log(nilai);
  //     $.ajax({
  //       type:'get',
  //       url:'{!! URL::to('/komponenLKE/subKomponenLKE/nilaiAngka') !!}',
  //       data: nilai,
  //       success:function(){
  //         console.log("berhasil")
  //       },
  //       error:function(){

  //       }
  //     })
  //   });
  // });
</script>
@endsection