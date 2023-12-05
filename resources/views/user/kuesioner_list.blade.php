@extends('layouts.user')
@section('content')
    <main id="main">
        <section id="services" class="services section-bg" style="height: 100vh; margin-top: 4rem">
            <div class="container">

                <div class="section-title" data-aos="fade-up">
                    <h2>Kuesioner</h2>
                    <p>Kuesioner yang tersedia</p>
                </div>
                <div class="row justify-content-center">
                    @foreach ($kuesioner as $key => $value)
                        <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                            <div class="icon-box d-flex flex-column" data-aos="fade-up" data-aos-delay="100"
                                style="width: 100%">
                                <div class="icon"><i class="bx bxl-dribbble">{{ $key + 1 }}</i></div>
                                <h4 class="title">{{ $value->judul }}</h4>
                                <p class="description">{!! $value->deskripsi !!}</p>
                                @php
                                    $menjawab[$key] =  App\Models\Jawaban::where('alumni_id', Auth::user()->id)
                                        ->whereIn('pertanyaan_id', $value->pertanyaan->pluck('id')->toArray())
                                        ->first();
                                @endphp
                                <a href="{{ route('user-kuesioner',$value->id) }}" class="btn  mt-auto @if($menjawab[$key]) btn-success @else btn-primary @endif">@if($menjawab[$key]) Telah diisi @else Isi Kuesioner @endif</a>
                            </div>
                        </div>
                    @endforeach

                </div>

            </div>
        </section><!-- End Testimonials Section -->

    </main>
@endsection
