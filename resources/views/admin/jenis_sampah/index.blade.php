@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @include('layouts/_flash')
                <div class="card">
                    <div class="card-header">
                        Data Jenis Sampah
                        <a href="{{ route('jenissampah.create') }}" class="btn btn-sm btn-primary" style="float: right">
                            Tambah Data
                        </a>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table align-middle" id="dataTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Deskripsi</th>
                                        <th>Foto</th>
                                        <th>Harga / KG</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no = 1; @endphp
                                    @foreach ($jenissampah as $data)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $data->nama }}</td>
                                            <td>{{ $data->deskripsi }}</td>
                                            <td><img class="" src="{{ asset('images/' . $data->foto) }}" alt="" width="200px"/></td>
                                            <td>Rp. {{number_format($data->harga)}}</td>
                                            <td>
                                                <form action="{{ route('jenissampah.destroy', $data->id) }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <a href="{{ route('jenissampah.edit', $data->id) }}"
                                                        class="btn btn-sm btn-secondary">
                                                        Ubah
                                                    </a> |
                                                    <button type="submit" class="btn btn-sm btn-danger"
                                                        onclick="return confirm('Apakah Anda Yakin?')">Hapus
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection