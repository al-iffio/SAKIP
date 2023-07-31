@extends('layouts.main')

@section('container')

@if(auth()->user()->role=="Koordinator")
  <div class="container mt-3">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb border-bottom border-dark">
        <li class="breadcrumb-item"><a href="/kke" style="text-decoration:none; color:black"><h4>Pengaturan KKE</h4></a></li>
        <li class="breadcrumb active mt-1" aria-current="page"><h5 class="d-inline" style="text-decoration:none; color:black">&nbsp/ Lihat KKE</h5></a></li>
      </ol>
    </nav>
  </div>

  <div class="border border-3 border-black border-bottom-0 border-start-0 border-end-0 bg-white mb-3">
    <div class="border border-1 p-3">
      <h5>KKE {{ $kke->namaKKE }} (KKE {{ $kke->kodeKKE }})</h5>
    </div>
  </div>

  <div class="border border-secondary-subtle mb-3">
    <div class="border-bottom border-black bg-white p-3">
      <h5 class="d-inline">Tujuan 1</h5>
      <button class="btn btn-toggle btn-sm mb-1 align-items-center border-0 collapsed d-inline float-end"
        data-bs-toggle="collapse"data-bs-target="#tujuan1-collapse">
          <span data-feather="minus" class="align-text-bottom"></span>&nbsp
      </button>
    </div>
    <div class="collapse show" id="tujuan1-collapse">
      <div class="border border-1 p-3 bg-body-tertiary">
        @foreach ($kriteriaKKEs as $kriteriaKKE)
          <div class="border-bottom">
            @if($kriteriaKKE->tujuan == 1)
              <label class="col-auto col-form-label">{{ $kriteriaKKE->kodeKriteriaKKE }}. {{ $kriteriaKKE->kriteria }}</label>
              @if($kriteriaKKE->nilaiPerIKU == "Y/T")
                <div class="col-auto mb-2">
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" name="t1{{ $kriteriaKKE->kodeKriteriaKKE }}" id="t1{{ $kriteriaKKE->kodeKriteriaKKE }}" type="radio" value="Y">
                    <label class="form-check-label" for="{{ $kriteriaKKE->kodeKriteriaKKE }}1">
                      Y
                    </label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" name="t1{{ $kriteriaKKE->kodeKriteriaKKE }}" id="t1{{ $kriteriaKKE->kodeKriteriaKKE }}" type="radio" value="T">
                    <label class="form-check-label" for="{{ $kriteriaKKE->kodeKriteriaKKE }}2">
                      T
                    </label>
                  </div>
                </div>
              @else
              <div class="col-sm-12 mb-2">
                <input type="text" class="form-control">
              </div>
              @endif
              <button class="btn btn-toggle btn-sm mb-1 d-inline-flex align-items-center rounded border-0 collapsed"
              data-bs-toggle="collapse"data-bs-target="#panduanEvaluator1{{ $kriteriaKKE->id }}-collapse">
                <span data-feather="info" class="align-text-bottom"></span>&nbsp Panduan Evaluator
              </button>
              <div class="collapse px-4" id="panduanEvaluator1{{ $kriteriaKKE->id }}-collapse">
                &nbsp {{ $kriteriaKKE->panduanEvaluator }}
              </div> <br>
            @endif
          </div>
        @endforeach
      </div>
    </div>
  </div>

  <div class="border border-secondary-subtle mb-3">
    <div class="border-bottom border-black bg-white p-3">
      <h5 class="d-inline">Sasaran 1 dari Tujuan 1</h5>
      <button class="btn btn-toggle btn-sm mb-1 align-items-center border-0 collapsed d-inline float-end"
        data-bs-toggle="collapse"data-bs-target="#sasaran1tujuan1-collapse">
          <span data-feather="minus" class="align-text-bottom"></span>&nbsp
      </button>
    </div>
    <div class="collapse show" id="sasaran1tujuan1-collapse">
      <div class="border border-1 p-3 bg-body-tertiary">
        @foreach ($kriteriaKKEs as $kriteriaKKE)
          <div class="border-bottom">
            @if($kriteriaKKE->sasaran == 1)
              <label class="col-auto col-form-label">{{ $kriteriaKKE->kodeKriteriaKKE }}. {{ $kriteriaKKE->kriteria }}</label>
              @if($kriteriaKKE->nilaiPerIKU == "Y/T")
                <div class="col-auto mb-2">
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" name="s1t1{{ $kriteriaKKE->kodeKriteriaKKE }}" id="s1t1{{ $kriteriaKKE->kodeKriteriaKKE }}" type="radio" value="Y">
                    <label class="form-check-label" for="{{ $kriteriaKKE->kodeKriteriaKKE }}1">
                      Y
                    </label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" name="s1t1{{ $kriteriaKKE->kodeKriteriaKKE }}" id="s1t1{{ $kriteriaKKE->kodeKriteriaKKE }}" type="radio" value="T">
                    <label class="form-check-label" for="{{ $kriteriaKKE->kodeKriteriaKKE }}2">
                      T
                    </label>
                  </div>
                </div>
              @else
              <div class="col-sm-12 mb-2">
                <input type="text" class="form-control">
              </div>
              @endif
              <button class="btn btn-toggle btn-sm mb-1 d-inline-flex align-items-center rounded border-0 collapsed"
              data-bs-toggle="collapse"data-bs-target="#panduanEvaluators1t1{{ $kriteriaKKE->id }}-collapse">
                <span data-feather="info" class="align-text-bottom"></span>&nbsp Panduan Evaluator
              </button>
              <div class="collapse px-4" id="panduanEvaluators1t1{{ $kriteriaKKE->id }}-collapse">
                &nbsp {{ $kriteriaKKE->panduanEvaluator }}
              </div> <br>
            @endif
          </div>
        @endforeach
      </div>
    </div>
  </div>

  <div class="border border-secondary-subtle mb-3">
    <div class="border-bottom border-black bg-white p-3">
      <h6 class="d-inline">Indikator 1 dari Sasaran 1 dari Tujuan 1</h6>
      <button class="btn btn-toggle btn-sm mb-1 align-items-center border-0 collapsed d-inline float-end"
        data-bs-toggle="collapse"data-bs-target="#indikator1sasaran1tujuan1-collapse">
          <span data-feather="minus" class="align-text-bottom"></span>&nbsp
      </button>
    </div>
    <div class="collapse show" id="indikator1sasaran1tujuan1-collapse">
      <div class="border border-1 p-3 bg-body-tertiary">
        @foreach ($kriteriaKKEs as $kriteriaKKE)
          <div class="border-bottom">
            @if($kriteriaKKE->indikator == 1)
              <label class="col-auto col-form-label">{{ $kriteriaKKE->kodeKriteriaKKE }}. {{ $kriteriaKKE->kriteria }}</label>
              @if($kriteriaKKE->nilaiPerIKU == "Y/T")
                <div class="col-auto mb-2">
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" name="i1s1t1{{ $kriteriaKKE->kodeKriteriaKKE }}" id="i1s1t1{{ $kriteriaKKE->kodeKriteriaKKE }}" type="radio" value="Y">
                    <label class="form-check-label" for="{{ $kriteriaKKE->kodeKriteriaKKE }}1">
                      Y
                    </label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" name="i1s1t1{{ $kriteriaKKE->kodeKriteriaKKE }}" id="i1s1t1{{ $kriteriaKKE->kodeKriteriaKKE }}" type="radio" value="T">
                    <label class="form-check-label" for="{{ $kriteriaKKE->kodeKriteriaKKE }}2">
                      T
                    </label>
                  </div>
                </div>
              @else
              <div class="col-sm-12 mb-2">
                <input type="text" class="form-control">
              </div>
              @endif
              <button class="btn btn-toggle btn-sm mb-1 d-inline-flex align-items-center rounded border-0 collapsed"
              data-bs-toggle="collapse"data-bs-target="#panduanEvaluatori1s1t1{{ $kriteriaKKE->id }}-collapse">
                <span data-feather="info" class="align-text-bottom"></span>&nbsp Panduan Evaluator
              </button>
              <div class="collapse px-4" id="panduanEvaluatori1s1t1{{ $kriteriaKKE->id }}-collapse">
                &nbsp {{ $kriteriaKKE->panduanEvaluator }}
              </div> <br>
            @endif
          </div>
        @endforeach
      </div>
    </div>
  </div>

  <div class="border border-secondary-subtle mb-3">
    <div class="border-bottom border-black bg-white p-3">
      <h6 class="d-inline">Indikator 2 dari Sasaran 1 dari Tujuan 1</h6>
      <button class="btn btn-toggle btn-sm mb-1 align-items-center border-0 collapsed d-inline float-end"
        data-bs-toggle="collapse"data-bs-target="#indikator2sasaran1tujuan1-collapse">
          <span data-feather="minus" class="align-text-bottom"></span>&nbsp
      </button>
    </div>
    <div class="collapse show" id="indikator2sasaran1tujuan1-collapse">
      <div class="border border-1 p-3 bg-body-tertiary">
        @foreach ($kriteriaKKEs as $kriteriaKKE)
          <div class="border-bottom">
            @if($kriteriaKKE->indikator == 1)
              <label class="col-auto col-form-label">{{ $kriteriaKKE->kodeKriteriaKKE }}. {{ $kriteriaKKE->kriteria }}</label>
              @if($kriteriaKKE->nilaiPerIKU == "Y/T")
                <div class="col-auto mb-2">
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" name="i2s1t1{{ $kriteriaKKE->kodeKriteriaKKE }}" id="i2s1t1{{ $kriteriaKKE->kodeKriteriaKKE }}" type="radio" value="Y">
                    <label class="form-check-label" for="{{ $kriteriaKKE->kodeKriteriaKKE }}1">
                      Y
                    </label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" name="i2s1t1{{ $kriteriaKKE->kodeKriteriaKKE }}" id="i2s1t1{{ $kriteriaKKE->kodeKriteriaKKE }}" type="radio" value="T">
                    <label class="form-check-label" for="{{ $kriteriaKKE->kodeKriteriaKKE }}2">
                      T
                    </label>
                  </div>
                </div>
              @else
              <div class="col-sm-12 mb-2">
                <input type="text" class="form-control">
              </div>
              @endif
              <button class="btn btn-toggle btn-sm mb-1 d-inline-flex align-items-center rounded border-0 collapsed"
              data-bs-toggle="collapse"data-bs-target="#panduanEvaluatori2s1t1{{ $kriteriaKKE->id }}-collapse">
                <span data-feather="info" class="align-text-bottom"></span>&nbsp Panduan Evaluator
              </button>
              <div class="collapse px-4" id="panduanEvaluatori2s1t1{{ $kriteriaKKE->id }}-collapse">
                &nbsp {{ $kriteriaKKE->panduanEvaluator }}
              </div> <br>
            @endif
          </div>
        @endforeach
      </div>
    </div>
  </div>

  <div class="border border-secondary-subtle mb-3">
    <div class="border-bottom border-black bg-white p-3">
      <h6 class="d-inline">Sasaran 2 dari Tujuan 1</h6>
      <button class="btn btn-toggle btn-sm mb-1 align-items-center border-0 collapsed d-inline float-end"
        data-bs-toggle="collapse"data-bs-target="#sasaran2tujuan1-collapse">
          <span data-feather="minus" class="align-text-bottom"></span>&nbsp
      </button>
    </div>
    <div class="collapse show" id="sasaran2tujuan1-collapse">
      <div class="border border-1 p-3 bg-body-tertiary">
        @foreach ($kriteriaKKEs as $kriteriaKKE)
          <div class="border-bottom">
            @if($kriteriaKKE->sasaran == 1)
              <label class="col-auto col-form-label">{{ $kriteriaKKE->kodeKriteriaKKE }}. {{ $kriteriaKKE->kriteria }}</label>
              @if($kriteriaKKE->nilaiPerIKU == "Y/T")
                <div class="col-auto mb-2">
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" name="s2t1{{ $kriteriaKKE->kodeKriteriaKKE }}" id="s2t1{{ $kriteriaKKE->kodeKriteriaKKE }}" type="radio" value="Y">
                    <label class="form-check-label" for="{{ $kriteriaKKE->kodeKriteriaKKE }}1">
                      Y
                    </label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" name="s2t1{{ $kriteriaKKE->kodeKriteriaKKE }}" id="s2t1{{ $kriteriaKKE->kodeKriteriaKKE }}" type="radio" value="T">
                    <label class="form-check-label" for="{{ $kriteriaKKE->kodeKriteriaKKE }}2">
                      T
                    </label>
                  </div>
                </div>
              @else
              <div class="col-sm-12 mb-2">
                <input type="text" class="form-control">
              </div>
              @endif
              <button class="btn btn-toggle btn-sm mb-1 d-inline-flex align-items-center rounded border-0 collapsed"
              data-bs-toggle="collapse"data-bs-target="#panduanEvaluators2t1{{ $kriteriaKKE->id }}-collapse">
                <span data-feather="info" class="align-text-bottom"></span>&nbsp Panduan Evaluator
              </button>
              <div class="collapse px-4" id="panduanEvaluators2t1{{ $kriteriaKKE->id }}-collapse">
                &nbsp {{ $kriteriaKKE->panduanEvaluator }}
              </div> <br>
            @endif
          </div>
        @endforeach
      </div>
    </div>
  </div>

  <div class="border border-secondary-subtle mb-3">
    <div class="border-bottom border-black bg-white p-3">
      <h6 class="d-inline">Indikator 1 dari Sasaran 2 dari Tujuan 1</h6>
      <button class="btn btn-toggle btn-sm mb-1 align-items-center border-0 collapsed d-inline float-end"
        data-bs-toggle="collapse"data-bs-target="#indikator1sasaran2tujuan1-collapse">
          <span data-feather="minus" class="align-text-bottom"></span>&nbsp
      </button>
    </div>
    <div class="collapse show" id="indikator1sasaran2tujuan1-collapse">
      <div class="border border-1 p-3 bg-body-tertiary">
        @foreach ($kriteriaKKEs as $kriteriaKKE)
          <div class="border-bottom">
            @if($kriteriaKKE->indikator == 1)
              <label class="col-auto col-form-label">{{ $kriteriaKKE->kodeKriteriaKKE }}. {{ $kriteriaKKE->kriteria }}</label>
              @if($kriteriaKKE->nilaiPerIKU == "Y/T")
                <div class="col-auto mb-2">
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" name="i1s2t1{{ $kriteriaKKE->kodeKriteriaKKE }}" id="i1s2t1{{ $kriteriaKKE->kodeKriteriaKKE }}" type="radio" value="Y">
                    <label class="form-check-label" for="{{ $kriteriaKKE->kodeKriteriaKKE }}1">
                      Y
                    </label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" name="i1s2t1{{ $kriteriaKKE->kodeKriteriaKKE }}" id="i1s2t1{{ $kriteriaKKE->kodeKriteriaKKE }}" type="radio" value="T">
                    <label class="form-check-label" for="{{ $kriteriaKKE->kodeKriteriaKKE }}2">
                      T
                    </label>
                  </div>
                </div>
              @else
              <div class="col-sm-12 mb-2">
                <input type="text" class="form-control">
              </div>
              @endif
              <button class="btn btn-toggle btn-sm mb-1 d-inline-flex align-items-center rounded border-0 collapsed"
              data-bs-toggle="collapse"data-bs-target="#panduanEvaluatori1s2t1{{ $kriteriaKKE->id }}-collapse">
                <span data-feather="info" class="align-text-bottom"></span>&nbsp Panduan Evaluator
              </button>
              <div class="collapse px-4" id="panduanEvaluatori1s2t1{{ $kriteriaKKE->id }}-collapse">
                &nbsp {{ $kriteriaKKE->panduanEvaluator }}
              </div> <br>
            @endif
          </div>
        @endforeach
      </div>
    </div>
  </div>

  <div class="border border-secondary-subtle mb-3">
    <div class="border-bottom border-black bg-white p-3">
      <h6 class="d-inline">Indikator 2 dari Sasaran 2 dari Tujuan 1</h6>
      <button class="btn btn-toggle btn-sm mb-1 align-items-center border-0 collapsed d-inline float-end"
        data-bs-toggle="collapse"data-bs-target="#indikator2sasaran2tujuan1-collapse">
          <span data-feather="minus" class="align-text-bottom"></span>&nbsp
      </button>
    </div>
    <div class="collapse show" id="indikator2sasaran2tujuan1-collapse">
      <div class="border border-1 p-3 bg-body-tertiary">
        @foreach ($kriteriaKKEs as $kriteriaKKE)
          <div class="border-bottom">
            @if($kriteriaKKE->indikator == 1)
              <label class="col-auto col-form-label">{{ $kriteriaKKE->kodeKriteriaKKE }}. {{ $kriteriaKKE->kriteria }}</label>
              @if($kriteriaKKE->nilaiPerIKU == "Y/T")
                <div class="col-auto mb-2">
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" name="i2s2t1{{ $kriteriaKKE->kodeKriteriaKKE }}" id="i2s2t1{{ $kriteriaKKE->kodeKriteriaKKE }}" type="radio" value="Y">
                    <label class="form-check-label" for="{{ $kriteriaKKE->kodeKriteriaKKE }}1">
                      Y
                    </label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" name="i2s2t1{{ $kriteriaKKE->kodeKriteriaKKE }}" id="i2s2t1{{ $kriteriaKKE->kodeKriteriaKKE }}" type="radio" value="T">
                    <label class="form-check-label" for="{{ $kriteriaKKE->kodeKriteriaKKE }}2">
                      T
                    </label>
                  </div>
                </div>
              @else
              <div class="col-sm-12 mb-2">
                <input type="text" class="form-control">
              </div>
              @endif
              <button class="btn btn-toggle btn-sm mb-1 d-inline-flex align-items-center rounded border-0 collapsed"
              data-bs-toggle="collapse"data-bs-target="#panduanEvaluatori2s2t1{{ $kriteriaKKE->id }}-collapse">
                <span data-feather="info" class="align-text-bottom"></span>&nbsp Panduan Evaluator
              </button>
              <div class="collapse px-4" id="panduanEvaluatori2s2t1{{ $kriteriaKKE->id }}-collapse">
                &nbsp {{ $kriteriaKKE->panduanEvaluator }}
              </div> <br>
            @endif
          </div>
        @endforeach
      </div>
    </div>
  </div>

  <div class="border border-secondary-subtle mb-3">
    <div class="border-bottom border-black bg-white p-3">
      <h6 class="d-inline">Tujuan 2</h6>
      <button class="btn btn-toggle btn-sm mb-1 align-items-center border-0 collapsed d-inline float-end"
        data-bs-toggle="collapse"data-bs-target="#tujuan2-collapse">
          <span data-feather="minus" class="align-text-bottom"></span>&nbsp
      </button>
    </div>
    <div class="collapse show" id="tujuan2-collapse">
      <div class="border border-1 p-3 bg-body-tertiary">
        @foreach ($kriteriaKKEs as $kriteriaKKE)
          <div class="border-bottom">
            @if($kriteriaKKE->tujuan == 1)
              <label class="col-auto col-form-label">{{ $kriteriaKKE->kodeKriteriaKKE }}. {{ $kriteriaKKE->kriteria }}</label>
              @if($kriteriaKKE->nilaiPerIKU == "Y/T")
                <div class="col-auto mb-2">
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" name="t2{{ $kriteriaKKE->kodeKriteriaKKE }}" id="t2{{ $kriteriaKKE->kodeKriteriaKKE }}" type="radio" value="Y">
                    <label class="form-check-label" for="{{ $kriteriaKKE->kodeKriteriaKKE }}1">
                      Y
                    </label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" name="t2{{ $kriteriaKKE->kodeKriteriaKKE }}" id="t2{{ $kriteriaKKE->kodeKriteriaKKE }}" type="radio" value="T">
                    <label class="form-check-label" for="{{ $kriteriaKKE->kodeKriteriaKKE }}2">
                      T
                    </label>
                  </div>
                </div>
              @else
              <div class="col-sm-12 mb-2">
                <input type="text" class="form-control">
              </div>
              @endif
              <button class="btn btn-toggle btn-sm mb-1 d-inline-flex align-items-center rounded border-0 collapsed"
              data-bs-toggle="collapse"data-bs-target="#panduanEvaluatort2{{ $kriteriaKKE->id }}-collapse">
                <span data-feather="info" class="align-text-bottom"></span>&nbsp Panduan Evaluator
              </button>
              <div class="collapse px-4" id="panduanEvaluatort2{{ $kriteriaKKE->id }}-collapse">
                &nbsp {{ $kriteriaKKE->panduanEvaluator }}
              </div> <br>
            @endif
          </div>
        @endforeach
      </div>
    </div>
  </div>

  <div class="border border-secondary-subtle mb-3">
    <div class="border-bottom border-black bg-white p-3">
      <h6 class="d-inline">Sasaran 1 dari Tujuan 2</h6>
      <button class="btn btn-toggle btn-sm mb-1 align-items-center border-0 collapsed d-inline float-end"
        data-bs-toggle="collapse"data-bs-target="#sasaran1tujuan2-collapse">
          <span data-feather="minus" class="align-text-bottom"></span>&nbsp
      </button>
    </div>
    <div class="collapse show" id="sasaran1tujuan2-collapse">
      <div class="border border-1 p-3 bg-body-tertiary">
        @foreach ($kriteriaKKEs as $kriteriaKKE)
          <div class="border-bottom">
            @if($kriteriaKKE->sasaran == 1)
              <label class="col-auto col-form-label">{{ $kriteriaKKE->kodeKriteriaKKE }}. {{ $kriteriaKKE->kriteria }}</label>
              @if($kriteriaKKE->nilaiPerIKU == "Y/T")
                <div class="col-auto mb-2">
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" name="s1t2{{ $kriteriaKKE->kodeKriteriaKKE }}" id="s1t2{{ $kriteriaKKE->kodeKriteriaKKE }}" type="radio" value="Y">
                    <label class="form-check-label" for="{{ $kriteriaKKE->kodeKriteriaKKE }}1">
                      Y
                    </label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" name="s1t2{{ $kriteriaKKE->kodeKriteriaKKE }}" id="s1t2{{ $kriteriaKKE->kodeKriteriaKKE }}" type="radio" value="T">
                    <label class="form-check-label" for="{{ $kriteriaKKE->kodeKriteriaKKE }}2">
                      T
                    </label>
                  </div>
                </div>
              @else
              <div class="col-sm-12 mb-2">
                <input type="text" class="form-control">
              </div>
              @endif
              <button class="btn btn-toggle btn-sm mb-1 d-inline-flex align-items-center rounded border-0 collapsed"
              data-bs-toggle="collapse"data-bs-target="#panduanEvaluators1t2{{ $kriteriaKKE->id }}-collapse">
                <span data-feather="info" class="align-text-bottom"></span>&nbsp Panduan Evaluator
              </button>
              <div class="collapse px-4" id="panduanEvaluators1t2{{ $kriteriaKKE->id }}-collapse">
                &nbsp {{ $kriteriaKKE->panduanEvaluator }}
              </div> <br>
            @endif
          </div>
        @endforeach
      </div>
    </div>
  </div>

  <div class="border border-secondary-subtle mb-3">
    <div class="border-bottom border-black bg-white p-3">
      <h6 class="d-inline">Indikator 1 dari Sasaran 1 dari Tujuan 2</h6>
      <button class="btn btn-toggle btn-sm mb-1 align-items-center border-0 collapsed d-inline float-end"
        data-bs-toggle="collapse"data-bs-target="#indikator1sasaran1tujuan2-collapse">
          <span data-feather="minus" class="align-text-bottom"></span>&nbsp
      </button>
    </div>
    <div class="collapse show" id="indikator1sasaran1tujuan2-collapse">
      <div class="border border-1 p-3 bg-body-tertiary">
        @foreach ($kriteriaKKEs as $kriteriaKKE)
          <div class="border-bottom">
            @if($kriteriaKKE->indikator == 1)
              <label class="col-auto col-form-label">{{ $kriteriaKKE->kodeKriteriaKKE }}. {{ $kriteriaKKE->kriteria }}</label>
              @if($kriteriaKKE->nilaiPerIKU == "Y/T")
                <div class="col-auto mb-2">
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" name="i1s1t2{{ $kriteriaKKE->kodeKriteriaKKE }}" id="i1s1t2{{ $kriteriaKKE->kodeKriteriaKKE }}" type="radio" value="Y">
                    <label class="form-check-label" for="{{ $kriteriaKKE->kodeKriteriaKKE }}1">
                      Y
                    </label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" name="i1s1t2{{ $kriteriaKKE->kodeKriteriaKKE }}" id="i1s1t2{{ $kriteriaKKE->kodeKriteriaKKE }}" type="radio" value="T">
                    <label class="form-check-label" for="{{ $kriteriaKKE->kodeKriteriaKKE }}2">
                      T
                    </label>
                  </div>
                </div>
              @else
              <div class="col-sm-12 mb-2">
                <input type="text" class="form-control">
              </div>
              @endif
              <button class="btn btn-toggle btn-sm mb-1 d-inline-flex align-items-center rounded border-0 collapsed"
              data-bs-toggle="collapse"data-bs-target="#panduanEvaluatori1s1t2{{ $kriteriaKKE->id }}-collapse">
                <span data-feather="info" class="align-text-bottom"></span>&nbsp Panduan Evaluator
              </button>
              <div class="collapse px-4" id="panduanEvaluatori1s1t2{{ $kriteriaKKE->id }}-collapse">
                &nbsp {{ $kriteriaKKE->panduanEvaluator }}
              </div> <br>
            @endif
          </div>
        @endforeach
      </div>
    </div>
  </div>

  <div class="border border-secondary-subtle mb-3">
    <div class="border-bottom border-black bg-white p-3">
      <h6 class="d-inline">Indikator 2 dari Sasaran 1 dari Tujuan 2</h6>
      <button class="btn btn-toggle btn-sm mb-1 align-items-center border-0 collapsed d-inline float-end"
        data-bs-toggle="collapse"data-bs-target="#indikator2sasaran1tujuan2-collapse">
          <span data-feather="minus" class="align-text-bottom"></span>&nbsp
      </button>
    </div>
    <div class="collapse show" id="indikator2sasaran1tujuan2-collapse">
      <div class="border border-1 p-3 bg-body-tertiary">
        @foreach ($kriteriaKKEs as $kriteriaKKE)
          <div class="border-bottom">
            @if($kriteriaKKE->indikator == 1)
              <label class="col-auto col-form-label">{{ $kriteriaKKE->kodeKriteriaKKE }}. {{ $kriteriaKKE->kriteria }}</label>
              @if($kriteriaKKE->nilaiPerIKU == "Y/T")
                <div class="col-auto mb-2">
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" name="i2s1t2{{ $kriteriaKKE->kodeKriteriaKKE }}" id="i2s1t2{{ $kriteriaKKE->kodeKriteriaKKE }}" type="radio" value="Y">
                    <label class="form-check-label" for="{{ $kriteriaKKE->kodeKriteriaKKE }}1">
                      Y
                    </label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" name="i2s1t2{{ $kriteriaKKE->kodeKriteriaKKE }}" id="i2s1t2{{ $kriteriaKKE->kodeKriteriaKKE }}" type="radio" value="T">
                    <label class="form-check-label" for="{{ $kriteriaKKE->kodeKriteriaKKE }}2">
                      T
                    </label>
                  </div>
                </div>
              @else
              <div class="col-sm-12 mb-2">
                <input type="text" class="form-control">
              </div>
              @endif
              <button class="btn btn-toggle btn-sm mb-1 d-inline-flex align-items-center rounded border-0 collapsed"
              data-bs-toggle="collapse"data-bs-target="#panduanEvaluatori2s1t2{{ $kriteriaKKE->id }}-collapse">
                <span data-feather="info" class="align-text-bottom"></span>&nbsp Panduan Evaluator
              </button>
              <div class="collapse px-4" id="panduanEvaluatori2s1t2{{ $kriteriaKKE->id }}-collapse">
                &nbsp {{ $kriteriaKKE->panduanEvaluator }}
              </div> <br>
            @endif
          </div>
        @endforeach
      </div>
    </div>
  </div>

  <div class="border border-secondary-subtle mb-3">
    <div class="border-bottom border-black bg-white p-3">
      <h6 class="d-inline">Sasaran 2 dari Tujuan 2</h6>
      <button class="btn btn-toggle btn-sm mb-1 align-items-center border-0 collapsed d-inline float-end"
        data-bs-toggle="collapse"data-bs-target="#sasaran2tujuan2-collapse">
          <span data-feather="minus" class="align-text-bottom"></span>&nbsp
      </button>
    </div>
    <div class="collapse show" id="sasaran2tujuan2-collapse">
      <div class="border border-1 p-3 bg-body-tertiary">
        @foreach ($kriteriaKKEs as $kriteriaKKE)
          <div class="border-bottom">
            @if($kriteriaKKE->sasaran == 1)
              <label class="col-auto col-form-label">{{ $kriteriaKKE->kodeKriteriaKKE }}. {{ $kriteriaKKE->kriteria }}</label>
              @if($kriteriaKKE->nilaiPerIKU == "Y/T")
                <div class="col-auto mb-2">
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" name="s2t2{{ $kriteriaKKE->kodeKriteriaKKE }}" id="s2t2{{ $kriteriaKKE->kodeKriteriaKKE }}" type="radio" value="Y">
                    <label class="form-check-label" for="{{ $kriteriaKKE->kodeKriteriaKKE }}1">
                      Y
                    </label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" name="s2t2{{ $kriteriaKKE->kodeKriteriaKKE }}" id="s2t2{{ $kriteriaKKE->kodeKriteriaKKE }}" type="radio" value="T">
                    <label class="form-check-label" for="{{ $kriteriaKKE->kodeKriteriaKKE }}2">
                      T
                    </label>
                  </div>
                </div>
              @else
              <div class="col-sm-12 mb-2">
                <input type="text" class="form-control">
              </div>
              @endif
              <button class="btn btn-toggle btn-sm mb-1 d-inline-flex align-items-center rounded border-0 collapsed"
              data-bs-toggle="collapse"data-bs-target="#panduanEvaluators2t2{{ $kriteriaKKE->id }}-collapse">
                <span data-feather="info" class="align-text-bottom"></span>&nbsp Panduan Evaluator
              </button>
              <div class="collapse px-4" id="panduanEvaluators2t2{{ $kriteriaKKE->id }}-collapse">
                &nbsp {{ $kriteriaKKE->panduanEvaluator }}
              </div> <br>
            @endif
          </div>
        @endforeach
      </div>
    </div>
  </div>

  <div class="border border-secondary-subtle mb-3">
    <div class="border-bottom border-black bg-white p-3">
      <h6 class="d-inline">Indikator 1 dari Sasaran 2 dari Tujuan 2</h6>
      <button class="btn btn-toggle btn-sm mb-1 align-items-center border-0 collapsed d-inline float-end"
        data-bs-toggle="collapse"data-bs-target="#indikator1sasaran2tujuan2-collapse">
          <span data-feather="minus" class="align-text-bottom"></span>&nbsp
      </button>
    </div>
    <div class="collapse show" id="indikator1sasaran2tujuan2-collapse">
      <div class="border border-1 p-3 bg-body-tertiary">
        @foreach ($kriteriaKKEs as $kriteriaKKE)
          <div class="border-bottom">
            @if($kriteriaKKE->indikator == 1)
              <label class="col-auto col-form-label">{{ $kriteriaKKE->kodeKriteriaKKE }}. {{ $kriteriaKKE->kriteria }}</label>
              @if($kriteriaKKE->nilaiPerIKU == "Y/T")
                <div class="col-auto mb-2">
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" name="i1s2t1{{ $kriteriaKKE->kodeKriteriaKKE }}" id="i1s2t1{{ $kriteriaKKE->kodeKriteriaKKE }}" type="radio" value="Y">
                    <label class="form-check-label" for="{{ $kriteriaKKE->kodeKriteriaKKE }}1">
                      Y
                    </label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" name="i1s2t1{{ $kriteriaKKE->kodeKriteriaKKE }}" id="i1s2t1{{ $kriteriaKKE->kodeKriteriaKKE }}" type="radio" value="T">
                    <label class="form-check-label" for="{{ $kriteriaKKE->kodeKriteriaKKE }}2">
                      T
                    </label>
                  </div>
                </div>
              @else
              <div class="col-sm-12 mb-2">
                <input type="text" class="form-control">
              </div>
              @endif
              <button class="btn btn-toggle btn-sm mb-1 d-inline-flex align-items-center rounded border-0 collapsed"
              data-bs-toggle="collapse"data-bs-target="#panduanEvaluatori1s2t1{{ $kriteriaKKE->id }}-collapse">
                <span data-feather="info" class="align-text-bottom"></span>&nbsp Panduan Evaluator
              </button>
              <div class="collapse px-4" id="panduanEvaluatori1s2t1{{ $kriteriaKKE->id }}-collapse">
                &nbsp {{ $kriteriaKKE->panduanEvaluator }}
              </div> <br>
            @endif
          </div>
        @endforeach
      </div>
    </div>
  </div>

  <div class="border border-secondary-subtle mb-3">
    <div class="border-bottom border-black bg-white p-3">
      <h6 class="d-inline">Indikator 2 dari Sasaran 2 dari Tujuan 2</h6>
      <button class="btn btn-toggle btn-sm mb-1 align-items-center border-0 collapsed d-inline float-end"
        data-bs-toggle="collapse"data-bs-target="#indikator2sasaran2tujuan2-collapse">
          <span data-feather="minus" class="align-text-bottom"></span>&nbsp
      </button>
    </div>
    <div class="collapse show" id="indikator2sasaran2tujuan2-collapse">
      <div class="border border-1 p-3 bg-body-tertiary">
        @foreach ($kriteriaKKEs as $kriteriaKKE)
          <div class="border-bottom">
            @if($kriteriaKKE->indikator == 1)
              <label class="col-auto col-form-label">{{ $kriteriaKKE->kodeKriteriaKKE }}. {{ $kriteriaKKE->kriteria }}</label>
              @if($kriteriaKKE->nilaiPerIKU == "Y/T")
                <div class="col-auto mb-2">
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" name="i2s2t2{{ $kriteriaKKE->kodeKriteriaKKE }}" id="i2s2t2{{ $kriteriaKKE->kodeKriteriaKKE }}" type="radio" value="Y">
                    <label class="form-check-label" for="{{ $kriteriaKKE->kodeKriteriaKKE }}1">
                      Y
                    </label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" name="i2s2t2{{ $kriteriaKKE->kodeKriteriaKKE }}" id="i2s2t2{{ $kriteriaKKE->kodeKriteriaKKE }}" type="radio" value="T">
                    <label class="form-check-label" for="{{ $kriteriaKKE->kodeKriteriaKKE }}2">
                      T
                    </label>
                  </div>
                </div>
              @else
              <div class="col-sm-12 mb-2">
                <input type="text" class="form-control">
              </div>
              @endif
              <button class="btn btn-toggle btn-sm mb-1 d-inline-flex align-items-center rounded border-0 collapsed"
              data-bs-toggle="collapse"data-bs-target="#panduanEvaluatori2s2t2{{ $kriteriaKKE->id }}-collapse">
                <span data-feather="info" class="align-text-bottom"></span>&nbsp Panduan Evaluator
              </button>
              <div class="collapse px-4" id="panduanEvaluatori2s2t2{{ $kriteriaKKE->id }}-collapse">
                &nbsp {{ $kriteriaKKE->panduanEvaluator }}
              </div> <br>
            @endif
          </div>
        @endforeach
      </div>
    </div>
  </div>

  <div class="d-flex mb-3 justify-content-end">
    <a href="/kke" class="btn btn-secondary mx-3">Kembali</a>
  </div>
