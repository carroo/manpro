@extends('layouts.user')
@section('content')
    <main id="main" style="margin-top: 3rem">

        <section id="testimonials" class="testimonials section-bg">
            <div class="container">

                <div class="section-title" data-aos="fade-up">
                    <h2>Hasil Kuesioner</h2>
                    <p></p>
                </div>
                <div class="card mb-4">
                    <div class="card-header bg-primary">
                        <h2 class="text-white"><b>Keselarasan Diagram</b></h2>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4 mx-auto">
                                <canvas id="myChart" width="200" height="200"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
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
                </div>

            </div>
        </section><!-- End Testimonials Section -->

    </main>
@endsection
@section('script')
    <script>
        // Your PHP data ($jawaban) goes herevar
        jawabanData = <?php echo json_encode($data['semua']); ?>;

        // Extract keys and values for the chart
        var labels = Object.keys(jawabanData);
        var dataValues = Object.values(jawabanData);

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
    </script>

    </body>

    </html>
@endsection
