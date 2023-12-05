@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card z-index-2">
                <div class="card-header pb-0">
                    <div class="row">
                        <div class="col-md-6">
                            <h6>Berita</h6>
                        </div>
                        <div class="col-md-6">
                            <button class="btn btn-success btn-sm float-end" data-bs-toggle="modal"
                                data-bs-target="#tambahBerita">Tambah Berita</button>
                        </div>
                    </div>
                </div>
                <div class="card-body p-3">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered" id="myTable">
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
                                @foreach ($berita as $value)
                                    <tr>
                                        <td>{{ $value->id }}</td>
                                        <td style="word-wrap: break-word;">{{ $value->judul }}</td>
                                        <td style="word-wrap: break-word;">{!! $value->isi !!}</td>
                                        <td>{{ $value->created_at }}</td>
                                        <td>{{ $value->kategori }}</td>
                                        <td><img src="{{ asset($value->gambar) }}" width="50px"
                                                alt="{{ $value->gambar }}"></td>
                                        <td>
                                            <button class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#edit-{{ $value->id }}">Edit</button>
                                            <form action="{{ route('berita-hapus', $value->id) }}" method="post"
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
                            <textarea class="form-control" id="isi" name="isi" rows="4"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="kategori" class="form-label">Kategori</label>
                            <select name="kategori" class="form-control" required id="">
                                <option value="" selected disabled>Pilih kategori</option>
                                <option value="politik">Politik</option>
                                <option value="ekonomi">Ekonomi</option>
                                <option value="olahraga">Olahraga</option>
                                <option value="teknologi">Teknologi</option>
                                <option value="hiburan">Hiburan</option>
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
        <div class="modal fade" id="edit-{{ $value->id }}" tabindex="-1" aria-labelledby="beritaModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="newsModalLabel">Edit Berita</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Add your form for creating/editing news here -->
                        <form action="{{ route('berita-update', $value->id) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="judul" class="form-label">Judul</label>
                                <input type="text" class="form-control" id="judul" name="judul"
                                    value="{{ $value->judul }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="isi" class="form-label">Isi</label>
                                <textarea class="form-control" id="isi" name="isi" rows="4">{{ $value->isi }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="kategori" class="form-label">Kategori</label>
                                <select name="kategori" class="form-control" required>
                                    <option value="" disabled>Pilih kategori</option>
                                    <option value="politik" @if ($value->kategori == 'politik') selected @endif>Politik
                                    </option>
                                    <option value="ekonomi" @if ($value->kategori == 'ekonomi') selected @endif>Ekonomi
                                    </option>
                                    <option value="olahraga" @if ($value->kategori == 'olahraga') selected @endif>Olahraga
                                    </option>
                                    <option value="teknologi" @if ($value->kategori == 'teknologi') selected @endif>Teknologi
                                    </option>
                                    <option value="hiburan" @if ($value->kategori == 'hiburan') selected @endif>Hiburan
                                    </option>
                                    <option value="pendidikan" @if ($value->kategori == 'pendidikan') selected @endif>Pendidikan
                                    </option>
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
