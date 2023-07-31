@extends('layouts.main')

@section('container')
<div class="container mt-3">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb border-bottom border-dark">
        <li class="breadcrumb-item"><a href="/timDalnisKT" style="text-decoration:none; color:black"
            onclick="return confirm('Batal menambah tim?')"><h4>Pembagian Tim</h4></a></li>
        <li class="breadcrumb active mt-1" aria-current="page"><a href="/timDalnisKT/{{ $id }}/edit" style="text-decoration:none; color:black"
            onclick="return confirm('Batal menambah tim?')"><h5>&nbsp/ Ubah Tim Dalnis KT</h5></a></li>
        <li class="breadcrumb active mt-1" aria-current="page"><h5 class="d-inline" style="text-decoration:none; color:black">&nbsp/ Tambah Data</h5></li>
      </ol>
    </nav>
</div>

<div class="bg-white px-3 pt-1 pb-3 mb-3">
    <!-- Tabel Tim -->
    <div class="table-responsive mt-3">
        <form action="/timDalnisKT/timATSatker" method="post">
        <table class="table table-striped table-sm table-bordered" style="border-color: #a59e8c">
            <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Anggota Tim</th>
                <th scope="col">Nama Unit Kerja</th>
            </tr>
            </thead>
            <tbody>
                @csrf
                    @php for ($i = 1; $i <= $jumlahInputs; $i++) : @endphp
                    <tr>
                        <td>
                            {{ $i }}
                            <input type="hidden" class="form-control" name="timDalnisKT_id[]" id="timDalnisKT_id[]" value="{{ $id }}" required>
                        </td>
                        <td>
                            <select class="form-select" name="at_id[]" id="at_id[]" required>
                                <option selected disabled>Pilih Nama Anggota Tim</option>
                                @foreach ( $ATs as $at )
                                    @if(old('at_id') == $at->id)
                                        <option value="{{ $at->id }}" selected>{{ $at->namaPegawai }}</option>
                                    @else
                                        <option value="{{ $at->id }}">{{ $at->namaPegawai }}</option>
                                    @endif  
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <select class="form-select" name="unitKerja_id[]" id="unitKerja_id[]" required>
                                <option selected disabled>Pilih Nama Unit Kerja</option>
                                @foreach ( $unitKerjas as $unitKerja )
                                    @if(old('unitKerja_id') == $unitKerja->id)
                                        <option value="{{ $unitKerja->id }}" selected>{{ $unitKerja->namaUnitKerja }}</option>
                                    @else
                                        <option value="{{ $unitKerja->id }}">{{ $unitKerja->namaUnitKerja }}</option>
                                    @endif  
                                @endforeach
                            </select>
                        </td>
                    </tr>
                    @php endfor; @endphp
                </form>
            </tbody>
        </table>
        <div class="modal-footer">
            <a href="/timDalnisKT/{{ $id }}/edit" class="btn btn-secondary mx-3" onclick="return confirm('Batal menambah data tim?')">Batal</a>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </div>
</div>

@endsection