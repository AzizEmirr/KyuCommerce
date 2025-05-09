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

<section class="page-title" style="background-image:url({{asset ('frontend')}}/assets//images/background/page-title.jpg)">
    <div class="auto-container">
        <h2>Tüm Bloglar</h2>
        <ul class="bread-crumb clearfix">
            <li><a href="{{ url('/') }}">Anasayfa</a></li>
            <li>Tüm Bloglar</li>
        </ul>
    </div>
</section>
<!-- End Page Title -->

<!-- Sidebar Page Container -->
<div class="sidebar-page-container">
    <div class="auto-container">
        <div class="row clearfix">
            
            <!-- Content Side -->
            <div class="content-side col-lg-8 col-md-12 col-sm-12">
                <div class="blog-list">
                    @foreach ($icerikHepsi as $tumicerikler)
                    <!-- News Block Three -->
                    <div class="news-block_three">
                        <div class="news-block_three-inner">
                            <div class="news-block_three-image">
                                <a href="{{ url('blog/' . $tumicerikler->id . '/' . $tumicerikler->url) }}">
                                    <img src="{{ !empty($tumicerikler->resim) ? url($tumicerikler->resim) : url('uploads/bloglar/resim-yok.jpg') }}" alt="" style="width: 850px; height: 450px; object-fit: cover;" />
                                </a>
                            </div>
                            
                            <div class="news-block_three-content">
                                <ul class="news-block_three-meta">
                                    <li><span class="icon fa-solid fa-clock fa-fw"></span>{{ $tumicerikler->created_at->tz('Europe/Istanbul')->format('d.m.Y - H:i') }}</li>
                                </ul>
                                <h3 class="news-block_three-heading"><a href="{{ url('blog/' . $tumicerikler->id . '/' . $tumicerikler->url) }}">{{ $tumicerikler->baslik }}</a></h3>
                                <div class="news-block_three-text">{!! Str::limit($tumicerikler->aciklama, 200, '...') !!}</div>
                                <a class="news-block_three-more theme-btn" href="{{ url('blog/' . $tumicerikler->id . '/' . $tumicerikler->url) }}">Devamını Oku...</a>
                            </div>
                        </div>
                    </div>
                    @endforeach

                    <!-- Styled Pagination -->
                    <div class="th-pagination">
                        {{ $icerikHepsi->links('vendor.pagination.custom') }}
                    </div>
                    <!-- End Styled Pagination -->

                </div>
            </div>

            <!-- Sidebar Side -->
            <div class="sidebar-side col-lg-4 col-md-12 col-sm-12">
                <aside class="sidebar">


                    <!-- Sidebar Widget -->
                    <div class="sidebar-widget search-box">
                        <form method="GET" action="{{ route('frontend.blog.search') }}">
                            <div class="form-group">
                                <input type="search" name="q" value="" placeholder="Search Resources" required>
                                <button type="submit"><span class="icon fa fa-search"></span></button>
                            </div>
                        </form>
                    </div>

                    <!-- Popular Category Widget -->
                    <div class="sidebar-widget style-two category-widget">
                        <div class="widget-content">
                            <!-- Sidebar Title -->
                            <div class="sidebar-title">
                                <h4>Tüm Kategoriler</h4>
                            </div>
                            <div class="content">
                                <ul class="category-list">
                                    @foreach ($kategoriler as $kategori)
                                    <li><a href="{{ url('blog/kategori/' . $kategori->id . '/' . $kategori->url) }}">{{ $kategori->kategori_adi }} <span>{{ $kategori->icerik_sayisi }}</span></a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Post Widget -->
                    <div class="sidebar-widget style-two post-widget">
                        <div class="widget-content">
                            <!-- Sidebar Title -->
                            <div class="sidebar-title">
                                <h4>Son Gönderiler</h4>
                            </div>
                            <div class="content">
                                @foreach ($icerikHepsi as $icerikler)
                                <!-- Post -->
                                <div class="post">
                                    <div class="thumb"><a href="{{ url('blog/' . $icerikler->id . '/' . $icerikler->url) }}"><img src="{{ !empty($icerikler->resim) ? url($icerikler->resim) : url('uploads/bloglar/resim-yok.jpg') }}" alt=""></a></div>
                                    <div class="post-date"> {{ $icerikler->created_at->tz('Europe/Istanbul')->format('d.m.Y - H:i') }}</div>
                                    <h6><a href="{{ url('blog/' . $icerikler->id . '/' . $icerikler->url) }}"> {{ $icerikler->baslik }}</a></h6>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <!-- Tags Widget -->
                    <div class="sidebar-widget style-two popular-tags">
                        <div class="widget-content">
                            <!-- Sidebar Title -->
                            <div class="sidebar-title">
                                <h4>Bazı Popüler Taglar</h4>
                            </div>
                            <div class="content">
                                @foreach ($etiketler as $etiket => $count)
                                    <a href="#{{ ('tag/' . $etiket) }}">{{ $etiket }} ({{ $count }})</a>
                                @endforeach
                            </div>
                        </div>
                    </div>


                </aside>
            </div>

        </div>
    </div>
</div>

@endsection
