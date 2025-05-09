@extends('frontend.main_master')

@php
    $urunler = App\Models\Urunler::where('durum', 1)->orderBy('sirano')->get();
    $seo = App\Models\Seo::find(1);
    $hakkimizda = App\Models\Hakkimizda::where('durum', 1)->first();
    $logocek = App\Models\Logo::find(1);
@endphp


@section('title') About Us | {{ $seo->title }} @endsection
@section('author'){{ $seo->author }}@endsection 
@if ($hakkimizda) 
@section('description') {{ $hakkimizda->aciklama }} @endsection 
@endif
@section('keywords') {{ $seo->keywords }} @endsection
@section('url') {{ url('/') }} @endsection
@section('resim'){{ url('/') }}/{{ $seo->resim }}@endsection

@section('main')
    @if ($hakkimizda)
        <!-- breadcrumb-area -->
        <section class="breadcrumb-area" data-background="{{ asset('frontend') }}/img/slider/valo.png">
            <div class="container">
                <div class="breadcrumb__wrapper">
                    <div class="row">
                        <div class="col-xl-6 col-lg-7">
                            <div class="breadcrumb__content">
                                <h2 class="title">About Us</h2>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">About Us</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- breadcrumb-area-end -->

        <!-- about-area -->
        <section class="about__area-three section-pt-130 section-pb-130">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4">
                        <div class="about__title-wrap">
                            <h2 class="title">
                                {!! $hakkimizda->baslik !!}
                            </h2>
                            <div class="about__content-circle">
                                <img src="{{ asset('frontend') }}/img/icons/circle.svg" alt="img">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 150 150" version="1.1">
                                    <path id="textPath" d="M 0,75 a 75,75 0 1,1 0,1 z"></path>
                                    <text>
                                        <textPath href="#textPath">{{ $hakkimizda->aciklama }}</textPath>
                                    </text>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-8">
                        <div class="about__three-images">
                            <img src="{{ $hakkimizda->resim }}" alt="img" class="left">
                            <img src="{{ $hakkimizda->resim2 }}" alt="img" class="right">
                            <div class="about__dots">
                                <svg width="109" height="35" viewBox="0 0 109 35" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9 0H0V7H9V0Z" fill="currentcolor" />
                                    <path d="M24 0H15V7H24V0Z" fill="currentcolor" />
                                    <path d="M38 0H29V7H38V0Z" fill="currentcolor" />
                                    <path d="M53 0H44V7H53V0Z" fill="currentcolor" />
                                    <path d="M67 0H58V7H67V0Z" fill="currentcolor" />
                                    <path d="M80 0H71V7H80V0Z" fill="currentcolor" />
                                    <path d="M9 14H0V21H9V14Z" fill="currentcolor" />
                                    <path d="M24 14H15V21H24V14Z" fill="currentcolor" />
                                    <path d="M38 14H29V21H38V14Z" fill="currentcolor" />
                                    <path d="M53 14H44V21H53V14Z" fill="currentcolor" />
                                    <path d="M67 14H58V21H67V14Z" fill="currentcolor" />
                                    <path d="M80 14H71V21H80V14Z" fill="currentcolor" />
                                    <path d="M95 14H86V21H95V14Z" fill="currentcolor" />
                                    <path d="M109 14H100V21H109V14Z" fill="currentcolor" />
                                    <path d="M9 28H0V35H9V28Z" fill="currentcolor" />
                                    <path d="M24 28H15V35H24V28Z" fill="currentcolor" />
                                    <path d="M38 28H29V35H38V28Z" fill="currentcolor" />
                                    <path d="M53 28H44V35H53V28Z" fill="currentcolor" />
                                    <path d="M67 28H58V35H67V28Z" fill="currentcolor" />
                                    <path d="M80 28H71V35H80V28Z" fill="currentcolor" />
                                    <path d="M95 28H86V35H95V28Z" fill="currentcolor" />
                                    <path d="M109 28H100V35H109V28Z" fill="currentcolor" />
                                </svg>
                            </div>
                        </div>
                        <div class="about__three-paragraph">
                            <p class="tg__animate-text style2">{{ $hakkimizda->metin }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <h2 class="big-title">online</h2>
        </section>
        <!-- about-area-end -->
    @else
    <section class="about__area-three d-flex justify-content-center align-items-center vh-100 text-white">
        <div class="text-center bg-secondary p-4 rounded shadow">
            <h2 class="title text-danger mb-3">Sayfa Aktif Değil</h2>
            <p class="mb-3">Bu sayfa şu an kullanımda değil. Lütfen daha sonra tekrar deneyin.</p>
            <a href="/" class="btn btn-danger">Ana Sayfa'ya Dön</a>
        </div>
    </section>
    
    @endif
@endsection
