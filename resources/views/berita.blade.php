@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card z-index-2">
                <div class="card-header pb-0">
                    <h6>Berita</h6>
                </div>
                <div class="card-body p-3">

                    <button class="btn btn-primary btn-sm"
                    data-bs-toggle="modal" data-bs-target="#tambahBerita">Tambah Berita</button>
                    <table class="table">
                        <!-- Table header -->
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Judul</th>
                                <th>Isi</th>
                                <th>Tanggal</th>
                                <th>Kategori</th>
                                <th>Gambar</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <!-- Table body -->
                        <tbody>
                            @foreach ($berita as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->judul }}</td>
                                    <td>{!! $item->isi !!}</td>
                                    <td>{{ $item->tanggal }}</td>
                                    <td>{{ $item->kategori }}</td>
                                    <td><img src="{{ asset($item->gambar) }}" width="50px" alt=""></td>
                                    <td>
                                        <button class="btn btn-primary btn-sm"
                                            data-bs-toggle="modal" data-bs-target="#edit-{{ $item->id }}">Edit</button>
                                        <form action="{{ route('berita-hapus', $item->id) }}" method="post"
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

    <!-- berita Modal -->
    <!-- News Modal -->
    <div class="modal fade" id="tambahBerita" tabindex="-1" aria-labelledby="beritaModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newsModalLabel">Tambah Berita</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Add your form for creating/editing news here -->
                    <form action="{{ route('berita-tambah') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="judul" class="form-label">Judul</label>
                            <input type="text" class="form-control" id="judul" name="judul"
                                value="{{ isset($action) && $action == 'edit' ? $news->judul : '' }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="isi" class="form-label">Isi</label>
                            <textarea class="form-control" id="isi" name="isi" rows="4" required>{{ isset($action) && $action == 'edit' ? $news->isi : '' }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="kategori" class="form-label">Kategori</label>
                            <select name="kategori" class="form-control"  required id="">
                                <option value="" selected disabled>Pilih kategori</option>
                                <option value="politik">Politik</option>
                                <option value="pendidikan">Pendidikan</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="gambar" class="form-label">Gambar</label>
                            <input type="file" class="form-control" id="gambar" name="gambar">
                            @if (isset($action) && $action == 'edit' && $news->gambar)
                                <img src="{{ asset('path/to/your/images/' . $news->gambar) }}" alt="News Image"
                                    class="img-thumbnail mt-2" style="max-width: 200px;">
                            @endif
                        </div>
                        <!-- Add other form fields here -->
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @foreach ($berita as $key => $value)
    <div class="modal fade" id="edit-{{ $value->id }}" tabindex="-1" aria-labelledby="beritaModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newsModalLabel">Edit Berita</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Add your form for creating/editing news here -->
                    <form action="{{ route('berita-update',$value->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="judul" class="form-label">Judul</label>
                            <input type="text" class="form-control" id="judul" name="judul"
                                value="{{ $value->judul }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="isi" class="form-label">Isi</label>
                            <textarea class="form-control" id="isi" name="isi" rows="4" required>{{ $value->isi }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="kategori" class="form-label">Kategori</label>
                            <select name="kategori" class="form-control" required id="">
                                <option value="" selected disabled>Pilih kategori</option>
                                <option value="politik">Politik</option>
                                <option value="pendidikan">Pendidikan</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="gambar" class="form-label">Gambar</label>
                            <input type="file" class="form-control" id="gambar" name="gambar">
                            @if (isset($action) && $action == 'edit' && $news->gambar)
                                <img src="{{ asset('path/to/your/images/' . $news->gambar) }}" alt="News Image"
                                    class="img-thumbnail mt-2" style="max-width: 200px;">
                            @endif
                        </div>
                        <!-- Add other form fields here -->
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @endforeach
@endsection
