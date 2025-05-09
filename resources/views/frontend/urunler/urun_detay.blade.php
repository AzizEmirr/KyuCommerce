@extends('frontend.main_master')

@php
    $seo = App\Models\Seo::find(1);
    $ayarlar = App\Models\Ayarlar::find(1);
    $yorumlar = App\Models\Yorumlar::orderBy('sirano')->where('durum', 1)->get();
@endphp


@section('title') Ürün Detay | {{ $urunler->baslik }} {{ $seo->site_adi }} @endsection
@section('author') {{ $seo->author }} @endsection
@section('description') {{ $urunler->aciklama }} @endsection
@section('keywords') {{ $urunler->anahtar }} @endsection
@section('url') {{ url('/') }} @endsection
@section('resim') {{ url('/') }}/{{ $urunler->resim }} @endsection

@section('main')

    <!-- breadcrumb-area -->
    <section class="breadcrumb-area breadcrumb__hide-img" data-background="{{ asset('frontend') }}/img/slider/valo.png">
        <div class="container">
            <div class="breadcrumb__wrapper">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb__content">
                            <h2 class="title">{{ $urunler->baslik }}</h2>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item active">
                                        <a
                                            href="{{ url('altkategori/' . $urunler['Altkategori']['id'] . '/' . $urunler['Altkategori']['altkategori_url']) }}">
                                            {{ $urunler['Altkategori']['altkategori_adi'] }}
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ $urunler->baslik }}</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- shop-area -->
    <section class="shop-area shop-details-area">
        <div class="container">
            <div class="row">
                <div class="shop__details-images-wrap">
                    <ul class="nav nav-tabs" id="imageTab" role="tablist">
                        @php
                            $aktifMedya = $urunler->medya->where('durum', 1);
                            $ilkMedya = $aktifMedya->first();
                        @endphp
                        
                        @if($aktifMedya->isNotEmpty())
                            @foreach ($aktifMedya as $index => $medya)
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link {{ $medya->id == $ilkMedya->id ? 'active' : '' }}" 
                                            id="image-tab-{{ $medya->id }}" 
                                            data-bs-toggle="tab" 
                                            data-bs-target="#image-{{ $medya->id }}" 
                                            type="button" 
                                            role="tab" 
                                            aria-controls="image-{{ $medya->id }}" 
                                            aria-selected="{{ $medya->id == $ilkMedya->id ? 'true' : 'false' }}">
                                        <img src="{{ asset($medya->medya_url) }}" alt="Medya">
                                    </button>
                                </li>
                            @endforeach
                        @else
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active">
                                    <img src="{{ asset('uploads/urunler/537x540.png') }}" alt="Varsayılan Resim">
                                </button>
                            </li>
                        @endif
                    </ul>
                    
                    <div class="tab-content" id="imageTabContent">
                        @if($aktifMedya->isNotEmpty())
                            @foreach ($aktifMedya as $index => $medya)
                                <div class="tab-pane {{ $medya->id == $ilkMedya->id ? 'show active' : '' }}" 
                                     id="image-{{ $medya->id }}" 
                                     role="tabpanel" 
                                     aria-labelledby="image-tab-{{ $medya->id }}">
                                    @if(in_array(pathinfo($medya->medya_url, PATHINFO_EXTENSION), ['mp4', 'avi', 'mov']))
                                        <a href="{{ asset($medya->medya_url) }}" class="popup-video">
                                            <video width="100%" controls>
                                                <source src="{{ asset($medya->medya_url) }}" type="video/{{ pathinfo($medya->medya_url, PATHINFO_EXTENSION) }}">
                                                Tarayıcınız video etiketini desteklemiyor.
                                            </video>
                                        </a>
                                    @else
                                        <a href="{{ asset($medya->medya_url) }}" class="popup-image">
                                            <img src="{{ asset($medya->medya_url) }}" alt="Görsel">
                                        </a>
                                    @endif
                                </div>
                            @endforeach
                        @else
                            <div class="tab-pane show active">
                                <img src="{{ asset('uploads/urunler/537x540.png') }}" alt="Varsayılan Resim">
                            </div>
                        @endif
                    </div>
                </div>
                

                <div class="shop__details-content">
                    <div class="shop__details-rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h2 class="title">{{ $urunler->baslik }}</h2>
                    <div class="shop__details-price">
                        <span class="amount">{{ $urunler->fiyat }} TL<span class="stock-status"> / @if($urunler->stok == 1) Stokta var @else Stokta yok @endif </span></span>
                    </div>
                    <div class="shop__details-short-description">
                        <p>{{ $urunler->aciklama }}</p>
                    </div>
                    <div class="shop__details-model d-flex align-items-center">
                        <p class="model m-0">Tag:</p>
                        <ul class="list-wrap d-flex align-items-center">
                            <ul class="list-wrap d-flex align-items-center">
                                @foreach ($etiket as $etiketItem)
                                    <li class="active">{{ $etiketItem }}</li>
                                @endforeach
                            </ul>

                        </ul>
                    </div>
                    <div class="shop__details-qty">
                        <div class="cart-plus-minus d-flex flex-wrap align-items-center">
                            <a href="{{ $urunler->link }}" target="blank"><button class="shop__details-cart-btn">Buy</button></a>
                        </div>
                    </div>
                    <div class="shop__details-bottom">
                        <div class="posted_in">
                            <b>Kategoriler :</b>
                            <a
                                href="{{ url('altkategori/' . $urunler['Altkategori']['id'] . '/' . $urunler['Altkategori']['altkategori_url']) }}">{{ $urunler['Altkategori']['altkategori_adi'] }}</a>
                        </div>
                        <div class="product_share">
                            <b>Paylaş :</b>
                            @if ($ayarlar->youtube)
                                <a href="{{ $ayarlar->youtube }}" target="blank"><i class="fab fa-youtube"></i></a>
                            @endif
                            @if ($ayarlar->twitter)
                                <a href="{{ $ayarlar->twitter }}" target="blank"><i class="fab fa-twitter"></i></a>
                            @endif
                            @if ($ayarlar->instagram)
                                <a href="{{ $ayarlar->instagram }}" target="blank"><i class="fab fa-instagram"></i></a>
                            @endif
                            @if ($ayarlar->discord)
                                <a href="{{ $ayarlar->whatsapp }}" target="blank"><i class="fab fa-discord"></i></a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="product__desc-wrap">
                        <ul class="nav nav-tabs" id="descriptionTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="info-tab" data-bs-toggle="tab" data-bs-target="#info"
                                    type="button" role="tab" aria-controls="info" aria-selected="false">Ürün Bilgisi</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link " id="description-tab" data-bs-toggle="tab"
                                    data-bs-target="#description" type="button" role="tab"
                                    aria-controls="description" aria-selected="true">Açıklama</button>
                            </li>


                        </ul>
                        <div class="tab-content" id="descriptionTabContent">
                            <div class="tab-pane animation-none fade  " id="description" role="tabpanel"
                                aria-labelledby="description-tab">
                                <p>{{ $urunler->aciklama }}</p>
                            </div>
                            <div class="tab-pane animation-none fade show active" id="info" role="tabpanel"
                                aria-labelledby="info-tab">
                                {!! $urunler->metin !!}
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="related__product-area">
                <div class="related__product-wrapper">
                    <h2 class="related-title">Son Eklenen Ürünler</h2>
                    <div
                        class="row justify-content-center row-cols-xl-4 row-cols-lg-3 row-cols-md-2 row-cols-sm-2 row-cols-1">
                        @foreach ($sonurunler as $urun)
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
                                            <h4 class="title"><a
                                                    href="{{ url('urun/' . $urun->id . '/' . $urun->url) }}">{{ $urun->baslik }}</a>
                                            </h4>
                                            <div class="shop__item-price">{{ $urun->fiyat }} TL</div>
                                        </div>
                                        <div class="shop__item-cat"><a
                                                href="{{ url('altkategori/' . $urunler['Altkategori']['id'] . '/' . $urunler['Altkategori']['altkategori_url']) }}">{{ $urunler['Altkategori']['altkategori_adi'] }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- shop-area-end -->

@endsection
