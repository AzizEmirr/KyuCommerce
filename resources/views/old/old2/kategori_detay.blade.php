@extends('frontend.main_master')

@php
$seo = App\Models\Seo::find(1);
@endphp

@section('title'){{$seo->site_adi}} | {{ $kategoriAdi->kategori_adi }}@endsection
@section('author'){{$seo->author}}@endsection
@section('description')Teknoloji, yazılım ve bilişim hakkında en güncel ve faydalı içerikleri bulabileceğiniz bloguma hoş geldiniz.@endsection
@section('keywords')teknoloji, yazılım, blog, yaşam, kodlama.@endsection
@section('url'){{url('blog/kategori/' . $kategoriAdi->id . '/' . $kategoriAdi->url)}}@endsection
@section('resim'){{ url('/')}}/{{$seo->resim}}@endsection

@section('main')

<!-- Page Title -->
<section class="page-title" style="background-image:url({{asset ('frontend')}}/assets//images/background/page-title.jpg)">
    <div class="auto-container">
        <h2>{{ $kategoriAdi->kategori_adi }}</h2>
        <ul class="bread-crumb clearfix">
            <li><a href="{{ url('/') }}">Anasayfa</a></li>
            <li><a href="{{ url ('blog') }}">Tüm Bloglar</a></li>
            <li>{{ $kategoriAdi->kategori_adi }}</li>
        </ul>
    </div>
</section>
<!-- End Page Title -->

<!-- Blog One -->
<section class="blog-one">
    <div class="auto-container">
        <div class="row clearfix">

            @foreach ($blogpost as $blogposts)
            <!-- News Block One -->
            <div class="news-block_one col-lg-4 col-md-6 col-sm-12">
                <div class="news-block_one-inner wow fadeInLeft" data-wow-delay="150ms" data-wow-duration="1500ms">
                    <div class="news-block_one-image">
                        <a href="{{ url('blog/' . $blogposts->id . '/' . $blogposts->url) }}"><img src="{{ !empty($blogposts->resim) ? url($blogposts->resim) : url('uploads/bloglar/resim-yok.jpg') }}" alt="" /></a>
                    </div>
                    <div class="news-block_one-content">
                        <ul class="news-block_one-meta">
                            <li><span class="icon fa-solid fa-clock fa-fw"></span>{{ $blogposts->created_at->tz('Europe/Istanbul')->format('d.m.Y - H:i') }}</li>
                        </ul>
                        <h5 class="news-block_one-heading"><a href="{{ url('blog/' . $blogposts->id . '/' . $blogposts->url) }}">{{ $blogposts->baslik }}</a></h5>
                        <div class="news-block_one-text">{!! Str::limit($blogposts->aciklama, 200, '...') !!}</div>
                        <div class="news-block_one-info d-flex justify-content-center align-items-center flex-wrap">
                            <a class="news-block_one-more theme-btn" href="{{ url('blog/' . $blogposts->id . '/' . $blogposts->url) }}">Devamını Oku..</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>
<!-- End Blog One -->
    
@endsection
