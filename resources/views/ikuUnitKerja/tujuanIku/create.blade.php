@extends('layouts.main')

@section('container')
<div class="container mt-3">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb border-bottom border-dark">
        <li class="breadcrumb-item"><a href="/ikuUnitKerja" style="text-decoration:none; color:black"
            onclick="return confirm('Batal menambah tujuan IKU?')"><h4>Pengaturan IKU</h4></a></li>
        <li class="breadcrumb active mt-1" aria-current="page"><a href="/ikuUnitKerja/{{ $namaUnitKerja }}" style="text-decoration:none; color:black"
            onclick="return confirm('Batal menambah tujuan IKU?')"><h5>&nbsp/ {{ $namaUnitKerja }}</h5></a></li>
        <li class="breadcrumb active mt-1" aria-current="page"><h5 class="d-inline" style="text-decoration:none; color:black">&nbsp/ Tambah Tujuan</h5></li>
      </ol>
    </nav>
</div>

<div class="bg-white px-3 pt-1 pb-3 mb-3">
    <!-- Tabel Tujuan IKU -->
    <div class="table-responsive mt-3">
        <form action="/ikuUnitKerja/tujuanIku" method="post">
        <table class="table table-striped table-sm table-bordered" style="border-color: #a59e8c">
            <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Kode Tujuan</th>
                <th scope="col">Tujuan</th>
            </tr>
            </thead>
            <tbody>
                @csrf
                    @php for ($i = 1; $i <= $jumlahInputs; $i++) : @endphp
                    <tr>
                        <td>{{ $i }}
                            <input type="hidden" class="form-control" name="namaUnitKerja" id="namaUnitKerja" value="{{ $namaUnitKerja }}" required>   
                        </td>
                        <td><input type="hidden" class="form-control" name="ikuUnitKerja_id[]" id="ikuUnitKerja_id[]" value="{{ $idIKU }}" required>
                            <input type="text" class="form-control" name="kodeTujuan[]" id="kodeTujuan[]" value="{{ old('kodeTujuan[]') }}" required>
                        </td>
                        <td><input type="text" class="form-control @error('tujuan') is-invalid @enderror"
                            name="tujuan[]" id="tujuan[]" value="{{ old('tujuan[]') }}" required>
                            {{-- @error('tujuan')
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
            <a href="/ikuUnitKerja/{{ $namaUnitKerja }}" class="btn btn-secondary mx-3" onclick="return confirm('Batal menambah tujuan IKU?')">Batal</a>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </div>
</div>

@endsection