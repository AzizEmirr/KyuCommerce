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

 <!-- Common Banner Area -->
 <section id="common_banner">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="common_bannner_text">
                    <h2>Tüm Bloglar</h2>
                    <ul>
                        <li><a href="{{ url('/') }}">Anasayfa</a></li>
                        <li><span><i class="fas fa-circle"></i></span>Tüm Bloglar</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
@if($icerikHepsi->isNotEmpty())
<!-- News Area -->
<section id="news_main_arae" class="section_padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="section_heading_center">
                    <h2>Son Yazılan Bloglar</h2>
                </div>
            </div>
        </div>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-summer" role="tabpanel" aria-labelledby="nav-summer-tab">
                    <div class="row">
                        @foreach ($icerikHepsi as $tumicerikler)
                        <div class="col-lg-4 col-md-6 col-sm-12 col-12 mb-4">
                            <div class="news_item_boxed shadow-sm border rounded-3 overflow-hidden">
                                <div class="news_item_img position-relative">
                                    <a href="{{ url('blog/' . $tumicerikler->id . '/' . $tumicerikler->url) }}">
                                        <img src="{{ !empty($tumicerikler->resim) ? url($tumicerikler->resim) : url('uploads/bloglar/resim-yok.jpg') }}" alt="img" class="img-fluid w-100" style="height: 250px; object-fit: cover;" />
                                    </a>
                                </div>
                                <div class="news_item_content p-3">
                                    <h3><a href="{{ url('blog/' . $tumicerikler->id . '/' . $tumicerikler->url) }}" class="text-dark font-weight-bold text-decoration-none">{{ $tumicerikler->baslik }}</a></h3>
                                    <p class="text-muted">{!! Str::limit($tumicerikler->aciklama, 150, '...') !!}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            
            <!-- Pagination -->
            <div class="th-pagination d-flex justify-content-center mt-4">
                {{ $icerikHepsi->links('vendor.pagination.simple-tailwind') }}
            </div>
        </div>
    </div>
</section>
@else
<div style="margin-top:50px" class="container d-flex justify-content-center align-items-center">
    <div class="alert alert-danger alert-dismissible fade show w-75 text-center" role="alert">
        <i class="fas fa-exclamation-circle fa-2x"></i>
        <strong>Üzgünüz!</strong> Şu anda görüntülenecek blog bulunmamaktadır. Lütfen daha sonra tekrar deneyin.
    </div>
</div>
@endif
@endsection
