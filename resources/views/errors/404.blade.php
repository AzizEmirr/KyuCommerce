@extends('frontend.main_master')

@php
    $seo = App\Models\Seo::find(1);
@endphp

@section('title')Hata 404 - Sayfa Bulunamadı | {{$seo->site_adi}}@endsection
@section('author'){{$seo->author}}@endsection
@section('description'){{$seo->description}}@endsection
@section('keywords'){{$seo->keywords}}@endsection
@section('url'){{url('/')}}@endsection
@section('resim'){{ url('/')}}/{{$seo->resim}}@endsection

@section('main')

<section id="error_main" class="section_padding">
    <div class="container">
        <div class="row"> 
            <div class="col-lg-6 offset-lg-3 col-md-12 col-sm-12 col-12">
                <div class="error_content text-center">
                    <img src="{{asset ('frontend')}}/assets/img/common/error.png" alt="Hata Resmi">
                    <h2>Hata 404: Sayfa Bulunamadı</h2>
                    <a href="{{ url('/') }}" class="btn btn_theme btn_md">Anasayfaya Dön</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Cta Alanı -->
<section id="cta_area">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7">
                <div class="cta_left">
                    <div class="cta_icon">
                        <img src="{{asset ('frontend')}}/assets/img/common/email.png" alt="İkon">
                    </div>
                    <div class="cta_content">
                        <h4>En son haberleri ve teklifleri alın</h4>
                        <h2>Bültenimize Abone Olun</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
