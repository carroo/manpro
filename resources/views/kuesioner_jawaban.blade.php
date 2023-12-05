@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header bg-secondary">
                    <h3 class="card-title text-center text-white">Data kuesioner</h3>
                </div>
                <div class="card-body">
                    <h4 class="card-title text-center">{{ $kuesioner->judul }}</h4>
                    <hr class="border border-dark">
                    <div class="card-text">
                        {!! $kuesioner->deskripsi !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="row">
                @foreach ($kuesioner->pertanyaan as $k => $v)
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header bg-primary">

                            </div>

                            <h5 class="card-title m-3">{!! $v->pertanyaan !!}</h5>

                            <div class="card-body">
                                @if ($v->jenis == 'essai' || $v->jenis == 'number')
                                    <table class="table not">
                                        <thead>
                                            <tr>
                                                <th>no</th>
                                                <th>jawaban</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($v->jawaban as $ke => $va)
                                                <tr>
                                                    <td><?= $ke + 1 ?></td>
                                                    <td><?= $va->jawaban ?></td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                @elseif ($v->jenis == 'pilihan')
                                    <table class="table not">
                                        <thead>
                                            <tr>
                                                <th>Pilihan</th>
                                                <th>Jumlah Pilihan</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($v->jawaban->groupBy('jawaban') as $answer => $groupedAnswers)
                                                <tr>
                                                    <td>{{ $answer }}</td>
                                                    <td>{{ $groupedAnswers->count() }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                @elseif ($v->jenis == 'checkbox')
                                    <table class="table not">
                                        <thead>
                                            <tr>
                                                <th>no</th>
                                                <th>Jawaban Checkbox</th>
                                            </tr>

                                        </thead>
                                        <tbody>
                                            @foreach ($v->jawaban as $kee => $vee)
                                                <tr>
                                                    <td>{{ $kee + 1 }}</td>
                                                    <td>
                                                        @foreach (json_decode($vee->jawaban) as $option)
                                                            {{ $option }},
                                                        @endforeach
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                @elseif ($v->jenis == 'file')
                                    <table class="table not">
                                        <thead>
                                            <tr>
                                                <th>no</th>
                                                <th>Link File</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($v->jawaban as $kee => $vee)
                                                <tr>
                                                    <td>{{ $kee + 1 }}</td>
                                                    <td>
                                                       <a href="{{ asset('files/'.$vee->jawaban) }}">{{ $vee->jawaban }}</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                @endif

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            // Hide the "opsi" div on page load
            $("#opsi").hide();

            // Show/hide the "opsi" div based on the selected value
            $("select[name='jenis']").change(function() {
                var selectedTipe = $(this).val();
                if (selectedTipe === "pilihan" || selectedTipe === "checkbox") {
                    $("#opsi").show();
                } else {
                    $("#opsi").hide();
                }
            });

            // Add new input field when the plus icon is clicked
            $("#opsi").on("click", ".tambah", function() {
                var newInputField =
                    '<div class="row px-2"><div class="input-group"><input type="text" class="form-control" name="pilihan_jawaban[]"><div class="input-group-append kurang"><span class="input-group-text bg-danger h-100"><i class="fas fa-minus"></i></span></div></div></div>';
                $("#opsi").append(newInputField);
            });

            // Remove input field when the minus icon is clicked
            $("#opsi").on("click", ".kurang", function() {
                $(this).closest(".row").remove();
            });
        });
    </script>
@endsection
