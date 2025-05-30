@extends('frontend.main_master')

@php
    $seo = App\Models\Seo::find(1);
    $returnPolicy = App\Models\Kurumsal::where('id', 2)->where('durum', 1)->first();
@endphp


@section('title')Terms of Services | {{$seo->title}}@endsection
@section('author'){{$seo->author}}@endsection
@if ($returnPolicy)
@section('description') {{$returnPolicy->metin}} @endsection
@endif
@section('keywords'){{$seo->keywords}}@endsection
@section('url'){{url('/')}}@endsection
@section('resim'){{ url('/')}}/{{$seo->resim}}@endsection

@section('main')
@if ($returnPolicy)
<section class="breadcrumb-area" data-background="{{asset ('frontend')}}/img/slider/valo.png">
    <div class="container">
        <div class="breadcrumb__wrapper">
            <div class="row">
                <div class="col-xl-6 col-lg-7">
                    <div class="breadcrumb__content">
                        <h2 class="title">Terms of Services</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{url ('/')}}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Terms of Services</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="services__details-area section-pt-120 section-pb-120" data-background="{{asset ('frontend')}}/img/bg/team_details_bg.jpg">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="team__details-img">
                    <img src="{{ asset($returnPolicy->resim) }}" alt="img">
                    <svg width="145" height="66" viewBox="0 0 145 66" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g opacity="0.95">
                            <path d="M11.94 56.1H0V65.38H11.94V56.1Z" fill="currentcolor"/>
                            <path d="M30.81 56.1H18.87V65.38H30.81V56.1Z" fill="currentcolor"/>
                            <path d="M49.37 56.1H37.47V65.38H49.37V56.1Z" fill="currentcolor"/>
                            <path d="M68.25 56.1H56.34V65.38H68.25V56.1Z" fill="currentcolor"/>
                            <path d="M87.81 56.1H75.91V65.38H87.81V56.1Z" fill="currentcolor"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M95.12 56.1H107.03V65.3799H95.12V56.1Z" fill="currentcolor"/>
                            <path d="M125.94 56.1H114V65.38H125.94V56.1Z" fill="currentcolor"/>
                            <path d="M144.5 56.1H132.56V65.38H144.5V56.1Z" fill="currentcolor"/>
                            <path d="M11.94 37.1H0V46.38H11.94V37.1Z" fill="currentcolor"/>
                            <path d="M30.81 37.1H18.87V46.38H30.81V37.1Z" fill="currentcolor"/>
                            <path d="M49.37 37.1H37.47V46.38H49.37V37.1Z" fill="currentcolor"/>
                            <path d="M68.25 37.1H56.34V46.38H68.25V37.1Z" fill="currentcolor"/>
                            <path d="M87.81 37.1H75.91V46.38H87.81V37.1Z" fill="currentcolor"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M95.12 37.1H107.03V46.3799H95.12V37.1Z" fill="currentcolor"/>
                            <path d="M125.94 37.1H114V46.38H125.94V37.1Z" fill="currentcolor"/>
                            <path d="M144.5 37.1H132.56V46.38H144.5V37.1Z" fill="currentcolor"/>
                            <path d="M11.94 18.53H0V27.85H11.94V18.53Z" fill="currentcolor"/>
                            <path d="M30.81 18.53H18.87V27.85H30.81V18.53Z" fill="currentcolor"/>
                            <path d="M49.37 18.53H37.47V27.85H49.37V18.53Z" fill="currentcolor"/>
                            <path d="M68.25 18.53H56.34V27.85H68.25V18.53Z" fill="currentcolor"/>
                            <path d="M87.81 18.53H75.91V27.85H87.81V18.53Z" fill="currentcolor"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M95.12 18.53H107.03V27.85H95.12V18.53Z" fill="currentcolor"/>
                            <path d="M125.94 18.53H114V27.85H125.94V18.53Z" fill="currentcolor"/>
                            <path d="M144.5 18.53H132.56V27.85H144.5V18.53Z" fill="currentcolor"/>
                            <path d="M11.94 0H0V9.28H11.94V0Z" fill="currentcolor"/>
                            <path d="M30.81 0H18.87V9.28H30.81V0Z" fill="currentcolor"/>
                            <path d="M49.37 0H37.47V9.28H49.37V0Z" fill="currentcolor"/>
                            <path d="M68.25 0H56.34V9.28H68.25V0Z" fill="currentcolor"/>
                            <path d="M86.81 0H74.91V9.28H86.81V0Z" fill="currentcolor"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M94.12 6.10352e-05H106.03V9.27997H94.12V6.10352e-05Z" fill="currentcolor"/>
                        </g>
                    </svg>
                </div>
                <div class="team__details-content">
                    <span class="sub-title">{{$returnPolicy->ustbaslik}}</span>
                    <h2 class="title">{{$returnPolicy->baslik}}</h2>
                    <p>{{$returnPolicy->metin}}</p>
                </div>
            </div>
        </div>
    </div>
</section>

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