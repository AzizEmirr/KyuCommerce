@php
    $ayarlar = App\Models\Ayarlar::find(1);
@endphp

<div class="th-menu-wrapper">
    <div class="th-menu-area text-center"><button class="th-menu-toggle"><i class="fal fa-times"></i></button>
        <div class="mobile-logo"><a href="home-company.html"><img src="{{ asset('frontend') }}/assets/img/logo.svg"
                    alt="Kotar"></a>
        </div>
        <div class="th-mobile-menu">
            <ul>
                <li><a href="{{ url('/') }} ">Ana Sayfa</a></li>
                <li><a href="{{ url('/hakkimizda') }} ">Hakkımızda</a></li>

                @php
                    $kategoriler = App\Models\Kategoriler::OrderBy('kategori_adi', 'asc')->limit(3)->get();
                @endphp

                @foreach ($kategoriler as $kategori)
                    <li class="menu-item-has-children"><a
                            href="{{ url('kategori/' . $kategori->id . '/' . $kategori->kategori_url) }}">{{ $kategori->kategori_adi }}</a>
                        @php
                            $altkategoriler = App\Models\AltKategoriler::where('kategori_id', $kategori->id)
                                ->OrderBy('altkategori_adi', 'asc')
                                ->get();
                        @endphp
                        <ul class="sub-menu">
                            @foreach ($altkategoriler as $altkategori)
                                <li><a
                                        href="{{ url('altkategori/' . $altkategori->id . '/' . $altkategori->altkategori_url) }}">
                                        {{ $altkategori->altkategori_adi }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                @endforeach
                <li class="menu-item-has-children"><a href="{{ url('/blog') }} ">Blog</a>
                    <ul class="sub-menu">
                        @php
                            $kategoriler = App\Models\Blogkategoriler::where('durum', 1)
                                ->OrderBy('sirano', 'ASC')
                                ->get();
                        @endphp
                        @foreach ($kategoriler as $kategori)
                            <li><a href="{{ url('blog/kategori/' . $kategori->id . '/' . $kategori->url) }}">{{ $kategori->kategori_adi }}
                                </a></li>
                        @endforeach
                    </ul>
                </li>
                <li><a href="{{ route('iletisim') }}">İletişim</a></li>
            </ul>
        </div>
    </div>
</div>
<header class="th-header header-layout3">
    <div class="sticky-wrapper">
        <div class="menu-area">
            <div class="container th-container">
                <div class="row justify-content-between align-items-center">
                    <div class="col-auto">
                        <div class="header-logo"><a href="{{ url('/') }}"><img
                                    src="{{ asset('frontend') }}/assets/img/logo-white.svg" alt="Kotar"></a>
                        </div>
                    </div>
                    <div class="col-auto d-none d-lg-block sticky-d-none">
                        <div class="info-card-wrap">
                            <div class="info-card">
                                <div class="info-card_icon"><img
                                        src="{{ asset('frontend') }}/assets/img/icon/call2.svg" alt="">
                                </div>
                                <div class="info-card_content">
                                    <p class="info-card_text">Telefon:</p><a href="tel:+{{$ayarlar->telefon}}"
                                        class="info-card_link">+{{$ayarlar->telefon}}</a>
                                </div>
                            </div>
                            <div class="info-card">
                                <div class="info-card_icon"><img src="{{ asset('frontend') }}/assets/img/icon/mail.svg"
                                        alt="">
                                </div>
                                <div class="info-card_content">
                                    <p class="info-card_text">E-Posta:</p><a href="mailto:{{$ayarlar->mail}}"
                                        class="info-card_link">{{$ayarlar->mail}}</a>
                                </div>
                            </div>
                            <div class="info-card">
                                <div class="info-card_icon"><img
                                        src="{{ asset('frontend') }}/assets/img/icon/location.svg" alt="">
                                </div>
                                <div class="info-card_content"><span class="info-card_label">Adres:</span>
                                    <p class="info-card_link">{{$ayarlar->adres}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto sticky-d-block">
                        <nav class="main-menu d-none d-lg-inline-block">
                            <ul>
                                <li><a href="{{ url('/') }} ">Ana Sayfa</a></li>
                                <li><a href="{{ url('/hakkimizda') }} ">Hakkımızda</a></li>

                                @php
                                    $kategoriler = App\Models\Kategoriler::OrderBy('kategori_adi', 'asc')
                                        ->limit(3)
                                        ->get();
                                @endphp

                                @foreach ($kategoriler as $kategori)
                                    <li class="menu-item-has-children"><a
                                            href="{{ url('kategori/' . $kategori->id . '/' . $kategori->kategori_url) }}">{{ $kategori->kategori_adi }}</a>
                                        @php
                                            $altkategoriler = App\Models\AltKategoriler::where(
                                                'kategori_id',
                                                $kategori->id,
                                            )
                                                ->OrderBy('altkategori_adi', 'asc')
                                                ->get();
                                        @endphp
                                        <ul class="sub-menu">
                                            @foreach ($altkategoriler as $altkategori)
                                                <li><a
                                                        href="{{ url('altkategori/' . $altkategori->id . '/' . $altkategori->altkategori_url) }}">
                                                        {{ $altkategori->altkategori_adi }}
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                @endforeach
                                <li class="menu-item-has-children"><a href="{{ url('/blog') }} ">Blog</a>
                                    <ul class="sub-menu">
                                        @php
                                            $kategoriler = App\Models\Blogkategoriler::where('durum', 1)
                                                ->OrderBy('sirano', 'ASC')
                                                ->get();
                                        @endphp
                                        @foreach ($kategoriler as $kategori)
                                            <li><a
                                                    href="{{ url('blog/kategori/' . $kategori->id . '/' . $kategori->url) }}">{{ $kategori->kategori_adi }}
                                                </a></li>
                                        @endforeach
                                    </ul>
                                </li>
                                <li><a href="{{ route('iletisim') }}">İletişim</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="col-auto d-lg-none"><button class="th-menu-toggle d-block d-lg-none"><i
                                class="far fa-bars"></i></button></div>
                </div>
                <div class="main-menu-area">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-auto">
                            <nav class="main-menu d-none d-lg-inline-block">
                                <ul>
                                    <li><a href="{{ url('/') }} ">Ana Sayfa</a></li>
                                    <li><a href="{{ url('/hakkimizda') }} ">Hakkımızda</a></li>

                                    @php
                                        $kategoriler = App\Models\Kategoriler::OrderBy('kategori_adi', 'asc')
                                            ->limit(3)
                                            ->get();
                                    @endphp

                                    @foreach ($kategoriler as $kategori)
                                        <li class="menu-item-has-children"><a
                                                href="{{ url('kategori/' . $kategori->id . '/' . $kategori->kategori_url) }}">{{ $kategori->kategori_adi }}</a>
                                            @php
                                                $altkategoriler = App\Models\AltKategoriler::where(
                                                    'kategori_id',
                                                    $kategori->id,
                                                )
                                                    ->OrderBy('altkategori_adi', 'asc')
                                                    ->get();
                                            @endphp
                                            <ul class="sub-menu">
                                                @foreach ($altkategoriler as $altkategori)
                                                    <li><a
                                                            href="{{ url('altkategori/' . $altkategori->id . '/' . $altkategori->altkategori_url) }}">
                                                            {{ $altkategori->altkategori_adi }}
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                    @endforeach
                                    <li class="menu-item-has-children"><a href="{{ url('/blog') }} ">Blog</a>
                                        <ul class="sub-menu">
                                            @php
                                                $kategoriler = App\Models\Blogkategoriler::where('durum', 1)
                                                    ->OrderBy('sirano', 'ASC')
                                                    ->get();
                                            @endphp
                                            @foreach ($kategoriler as $kategori)
                                                <li><a
                                                        href="{{ url('blog/kategori/' . $kategori->id . '/' . $kategori->url) }}">{{ $kategori->kategori_adi }}
                                                    </a></li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    <li><a href="{{ route('iletisim') }}">İletişim</a></li>
                                </ul>
                            </nav>
                        </div>
                        <div class="col-auto d-none d-lg-block">
                            <div class="header-button"><button type="button" class="simple-btn searchBoxToggler"><i
                                        class="far fa-search"></i></button> <a href="#"
                                    class="simple-btn sideMenuToggler"><i class="fa-solid fa-grid"></i></a> <a
                                    href="{{ url('hakkimizda') }}" class="th-btn style6 th-style th-icon">iLETİŞİME
                                    GEÇ<i class="fa-regular fa-arrow-right ms-2"></i></a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
