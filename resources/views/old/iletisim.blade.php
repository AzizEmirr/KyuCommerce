@extends('frontend.main_master')

@php
    $seo = App\Models\Seo::find(1);
    $ayarlar = App\Models\Ayarlar::find(1);
@endphp

@section('title'){{ $seo->site_adi }} | İletişim @endsection
@section('author'){{ $seo->author }}@endsection
@section('description')Bizimle iletişime geçmek için bu sayfayı kullanabilirsiniz. Sorularınız, geri bildirimleriniz veya işbirliği teklifleriniz için bizimle iletişime geçin.@endsection
@section('keywords')İletişim, Bize Ulaşın, Geri Bildirim, İşbirliği,@endsection
@section('url'){{ url('/iletisim') }}@endsection
@section('resim'){{ url('/') }}/{{ $seo->resim }}@endsection

@section('main')

    <!-- Page Title -->
    <section class="page-title" style="background-image:url({{asset ('frontend')}}/assets/images/background/page-title.jpg)">
        <div class="auto-container">
            <h2>İletişim</h2>
            <ul class="bread-crumb clearfix">
                <li><a href="{{ url('/') }}">Ana Sayfa</a></li>
                <li>İletişim</li>
            </ul> 
        </div>
    </section>
    <!-- End Page Title -->

    <!-- Contact Info -->
    <section class="contact-info">
        <div class="auto-container">
            <div class="inner-container">
                <div class="row clearfix">
                    <!-- Info Column -->
                    <div class="contact-info_column col-lg-4 col-md-6 col-sm-12">
                        <div class="contact-info_outer">
                            <div class="contact-info_icon fa-solid fa-location-dot fa-fw"></div>
                            <h4 class="contact-info_heading">Adresimiz</h4>
                            <div class="contact-info_text"><a href="https://www.google.com/maps" target="_blank">{{ $ayarlar->adres }}</a></div>
                        </div>
                    </div>

                    <!-- Info Column -->
                    <div class="contact-info_column col-lg-4 col-md-6 col-sm-12">
                        <div class="contact-info_outer">
                            <div class="contact-info_icon fa-solid fa-phone fa-fw"></div>
                            <h4 class="contact-info_heading">İletişim Numaramız</h4>
                            <div class="contact-info_text"><a href="tel:{{$ayarlar->telefon}}">{{ $ayarlar->telefon }}</a></div>
                        </div>
                    </div>

                    <!-- Info Column -->
                    <div class="contact-info_column col-lg-4 col-md-6 col-sm-12">
                        <div class="contact-info_outer">
                            <div class="contact-info_icon fa-solid fa-envelope fa-fw"></div>
                            <h4 class="contact-info_heading">E-posta Adresimiz</h4>
                            <div class="contact-info_text"><a href="mailto:{{$ayarlar->mail}}">{{ $ayarlar->mail }}</a></div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- End Contact Info -->

    <!-- Contact Form Box -->
    <section class="contact-form-box">
        <div class="auto-container">
            <div class="inner-container">
                <div class="row clearfix">
                    <div class="col-lg-12">
                        <div class="title-area mb-30">
                            <h2 class="sec-title">Bize Ulaşın</h2>
                        </div>
                        <form method="POST" action="{{ route('teklif.form') }}" class="contact-form">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <input type="text" name="adi" class="form-control {{ $errors->has('adi') ? 'is-invalid' : '' }}" placeholder="Adınız" value="{{ old('adi') }}">
                                    @error('adi')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group col-md-6">
                                    <input type="email" name="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" placeholder="E-posta Adresiniz" value="{{ old('email') }}">
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group col-md-6">
                                    <input type="text" name="telefon" class="form-control {{ $errors->has('telefon') ? 'is-invalid' : '' }}" placeholder="Telefon Numaranız" value="{{ old('telefon') }}">
                                    @error('telefon')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group col-md-6">
                                    <select class="form-select nice-select" name="konu" required>
                                        <option value="" disabled selected hidden>Bir Kısım Seçiniz</option>
                                        <option value="Soru">Soru</option>
                                        <option value="Öneri">Öneri</option>
                                        <option value="Şikayet">Şikayet</option>
                                        <option value="Bilgilendirme">Bilgilendirme</option>
                                        <option value="Başka">Başka...</option>
                                    </select>
                                    @error('konu')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group col-12">
                                    <textarea name="text" class="form-control {{ $errors->has('text') ? 'is-invalid' : '' }}" placeholder="Mesajınız">{{ old('text') }}</textarea>
                                    @error('text')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-btn col-12">
                                    <button type="submit" class="theme-btn btn-style-one">Mesajı Gönder</button>
                                </div>
                            </div>
                            <p class="form-messages mb-0 mt-3"></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Contact Form Box -->

    <!-- Map One -->
    <section class="map-one">
        <div class="map-outer">
            {!! $ayarlar->harita !!}
        </div>
    </section>
    <!-- End Map One -->

@endsection

