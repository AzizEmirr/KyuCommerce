@extends('frontend.main_master')

@php
    $seo = App\Models\Seo::find(1);
@endphp

@section('title')
    @if(isset($searchTerm))
        Arama Sonuçları: "{{ $searchTerm }}" | {{ $seo->site_adi }}
    @else
        Bloglar | {{$seo->site_adi}}
    @endif
@endsection

@section('author'){{$seo->author}}@endsection
@section('description'){{$seo->description}}@endsection
@section('keywords'){{$seo->keywords}}@endsection
@section('url'){{url('/')}}@endsection
@section('resim'){{ url('/')}}/{{$seo->resim}}@endsection

@section('main')


<!-- Page Title -->
<section class="page-title" style="background-image:url({{asset ('frontend')}}/assets/images/background/page-title.jpg)">
    <div class="auto-container">
        <h2>                        
        @if(isset($searchTerm))
           Blog <br> Arama Sonuçları: "{{ $searchTerm }}"
        @else
            Bloglar
        @endif</h2>

    </div>
</section>
<!-- End Page Title -->

<!-- Blog One -->
<section class="blog-one">
    <div class="auto-container">
        <div class="row clearfix">
            @forelse($bloglar as $blog)
            <!-- News Block One -->
            <div class="news-block_one col-lg-4 col-md-6 col-sm-12">
                <div class="news-block_one-inner wow fadeInLeft" data-wow-delay="150ms" data-wow-duration="1500ms">
                    <div class="news-block_one-image">
                        <a href="{{ url('blog/' . $blog->id . '/' . $blog->url) }}"><img src="{{ !empty($blog->resim) ? url($blog->resim) : url('uploads/bloglar/resim-yok.jpg') }}" alt="" /></a>
                    </div>
                    <div class="news-block_one-content">
                        <ul class="news-block_one-meta">
                            <li><span class="icon fa-solid fa-clock fa-fw"></span>{{ $blog->created_at->tz('Europe/Istanbul')->format('d.m.Y - H:i') }}</li>
                        </ul>
                        <h5 class="news-block_one-heading"><a href="{{ url('blog/' . $blog->id . '/' . $blog->url) }}">{{ $blog->baslik }}</a></h5>
                        <div class="news-block_one-text">{!! Str::limit($blog->aciklama, 200, '...') !!}</div>
                        <div class="news-block_one-info d-flex justify-content-center align-items-center flex-wrap">
                            <a class="news-block_one-more theme-btn" href="{{ url('blog/' . $blog->id . '/' . $blog->url) }}">Devamını Oku..</a>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12">
                <div class="alert alert-warning text-center" role="alert">
                    <strong>Uyarı!</strong> Arama sonucunuza göre bir blog bulunamadı.
                </div>
            </div>
            
        @endforelse
        </div>
    </div>
</section>
<!-- End Blog One -->


@endsection
