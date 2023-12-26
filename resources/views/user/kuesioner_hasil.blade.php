@extends('layouts.user')
@section('content')
    <main id="main" style="margin-top: 3rem">

        <section id="testimonials" class="testimonials section-bg">
            <div class="container">

                <div class="section-title" data-aos="fade-up">
                    <h2>Hasil Kuesioner</h2>
                    <p></p>
                </div>
                @foreach ($data as $key => $value)
                    <div class="card mb-4">
                        <div class="card-header bg-primary">
                            <h4 class="text-white"><b>Diagram Hasil Kuesioner {{ $value['judul'] }}</b></h4>
                        </div>
                        <div class="card-body row">
                            <div class="col-md-12">
                                <div class="row">
                                    @foreach ($value['pertanyaan'] as $ke => $va)
                                        @if ($va['jenis'] == 'pilihan' || $va['jenis'] == 'number' || $va['jenis'] == 'checkbox')
                                            <div class="col-md-3 mx-auto mb-3">
                                                <div class="card h-100">
                                                    <div class="card-header h-100">
                                                        <h6>{{ $va['pertanyaan'] }}</h6>
                                                    </div>
                                                    <div class="card-body">
                                                        <canvas id="myChart{{ $key }}{{ $ke }}"
                                                            style="height: 120px"></canvas>
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                            <div class="col-md-3 mx-auto mb-3">
                                                <div class="card h-100">
                                                    <div class="card-header h-100">
                                                        <h6>{{ $va['pertanyaan'] }}</h6>
                                                    </div>
                                                    <div class="card-body">
                                                        <button type="button" class="btn btn-primary w-100"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#detail-{{ $key }}-{{ $ke }}">
                                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                                            Lihat Hasil
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal fade" id="detail-{{ $key }}-{{ $ke }}"
                                                tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">
                                                                {{ $va['pertanyaan'] }}</h5>
                                                        </div>
                                                        <div class="modal-body">
                                                            <table class="table">
                                                                <thead>
                                                                    <tr>
                                                                        <th>No</th>
                                                                        <th>Jawaban</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach ($va['jawaban'] as $k => $v)
                                                                        <tr>
                                                                            <td>{{ $k + 1 }}</td>
                                                                            <td>
                                                                                @if ($va['jenis'] == 'essai')
                                                                                    {{ $v }}
                                                                                @else
                                                                                    <a
                                                                                        href="{{ asset('files/' . $v) }}">{{ $v }}</a>
                                                                                @endif
                                                                            </td>
                                                                        </tr>
                                                                    @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                {{-- <div class="card">
                    <div class="card-header bg-primary">
                        <h2 class="text-white"><b>Tabel Keselarasan</b></h2>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th rowspan="2">Program studi</th>
                                    <th colspan="2">Selaras</th>
                                    <th colspan="2">Tidak Selaras</th>
                                </tr>
                                <tr>
                                    <th>jumlah</th>
                                    <th>%</th>
                                    <th>jumlah</th>
                                    <th>%</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data['jawaban'] as $program_studi => $value)
                                    <tr>
                                        <td>{{ $program_studi }}</td>
                                        <td>{{ $value['ya'] }}</td>
                                        <td>{{ $value['ya'] + $value['tidak'] > 0 ? number_format(($value['ya'] / ($value['ya'] + $value['tidak'])) * 100, 2) : 0 }}
                                        </td>
                                        <td>{{ $value['tidak'] }}</td>
                                        <td>{{ $value['ya'] + $value['tidak'] > 0 ? number_format(($value['tidak'] / ($value['ya'] + $value['tidak'])) * 100, 2) : 0 }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div> --}}

            </div>
        </section><!-- End Testimonials Section -->

    </main>
