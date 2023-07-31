@extends('layouts.main')

@section('container')
<div class="container mt-3">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb border-bottom border-dark">
        <li class="breadcrumb-item"><a href="/repository/materi" style="text-decoration:none; color:black"
            onclick="return confirm('Batal menambah Dokumen Materi?')"><h4>Repository</h4></a></li>
        <li class="breadcrumb active mt-1" aria-current="page"><h5 class="d-inline" style="text-decoration:none; color:black">&nbsp/ Tambah Materi</h5></li>
      </ol>
    </nav>
</div>

<div class="bg-white px-3 pt-1 pb-3 mb-3">
    <!-- Tabel Materi -->
    <div class="table-responsive mt-3">
        <form action="/repository/materi" method="post">
        <table class="table table-striped table-sm table-bordered" style="border-color: #a59e8c">
            <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Dokumen Materi</th>
                <th scope="col">Link Dokumen Materi</th>
            </tr>
            </thead>
            <tbody>
                @csrf
                    @php for ($i = 1; $i <= $jumlahInputs; $i++) : @endphp
                    <tr>
                        <td>{{ $i }}  
                        </td>
                        <td>
                            <input type="text" class="form-control" name="dokumenMateri[]" id="dokumenMateri[]" value="{{ old('dokumenMateri[]') }}" required>
                        </td>
                        <td>
                            <input type="text" class="form-control" name="link[]" id="link[]" value="{{ old('link[]') }}" required>
                        </td>
                    </tr>
                    @php endfor; @endphp
                </form>
            </tbody>
        </table>
        <div class="modal-footer">
            <a href="/repository/materi" class="btn btn-secondary mx-3" onclick="return confirm('Batal menambah Dokumen Materi?')">Batal</a>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </div>
</div>

@endsection