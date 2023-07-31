@extends('layouts.main')

@section('container')
<div class="container mt-3">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb border-bottom border-dark">
        <li class="breadcrumb-item"><a href="/ikuUnitKerja" style="text-decoration:none; color:black"
            onclick="return confirm('Batal menambah indikator IKU?')"><h4>Pengaturan IKU</h4></a></li>
        <li class="breadcrumb active mt-1" aria-current="page"><a href="/ikuUnitKerja/{{ $namaUnitKerja }}" style="text-decoration:none; color:black"
            onclick="return confirm('Batal menambah indikator IKU?')"><h5>&nbsp/ {{ $namaUnitKerja }}</h5></a></li>
        <li class="breadcrumb active mt-1" aria-current="page"><h5 class="d-inline" style="text-decoration:none; color:black">&nbsp/ Tambah Indikator</h5></li>
      </ol>
    </nav>
</div>

<div class="bg-white px-3 pt-1 pb-3 mb-3">
    <!-- Tabel Indikator IKU -->
    <div class="table-responsive mt-3">
        <form action="/ikuUnitKerja/indikatorIku" method="post">
        <table class="table table-striped table-sm table-bordered" style="border-color: #a59e8c">
            <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Kode Sasaran</th>
                <th scope="col">Kode Indikator</th>
                <th scope="col">Indikator</th>
            </tr>
            </thead>
            <tbody>
                @csrf
                    @php for ($i = 1; $i <= $jumlahInputs; $i++) : @endphp
                    <tr>
                        <td>{{ $i }}
                            <input type="hidden" class="form-control" name="namaUnitKerja" id="namaUnitKerja" value="{{ $namaUnitKerja }}" required>   
                        </td>
                        <td>
                            <select class="form-select" name="sasaranIku_id[]" id="sasaranIku_id[]" required>
                                <option selected disabled>Pilih Kode Sasaran</option>
                                @foreach ( $sasaranIKUs as $sasaranIKU )
                                    @if(old('sasaranIku_id') == $sasaranIKU->id)
                                        <option value="{{ $sasaranIKU->id }}" selected>{{ $sasaranIKU->kodeSasaran }}</option>
                                    @else
                                        <option value="{{ $sasaranIKU->id }}">{{ $sasaranIKU->kodeSasaran }}</option>
                                    @endif  
                                @endforeach
                            </select>
                        </td>
                        <td><input type="hidden" class="form-control" name="ikuUnitKerja_id[]" id="ikuUnitKerja_id[]" value="{{ $idIKU }}" required>
                            <input type="text" class="form-control" name="kodeIndikator[]" id="kodeIndikator[]" value="{{ old('kodeIndikator[]') }}" placeholder="Isikan Kode Indikator" required>
                        </td>
                        <td><input type="text" class="form-control @error('indikator') is-invalid @enderror"
                            name="indikator[]" id="indikator[]" value="{{ old('indikator[]') }}" placeholder="Isikan Indikator" required>
                            {{-- @error('indikator')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror --}}
                        </td>
                    </tr>
                    @php endfor; @endphp
                </form>
            </tbody>
        </table>
        <div class="modal-footer">
            <a href="/ikuUnitKerja/{{ $namaUnitKerja }}" class="btn btn-secondary mx-3" onclick="return confirm('Batal menambah indikator IKU?')">Batal</a>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </div>
</div>

@endsection