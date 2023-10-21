@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @include('layouts/_flash')
                <div class="card">
                    <div class="card-header">
                        Data Jenis Sampah
                    </div>
                    <div class="card-body">
                        <form action="{{ route('jenissampah.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Nama Jenis Sampah</label>
                                <input type="text" class="form-control  @error('nama') is-invalid @enderror"
                                    name="nama" required>
                                @error('nama')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Deskripsi</label>
                                <input type="text" class="form-control  @error('deskripsi') is-invalid @enderror"
                                    name="deskripsi" required>
                                @error('deskripsi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        
                            <div class="mb-3">
                                <label class="form-label">Foto</label>
                                <input type="file" accept="image/*" class="form-control  @error('foto') is-invalid @enderror"
                                    name="foto" required>
                                @error('foto')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Harga / KG</label>
                                <input type="number" class="form-control  @error('harga') is-invalid @enderror"
                                    name="harga" required>
                                @error('harga')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <div class="d-grid gap-2">
                                    <button class="btn btn-primary" type="submit">Simpan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection