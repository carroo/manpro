@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card z-index-2">
                <div class="card-header pb-0">
                    <div class="row">
                        <div class="col-md-6">
                            <h6>Alumni</h6>
                        </div>
                        <div class="col-md-6">
                            <button class="btn btn-success btn-sm float-end" data-bs-toggle="modal"
                                data-bs-target="#tambahAlumni">Tambah Alumni</button>
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
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Alamat</th>
                                <th>No. Hp</th>
                                <th>NIM</th>
                                <th>Tahun Lulus</th>
                                <th>Program Studi</th>
                                <th>IPK</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <!-- Table body -->
                        <tbody>
                            @foreach ($alumni as $value)
                                <tr>
                                    <td>{{ $value->id }}</td>
                                    <td>{{ $value->name }}</td>
                                    <td>{{ $value->email }}</td>
                                    <td>{!! $value->alamat !!}</td>
                                    <td>{{ $value->no_hp }}</td>
                                    <td>{{ $value->nim }}</td>
                                    <td>{{ $value->tahun_lulus }}</td>
                                    <td>{{ $value->program_studi }}</td>
                                    <td>{{ $value->ipk }}</td>
                                    <td>
                                        <button class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#edit-{{ $value->id }}">Edit</button>
                                        <form action="{{ route('alumni-hapus', $value->id) }}" method="post"
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

    <!-- Alumni Modal -->
    <!-- News Modal -->
    <div class="modal fade" id="tambahAlumni" tabindex="-1" aria-labelledby="AlumniModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newsModalLabel">Tambah Alumni</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Add your form for creating/editing news here -->
                    <form action="{{ route('alumni-tambah') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="name" name="name"
                             required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" class="form-control" id="email" name="email"
                             required>
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <textarea type="text" class="form-control" id="alamat" name="alamat" rows="4"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="no_hp" class="form-label">No. Hp</label>
                            <input class="form-control" id="no_hp" name="no_hp" required>
                        </div>
                        <div class="mb-3">
                            <label for="nim" class="form-label">NIM</label>
                            <input type="text" class="form-control" id="nim" name="nim">
                        </div>
                        <div class="mb-3">
                            <label for="tahun_lulus" class="form-label">Tahun Lulus</label>
                            <input type="year" class="form-control" id="tahun_lulus" name="tahun_lulus">
                        </div>
                        <div class="mb-3">
                            <label for="program_studi" class="form-label">Program Studi</label>
                            <select name="program_studi" class="form-control" required>
                                <option value="" disabled>Pilih Program Studi</option>
                                <option value="Pendidikan Guru SD">Pendidikan Guru SD
                                </option>
                                <option value="Bimbingan dan Konseling">Bimbingan dan Konseling
                                </option>
                                <option value="Pendidikan Kewarganegaraan">Pendidikan Kewarganegaraan
                                </option>
                                <option value="Pendidikan Jasmani, Kesehatan, dan Rekreasi">Pendidikan Jasmani, Kesehatan, dan Rekreasi
                                </option>
                                <option value="Bahasa Inggris">Bahasa Inggris
                                </option>
                                <option value="Matematika">Matematika
                                </option>
                                <option value="Ekonomi">Ekonomi
                                </option>
                                <option value="Sejarah">Sejarah
                                </option>
                                <option value="Akuntansi dan Keuangan">Akuntansi dan Keuangan
                                </option>
                                <option value="Teknologi Informasi dan Komunikasi">Teknologi Informasi dan Komunikasi
                                </option>
                                <option value="Teknik Otomotif">Teknik Otomotif
                                </option>
                                <option value="Perhotelan dan Jasa Pariwisata">Perhotelan dan Jasa Pariwisata
                                </option>
                                <option value="Agribisnis Tanaman Pangan dan Holtikultura">Agribisnis Tanaman Pangan dan Holtikultura
                                </option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="ipk" class="form-label">IPK</label>
                            <input type="float" class="form-control" id="ipk" name="ipk">
                        </div>
                        <!-- Add other form fields here -->
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @foreach ($alumni as $key => $value)
        <div class="modal fade" id="edit-{{ $value->id }}" tabindex="-1" aria-labelledby="AlumniModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="newsModalLabel">Edit Alumni</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Add your form for creating/editing news here -->
                        <form action="{{ route('alumni-update', $value->id) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ $value->name }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" class="form-control" id="email" name="email"
                                    value="{{ $value->name }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <textarea class="form-control" id="alamat" name="alamat" type="text" value="{{ $value->alamat }}"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="no_hp" class="form-label">No. Hp</label>
                                <input class="form-control" id="no_hp" name="no_hp" type="text" value="{{ $value->no_hp }}" required >
                            </div>
                            <div class="mb-3">
                                <label for="nim" class="form-label">NIM</label>
                                <input class="form-control" id="nim" name="nim" type="text" value="{{ $value->nim }}" required >
                            </div>
                            <div class="mb-3">
                                <label for="tahun_lulus" class="form-label">Tahun Lulus</label>
                                <input class="form-control" id="tahun_lulus" name="tahun_lulus" type="text" value="{{ $value->tahun_lulus }}" required >
                            </div>
                            <div class="mb-3">
                                <label for="program_studi" class="form-label">Program Studi</label>
                                <select name="program_studi" class="form-control" required>
                                    <option value="" disabled>Pilih kategori</option>
                                    <option value="Pendidikan Guru SD" @if ($value->program_studi == 'Pendidikan Guru SD') selected @endif>Pendidikan Guru SD
                                    </option>
                                    <option value="Bimbingan dan Konseling" @if ($value->program_studi == 'Bimbingan dan Konseling') selected @endif>Bimbingan dan Konseling
                                    </option>
                                    <option value="Pendidikan Kewarganegaraan" @if ($value->program_studi == 'Pendidikan Kewarganegaraan') selected @endif>Pendidikan Kewarganegaraan
                                    </option>
                                    <option value="Pendidikan Jasmani, Kesehatan, dan Rekreasi" @if ($value->program_studi == 'Pendidikan Jasmani, Kesehatan, dan Rekreasi') selected @endif>Pendidikan Jasmani, Kesehatan, dan Rekreasi
                                    </option>
                                    <option value="Bahasa Inggris" @if ($value->program_studi == 'Bahasa Inggris') selected @endif>Bahasa Inggris
                                    </option>
                                    <option value="Matematika" @if ($value->program_studi == 'Matematika') selected @endif>Matematika
                                    </option>
                                    <option value="Ekonomi" @if ($value->program_studi == 'Ekonomi') selected @endif>Ekonomi
                                    </option>
                                    <option value="Sejarah" @if ($value->program_studi == 'Sejarah') selected @endif>Sejarah
                                    </option>
                                    <option value="Akuntansi dan Keuangan" @if ($value->program_studi == 'Akuntansi dan Keuangan') selected @endif>Akuntansi dan Keuangan
                                    </option>
                                    <option value="Teknologi Informasi dan Komunikasi" @if ($value->program_studi == 'Teknologi Informasi dan Komunikasi') selected @endif>Teknologi Informasi dan Komunikasi
                                    </option>
                                    <option value="Teknik Otomotif" @if ($value->program_studi == 'Teknik Otomotif') selected @endif>Teknik Otomotif
                                    </option>
                                    <option value="Perhotelan dan Jasa Pariwisata" @if ($value->program_studi == 'Perhotelan dan Jasa Pariwisata') selected @endif>Perhotelan dan Jasa Pariwisata
                                    </option>
                                    <option value="Agribisnis Tanaman Pangan dan Holtikultura" @if ($value->program_studi == 'Agribisnis Tanaman Pangan dan Holtikultura') selected @endif>Agribisnis Tanaman Pangan dan Holtikultura
                                    </option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="ipk" class="form-label">IPK</label>
                                <input class="form-control" id="ipk" name="ipk" type="text" value="{{ $value->ipk }}" required >
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