@endif

@if((auth()->user()->role=="Anggota Tim") || (auth()->user()->role=="Ketua Tim") || (auth()->user()->role=="Pengendali Teknis"))
  <div class="container mt-3">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb border-bottom border-dark">
          <li class="breadcrumb-item mt-1"><a href="/evaluasiKKE" style="text-decoration:none; color:black"><h4>Evaluasi KKE</h4></a></li>
          <li class="breadcrumb active mt-2" aria-current="page"><a href="/evaluasiKKE/{{ $IDunitKerja }}"
            style="text-decoration:none; color:black"><h5>&nbsp/ {{ $unitKerja->namaUnitKerja }}</h5></a></li>
          <li class="breadcrumb active" aria-current="page">
            <form action="/kke/{{ $kke->kodeKKE }}/edit" class="d-inline">
              @csrf
              <input type="hidden" class="form-control" name="unitKerja" id="unitKerja" value="{{ $unitKerja->namaUnitKerja }}" required>
              <input type="hidden" class="form-control" name="IDunitKerja" id="IDunitKerja" value="{{ $IDunitKerja }}" required>
              <button  class="btn btn-link" style="text-decoration:none; color:black">
                <h5>/ KKE {{ $kke->kodeKKE }}</h5>
              </button>
            </form>
          </li>
          <li class="breadcrumb active mt-2" aria-current="page"><h5 class="d-inline" style="text-decoration:none; color:black">&nbsp/ Kriteria KKE {{ $kke->kodeKKE }}</h5></a></li>
      </ol>
    </nav>
  </div>

  <div class="border border-3 border-black border-bottom-0 border-start-0 border-end-0 bg-white mb-3">
    <div class="border border-1 p-3">
      <h5>KKE {{ $kke->namaKKE }} (KKE {{ $kke->kodeKKE }})</h5>
    </div>
  </div>

  @foreach ($tujuanIKUs as $tujuanIKU)
    <div class="border border-1 mb-3 border-secondary-subtle">
      <div class="border-bottom border-black bg-white p-3">
        <h6 class="d-inline">{{ $tujuanIKU->kodeTujuan }}. {{ $tujuanIKU->tujuan }}</h6>
        <button class="btn btn-toggle btn-sm mb-1 align-items-center border-0 collapsed d-inline float-end"
        data-bs-toggle="collapse"data-bs-target="#tujuanIKU{{ $tujuanIKU->kodeTujuan }}-collapse">
          <span data-feather="minus" class="align-text-bottom"></span>&nbsp
        </button>
      </div>
      <div class="collapse show" id="tujuanIKU{{ $tujuanIKU->kodeTujuan }}-collapse">
        <div class="border border-1 p-3 bg-body-tertiary">
          @foreach ($kriteriaKKEs as $kriteriaKKE)
            <div class="border-bottom">
              @if($kriteriaKKE->tujuan == 1)
                <label class="col-auto col-form-label">{{ $kriteriaKKE->kodeKriteriaKKE }}. {{ $kriteriaKKE->kriteria }}</label>
                @if($kriteriaKKE->nilaiPerIKU == "Y/T")
                  <div class="col-auto mb-2">
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" name="{{ $tujuanIKU->kodeTujuan }}-{{ $kriteriaKKE->kodeKriteriaKKE }}" id="{{ $tujuanIKU->kodeTujuan }}-{{ $kriteriaKKE->kodeKriteriaKKE }}" type="radio" value="Y">
                      <label class="form-check-label" for="{{ $kriteriaKKE->kodeKriteriaKKE }}1">
                        Y
                      </label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" name="{{ $tujuanIKU->kodeTujuan }}-{{ $kriteriaKKE->kodeKriteriaKKE }}" id="{{ $tujuanIKU->kodeTujuan }}-{{ $kriteriaKKE->kodeKriteriaKKE }}" type="radio" value="T">
                      <label class="form-check-label" for="{{ $kriteriaKKE->kodeKriteriaKKE }}2">
                        T
                      </label>
                    </div>
                  </div>
                @else
                <div class="col-sm-12 mb-2">
                  <input type="text" class="form-control">
                </div>
                @endif
                <button class="btn btn-toggle btn-sm mb-1 d-inline-flex align-items-center rounded border-0 collapsed"
                data-bs-toggle="collapse"data-bs-target="#panduanEvaluator{{ $tujuanIKU->kodeTujuan }}-{{ $kriteriaKKE->id }}-collapse">
                  <span data-feather="info" class="align-text-bottom"></span>&nbsp Panduan Evaluator
                </button>
                <div class="collapse px-4" id="panduanEvaluator{{ $tujuanIKU->kodeTujuan }}-{{ $kriteriaKKE->id }}-collapse">
                  &nbsp {{ $kriteriaKKE->panduanEvaluator }}
                </div> <br>
              @endif
            </div>
          @endforeach
        </div>
      </div>
    </div>
    @php
      $sasaranIKUs = App\Models\SasaranIku::where('tujuanIku_id', $tujuanIKU->id)->get()    
    @endphp
    @foreach ($sasaranIKUs as $sasaranIKU)
      <div class="border border-1 mb-3 border-secondary-subtle">
        <div class="border-bottom border-black bg-white p-3">
          <h6 class="d-inline">{{ $sasaranIKU->kodeSasaran }}. {{ $sasaranIKU->sasaran }}</h6>
          <button class="btn btn-toggle btn-sm mb-1 align-items-center border-0 collapsed d-inline float-end"
          data-bs-toggle="collapse"data-bs-target="#sasaranIKU{{ $sasaranIKU->kodeSasaran }}-collapse">
            <span data-feather="minus" class="align-text-bottom"></span>&nbsp
          </button>
        </div>
        <div class="collapse show" id="sasaranIKU{{ $sasaranIKU->kodeSasaran }}-collapse">
          <div class="border border-1 p-3 bg-body-tertiary">
            @foreach ($kriteriaKKEs as $kriteriaKKE)
              <div class="border-bottom">
                @if($kriteriaKKE->sasaran == 1)
                  <label class="col-auto col-form-label">{{ $kriteriaKKE->kodeKriteriaKKE }}. {{ $kriteriaKKE->kriteria }}</label>
                  @if($kriteriaKKE->nilaiPerIKU == "Y/T")
                    <div class="col-auto mb-2">
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" name="{{ $sasaranIKU->kodeSasaran }}-{{ $kriteriaKKE->kodeKriteriaKKE }}" id="{{ $sasaranIKU->kodeSasaran }}-{{ $kriteriaKKE->kodeKriteriaKKE }}" type="radio" value="Y">
                        <label class="form-check-label" for="{{ $kriteriaKKE->kodeKriteriaKKE }}1">
                          Y
                        </label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" name="{{ $sasaranIKU->kodeSasaran }}-{{ $kriteriaKKE->kodeKriteriaKKE }}" id="{{ $sasaranIKU->kodeSasaran }}-{{ $kriteriaKKE->kodeKriteriaKKE }}" type="radio" value="T">
                        <label class="form-check-label" for="{{ $kriteriaKKE->kodeKriteriaKKE }}2">
                          T
                        </label>
                      </div>
                    </div>
                  @else
                  <div class="col-sm-12 mb-2">
                    <input type="text" class="form-control">
                  </div>
                  @endif
                  <button class="btn btn-toggle btn-sm mb-1 d-inline-flex align-items-center rounded border-0 collapsed"
                  data-bs-toggle="collapse"data-bs-target="#panduanEvaluator{{ $sasaranIKU->kodeSasaran }}-{{ $kriteriaKKE->id }}-collapse">
                    <span data-feather="info" class="align-text-bottom"></span>&nbsp Panduan Evaluator
                  </button>
                  <div class="collapse px-4" id="panduanEvaluator{{ $sasaranIKU->kodeSasaran }}-{{ $kriteriaKKE->id }}-collapse">
                    &nbsp {{ $kriteriaKKE->panduanEvaluator }}
                  </div> <br>
                @endif
              </div>
            @endforeach
          </div>
        </div>
      </div>
      @php
        $indikatorIKUs = App\Models\IndikatorIku::where('sasaranIku_id', $sasaranIKU->id)->get()    
      @endphp
      @foreach ($indikatorIKUs as $indikatorIKU)
        <div class="border border-1 mb-3 border-secondary-subtle">
          <div class="border-bottom border-black bg-white p-3">
            <h6 class="d-inline">{{ $indikatorIKU->kodeIndikator }}. {{ $indikatorIKU->indikator }}</h6>
            <button class="btn btn-toggle btn-sm mb-1 align-items-center border-0 collapsed d-inline float-end"
            data-bs-toggle="collapse"data-bs-target="#indikatorIKU{{ $indikatorIKU->kodeIndikator }}-collapse">
              <span data-feather="minus" class="align-text-bottom"></span>&nbsp
            </button>
          </div>
          <div class="collapse show" id="indikatorIKU{{ $indikatorIKU->kodeIndikator }}-collapse">
            <div class="border border-1 p-3 bg-body-tertiary">
              @foreach ($kriteriaKKEs as $kriteriaKKE)
                <div class="border-bottom">
                  @if($kriteriaKKE->indikator == 1)
                    <label class="col-auto col-form-label">{{ $kriteriaKKE->kodeKriteriaKKE }}. {{ $kriteriaKKE->kriteria }}</label>
                    @if($kriteriaKKE->nilaiPerIKU == "Y/T")
                      <div class="col-auto mb-2">
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" name="{{ $indikatorIKU->kodeIndikator }}{{ $kriteriaKKE->kodeKriteriaKKE }}" id="{{ $indikatorIKU->kodeIndikator }}{{ $kriteriaKKE->kodeKriteriaKKE }}" type="radio" value="Y">
                          <label class="form-check-label" for="{{ $kriteriaKKE->kodeKriteriaKKE }}1">
                            Y
                          </label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" name="{{ $indikatorIKU->kodeIndikator }}{{ $kriteriaKKE->kodeKriteriaKKE }}" id="{{ $indikatorIKU->kodeIndikator }}{{ $kriteriaKKE->kodeKriteriaKKE }}" type="radio" value="T">
                          <label class="form-check-label" for="{{ $kriteriaKKE->kodeKriteriaKKE }}2">
                            T
                          </label>
                        </div>
                      </div>
                    @else
                    <div class="col-sm-12 mb-2">
                      <input type="text" class="form-control">
                    </div>
                    @endif
                    <button class="btn btn-toggle btn-sm mb-1 d-inline-flex align-items-center rounded border-0 collapsed"
                    data-bs-toggle="collapse"data-bs-target="#panduanEvaluator{{ $indikatorIKU->kodeIndikator }}{{ $kriteriaKKE->id }}-collapse">
                      <span data-feather="info" class="align-text-bottom"></span>&nbsp Panduan Evaluator
                    </button>
                    <div class="collapse px-4" id="panduanEvaluator{{ $indikatorIKU->kodeIndikator }}{{ $kriteriaKKE->id }}-collapse">
                      &nbsp {{ $kriteriaKKE->panduanEvaluator }}
                    </div> <br>
                  @endif
                </div>
              @endforeach
            </div>
          </div>
        </div>
      @endforeach
    @endforeach
  @endforeach

  <div class="d-flex mb-3 justify-content-end">
    <form action="/kke/{{ $kke->kodeKKE }}/edit" class="d-inline">
      @csrf
      <input type="hidden" class="form-control" name="unitKerja" id="unitKerja" value="{{ $unitKerja->namaUnitKerja }}" required>
      <input type="hidden" class="form-control" name="IDunitKerja" id="IDunitKerja" value="{{ $IDunitKerja }}" required>
      <button  class="btn btn-success mx-3">
        Simpan
      </button>
    </form>
  </div>
@endif

@endsection