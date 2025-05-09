@php
    $ayarlar = App\Models\Ayarlar::find(1);
@endphp

@if ($ayarlar && ($ayarlar->facebook || $ayarlar->twitter || $ayarlar->instagram || $ayarlar->youtube || $ayarlar->discord))
    <section class="social__area social-bg" data-background="{{ asset('frontend') }}/img/bg/social_bg.png">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-7 col-md-10">
                    <div class="section__title text-center mb-60">
                        <span class="sub-title tg__animate-text">Bizimle İletişime Geç</span>
                        <h3 class="title">İletişimde Kal</h3>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center gutter-20 row-cols-2 row-cols-lg-6 row-cols-md-4 row-cols-sm-3">
                @if ($ayarlar->facebook)
                    <div class="col">
                        <div class="social__item">
                            <a href="{{ $ayarlar->facebook }}" target="_blank">
                                <i class="flaticon-facebook"></i>
                                <span>facebook</span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="65" height="5" viewBox="0 0 65 5">
                                    <path d="M968,5630h65l-4,5H972Z" transform="translate(-968 -5630)" />
                                </svg>
                            </a>
                        </div>
                    </div>
                @endif
                @if ($ayarlar->twitter)
                    <div class="col">
                        <div class="social__item">
                            <a href="{{ $ayarlar->twitter }}" target="_blank">
                                <i class="flaticon-twitter"></i>
                                <span>twitter</span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="65" height="5" viewBox="0 0 65 5">
                                    <path d="M968,5630h65l-4,5H972Z" transform="translate(-968 -5630)" />
                                </svg>
                            </a>
                        </div>
                    </div>
                @endif
                @if ($ayarlar->instagram)
                    <div class="col">
                        <div class="social__item">
                            <a href="{{ $ayarlar->instagram }}" target="_blank">
                                <i class="flaticon-instagram"></i>
                                <span>instagram</span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="65" height="5" viewBox="0 0 65 5">
                                    <path d="M968,5630h65l-4,5H972Z" transform="translate(-968 -5630)" />
                                </svg>
                            </a>
                        </div>
                    </div>
                @endif
                @if ($ayarlar->youtube)
                    <div class="col">
                        <div class="social__item">
                            <a href="{{ $ayarlar->youtube }}" target="_blank">
                                <i class="flaticon-youtube"></i>
                                <span>youtube</span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="65" height="5" viewBox="0 0 65 5">
                                    <path d="M968,5630h65l-4,5H972Z" transform="translate(-968 -5630)" />
                                </svg>
                            </a>
                        </div>
                    </div>
                @endif
                @if ($ayarlar->discord)
                    <div class="col">
                        <div class="social__item">
                            <a href="{{ $ayarlar->discord }}" target="_blank">
                                <i class="flaticon-discord"></i>
                                <span>discord</span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="65" height="5" viewBox="0 0 65 5">
                                    <path d="M968,5630h65l-4,5H972Z" transform="translate(-968 -5630)" />
                                </svg>
                            </a>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>
@endif
