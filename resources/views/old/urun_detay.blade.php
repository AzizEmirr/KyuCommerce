@extends('frontend.main_master')

@php
    $seo = App\Models\Seo::find(1);
    $yorumlar = App\Models\Yorumlar::orderBy('sirano')->where('durum', 1)->get();
@endphp


@section('title')ÜrünDetay | {{ $urunler->baslik }}  {{$seo->site_adi}}@endsection
@section('author'){{$seo->author}}@endsection
@section('description'){{$urunler->aciklama}}@endsection
@section('keywords'){{$urunler->anahtar}}@endsection
@section('url'){{url('/')}}@endsection
@section('resim'){{ url('/')}}/{{$urunler->resim}}@endsection

@section('main')
    <article class="main-content mt-lg-10 mt-6">
        <div>
            <div class="tournament-details pb-10">
                <div class="container">
                    <div class="row mb-lg-10 mb-6">
                        <div class="col-12">
                            <div class="d-flex align-items-center gap-4">
                                <a href="javascript:void(0)" onclick="window.history.back()" class="back-btn"><i
                                        class="ti ti-arrow-narrow-left fs-2xl"></i></a>
                                <h3 class="tcn-1 cursor-scale growDown title-anim">{{ $urunler->baslik }}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div
                                class="parallax-banner-area parallax-container position-relative rounded-5 overflow-hidden">
                                <img class="w-100 h-100 parallax-img"
                                    src="{{ asset('frontend') }}/assets/img/tour-details-banner.png"
                                    alt="tournament banner">
                                <!-- running tournament content here -->
                                <div
                                    class="running-tournament d-flex flex-lg-row flex-column position-absolute top-50 start-50 translate-middle w-100">
                                    <div class="running-tournament-thumb w-100">
                                        <img class="w-100 h-100"
                                            src="{{ !empty($urunler->resim) ? url($urunler->resim) : url('uploads/urunler/resim-yok.jpg') }}"
                                            alt="tournament thumb">
                                    </div>
                                    <div
                                        class="running-tour-info py-xl-10 py-sm-6 py-4 px-xl-15 px-lg-10 px-sm-6 px-4 w-100">
                                        <h3 class="tcn-1 mb-lg-6 mb-4">{{ $urunler->baslik }}</h3>
                                        <span
                                            class="tcn-1 d-block fs-five fw-semibold mb-4">{{ $urunler->aciklama }}</span>
                                        <div class="ending-date d-flex align-items-center gap-sm-5 gap-2 mb-lg-8 mb-6">
                                            <div class="date-box-area">
                                                <div class="date-box mb-4">
                                                    <h3 class="tcn-1 title-anim cursor-scale growDown" id="days">00
                                                    </h3>
                                                </div>
                                                <span class="tcn-1 text-center d-block">Days</span>
                                            </div>
                                            <div class="date-box-area">
                                                <div class="date-box mb-4">
                                                    <h3 class="tcn-1 title-anim cursor-scale growDown" id="hours">00
                                                    </h3>
                                                </div>
                                                <span class="tcn-1 text-center d-block">Hours</span>
                                            </div>
                                            <div class="date-box-area">
                                                <div class="date-box mb-4">
                                                    <h3 class="tcn-1 title-anim cursor-scale growDown" id="minutes">00
                                                    </h3>
                                                </div>
                                                <span class="tcn-1 text-center d-block">Minutes</span>
                                            </div>
                                            <div class="date-box-area">
                                                <div class="date-box mb-4">
                                                    <h3 class="tcn-1 title-anim cursor-scale growDown" id="seconds">00
                                                    </h3>
                                                </div>
                                                <span class="tcn-1 text-center d-block">Seconds</span>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center gap-sm-6 gap-3">
                                            <a href="{{$urunler->link}}"
                                                class="btn-half-border position-relative d-inline-block py-2 bgp-1 px-6 rounded-pill">Satın Al</a>
                                            <div class="d-flex align-items-center flex-wrap gap-sm-6 gap-3 w-50">
                                                <div class="end-date">
                                                    <span
                                                        class="tcn-6">{{ $urunler->created_at->tz('Europe/Istanbul')->format('d.m.Y - H:i') }}</span>
                                                </div>
                                                <div class="players">
                                                    <i class="ti ti-users-group tcn-1"></i>
                                                    <span
                                                        class="tcn-6">{{ $urunler->player_count }}/{{ $urunler->player_count }}
                                                        Oyuncu</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- tournament details banner section end -->

            <!-- tournament more details section start -->
            <section class="tournament-more-details pb-120">
                <div class="container">
                    <div class="singletab tournaments-tab">
                        <ul class="tablinks d-flex flex-wrap align-items-center gap-3 pb-10">
                            <li class="nav-links active">
                                <button class="tablink py-sm-3 py-2 px-sm-8 px-6 rounded-pill tcn-1">Açıklama</button>
                            </li>

                            <li class="nav-links ">
                                <button class="tablink py-sm-3 py-2 px-sm-8 px-6 rounded-pill tcn-1">Yorumlar</button>
                            </li>
                        </ul>
                        <div class="tabcontents">
                          
                            <div class="tabitem active">
                                <div class="row g-6">
                                    <div class="accordion-section rule-accordion d-grid gap-6">
                                        <div class="accordion-single p-sm-5 p-3 bgn-4 rounded">
                                            <h5 class="acc-header-area text-center">
                                                ÜrünAçıklaması
                                            </h5>
                                            
                                            <p style="margin-top: 20px" class="tcn-6">
                                               {!!$urunler->metin!!}
                                            </p>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tabitem">
                                <div class="row align-items-center justify-content-center pt-lg-20 pt-sm-10">
                                    <div class="col-lg-4 col-sm-6">
                                        <div class="d-grid justify-content-center align-items-center gap-10">
                                            @if ($yorumlar->isEmpty())
                                                <div class="img-area mx-auto winner-img">
                                                    <img class="w-100" src="{{ asset('frontend') }}/assets/img/error.png" alt="prize">
                                                </div>
                                                <div class="content-area text-center">
                                                    <h4 class="tcn-1 fs-four title-anim mb-3">Ürünİle İlgili Yorumu Bulunamadı</h4>
                                                </div>
                                            @else
                                                <div class="content-area text-center">
                                                    <div class="row">
                                                        @foreach ($yorumlar as $yorum)
                                                            <div class="col-lg-6 col-md-6 mb-3">
                                                                <div class="card">
                                                                    <div class="card-body">
                                                                        <h5 class="card-title">{{ $yorum->adi }}</h5>
                                                                        <p class="card-text">{{ $yorum->metin }}</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            
                        </div>
                    </div>
                </div>
            </section>
            <!-- tournament more details section end -->
        </div>
    </article>
@endsection