@endsection
@section('script')
    {{-- <script>
        var labels = @json(array_keys($data['semua']));
        var dataValues = @json(array_values($data['semua']))

        // Create a pie chart using Chart.js
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'pie', // Change this to 'doughnut' for a doughnut chart
            data: {
                labels: labels,
                datasets: [{
                    data: dataValues,
                    backgroundColor: ['rgba(75, 192, 192, 0.5)', 'rgba(255, 99, 132, 0.5)'],
                    borderColor: ['rgba(75, 192, 192, 1)', 'rgba(255, 99, 132, 1)'],
                    borderWidth: 1
                }]
            },
        });
    </script> --}}
    @foreach ($data as $key => $value)
        @foreach ($value['pertanyaan'] as $ke => $va)
            @if ($va['jenis'] == 'pilihan')
                <script>
                    document.addEventListener("DOMContentLoaded", function() {
                        var ctx = document.getElementById('myChart{{ $key }}{{ $ke }}').getContext('2d');
                        var data = {
                            labels: @json(array_keys($va['jawaban'])), // Labels berisi nama program studi
                            datasets: [{
                                label: 'Jumlah Alumni',
                                data: @json(array_values($va['jawaban'])), // Data berisi jumlah alumni per program studi
                                backgroundColor: generateRandomColorArray({{ count($va['jawaban']) }}),
                                borderColor: 'rgba(75, 192, 192, 1)',
                                borderWidth: 1
                            }]
                        };
                        var options = {
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        };
                        var myChart = new Chart(ctx, {
                            type: 'pie',
                            data: data,
                            options: options
                        });
                    });

                    function generateRandomColorArray(length) {
                        var colors = [];
                        for (var i = 0; i < length; i++) {
                            var color = 'rgba(' + Math.floor(Math.random() * 256) + ',' +
                                Math.floor(Math.random() * 256) + ',' +
                                Math.floor(Math.random() * 256) + ', 0.8)';
                            colors.push(color);
                        }
                        return colors;
                    }
                </script>
            @elseif($va['jenis'] == 'number')
                <script>
                    document.addEventListener("DOMContentLoaded", function() {
                        var ctx = document.getElementById('myChart{{ $key }}{{ $ke }}').getContext('2d');
                        var data = {
                            labels: @json(array_keys($va['jawaban'])), // Labels berisi nama program studi
                            datasets: [{
                                label: 'Jumlah Alumni',
                                data: @json(array_values($va['jawaban'])), // Data berisi jumlah alumni per program studi
                                backgroundColor: generateRandomColorArray({{ count($va['jawaban']) }}),
                                borderColor: 'rgba(75, 192, 192, 1)',
                                borderWidth: 1
                            }]
                        };
                        var options = {
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        };
                        var myChart = new Chart(ctx, {
                            type: 'bar',
                            data: data,
                            options: options
                        });
                    });

                    function generateRandomColorArray(length) {
                        var colors = [];
                        for (var i = 0; i < length; i++) {
                            var color = 'rgba(' + Math.floor(Math.random() * 256) + ',' +
                                Math.floor(Math.random() * 256) + ',' +
                                Math.floor(Math.random() * 256) + ', 0.8)';
                            colors.push(color);
                        }
                        return colors;
                    }
                </script>
            @elseif($va['jenis'] == 'checkbox')
                <script>
                    document.addEventListener("DOMContentLoaded", function() {
                        var ctx = document.getElementById('myChart{{ $key }}{{ $ke }}').getContext('2d');
                        var rawData = @json($va['jawaban']);
                        console.log(rawData);
                        var data = rawData.map(function(item) {
                            return JSON.parse(item);
                        });
                        console.log(data);
                        var countedData = countOccurrences(data);
                        var labels = Object.keys(countedData);
                        var values = Object.values(countedData);


                        var data = {
                            labels: labels, // Labels berisi nama program studi
                            datasets: [{
                                label: 'Jumlah Pilih',
                                data: values, // Data berisi jumlah alumni per program studi
                                backgroundColor: generateRandomColorArray(countedData),
                                borderColor: 'rgba(75, 192, 192, 1)',
                                borderWidth: 1
                            }]
                        };
                        var options = {
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        };
                        var myChart = new Chart(ctx, {
                            type: 'radar',
                            data: data,
                            options: options
                        });
                    });

                    function countOccurrences(arr) {
                        var counts = {};
                        arr.forEach(function(item) {
                            item.forEach(function(innerItem) {
                                counts[innerItem] = (counts[innerItem] || 0) + 1;
                            });
                        });
                        return counts;
                    }

                    function generateRandomColorArray(length) {
                        var colors = [];
                        for (var i = 0; i < length; i++) {
                            var color = 'rgba(' + Math.floor(Math.random() * 256) + ',' +
                                Math.floor(Math.random() * 256) + ',' +
                                Math.floor(Math.random() * 256) + ', 0.8)';
                            colors.push(color);
                        }
                        return colors;
                    }
                </script>
            @endif
        @endforeach
    @endforeach
@endsection
