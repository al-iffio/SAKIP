@extends('layouts.main')

@section('container')
<div class="container mt-3">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb border-bottom border-dark">
        <li class="breadcrumb-item"><a href="/dokumenTL" style="text-decoration:none; color:black"
            onclick="return confirm('Batal mengubah dokumen tindak lanjut?')"><h4>Tindak Lanjut</h4></a></li>
        <li class="breadcrumb active mt-1" aria-current="page"><a href="/dokumenTL/{{ $id }}/edit" style="text-decoration:none; color:black"
            onclick="return confirm('Batal menambah kriteria tindak lanjut?')"><h5>&nbsp/ Ubah Dokumen TL</h5></a></li>
        <li class="breadcrumb active mt-1" aria-current="page"><h5 class="d-inline" style="text-decoration:none; color:black">&nbsp/ Tambah Kriteria TL</h5></li>
      </ol>
    </nav>
</div>

<div class="bg-white px-3 pt-1 pb-3 mb-3">
    <!-- Tabel Kriteria TL -->
    <div class="table-responsive mt-3">
        <form action="/dokumenTL/kriteriaTL" method="post">
        <table class="table table-striped table-sm table-bordered" style="border-color: #a59e8c">
            <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Kriteria Tindak Lanjut</th>
            </tr>
            </thead>
            <tbody>
                @csrf
                    @php for ($i = 1; $i <= $jumlahInputs; $i++) : @endphp
                    <tr>
                        <td>{{ $i }}
                            <input type="hidden" class="form-control" name="dokumenTL_id[]" id="dokumenTL_id[]" value="{{ $id }}" required>   
                        </td>
                        <td>
                            <select class="form-select" name="kriteriaLKE_id[]" id="kriteriaLKE_id[]" required>
                                <option selected disabled>Pilih Kriteria Tindak Lanjut</option>
                                @foreach ( $kriteriaLKEs as $kriteriaLKE )
                                    @if(old('kriteriaLKE_id') == $kriteriaLKE->id)
                                        <option value="{{ $kriteriaLKE->id }}" selected>{{ $kriteriaLKE->kodeKriteriaLKE }}. {{ $kriteriaLKE->namaKriteria }}</option>
                                    @else
                                        <option value="{{ $kriteriaLKE->id }}">{{ $kriteriaLKE->kodeKriteriaLKE }}. {{ $kriteriaLKE->namaKriteria }}</option>
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
            <a href="/dokumenTL/{{ $id }}/edit" class="btn btn-secondary mx-3" onclick="return confirm('Batal menambah kriteria tindak lanjut?')">Batal</a>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </div>
</div>

@endsection