@extends('frontend.main_master')

@php
    $seo = App\Models\Seo::find(1);
    $anasayfa = App\Models\Anasayfa::find(1);
@endphp

@section('title') {{ $seo->title }} | {{ $seo->site_adi }} @endsection
@section('author') {{ $seo->author }} @endsection
@section('description') {{ $seo->description }} @endsection
@section('keywords') {{ $seo->keywords }} @endsection
@section('url') {{ url('/') }} @endsection
@section('resim') {{ url('/') }}/{{ $seo->resim }} @endsection


@section('main')
    <main class="main--area">

        <!-- banner-area -->
		@if ($anasayfa->bannerdurum == 1)
        @include('frontend.anasayfa.banner')
		@endif
        <!-- banner-area-end -->


        <!-- area-background-start -->
        @if ($anasayfa->kategoridurum == 1)
            <div class="area-background" data-background="{{ asset('frontend') }}/img/bg/area_bg02.jpg">
                <!-- streamers-area -->
                @include('frontend.anasayfa.kategori')
                <!-- streamers-area-end -->
            </div>
        @endif
        <!-- area-background-end -->

        <!-- discord-area -->
        @if ($anasayfa->discorddurum == 1)
            @include('frontend.anasayfa.discord')
        @endif
        <!-- discord-area-end -->

        <!-- project-area -->
        @if ($anasayfa->urundurum == 1)
            @include('frontend.anasayfa.urunler')
        @endif
        <!-- project-area-end -->

        <!-- social-area -->
		@if ($anasayfa->sosyaldurum == 1)
        @include('frontend.anasayfa.sosyal')
		@endif
        <!-- social-area-end -->

        <!-- brand-area -->
        @if ($anasayfa->referansdurum == 1)
            @include('frontend.anasayfa.referanslar')
        @endif
        <!-- brand-area-end -->

    </main>
@endsection
