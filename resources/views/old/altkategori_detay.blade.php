@extends('frontend.main_master')

@php
    $seo = App\Models\Seo::find(1);
@endphp

@section('title'){{$seo->site_adi}} | {{ $altkategori->altkategori_adi }}@endsection
@section('author'){{$seo->author}}@endsection
@section('description'){{ $altkategori->aciklama }}@endsection
@section('keywords'){{$altkategori->anahtar}}@endsection
@section('url'){{ url('altkategori/' . $altkategori->id . '/' . $altkategori->altkategori_url)}}@endsection
@section('resim'){{ url('/')}}/{{$altkategori->resim}}@endsection

@section('main')

    <!-- game section start  -->
    <section style="margin-top: 50px" class="game-section pb-120">
        <div class="container-fluid">
            <div class="row align-items-center justify-content-between mb-lg-15 mb-md-8 mb-sm-6 mb-4">
                <div class="col-6">
                    <h2 class="display-four tcn-1 cursor-scale growUp title-anim">{{ $altkategori->altkategori_adi }} Ürünleri</h2>
                </div>
            </div>
            <div class="row gy-lg-10 gy-6">
                @if ($urunler->isEmpty())
                <p class="text-center">Şu anda ürün bulunmamaktadır.</p>
                @else
                    @foreach ($urunler as $urun)
                        <div class="col-xxl-2 col-lg-3 col-md-4 col-sm-6">
                            <div class="game-card-wrapper mx-auto">
                                <div class="game-card mb-5 p-2">
                                    <div class="game-card-border"></div>
                                    <div class="game-card-border-overlay"></div>
                                    <div class="game-img" style="height: 438px;">
                                        <img src="{{ !empty($urun->resim) ? url($urun->resim) : url('uploads/urun/resim-yok.jpg') }}"
                                            alt="game" style="width: 100%; height: 100%; object-fit: cover;">
                                    </div>
                                    <div class="game-link d-center">
                                        <a href="{{ url('tur/' . $urun->id . '/' . $urun->url) }}" class="btn2">
                                            <i class="ti ti-arrow-right fs-2xl"></i>
                                        </a>
                                    </div>
                                </div>
                                <a href="{{ url('tur/' . $urun->id . '/' . $urun->url) }}">
                                    <h4 class="game-title mb-0 tcn-1 cursor-scale growDown2 title-anim">{{ $urun->baslik }}
                                    </h4>
                                </a>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>
    <!-- game section end  -->

@endsection
