@extends('layouts.app_guest')

@section('content')

<div class="container mt-6 mb-7">
    <div class="row justify-content-center">
        <div class="col-lg-12 col-xl-7">
            <div class="card">
                <div class="card-body p-5">
                    <h2>
                        BANK SAMPAH
                    </h2>
                    <p class="fs-sm">
                        Berikut hasil perhitungan harga sampah anda:
                    </p>

                    <div class="border-top border-gray-200 pt-4 mt-4">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="text-muted mb-2">Jenis Sampah</div>
                                <div class=""><b>{{$nama_jenis}}</b></div>
                            </div>
                            <div class="col-md-4 text-md-end">
                                <div class="text-muted mb-2">Harga Per KG</div>
                                <div class=""><b>Rp. {{number_format($harga)}}</b></div>
                            </div>
                            <div class="col-md-4 text-md-end">
                                <div class="text-muted mb-2">Qty (KG)</div>
                                <div class=""><b>x {{$berat}}</b></div>
                            </div>
                        </div>
                    </div>

                    <table class="table border-bottom border-gray-200 mt-3">
                        <thead>
                            <tr>
                                <th scope="col" class="fs-sm text-dark text-uppercase-bold-sm px-0"></th>
                                <th scope="col" class="fs-sm text-dark text-uppercase-bold-sm text-end px-0"></th>
                            </tr>
                        </thead>

                    </table>

                    <div class="mt-5">

                        <div class="d-flex justify-content-end mt-3">
                            <h5 class="me-3">Total Harga:</h5>
                            <h5 class="text-success">Rp. {{number_format($hasilhitung)}}</h5>
                        </div>
                    </div>
                </div><br>


            </div>
        </div>
    </div>
</div><br>
<div class="text-center"><a href="{{ route('hitungsampah.index') }}" class="btn btn-sm btn-success">
        Hitung Ulang
    </a></div>


@endsection