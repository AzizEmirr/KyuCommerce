@extends('frontend.main_master')

@php
    $seo = App\Models\Seo::find(1);
    $ayarlar = App\Models\Ayarlar::find(1);
@endphp

@section('title'){{ $seo->title }} | İletişim @endsection
@section('author'){{ $seo->author }}@endsection
@section('description')Bizimle iletişime geçmek için bu sayfayı kullanabilirsiniz. Sorularınız, geri bildirimleriniz veya işbirliği teklifleriniz için bizimle iletişime geçin.@endsection
@section('keywords')İletişim, Bize Ulaşın, Geri Bildirim, İşbirliği,@endsection
@section('url'){{ url('/iletisim') }}@endsection
@section('resim'){{ url('/') }}/{{ $seo->resim }}@endsection

@section('main')


   <!-- banner -->
   <div class="mil-inner-banner mil-p-0-120">
    <div class="mil-banner-content mil-center mil-up">
        <div class="container">
            <ul class="mil-breadcrumbs mil-center mil-mb-60">
                <li><a href="home-1.html">Homepage</a></li>
                <li><a href="contact.html">Contact</a></li>
            </ul>
            <h1 class="mil-mb-60">Get in touch!</h1>
            <a href="#contact" class="mil-link mil-dark mil-arrow-place mil-down-arrow">
                <span>Send message</span>
            </a>
        </div>
    </div>
</div>
<!-- banner end -->

<!-- map -->
<div class="mil-map-frame mil-up">
    <div class="mil-map">
        <iframe src="" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
</div>
<!-- map end -->

<!-- contact form -->
<section id="contact">
    <div class="container mil-p-120-90">
        <h3 class="mil-center mil-up mil-mb-120">Let's <span class="mil-thin">Talk</span></h3>
        <form class="row align-items-center">
            <div class="col-lg-6 mil-up">
                <input type="text" placeholder="What's your name">
            </div>
            <div class="col-lg-6 mil-up">
                <input type="email" placeholder="Your Email">
            </div>
            <div class="col-lg-12 mil-up">
                <textarea placeholder="Tell us about our project"></textarea>
            </div>
            <div class="col-lg-8">
                <p class="mil-up mil-mb-30"><span class="mil-accent">*</span> We promise not to disclose your personal information to third parties.</p>
            </div>
            <div class="col-lg-4">
                <div class="mil-adaptive-right mil-up mil-mb-30">
                    <button type="submit" class="mil-button mil-arrow-place">
                        <span>Send message</span>
                    </button>
                </div>
            </div>
        </form>
    </div>
</section>
<!-- contact form end -->



@endsection

