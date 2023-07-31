@extends('layouts.main')

@section('container')

<div class="container mt-3">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/kke" style="text-decoration:none; color:black"><h4>Pengaturan KKE</h4></a></li>
      <li class="breadcrumb active mt-1" aria-current="page"><h5 class="d-inline" style="text-decoration:none; color:black">&nbsp/ Lihat KKE</h5></a></li>
  </ol>
  </nav>
</div>

@if(session()->has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  {{ session('success') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
  </button>
</div>
@endif

<div class="border border-3 border-black border-bottom-0 border-start-0 border-end-0 bg-white mb-3">
  <div class="border border-1 p-3">
    <h5>KKE {{ $kke->namaKKE }} (KKE {{ $kke->kodeKKE }})</h5>
  </div>
</div>

<div class="border border-secondary-subtle mb-3">
  <div class="border-bottom border-black bg-white p-3">
    <h5>Tujuan 1</h5>
  </div>
  <div class="border border-1 p-3 bg-body-tertiary">
    @foreach ($kriteriaKKEs as $kriteriaKKE)
      <div class="border-bottom">
        @if($kriteriaKKE->tujuan == 1)
          <label class="col-auto col-form-label">{{ $kriteriaKKE->kriteria }}</label>
          @if($kriteriaKKE->nilaiPerIKU == "Y/T")
            <div class="col-auto mb-2">
              <div class="form-check form-check-inline">
                <input class="form-check-input" name="t1{{ $kriteriaKKE->kodeKKE }}" id="t1{{ $kriteriaKKE->kodeKKE }}" type="radio" value="Y">
                <label class="form-check-label" for="{{ $kriteriaKKE->kodeKriteriaKKE }}1">
                  Y
                </label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" name="t1{{ $kriteriaKKE->kodeKKE }}" id="t1{{ $kriteriaKKE->kodeKKE }}" type="radio" value="T">
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

<div class="border border-secondary-subtle mb-3">
  <div class="border-bottom border-black bg-white p-3">
    <h5>Sasaran 1 dari Tujuan 1</h5>
  </div>
  <div class="border border-1 p-3 bg-body-tertiary">
    @foreach ($kriteriaKKEs as $kriteriaKKE)
      <div class="border-bottom">
        @if($kriteriaKKE->sasaran == 1)
          <label class="col-auto col-form-label">{{ $kriteriaKKE->kriteria }}</label>
          @if($kriteriaKKE->nilaiPerIKU == "Y/T")
            <div class="col-auto mb-2">
              <div class="form-check form-check-inline">
                <input class="form-check-input" name="s1t1{{ $kriteriaKKE->kodeKKE }}" id="s1t1{{ $kriteriaKKE->kodeKKE }}" type="radio" value="Y">
                <label class="form-check-label" for="{{ $kriteriaKKE->kodeKriteriaKKE }}1">
                  Y
                </label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" name="s1t1{{ $kriteriaKKE->kodeKKE }}" id="s1t1{{ $kriteriaKKE->kodeKKE }}" type="radio" value="T">
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

<div class="border border-secondary-subtle mb-3">
  <div class="border-bottom border-black bg-white p-3">
    <h5>Indikator 1 dari Sasaran 1 dari Tujuan 1</h5>
  </div>
  <div class="border border-1 p-3 bg-body-tertiary">
    @foreach ($kriteriaKKEs as $kriteriaKKE)
      <div class="border-bottom">
        @if($kriteriaKKE->indikator == 1)
          <label class="col-auto col-form-label">{{ $kriteriaKKE->kriteria }}</label>
          @if($kriteriaKKE->nilaiPerIKU == "Y/T")
            <div class="col-auto mb-2">
              <div class="form-check form-check-inline">
                <input class="form-check-input" name="i1s1t1{{ $kriteriaKKE->kodeKKE }}" id="i1s1t1{{ $kriteriaKKE->kodeKKE }}" type="radio" value="Y">
                <label class="form-check-label" for="{{ $kriteriaKKE->kodeKriteriaKKE }}1">
                  Y
                </label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" name="i1s1t1{{ $kriteriaKKE->kodeKKE }}" id="i1s1t1{{ $kriteriaKKE->kodeKKE }}" type="radio" value="T">
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

<div class="border border-secondary-subtle mb-3">
  <div class="border-bottom border-black bg-white p-3">
    <h5>Indikator 2 dari Sasaran 1 dari Tujuan 1</h5>
  </div>
  <div class="border border-1 p-3 bg-body-tertiary">
    @foreach ($kriteriaKKEs as $kriteriaKKE)
      <div class="border-bottom">
        @if($kriteriaKKE->indikator == 1)
          <label class="col-auto col-form-label">{{ $kriteriaKKE->kriteria }}</label>
          @if($kriteriaKKE->nilaiPerIKU == "Y/T")
            <div class="col-auto mb-2">
              <div class="form-check form-check-inline">
                <input class="form-check-input" name="i2s1t1{{ $kriteriaKKE->kodeKKE }}" id="i2s1t1{{ $kriteriaKKE->kodeKKE }}" type="radio" value="Y">
                <label class="form-check-label" for="{{ $kriteriaKKE->kodeKriteriaKKE }}1">
                  Y
                </label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" name="i2s1t1{{ $kriteriaKKE->kodeKKE }}" id="i2s1t1{{ $kriteriaKKE->kodeKKE }}" type="radio" value="T">
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

<div class="border border-secondary-subtle mb-3">
  <div class="border-bottom border-black bg-white p-3">
    <h5>Sasaran 2 dari Tujuan 1</h5>
  </div>
  <div class="border border-1 p-3 bg-body-tertiary">
    @foreach ($kriteriaKKEs as $kriteriaKKE)
      <div class="border-bottom">
        @if($kriteriaKKE->sasaran == 1)
          <label class="col-auto col-form-label">{{ $kriteriaKKE->kriteria }}</label>
          @if($kriteriaKKE->nilaiPerIKU == "Y/T")
            <div class="col-auto mb-2">
              <div class="form-check form-check-inline">
                <input class="form-check-input" name="s2t1{{ $kriteriaKKE->kodeKKE }}" id="s2t1{{ $kriteriaKKE->kodeKKE }}" type="radio" value="Y">
                <label class="form-check-label" for="{{ $kriteriaKKE->kodeKriteriaKKE }}1">
                  Y
                </label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" name="s2t1{{ $kriteriaKKE->kodeKKE }}" id="s2t1{{ $kriteriaKKE->kodeKKE }}" type="radio" value="T">
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

<div class="border border-secondary-subtle mb-3">
  <div class="border-bottom border-black bg-white p-3">
    <h5>Indikator 1 dari Sasaran 2 dari Tujuan 1</h5>
  </div>
  <div class="border border-1 p-3 bg-body-tertiary">
    @foreach ($kriteriaKKEs as $kriteriaKKE)
      <div class="border-bottom">
        @if($kriteriaKKE->indikator == 1)
          <label class="col-auto col-form-label">{{ $kriteriaKKE->kriteria }}</label>
          @if($kriteriaKKE->nilaiPerIKU == "Y/T")
            <div class="col-auto mb-2">
              <div class="form-check form-check-inline">
                <input class="form-check-input" name="i1s2t1{{ $kriteriaKKE->kodeKKE }}" id="i1s2t1{{ $kriteriaKKE->kodeKKE }}" type="radio" value="Y">
                <label class="form-check-label" for="{{ $kriteriaKKE->kodeKriteriaKKE }}1">
                  Y
                </label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" name="i1s2t1{{ $kriteriaKKE->kodeKKE }}" id="i1s2t1{{ $kriteriaKKE->kodeKKE }}" type="radio" value="T">
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

<div class="border border-secondary-subtle mb-3">
  <div class="border-bottom border-black bg-white p-3">
    <h5>Indikator 2 dari Sasaran 2 dari Tujuan 1</h5>
  </div>
  <div class="border border-1 p-3 bg-body-tertiary">
    @foreach ($kriteriaKKEs as $kriteriaKKE)
      <div class="border-bottom">
        @if($kriteriaKKE->indikator == 1)
          <label class="col-auto col-form-label">{{ $kriteriaKKE->kriteria }}</label>
          @if($kriteriaKKE->nilaiPerIKU == "Y/T")
            <div class="col-auto mb-2">
              <div class="form-check form-check-inline">
                <input class="form-check-input" name="i2s2t1{{ $kriteriaKKE->kodeKKE }}" id="i2s2t1{{ $kriteriaKKE->kodeKKE }}" type="radio" value="Y">
                <label class="form-check-label" for="{{ $kriteriaKKE->kodeKriteriaKKE }}1">
                  Y
                </label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" name="i2s2t1{{ $kriteriaKKE->kodeKKE }}" id="i2s2t1{{ $kriteriaKKE->kodeKKE }}" type="radio" value="T">
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

<div class="border border-secondary-subtle mb-3">
  <div class="border-bottom border-black bg-white p-3">
    <h5>Tujuan 2</h5>
  </div>
  <div class="border border-1 p-3 bg-body-tertiary">
    @foreach ($kriteriaKKEs as $kriteriaKKE)
      <div class="border-bottom">
        @if($kriteriaKKE->tujuan == 1)
          <label class="col-auto col-form-label">{{ $kriteriaKKE->kriteria }}</label>
          @if($kriteriaKKE->nilaiPerIKU == "Y/T")
            <div class="col-auto mb-2">
              <div class="form-check form-check-inline">
                <input class="form-check-input" name="t2{{ $kriteriaKKE->kodeKKE }}" id="t2{{ $kriteriaKKE->kodeKKE }}" type="radio" value="Y">
                <label class="form-check-label" for="{{ $kriteriaKKE->kodeKriteriaKKE }}1">
                  Y
                </label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" name="t2{{ $kriteriaKKE->kodeKKE }}" id="t2{{ $kriteriaKKE->kodeKKE }}" type="radio" value="T">
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

<div class="border border-secondary-subtle mb-3">
  <div class="border-bottom border-black bg-white p-3">
    <h5>Sasaran 1 dari Tujuan 2</h5>
  </div>
  <div class="border border-1 p-3 bg-body-tertiary">
    @foreach ($kriteriaKKEs as $kriteriaKKE)
      <div class="border-bottom">
        @if($kriteriaKKE->sasaran == 1)
          <label class="col-auto col-form-label">{{ $kriteriaKKE->kriteria }}</label>
          @if($kriteriaKKE->nilaiPerIKU == "Y/T")
            <div class="col-auto mb-2">
              <div class="form-check form-check-inline">
                <input class="form-check-input" name="s1t2{{ $kriteriaKKE->kodeKKE }}" id="s1t2{{ $kriteriaKKE->kodeKKE }}" type="radio" value="Y">
                <label class="form-check-label" for="{{ $kriteriaKKE->kodeKriteriaKKE }}1">
                  Y
                </label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" name="s1t2{{ $kriteriaKKE->kodeKKE }}" id="s1t2{{ $kriteriaKKE->kodeKKE }}" type="radio" value="T">
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

<div class="border border-secondary-subtle mb-3">
  <div class="border-bottom border-black bg-white p-3">
    <h5>Indikator 1 dari Sasaran 1 dari Tujuan 2</h5>
  </div>
  <div class="border border-1 p-3 bg-body-tertiary">
    @foreach ($kriteriaKKEs as $kriteriaKKE)
      <div class="border-bottom">
        @if($kriteriaKKE->indikator == 1)
          <label class="col-auto col-form-label">{{ $kriteriaKKE->kriteria }}</label>
          @if($kriteriaKKE->nilaiPerIKU == "Y/T")
            <div class="col-auto mb-2">
              <div class="form-check form-check-inline">
                <input class="form-check-input" name="i1s1t2{{ $kriteriaKKE->kodeKKE }}" id="i1s1t2{{ $kriteriaKKE->kodeKKE }}" type="radio" value="Y">
                <label class="form-check-label" for="{{ $kriteriaKKE->kodeKriteriaKKE }}1">
                  Y
                </label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" name="i1s1t2{{ $kriteriaKKE->kodeKKE }}" id="i1s1t2{{ $kriteriaKKE->kodeKKE }}" type="radio" value="T">
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

<div class="border border-secondary-subtle mb-3">
  <div class="border-bottom border-black bg-white p-3">
    <h5>Indikator 2 dari Sasaran 1 dari Tujuan 2</h5>
  </div>
  <div class="border border-1 p-3 bg-body-tertiary">
    @foreach ($kriteriaKKEs as $kriteriaKKE)
      <div class="border-bottom">
        @if($kriteriaKKE->indikator == 1)
          <label class="col-auto col-form-label">{{ $kriteriaKKE->kriteria }}</label>
          @if($kriteriaKKE->nilaiPerIKU == "Y/T")
            <div class="col-auto mb-2">
              <div class="form-check form-check-inline">
                <input class="form-check-input" name="i2s1t2{{ $kriteriaKKE->kodeKKE }}" id="i2s1t2{{ $kriteriaKKE->kodeKKE }}" type="radio" value="Y">
                <label class="form-check-label" for="{{ $kriteriaKKE->kodeKriteriaKKE }}1">
                  Y
                </label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" name="i2s1t2{{ $kriteriaKKE->kodeKKE }}" id="i2s1t2{{ $kriteriaKKE->kodeKKE }}" type="radio" value="T">
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

<div class="border border-secondary-subtle mb-3">
  <div class="border-bottom border-black bg-white p-3">
    <h5>Sasaran 2 dari Tujuan 2</h5>
  </div>
  <div class="border border-1 p-3 bg-body-tertiary">
    @foreach ($kriteriaKKEs as $kriteriaKKE)
      <div class="border-bottom">
        @if($kriteriaKKE->sasaran == 1)
          <label class="col-auto col-form-label">{{ $kriteriaKKE->kriteria }}</label>
          @if($kriteriaKKE->nilaiPerIKU == "Y/T")
            <div class="col-auto mb-2">
              <div class="form-check form-check-inline">
                <input class="form-check-input" name="s2t2{{ $kriteriaKKE->kodeKKE }}" id="s2t2{{ $kriteriaKKE->kodeKKE }}" type="radio" value="Y">
                <label class="form-check-label" for="{{ $kriteriaKKE->kodeKriteriaKKE }}1">
                  Y
                </label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" name="s2t2{{ $kriteriaKKE->kodeKKE }}" id="s2t2{{ $kriteriaKKE->kodeKKE }}" type="radio" value="T">
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

<div class="border border-secondary-subtle mb-3">
  <div class="border-bottom border-black bg-white p-3">
    <h5>Indikator 1 dari Sasaran 2 dari Tujuan 2</h5>
  </div>
  <div class="border border-1 p-3 bg-body-tertiary">
    @foreach ($kriteriaKKEs as $kriteriaKKE)
      <div class="border-bottom">
        @if($kriteriaKKE->indikator == 1)
          <label class="col-auto col-form-label">{{ $kriteriaKKE->kriteria }}</label>
          @if($kriteriaKKE->nilaiPerIKU == "Y/T")
            <div class="col-auto mb-2">
              <div class="form-check form-check-inline">
                <input class="form-check-input" name="i1s2t1{{ $kriteriaKKE->kodeKKE }}" id="i1s2t1{{ $kriteriaKKE->kodeKKE }}" type="radio" value="Y">
                <label class="form-check-label" for="{{ $kriteriaKKE->kodeKriteriaKKE }}1">
                  Y
                </label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" name="i1s2t1{{ $kriteriaKKE->kodeKKE }}" id="i1s2t1{{ $kriteriaKKE->kodeKKE }}" type="radio" value="T">
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

<div class="border border-secondary-subtle mb-3">
  <div class="border-bottom border-black bg-white p-3">
    <h5>Indikator 2 dari Sasaran 2 dari Tujuan 2</h5>
  </div>
  <div class="border border-1 p-3 bg-body-tertiary">
    @foreach ($kriteriaKKEs as $kriteriaKKE)
      <div class="border-bottom">
        @if($kriteriaKKE->indikator == 1)
          <label class="col-auto col-form-label">{{ $kriteriaKKE->kriteria }}</label>
          @if($kriteriaKKE->nilaiPerIKU == "Y/T")
            <div class="col-auto mb-2">
              <div class="form-check form-check-inline">
                <input class="form-check-input" name="i2s2t2{{ $kriteriaKKE->kodeKKE }}" id="i2s2t2{{ $kriteriaKKE->kodeKKE }}" type="radio" value="Y">
                <label class="form-check-label" for="{{ $kriteriaKKE->kodeKriteriaKKE }}1">
                  Y
                </label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" name="i2s2t2{{ $kriteriaKKE->kodeKKE }}" id="i2s2t2{{ $kriteriaKKE->kodeKKE }}" type="radio" value="T">
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

<div class="d-flex mb-3 justify-content-end">
  <a href="/kke" class="btn btn-secondary mx-3">Kembali</a>
</div>

@endsection