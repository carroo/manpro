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
            <div class="card">
                <div class="card-header bg-secondary">
                    <div class="row">
                        <div class="col-md-6 ">
                            <h4 class="text-white">Pertanyaan</h4>
                        </div>
                        <div class="col-md-6">
                            <button class="btn btn-success btn-sm float-end" data-bs-toggle="modal"
                                data-bs-target="#tambahpertanyaan">Tambah pertanyaan</button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered">
                            <!-- Table header -->
                            <thead class="bg-info">
                                <tr>
                                    <th>Tipe</th>
                                    <th>Pertanyaan</th>
                                    <th>Pilihan Jawaban</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kuesioner->pertanyaan as $key => $value)
                                    <tr>
                                        <td>{{ $value->jenis }}</td>
                                        <td>{!! $value->pertanyaan !!}</td>
                                        <td>
                                            @if ($value->jenis == "pilihan" || $value->jenis == "checkbox")
                                                <ul>
                                                    @foreach (json_decode($value->pilihan_jawaban) as $pilihan)
                                                        <li>{{ $pilihan }}</li>
                                                    @endforeach
                                                </ul>
                                            @else
                                                Tidak ada pilihan
                                            @endif
                                        </td>
                                        <td>
                                            <form action="{{ route('pertanyaan-hapus', $value->id) }}" method="post"
                                                style="display:inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
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
    <div class="modal fade" id="tambahpertanyaan" tabindex="-1" role="dialog" aria-labelledby="modalTambahLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTambahLabel">Tambah pertanyaan</h5>
                </div>
                <form action="{{ route('pertanyaan-tambah') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <!-- Form Tambah -->
                        <div class="form-group">
                            <label for="tipe" class="form-label">Tipe</label>
                            <input type="hidden" name="kuesioner_id" value="{{ $kuesioner->id }}">
                            <select name="jenis" class="form-control" id="" required>
                                <option value="essai" selected>Essai</option>
                                <option value="number">Jumlah</option>
                                <option value="pilihan">Pilihan</option>
                                <option value="checkbox">Checkbox</option>
                                <option value="file">File</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="pertanaan" class="form-label">teks pertanyaan</label>
                            <textarea name="pertanyaan" id="" class="form-control tta"></textarea>
                        </div>
                        <div id="opsi">
                            <label for="" class="form-label">Pilihan jawaban</label>
                            <div class="row px-2">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="pilihan_jawaban[]">
                                    <div class="input-group-append tambah ">
                                        <span class="input-group-text bg-success h-100"><i class="fas fa-plus"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
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
