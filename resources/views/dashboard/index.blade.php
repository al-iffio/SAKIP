@extends('layouts.main')

@section('container')

<div class="container mt-3">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb border-bottom border-dark">
        <li class="breadcrumb-item active" style="color:black;" aria-current="page"><h4>Dashboard</h4></li>
      </ol>
    </nav>
  </div>

<div class="row pt-3">
  @if((auth()->user()->role!="BPS Provinsi") && (auth()->user()->role!="BPS Kab/Kota") && (auth()->user()->role!="Unit Kerja Pusat") && (auth()->user()->role!="Kepala Unit Kerja BPS Provinsi") && (auth()->user()->role!="Kepala Unit Kerja BPS Kab/Kota"))
    <div class="col-sm-3 mb-3 mb-sm-0 py-2">
      <div class="card">
        <a href="/dashboard/monitoringEvaluasi/progressAT" class="btn btn-dark" style="background-color:#B4923D; color:black">
            <div class="card-body">
              <h5 class="text-center my-4">Monitoring Evaluasi</h4>
            </div>
        </a>
      </div>
    </div>
    <div class="col-sm-3 mb-3 mb-sm-0 py-2">
        <div class="card">
          <a href="/dashboard/monitoringEvaluasiTL/progressAT" class="btn btn-dark" style="background-color:#B4923D; color:black">
              <div class="card-body">
                <h5 class="text-center my-4">Monitoring Evaluasi TL</h4>
              </div>
          </a>
        </div>
    </div>
  @endif
    <div class="col-sm-3 mb-3 mb-sm-0 py-2">
        <div class="card">
          <a href="/dashboard/monitoringTLUnitKerja" class="btn btn-dark" style="background-color:#B4923D; color:black">
              <div class="card-body">
                <h5 class="text-center my-4">Monitoring TL Unit Kerja</h4>
              </div>
          </a>
        </div>
    </div>
  @if((auth()->user()->role!="BPS Provinsi") && (auth()->user()->role!="BPS Kab/Kota") && (auth()->user()->role!="Unit Kerja Pusat") && (auth()->user()->role!="Kepala Unit Kerja BPS Provinsi") && (auth()->user()->role!="Kepala Unit Kerja BPS Kab/Kota"))
    <div class="col-sm-3 mb-3 mb-sm-0 py-2">
        <div class="card">
          <a href="/dashboard/monitoringPanelisasi" class="btn btn-dark" style="background-color:#B4923D; color:black">
              <div class="card-body">
                <h5 class="text-center my-4">Monitoring Panelisasi</h5>
              </div>
          </a>
        </div>
    </div>
  @endif
    <div class="col-sm-3 mb-3 mb-sm-0 py-2">
        <div class="card">
          <a href="/dashboard/hasilDEdanMonevTL" class="btn btn-dark" style="background-color:#B4923D; color:black">
              <div class="card-body">
                <h5 class="text-center my-4">Hasil DE dan Monev TL</h4>
              </div>
          </a>
        </div>
    </div>
  @if((auth()->user()->role!="BPS Provinsi") && (auth()->user()->role!="BPS Kab/Kota") && (auth()->user()->role!="Unit Kerja Pusat") && (auth()->user()->role!="Kepala Unit Kerja BPS Provinsi") && (auth()->user()->role!="Kepala Unit Kerja BPS Kab/Kota"))
    <div class="col-sm-3 mb-3 mb-sm-0 py-2">
      <div class="card">
        <a href="/dashboard/monitoringLHE" class="btn btn-dark" style="background-color:#B4923D; color:black">
            <div class="card-body mt-2 mb-3">
              <h5 class="text-center my-4">Monitoring LHE</h4>
            </div>
        </a>
      </div>
    </div>
    @if(auth()->user()->role!="Anggota Tim")
      <div class="col-sm-3 mb-3 mb-sm-0 py-2">
        <div class="card">
          <a href="/dashboard/seluruhNilaiPanelisasi" class="btn btn-dark" style="background-color:#B4923D; color:black">
              <div class="card-body">
                <h5 class="text-center my-4">Seluruh Nilai Panelisasi</h4>
              </div>
          </a>
        </div>
      </div>  
      <div class="col-sm-3 mb-3 mb-sm-0 py-2">
        <div class="card">
          <a href="/dashboard/hasilPanelisasi" class="btn btn-dark" style="background-color:#B4923D; color:black">
              <div class="card-body">
                <h5 class="text-center my-4">Hasil Akhir Panelisasi</h5>
              </div>
          </a>
        </div>
      </div> 
    @endif
  @endif 
</div>

@endsection