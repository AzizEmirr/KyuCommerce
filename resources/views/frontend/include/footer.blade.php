<footer class="footer-style-two has-footer-animation">
    <div class="footer__country">
        <div class="container custom-container">
            <div class="row">
                <div class="col-6">
                    <div class="footer__country-name">
                    </div>
                </div>
                <div class="col-6">
                    <div class="footer__country-name text-center text-sm-end">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer__two-widgets">
        <div class="container custom-container">
            <div class="row">
                <div class="col-md-4 col-sm-7 order-1 order-md-0">
                    <div class="footer-el-widget">
                        <ul class="list-wrap">
                            <a href="{{ url('https://cheatglobal.com') }}"><img
                                    src="{{ asset('frontend') }}//img/logo/cheatglobal-noel.png" alt="CheatGlobal"></a>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 col-sm-5 order-0 order-md-2">
                    <div class="footer-el-widget text-start text-md-center widget_nav_menu">
                        <div class="footer-el-logo mb-35">
                            <a href="{{ url('/') }}"><img src="{{ url($logocek->beyazLogo) }}" alt="Logo"></a>
                        </div>
                        @php
                            $privacyPolicy = App\Models\Kurumsal::where('id', 3)->where('durum', 1)->first();
                        @endphp
                        <div class="footer-el-menu">
                            <ul class="list-wrap">
                                <li><a href="{{ url('/') }}">Anasayfa</a></li>
                                @if ($hakkimizda)
                                <li><a href="{{ route('hakkimizda') }}">Hakkımızda</a></li>
                                @endif
                                @if ($privacyPolicy)
                                    <li><a href="{{ route('gizlilik') }}">Gizlilik Politikası</a></li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-7 order-3">
<div class="footer-el-widget text-start text-md-end">
    <ul class="list-wrap">
        <a href="https://cheatglobal.com" target="_blank" rel="noopener">
            <img src="{{ asset('frontend/img/logo/cheatglobal-noel.png') }}" alt="CheatGlobal">
        </a>
    </ul>
</div>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright__wrap -style-two">
        <div class="container custom-container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="copyright__text text-center text-lg-start">
                        <p>Copyright ©
                            <script>
                                document.write(new Date().getFullYear())
                            </script> - By <span> {{ $seo->title }}</span> | Made with <span
                                style="color: #FF5733;">kyu
                                software</span>
                        </p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="copyright__menu">
                        <ul class="list-wrap d-flex flex-wrap justify-content-center justify-content-lg-end">
                            <li><a href="{{ $ayarlar->discord }}" target="blank">Bizimle İletişime Geçin</a></li>
                            <li><a href="{{ $ayarlar->discord }}">Discordumuza Katılın</a></li>
                            @if ($privacyPolicy)
                                <li><a href="{{ route('gizlilik') }}">Gizlilik Politikası</a></li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
