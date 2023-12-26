@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold">Jumlah Alumni</p>
                                <h5 class="font-weight-bolder mb-0">
                                    {{ app\Models\User::where('role', 1)->count() }}
                                    <span class="text-success text-sm font-weight-bolder"></span>
                                </h5>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold">Jumlah Berita</p>
                                <h5 class="font-weight-bolder mb-0">
                                    {{ $berita }}
                                    <span class="text-success text-sm font-weight-bolder"></span>
                                </h5>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold">Jumlah Kuesioner</p>
                                <h5 class="font-weight-bolder mb-0">
                                    {{ $kuesioner }}
                                    <span class="text-success text-sm font-weight-bolder"></span>
                                </h5>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        @foreach ($data as $key => $value)
            <div class="col-xl-3 mb-4">
                <div class="card h-100">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-7">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Persentase Terjawab</p>
                                    <h6 class="font-weight-bolder mb-0">
                                        {{ $key }}
                                    </h6>
                                </div>
                            </div>
                            <div class="col-5 text-end ">
                                @php
                                    $roundedPersentase = round($value['persentase']);
                                    $class = 'text-success';

                                    if ($roundedPersentase < 60) {
                                        $class = 'text-warning';
                                    }

                                    if ($roundedPersentase < 40) {
                                        $class = 'text-danger';
                                    }
                                @endphp

                                <h3 class="{{ $class }}">{{ $roundedPersentase }}%</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
