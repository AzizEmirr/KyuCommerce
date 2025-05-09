@extends('frontend.main_master')

@php
$seo = App\Models\Seo::find(1);
$ayarlar = App\Models\Ayarlar::find(1);
@endphp

@section('title'){{$seo->site_adi}} | {{ $icerik->baslik }}@endsection
@section('author'){{$seo->author}}@endsection
@section('description'){{$icerik->aciklama}}@endsection
@section('keywords'){{$icerik->anahtar}} @endsection
@section('url'){{ url('/')}}@endsection
@section('resim'){{ url('/')}}/{{$icerik->resim}}@endsection

@section('main')

<!-- Common Banner Area -->
<section id="common_banner">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="common_bannner_text">
                    <h2>{{ $icerik->baslik }}</h2>
                    <ul>
                        <li><a href="{{ url('/') }}">Ana sayfa</a></li>
                        <li><a
                                href="{{ url('blog/kategori/' . $icerik['kategoriler']['id'] . '/' . $icerik['kategoriler']['url']) }}">{{ $icerik['kategoriler']['kategori_adi'] }}</a>
                        </li>
                        <li><span><i class="fas fa-circle"></i></span>{{ $icerik->baslik }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- News Area -->
<section id="news_details_main_arae" class="section_padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="news_detail_wrapper">
                    <div class="news_details_content_area">
                        <img style="margin-bottom: 50px" src="{{ !empty($icerik->resim) ? url($icerik->resim) : url('uploads/bloglar/resim-yok.jpg') }}"
                            alt="" style="width: 850px; height: 450px; object-fit: cover;" />
                        {!! $icerik->metin !!}
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="news_details_rightbar">
                    <div class="news_details_right_item">
                        <h3>Son Gönderiler</h3>
                        @foreach ($icerikHepsi as $icerikler)
                            <div class="recent_news_item">
                                <div class="recent_news_img">
                                    <img src="{{ !empty($icerikler->resim) ? url($icerikler->resim) : url('uploads/bloglar/resim-yok.jpg') }}"
                                        alt="img"
                                        style="width: 150px; height: 100px; object-fit: cover; border-radius: 10px;">

                                </div>
                                <div class="recent_news_text">
                                    <h5><a
                                            href="{{ url('blog/' . $icerikler->id . '/' . $icerikler->url) }}">{{ $icerikler->baslik }}</a>
                                    </h5>
                                    <p><a
                                            href="{{ url('blog/' . $icerikler->id . '/' . $icerikler->url) }}">{{ $icerikler->created_at->tz('Europe/Istanbul')->format('d.m.Y - H:i') }}</a>
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="news_details_right_item">
                        <h3>Bazı Popüler Taglar</h3>
                        <div class="news_tags_area">
                            <ul>
                                @foreach ($etiketler as $etiket => $count)
                                    <li><a href="#{{ 'tag/' . $etiket }}">{{ $etiket }}
                                            ({{ $count }})</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="news_details_right_item">
                        <h3>Bizi Takip Edin</h3>
                        <div class="share_icon_area">
                            <ul>
                                @if ($ayarlar->facebook)
                                    <li> <a href="{{ $ayarlar->facebook }}" target="blank"><i
                                                class="fab fa-facebook-f"></i></a></li>
                                @endif
                                @if ($ayarlar->twitter)
                                    <li> <a href="{{ $ayarlar->twitter }}" target="blank"><i
                                                class="fab fa-twitter"></i></a></li>
                                @endif
                                @if ($ayarlar->instagram)
                                    <li> <a href="{{ $ayarlar->instagram }}" target="blank"><i
                                                class="fab fa-instagram"></i></a></li>
                                @endif
                                @if ($ayarlar->whatsapp)
                                    <li> <a href="{{ $ayarlar->whatsapp }}" target="blank"><i
                                                class="fab fa-whatsapp"></i></a></li>
                                @endif

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
