<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Tracer Study PPG Unesa</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('admin/assets/img/unesa.png') }}" rel="icon">
    <link href="{{ asset('user/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('user/assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('user/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('user/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('userassets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('user/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('user/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('user/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('user/assets/css/style.css') }}" rel="stylesheet">
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center">
        <div class="container d-flex align-items-center justify-content-between">

            <div class="logo">
                <h1><a href="{{ asset('user/index.html') }}">Tracer Study PPG Unesa</a></h1>
                <!-- Uncomment below if you prefer to use an image logo -->
                <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
            </div>

            <nav id="navbar" class="navbar">
                <ul>
                    {{-- <li><a class="getstarted scrollto" href="{{ route('login') }}">Sign In</a></li> --}}
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->

    <section id="testimonials" class="testimonials section-bg" style="margin-top: 3rem">
        <div class="container">

            <div class="section-title" data-aos="fade-up">
                <h2>{{ $kuesioner->judul }}</h2>
                {!! $kuesioner->deskripsi !!}
            </div>
            <div class="row">
                <div class="col-md-8 mx-auto">
                    <form action="{{ route('user-kuesioner-isi') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $kuesioner->id }}">
                        <div class="row">
                            @foreach ($kuesioner->pertanyaan as $k => $v)
                                <input type="hidden" name="pertanyaan_id[{{ $k }}]"
                                    value="{{ $v->id }}">
                                <input type="hidden" name="tipe_pertanyaan[{{ $k }}]"
                                    value="{{ $v->jenis }}">
                                <div class="col-md-12">
                                    <div class="card mb-4">
                                        <div class="card-header bg-primary">

                                        </div>
                                        <h3 class="card-title m-3">{!! $v->pertanyaan !!}</h3>
                                        <hr>
                                        <div class="card-body">
                                            <label for="jawaban">Jawaban : </label>
                                            @if ($v->jenis == 'essai')
                                                <input type="text" name="text_jawaban[{{ $k }}]"
                                                    class="form-control" required>
                                            @elseif ($v->jenis == 'number')
                                                <input type="number" name="text_jawaban[{{ $k }}]"
                                                    class="form-control" required>
                                            @elseif ($v->jenis == 'pilihan')
                                                @foreach (json_decode($v->pilihan_jawaban) as $ke => $va)
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio"
                                                            name="text_jawaban[{{ $k }}]"
                                                            value="{{ $va }}"
                                                            id="radio-{{ $k . '-' . $va }}" @if ($ke == 0) required @endif>
                                                        <label class="form-check-label"
                                                            for="radio-{{ $k . '-' . $va }}">
                                                            {{ $va }}
                                                        </label>
                                                    </div>
                                                @endforeach
                                            @elseif ($v->jenis == 'checkbox')
                                                @foreach (json_decode($v->pilihan_jawaban) as $ke => $va)
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox"
                                                            name="text_jawaban[{{ $k }}][{{ $ke }}]"
                                                            value="{{ $va }}"
                                                            id="check-{{ $k . '-' . $va }}" @if ($ke == 0) required @endif>
                                                        <label class="form-check-label"
                                                            for="check-{{ $k . '-' . $va }}">
                                                            {{ $va }}
                                                        </label>
                                                    </div>
                                                @endforeach
                                            @elseif ($v->jenis == 'file')
                                                <input type="file" name="text_jawaban[{{ $k }}]"
                                                    class="form-control">
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <button type="submit" class="btn btn-primary btn-block w-100">Kirim</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>


    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col-lg-6 text-lg-left text-center">
                    <div class="copyright">
                        &copy; Copyright
                    </div>
                    <div class="credits">
                        <!-- All the links in the footer should remain intact. -->
                        <!-- You can delete the links only if you purchased the pro version. -->
                        <!-- Licensing information: https://bootstrapmade.com/license/ -->
                        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/vesperr-free-bootstrap-template/ -->
                        Designed by <a>Kelompok 2 TI B</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="footer-links text-lg-right text-center pt-2 pt-lg-0">
                        <a href="#intro" class="scrollto">Home</a>
                        <a href="#about" class="scrollto">About</a>
                        <a href="#">Privacy Policy</a>
                        <a href="#">Terms of Use</a>
                    </nav>
                </div>
            </div>
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('user/assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('user/assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('user/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('user/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('user/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('user/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('user/assets/vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('user/assets/js/main.js') }}"></script>

</body>

</html>
