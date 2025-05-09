@php
    $altkategoriler = App\Models\Altkategoriler::where('durum', 1)->orderBy('sirano')->get();
@endphp

@if ($altkategoriler->isNotEmpty())
    <section class="streamers__area section-pt-95 section-pb-120">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-7 col-md-10">
                    <div class="section__title text-center mb-60">
                        <span class="sub-title tg__animate-text">Ürünlerimiz</span>
                        <h3 class="title">Kategoriler</h3>
                    </div>
                </div>
            </div>
            <div class="swiper-container streamers-active">
                <div class="swiper-wrapper">
                    @foreach ($altkategoriler as $altkategori)
                        <div class="swiper-slide">
                            <div class="streamers__item">
                                <div class="streamers__thumb">
                                    <a href="{{ url('altkategori/' . $altkategori->id . '/' . $altkategori->altkategori_url) }}">
                                        <img src="{{ !empty($altkategori->resim) ? url($altkategori->resim) : url('uploads/urunler/537x540.png') }}" alt="img"
                                            style="width: 230px; height: 400px; object-fit: cover;">
                                    </a>
                                </div>
                                <div class="streamers__content">
                                    <h4 class="name">{{ $altkategori->altkategori_adi }}</h4>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="streamers__pagination">
                <div class="slider-button-prev streamers__pagination-arrow"><i class="fas fa-angle-left"></i></div>
                <div class="swiper-pagination streamers__pagination-dots"></div>
                <div class="slider-button-next streamers__pagination-arrow"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </section>
@endif