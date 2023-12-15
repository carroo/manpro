@extends('layouts.user')
@section('content')
    <main id="main" style="margin-top: 3rem">

        <section id="testimonials" class="testimonials section-bg">
            <div class="container">

                <div class="section-title" data-aos="fade-up">
                    <h2>Alumni</h2>
                    <p>Data alumni PPG Unesa</p>
                </div>
                @foreach ($data as $key => $value)
                    <div class="card mb-4">
                        <div class="card-header bg-primary">
                            <h2 class="text-white"><b>Alumni Tahun {{ $key }}</b></h2>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 mx-auto">
                                    <canvas id="myChart{{ $key }}" style="height: 120px"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </section><!-- End Testimonials Section -->

    </main>
@endsection
@section('script')
    @foreach ($data as $key => $value)
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                var ctx = document.getElementById('myChart{{ $key }}').getContext('2d');
                var data = {
                    labels: @json(array_keys($value)), // Labels berisi nama program studi
                    datasets: [{
                        label: 'Jumlah Alumni',
                        data: @json(array_values($value)), // Data berisi jumlah alumni per program studi
                        backgroundColor: generateRandomColorArray({{ count($value) }}),
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
    @endforeach
@endsection
