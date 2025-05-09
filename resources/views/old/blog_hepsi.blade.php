@extends('frontend.main_master')

@php
$seo = App\Models\Seo::find(1);
@endphp

@section('title'){{$seo->site_adi}} | Blog @endsection
@section('author'){{$seo->author}}@endsection
@section('description')Teknoloji, yazılım ve bilişim hakkında en güncel ve faydalı içerikleri bulabileceğiniz bloguma hoş geldiniz.@endsection
@section('keywords')teknoloji, yazılım, blog, yaşam, kodlama.@endsection
@section('url'){{ url('/blog') }}@endsection
@section('resim'){{ url('/')}}/{{ $seo->resim }}@endsection



@section('main')
    <div class="breadcumb-wrapper" data-bg-src="{{ asset('frontend') }}/assets/img/bg/breadcumb-bg.jpg">
        <div class="container">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title">Tüm Bloglar</h1>
                <ul class="breadcumb-menu">
                    <li><a href="{{ url('/') }}">Anasayfa</a></li>
                    <li>Tüm Bloglar</li>
                </ul>
            </div>
        </div>
    </div>
    <section class="th-blog-wrapper space-top space-extra-bottom">
        <div class="container">
            <div class="row">
                <div class="col-xxl-8 col-lg-7">
                    @foreach ($icerikHepsi as $tumicerikler)
                        <div class="th-blog blog-single has-post-thumbnail">
                            <div class="blog-img"><a
                                    href="{{ url('blog/' . $tumicerikler->id . '/' . $tumicerikler->url) }}"><img
                                        src="{{ !empty($tumicerikler->resim) ? url($tumicerikler->resim) : url('uploads/bloglar/resim-yok.jpg') }}"
                                        alt="Blog Image"></a>
                            </div>
                            <div class="blog-content">
                                <div class="blog-meta"><a class="author" href="javascript:void(0);"><i
                                            class="fa-solid fa-user"></i>Alex
                                        Michel</a> <a href="javascript:void(0);"><i
                                            class="fa-solid fa-calendar-days"></i>{{ $tumicerikler->created_at->tz('Europe/Istanbul')->format('d.m.Y - H:i') }}</a>
                                    <a href="{{ url('blog/' . $tumicerikler->id . '/' . $tumicerikler->url) }}"><i
                                            class="fa-solid fa-tags"></i>Construction</a>
                                </div>
                                <h2 class="blog-title"><a
                                        href="{{ url('blog/' . $tumicerikler->id . '/' . $tumicerikler->url) }}">{{ $tumicerikler->baslik }}
                                    </a></h2>
                                <p class="blog-text">{!! Str::limit($tumicerikler->aciklama, 200, '...') !!}</p><a
                                    href="{{ url('blog/' . $tumicerikler->id . '/' . $tumicerikler->url) }}"
                                    class="line-btn th-icon">Read More<i class="fa-regular fa-arrow-right ms-2"></i></a>
                            </div>
                        </div>
                    @endforeach
                    <div class="th-pagination">
                        {{ $icerikHepsi->links('vendor.pagination.custom') }}
                    </div>
                </div>
                <div class="col-xxl-4 col-lg-5">
                    <aside class="sidebar-area">
                        <div class="widget widget_search">
                            <form class="search-form"><input type="text" placeholder="Enter Keyword"> <button
                                    type="submit"><i class="far fa-search"></i></button></form>
                        </div>
                        <div class="widget widget_categories">
                            <h3 class="widget_title">Tüm Kategoriler</h3>
                            <ul>
                                @foreach ($kategoriler as $kategori)
                                    <li>
                                        <a href="{{ url('blog/kategori/' . $kategori->id . '/' . $kategori->url) }}">{{ $kategori->kategori_adi }}
                                        </a>
                                        <i class="fa-regular fa-arrow-right"></i>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="widget">
                            <h3 class="widget-title mb-6">Son Gönderiler</h3>
                            <div class="list-group">
                                @foreach ($icerikHepsi as $icerikler)
                                    <a href="{{ url('blog/' . $icerikler->id . '/' . $icerikler->url) }}"
                                        class="list-group-item list-group-item-action d-flex align-items-center border-0 rounded-3 mb-3 shadow-sm">
                                        <img src="{{ !empty($icerikler->resim) ? url($icerikler->resim) : url('uploads/bloglar/resim-yok.jpg') }}"
                                            alt="Blog Image" class="img-fluid me-3 rounded"
                                            style="width: 80px; height: 80px; object-fit: cover;">
                                        <div class="d-flex flex-column w-100 overflow-hidden">
                                            <div class="d-flex align-items-center mb-2 text-muted">
                                                <i class="fa-solid fa-calendar-days me-1"></i>
                                                {{ $icerikler->created_at->tz('Europe/Istanbul')->format('d.m.Y - H:i') }}
                                            </div>
                                            <h4 class="mb-0 text-truncate"
                                                style="font-size: 0.9rem; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                                {{ $icerikler->baslik }}
                                            </h4>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                        <div class="widget widget_tag_cloud">
                            <h3 class="widget_title">Popular Tags</h3>
                            <div class="tagcloud">
                                @foreach ($etiketler as $etiket => $count)
                                    <a href="{{ url('blog/tag/' . urlencode($etiket)) }}">{{ $etiket }}
                                        ({{ $count }})
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </section>
@endsection
