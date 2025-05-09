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
<section id="common_banner">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="common_bannner_text">
                    <h2>{{ $kategoriAdi->kategori_adi }}</h2>
                    <ul>
                        <li><a href="{{ url('/') }}">Anasayfa</a></li>
                        <li><a href="{{ url('blog') }}">Bloglar</a></li>
                        <li><span><i class="fas fa-circle"></i></span>{{ $kategoriAdi->kategori_adi }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Page Title -->

<section id="news_main_arae" class="section_padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="section_heading_center">
                    <h2>"{{ $kategoriAdi->kategori_adi }}" İçin Son Yazılan Bloglar</h2>
                </div>
            </div>
        </div>

            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-summer" role="tabpanel" aria-labelledby="nav-summer-tab">
                    <div class="row">
                        @foreach ($blogpost as $blogposts)
                        <div class="col-lg-4 col-md-6 col-sm-12 col-12 mb-4">
                            <div class="news_item_boxed shadow-sm border rounded-3 overflow-hidden">
                                <div class="news_item_img position-relative">
                                    <a href="{{ url('blog/' . $blogposts->id . '/' . $blogposts->url) }}">
                                        <img src="{{ !empty($blogposts->resim) ? url($blogposts->resim) : url('uploads/bloglar/resim-yok.jpg') }}" alt="img" class="img-fluid w-100" style="height: 250px; object-fit: cover;" />
                                    </a>
                                </div>
                                <div class="news_item_content p-3">
                                    <h3><a href="{{ url('blog/' . $blogposts->id . '/' . $blogposts->url) }}" class="text-dark font-weight-bold text-decoration-none">{{ $blogposts->baslik }}</a></h3>
                                    <p class="text-muted">{!! Str::limit($blogposts->aciklama, 200, '...') !!}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

            </div>
            
            <!-- Pagination -->
            <div class="th-pagination d-flex justify-content-center mt-4">
                {{ $blogpost->links('vendor.pagination.simple-tailwind') }}
            </div>
        </div>
    </div>
</section>

@endsection
