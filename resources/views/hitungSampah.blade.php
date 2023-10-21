@extends('layouts.app_guest')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @include('layouts/_flash')
                <div class="card">
                    <div class="card-header">
                        Hitung Harga Sampah 
                    </div>
                    <div class="card-body">
                        <form action="{{ route('hitungsampah.store') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Jenis Sampah</label>
                                <select class="form-select @error('jenis_sampah') is-invalid @enderror" name="jenis_sampah" required>
                                    <option value="">Pilih Jenis Sampah</option>
                                    @foreach($jenissampah as $jenissampah)
                                    <option value="{{$jenissampah->id}}">{{$jenissampah->nama}}</option>
                                    @endforeach
                                </select>
                                @error('agama')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Jumlah Sampah (KG)</label>
                                <input type="number" min="1" class="form-control "
                                    name="kg" required>
                            </div>
                            <div class="mb-3">
                                <div class="d-grid gap-2">
                                    <button class="btn btn-primary" type="submit">Hitung Harga Sampah</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection