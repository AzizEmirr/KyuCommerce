<header>
    <div id="sticky-header" class="tg-header__area transparent-header">
        <div class="container custom-container">
            <div class="row">
                <div class="col-12">
                    <div class="mobile-nav-toggler"><i class="fas fa-bars"></i></div>
                    <div class="tgmenu__wrap">
                        <nav class="tgmenu__nav">
                            <div class="logo">
                                <a href="{{ url('/') }}"><img src="{{ url($logocek->beyazLogo) }}"
                                        alt="Logo"></a>
                            </div>
                            <div class="tgmenu__navbar-wrap tgmenu__main-menu d-none d-xl-flex">
                                <ul class="navigation">
                                    <li><a class="active" href="{{ url('/') }}">Anasayfa</a></li>
                                    @if ($hakkimizda)
                                        <li><a href="{{ route('hakkimizda') }}">Hakkımızda</a></li>
                                    @endif

                                    @php
                                        $returnPolicy = App\Models\Kurumsal::where('id', 1)->where('durum', 1)->first();
                                        $termsOfService = App\Models\Kurumsal::where('id', 2)
                                            ->where('durum', 1)
                                            ->first();
                                        $privacyPolicy = App\Models\Kurumsal::where('id', 3)
                                            ->where('durum', 1)
                                            ->first();
                                    @endphp

                                    @if ($returnPolicy || $termsOfService || $privacyPolicy)
                                        <li class="menu-item-has-children"><a href="javascript:void(0)">Kurumsal</a>
                                            <ul class="sub-menu">
                                                @if ($returnPolicy)
                                                    <li><a href="{{ route('iade') }}">İade Politikası</a></li>
                                                @endif
                                                @if ($termsOfService)
                                                    <li><a href="{{ route('hizmet') }}">Hizmet Şartları</a></li>
                                                @endif
                                                @if ($privacyPolicy)
                                                    <li><a href="{{ route('gizlilik') }}">Gizlilik Politikası</a></li>
                                                @endif
                                            </ul>
                                        </li>
                                    @endif


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

                                    @foreach ($kategoriler as $kategori)
                                        <li class="menu-item-has-children"><a
                                                href="{{ url('kategori/' . $kategori->id . '/' . $kategori->kategori_url) }}">{{ $kategori->kategori_adi }}</a>
                                            @if ($kategori->altkategoriler->isNotEmpty())
                                                <ul class="sub-menu">
                                                    @foreach ($kategori->altkategoriler as $altkategori)
                                                        <li class="menu-item-has-children"><a
                                                                href="{{ url('altkategori/' . $altkategori->id . '/' . $altkategori->altkategori_url) }}">{{ $altkategori->altkategori_adi }}</a>
                                                            @if ($altkategori->urunler->isNotEmpty())
                                                                <ul class="sub-menu">
                                                                    @foreach ($altkategori->urunler as $urun)
                                                                        <li><a
                                                                                href="{{ url('urun/' . $urun->id . '/' . $urun->url) }}">
                                                                                {{ $urun->baslik }}</a></li>
                                                                    @endforeach
                                                                </ul>
                                                            @endif
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        </li>
                                    @endforeach

                                    <li><a href="{{ $ayarlar->discord }}" target="blank">İletİşİm</a></li>
                                </ul>
                            </div>
                            <div class="tgmenu__action d-none d-md-block">
                                <ul class="list-wrap">
                                    <li class="search"><a href="javascript:void(0)"><i
                                                class="flaticon-search-1"></i></a></li>
                                    <li class="header-btn">
										@if(Auth::check())
                                        <a href="{{ route('login') }}" class="tg-btn-3 tg-svg">
                                            <div class="svg-icon" id="svg-2"
                                                data-svg-icon="{{ asset('frontend') }}//img/icons/shape02.svg"></div>
                                            <i class="flaticon-edit"></i>
                                            <span>~Giriş Yap</span>
                                        </a>
										@else 
										<a href="{{$ayarlar->discord}}" class="tg-btn-3 tg-svg">
                                            <div class="svg-icon" id="svg-2"
                                                data-svg-icon="{{ asset('frontend') }}//img/icons/shape02.svg"></div>
                                            <i class="flaticon-edit"></i>
                                            <span>~İletişime Geç</span>
                                        </a>
										@endif
                                    </li>
                                    <li class="side-toggle-icon">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Mobile Menu  -->
    <div class="tgmobile__menu">
        <nav class="tgmobile__menu-box">
            <div class="close-btn"><i class="flaticon-swords-in-cross-arrangement"></i></div>
            <div class="nav-logo">
                <a href="{{ url('/') }}"><img src="{{ url($logocek->beyazLogo) }}" alt="Logo"></a>
            </div>
            <div class="tgmobile__search">
                <form action="{{ url('/arama') }}" method="get">
                    <input type="text" name="q" placeholder="Valorant Aimbot">
                    <button><i class="flaticon-loupe"></i></button>
                </form>
            </div>
            <div class="tgmobile__menu-outer">
                <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
            </div>
            <div class="social-links">
                <ul class="list-wrap">
                    @if ($ayarlar->youtube)
                        <li> <a href="{{ $ayarlar->youtube }}" target="blank"><i class="fab fa-youtube"></i></a></li>
                    @endif
                    @if ($ayarlar->twitter)
                        <li> <a href="{{ $ayarlar->twitter }}" target="blank"><i class="fab fa-twitter"></i></a></li>
                    @endif
                    @if ($ayarlar->instagram)
                        <li> <a href="{{ $ayarlar->instagram }}" target="blank"><i class="fab fa-instagram"></i></a></li>
                    @endif
                    @if ($ayarlar->discord)
                        <li> <a href="{{ $ayarlar->whatsapp }}" target="blank"><i class="fab fa-discord"></i></a></li>
                    @endif
                </ul>
            </div>
        </nav>
    </div>
    <div class="tgmobile__menu-backdrop"></div>
    <!-- End Mobile Menu -->

    <!-- header-search -->
    <div class="search__popup-wrap">
        <div class="search__layer"></div>
        <div class="search__close">
            <span><i class="flaticon-swords-in-cross-arrangement"></i></span>
        </div>
        <div class="search__wrap text-center">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2 class="title">... <span>Arama Yap</span> ...</h2>
                        <div class="search__form">
                            <form action="{{ url('/arama') }}" method="get">
                                <input type="text" name="q" placeholder="Valorant Aimbot">
                                <button><i class="flaticon-loupe"></i></button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- header-search-end -->

    <!-- offCanvas-area -->
    <div class="offCanvas__wrap">
        <div class="offCanvas__body">
            <div class="offCanvas__top">
                <div class="offCanvas__logo logo">
                    <a href="{{ url('/') }}"><img src="{{ url($logocek->beyazLogo) }}" alt="Logo"></a>
                </div>
                <div class="offCanvas__toggle">
                    <i class="flaticon-swords-in-cross-arrangement"></i>
                </div>
            </div>
            <div class="offCanvas__content">
                <h2 class="title">En İyi <span>Yazılımlar</span></h2>
                <div class="offCanvas__contact">
                    <h4 class="small-title">İletişime Geç</h4>
                    <ul class="offCanvas__contact-list list-wrap">
                        <li><a href="mailto:{{ $ayarlar->mail }}">{{ $ayarlar->mail }}</a></li>
                        <li><a href="{{ $ayarlar->discord }}">Discord</a></li>
                    </ul>
                </div>

                <ul class="offCanvas__social list-wrap">
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
                </ul>
            </div>
            <div class="offCanvas__copyright">
                <p>Copyright ©
                    <script>
                        document.write(new Date().getFullYear())
                    </script> - By <span> {{ $seo->title }}</span> | Made with <span
                        style="color: #FF5733;">kyu
                        software</span>
                </p>
            </div>
        </div>
    </div>
    <div class="offCanvas__overlay"></div>
    <!-- offCanvas-area-end -->

</header>
