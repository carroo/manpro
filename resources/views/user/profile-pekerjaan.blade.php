@extends('layouts.user')
@section('content')
    <main id="main" style="margin-top: 3rem">

        <section id="testimonials" class="testimonials section-bg">
            <div class="container">

                <div class="section-title" data-aos="fade-up">
                    <h2>Profile</h2>
                    <p>Data Pribadi Alumni</p>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="card mb-3">
                            <div class="card-body text-center">
                                <h3 class="card-title">{{ Auth::user()->name }}</h3>
                                <p class="card-text">mahasiswa</p>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body d-flex flex-column text-dark">
                                <ul class="nav nav-pills flex-column mb-auto">
                                    <li class="nav-item">
                                        <a href="{{ route('user-profile') }}" class="nav-link text-dark"
                                            aria-current="page">
                                            <i class="fa fa-user" aria-hidden="true"></i>
                                            Data Diri
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('user-profile-pekerjaan') }}" class="nav-link active">
                                            <i class="fa fa-briefcase" aria-hidden="true"></i>
                                            Pekerjaan
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="card ">
                            <div class="card-header row">
                                <div class="col-md-6">
                                    <h4>Pekerjaan</h4>
                                </div>
                                <div class="col-md-6">
                                    <div class="text-end">
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal">
                                            Tambah Pekerjaan
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Nama Perusahaan</th>
                                                <th>Jabatan</th>
                                                <th>Gaji</th>
                                                <th>Tanggal Mulai</th>
                                                <th>Tanggal Berakhir</th>
                                                <th>Alasan Berhenti</th>
                                                <th>Rekomendasi</th>
                                                <th>#</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach (Auth::user()->pekerjaan as $key => $value)
                                                <tr>
                                                    <td>{{ $value->nama_perusahaan }}</td>
                                                    <td>{{ $value->jabatan }}</td>
                                                    <td>{{ number_format($value->gaji) }}</td>
                                                    <td>{{ $value->tanggal_mulai_pekerjaan }}</td>
                                                    <td class="text-nowrap">{!! $value->tanggal_selesai_pekerjaan ??
                                                        '<span class="bg-success px-2 py-1 rounded text-white">masih bekerja</span>' !!}</td>
                                                    </td>
                                                    <td class="text-nowrap">{!! $value->alasan_berhenti ?? '<span class="bg-success px-2 py-1 rounded text-white">masih bekerja</span>' !!}
                                                    </td>
                                                    <td>{{ $value->rekomendasi }}</td>
                                                    <td>
                                                        <a href="{{ route('user-profile-pekerjaan-hapus', $value->id) }}"
                                                            class="btn btn-danger">
                                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                                            Hapus
                                                        </a>
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

            </div>
        </section>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('user-profile-pekerjaan-tambah') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group mb-3">
                                <label for="nama_perusahaan">Nama Perusahaan:</label>
                                <input type="text" class="form-control" name="nama_perusahaan"
                                    placeholder="Masukkan nama perusahaan" required>
                            </div>

                            <div class="form-group mb-3">
                                <label for="jabatan">Jabatan:</label>
                                <input type="text" class="form-control" name="jabatan" placeholder="Masukkan jabatan" required>
                            </div>

                            <div class="form-group mb-3">
                                <label for="gaji">Gaji:</label>
                                <input type="number" class="form-control" name="gaji" placeholder="Masukkan gaji" required>
                            </div>

                            <div class="form-group mb-3">
                                <label for="tanggal_mulai">Tanggal Mulai:</label>
                                <input type="date" class="form-control" name="tanggal_mulai" required>
                            </div>

                            <div class="form-group mb-3">
                                <label for="tanggal_berakhir">Tanggal Berakhir (opsional) : </label>
                                <input type="date" class="form-control" name="tanggal_berakhir">
                            </div>

                            <div class="form-group mb-3">
                                <label for="alasan_berhenti">Alasan Berhenti (opsional) : </label>
                                <textarea class="form-control" name="alasan_berhenti" placeholder="Masukkan alasan berhenti"></textarea>
                            </div>

                            <div class="form-group mb-3">
                                <label for="rekomendasi">Rekomendasi:</label>
                                <select name="rekomendasi" class="form-control" id="" required>
                                    <option value="1" selected>Ya</option>
                                    <option value="0">TIdak</option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
