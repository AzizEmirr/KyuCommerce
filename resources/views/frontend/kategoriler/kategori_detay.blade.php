@extends('frontend.main_master')

@php
    $seo = App\Models\Seo::find(1);
    $ayarlar = App\Models\Ayarlar::find(1);
    $kategoriler = App\Models\Altkategoriler::where('durum', 1)->orderBy('sirano')->take(4)->get();
@endphp

@section('title')
    {{ $seo->title }} | {{ $kategori->kategori_adi }}
@endsection
@section('author')
    {{ $seo->author }}
@endsection
@section('description')
    {{ $kategori->aciklama }}
@endsection
@section('keywords')
    {{ $kategori->anahtar }}
@endsection
@section('url')
    {{ url('kategori/' . $kategori->id . '/' . $kategori->kategori_url) }}
@endsection
@section('resim')
    {{ url('/') }}/{{ $kategori->resim }}
@endsection

@section('main')
    <!-- breadcrumb-area -->
    <section class="breadcrumb-area breadcrumb__hide-img" data-background="{{ asset('frontend') }}/img/slider/valo.png">
        <div class="container">
            <div class="breadcrumb__wrapper">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb__content">
                            <h2 class="title">{{ $kategori->kategori_adi }}</h2>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Anasayfa</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ $kategori->kategori_adi }}
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb-area-end -->

    <!-- shop-area -->
    <section class="shop-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-3 col-lg-4 col-md-11 order-2 order-lg-0">
                    <aside class="shop-sidebar">
                        <div class="shop__widget">
                            <h4 class="shop__widget-title">Ara</h4>
                            <div class="shop__widget-inner">
                                <div class="shop__search">
                                    <form action="{{ url('/arama') }}" method="get" class="input-group">
                                        <input type="text" name="q" class="form-control" placeholder="Valorant Aimbot" aria-label="Ara">
                                        <button class="btn btn-outline-secondary" type="submit" id="button-addon2">
                                            <i class="flaticon-search"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        
                        <div class="shop__widget">
                            <h4 class="shop__widget-title">Son Eklenen Ürünler</h4>
                            <div class="shop__widget-inner">
                                @foreach ($sonurunler as $urun)
                                    <div class="related__products-item">
                                        <div class="related__products-thumb">
                                            <a href="{{ url('urun/' . $urun->id . '/' . $urun->url) }}"><img
                                                    src="{{ !empty($urun->resim) ? url($urun->resim) : url('uploads/urunler/537x540.png') }}"
                                                    alt="img"></a>
                                        </div>
                                        <div class="related__products-content">
                                            <h4 class="product-name"><a
                                                    href="{{ url('urun/' . $urun->id . '/' . $urun->url) }}">{{ $urun->baslik }}</a>
                                            </h4>
                                            <span class="amount">{{ $urun->fiyat }} TL</span>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="shop__widget">
                            <h4 class="shop__widget-title">Kategoriler</h4>
                            <div class="shop__widget-inner">
                                <ul class="product-categories list-wrap">
                                    @php
                                        $kategoriler = App\Models\Kategoriler::where('durum', 1)
                                            ->with([
                                                'altkategoriler' => function ($query) {
                                                    $query->where('durum', 1)->with([
                                                        'urunler' => function ($query) {
                                                            $query->where('durum', 1);
                                                        },
                                                    ]);
                                                },
                                            ])
                                            ->orderBy('sirano')
                                            ->get();
                                    @endphp
                                    @foreach ($kategori->altkategoriler as $altkategori)
                                        <li><a
                                                href="{{ url('altkategori/' . $altkategori->id . '/' . $altkategori->altkategori_url) }}">{{ $altkategori->altkategori_adi }}</a><span
                                                class="float-right">{{ $altkategori->urunler->count() }}</span></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </aside>
                </div>
                <div class="col-xl-9 col-lg-8 col-md-11">
                    <div class="shop__top-wrap">
                        <div class="row align-items-center">
                            <div class="col-lg-8 col-sm-6">
                                <div class="shop__showing-result">
                                    <p>Showing 1 - 9 of 15 results</p>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-6">
                                <div class="shop__ordering">
                                    <select name="orderby" class="orderby">
                                        <option value="Default sorting">Default sorting</option>
                                        <option value="Sort by popularity">Sort by popularity</option>
                                        <option value="Sort by average rating">Sort by average rating</option>
                                        <option value="Sort by latest">Sort by latest</option>
                                        <option value="Sort by latest">Sort by latest</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div
                        class="row justify-content-center row-cols-xl-3 row-cols-lg-2 row-cols-md-2 row-cols-sm-2 row-cols-1">
                        @foreach ($urunler as $urun)
                            <div class="col">
                                <div class="shop__item">
                                    <div class="shop__item-thumb">
                                        <a href="{{ url('urun/' . $urun->id . '/' . $urun->url) }}"><img
                                                src="{{ !empty($urun->resim) ? url($urun->resim) : url('uploads/urunler/537x540.png') }}"
                                                alt="img"></a>
                                        <a href="#" class="wishlist-button"><i class="far fa-heart"></i></a>
                                    </div>
                                    <div class="shop__item-line"></div>
                                    <div class="shop__item-content">
                                        <div class="shop__item-content-top">
                                            <h4 class="title"><a href="{{ url('urun/' . $urun->id . '/' . $urun->url) }}">
                                                    {{ $urun->baslik }}</a></h4>
                                            <div class="shop__item-price">{{ $urun->fiyat }} TL</div>
                                        </div>
                                        <div class="shop__item-cat"><a
                                                href="{{ url('urun/' . $urun->id . '/' . $urun->url) }}">
                                                {{ $urun->aciklama }}</a></div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    {{ $urunler->links('vendor.pagination.custom') }}
                </div>
            </div>
        </div>
    </section>
@endsection
