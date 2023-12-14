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
                                        <a href="{{ route('user-profile') }}" class="nav-link active" aria-current="page">
                                            <i class="fa fa-user" aria-hidden="true"></i>
                                            Data Diri
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('user-profile-pekerjaan') }}" class="nav-link text-dark">
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
                            <div class="card-header text-center">
                                <h4>Data Diri</h4>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('user-profile-update') }}" method="POST">
                                    @csrf
                                    <div class="form-group mb-3">
                                        <label for="name">Nama:</label>
                                        <input type="text" class="form-control" name="name"
                                            placeholder="Masukkan nama" value="{{ Auth::user()->name }}">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="email">Email:</label>
                                        <input type="email" class="form-control" name="email" disabled
                                            placeholder="Masukkan email" value="{{ Auth::user()->email }}">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="alamat">Alamat:</label>
                                        <textarea class="form-control" name="alamat" placeholder="Masukkan alamat">{{ Auth::user()->alamat }}</textarea>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="no_hp">Nomor HP:</label>
                                        <input type="tel" class="form-control" name="no_hp"
                                            placeholder="Masukkan nomor HP" value="{{ Auth::user()->no_hp }}">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="tahun_lulus">Tahun Lulus:</label>
                                        <input type="text" class="form-control" name="tahun_lulus"
                                            placeholder="Masukkan tahun lulus" value="{{ Auth::user()->tahun_lulus }}"
                                            disabled>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="program_studi">Program Studi:</label>
                                        <input type="text" class="form-control" name="program_studi"
                                            placeholder="Masukkan program studi" value="{{ Auth::user()->program_studi }}" disabled>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="ipk">IPK:</label>
                                        <input type="text" class="form-control" name="ipk"
                                            placeholder="Masukkan IPK" value="{{ Auth::user()->ipk }}">
                                    </div>

                                    <button type="submit" class="btn btn-primary btn-block w-100">Update</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>

    </main>
@endsection
