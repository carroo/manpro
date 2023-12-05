@extends('layouts.user')
@section('content')
    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">

        <div class="container">
            <div class="row">
                <div class="col-lg-6 pt-5 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
                    <h1 data-aos="fade-up">Halo, Alumni PPG Unesa!</h1>
                    <h2 data-aos="fade-up" data-aos-delay="400">Selamat Datang di Website Tracer Study</h2>
                    {{-- <div data-aos="fade-up" data-aos-delay="800">
                        <a href="{{ route('login') }}" class="btn-get-started scrollto">Sign In</a>
                    </div> --}}
                </div>
                <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="fade-left" data-aos-delay="200">
                    <img src="{{ asset('user/assets/img/hero-img.png') }}" class="img-fluid animated" alt="">
                </div>
            </div>
        </div>

    </section><!-- End Hero -->

    <main id="main">

        <section id="testimonials" class="testimonials section-bg">
            <div class="container">

                <div class="section-title" data-aos="fade-up">
                    <h2>Berita</h2>
                    <p>Berita Terkini PPG Unesa</p>
                </div>

                <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
                    <div class="swiper-wrapper">
                        @foreach ($berita as $key => $value)
                            <div class="swiper-slide">
                                <div class="testimonial-wrap">
                                    <div class="testimonial-item">
                                        <div class="row">
                                            <img src="{{ asset($value->gambar) }}" class="img-fluid" height="100px" alt="">
                                        </div>
                                        <h3></h3>
                                        <h4>{{ date('d-F-Y', strtotime($value->created_at)) }}</h4>
                                        <p>
                                            <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                            {{ $value->judul }}
                                            <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                        </p>
                                    </div>
                                </div>
                            </div><!-- End testimonial item -->
                        @endforeach
                    </div>

                    <div class="swiper-pagination"></div>
                </div>

            </div>
        </section><!-- End Testimonials Section -->

    </main>
@endsection
