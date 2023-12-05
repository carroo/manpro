@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card z-index-2">
                <div class="card-header pb-0">
                    <div class="row">
                        <div class="col-md-6">
                            <h6>kuesioner</h6>
                        </div>
                        <div class="col-md-6">
                            <button class="btn btn-success btn-sm float-end" data-bs-toggle="modal"
                                data-bs-target="#tambahkuesioner">Tambah kuesioner</button>
                        </div>
                    </div>
                </div>
                <div class="card-body p-3">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered" id="myTable">
                            <!-- Table header -->
                            <thead>
                                <tr>
                                    <th>Judul</th>
                                    <th>Deskripsi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <!-- Table body -->
                            <tbody>
                                @foreach ($kuesioner as $key => $value)
                                    <tr>
                                        <td>{{ $value->judul }}</td>
                                        <td>{!! $value->deskripsi !!}</td>
                                        <td>
                                            <button class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#edit-{{ $value->id }}">Edit</button>
                                            <a href="{{ route('kuesioner-jawaban', $value->id) }}"
                                                class="btn btn-warning btn-sm">Lihat Jawaban</a>
                                            <a href="{{ route('pertanyaan', $value->id) }}"
                                                class="btn btn-secondary btn-sm">Pertanyaan</a>
                                            <form action="{{ route('kuesioner-hapus', $value->id) }}" method="post"
                                                style="display:inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
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

    <!-- kuesioner Modal -->
    <!-- News Modal -->
    <div class="modal fade" id="tambahkuesioner" tabindex="-1" aria-labelledby="kuesionerModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newsModalLabel">Tambah kuesioner</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('kuesioner-tambah') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="judul" class="form-label">Judul</label>
                            <input type="text" class="form-control" id="judul" name="judul"
                                value="{{ isset($action) && $action == 'edit' ? $news->judul : '' }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4"></textarea>
                        </div>
                        <!-- Add other form fields here -->
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @foreach ($kuesioner as $key => $value)
        <div class="modal fade" id="edit-{{ $value->id }}" tabindex="-1" aria-labelledby="kuesionerModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="newsModalLabel">Edit kuesioner</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('kuesioner-update', $value->id) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="judul" class="form-label">Judul</label>
                                <input type="text" class="form-control" id="judul" name="judul"
                                    value="{{ $value->judul }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="deskripsi" class="form-label">Deskripsi</label>
                                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4">{{ $value->deskripsi }}</textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
