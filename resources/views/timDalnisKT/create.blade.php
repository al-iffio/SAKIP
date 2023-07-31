@extends('layouts.main')

@section('container')
<div class="container mt-3">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb border-bottom border-dark">
        <li class="breadcrumb-item"><a href="/timDalnisKT" style="text-decoration:none; color:black"
            onclick="return confirm('Batal menambah tim?')"><h4>Pembagian Tim</h4></a></li>
        <li class="breadcrumb active mt-1" aria-current="page"><h5 class="d-inline" style="text-decoration:none; color:black">&nbsp/ Tambah Data</h5></li>
      </ol>
    </nav>
</div>

<div class="bg-white px-3 pt-1 pb-3 mb-3">
    <!-- Tabel Tim -->
    <div class="table-responsive mt-3">
        <form action="/timDalnisKT" method="post">
        <table class="table table-striped table-sm table-bordered" style="border-color: #a59e8c">
            <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Pengendali Teknis</th>
                <th scope="col">Nama Ketua Tim</th>
            </tr>
            </thead>
            <tbody>
                @csrf
                    @php for ($i = 1; $i <= $jumlahInputs; $i++) : @endphp
                    <tr>
                        <td>{{ $i }}</td>
                        <td>
                            <select class="form-select" name="dalnis_id[]" id="dalnis_id[]" required>
                                <option selected disabled>Pilih Nama Pengendali Teknis</option>
                                @foreach ( $dalniss as $dalnis )
                                    @if(old('dalnis_id') == $dalnis->id)
                                        <option value="{{ $dalnis->id }}" selected>{{ $dalnis->namaPegawai }}</option>
                                    @else
                                        <option value="{{ $dalnis->id }}">{{ $dalnis->namaPegawai }}</option>
                                    @endif  
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <select class="form-select" name="kt_id[]" id="kt_id[]" required>
                                <option selected disabled>Pilih Nama Ketua Tim</option>
                                @foreach ( $KTs as $kt )
                                    @if(old('kt_id') == $kt->id)
                                        <option value="{{ $kt->id }}" selected>{{ $kt->namaPegawai }}</option>
                                    @else
                                        <option value="{{ $kt->id }}">{{ $kt->namaPegawai }}</option>
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
            <a href="/timDalnisKT" class="btn btn-secondary mx-3" onclick="return confirm('Batal menambah data tim?')">Batal</a>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </div>
</div>

@endsection