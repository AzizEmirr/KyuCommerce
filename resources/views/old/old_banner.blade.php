@php
    $banner = App\Models\Banner::where('durum', 1)->orderBy('sirano')->get();
@endphp

<section
    class="elementor-section elementor-top-section elementor-element elementor-element-0e143be elementor-section-full_width elementor-section-height-default elementor-section-height-default"
    data-id="0e143be" data-element_type="section">
    <div class="elementor-container elementor-column-gap-default">
        <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-ee3dbb6"
            data-id="ee3dbb6" data-element_type="column">
            <div class="elementor-widget-wrap elementor-element-populated">
                <div class="elementor-element elementor-element-0c42f72 elementor-widget elementor-widget-tx_hero_slider elh-el tx_hero_slider"
                    data-id="0c42f72" data-element_type="widget"
                    data-settings="{&quot;design_style&quot;:&quot;style_3&quot;}"
                    data-widget_type="tx_hero_slider.default">
                    <div class="elementor-widget-container">
                        <div class="buil-hero-3-area">
                            <div class="buil-hero-3-swiper">
                                <div class="swiper-wrapper">

                                    @foreach ($banner as $banners)
                                        <div class="swiper-slide buil-hero-3-area-cont">

                                            <img decoding="async" class="buil-hero-3-area-bg-img"
                                                src="{{ asset('frontend') }}/wp-content/uploads/2024/05/slider_3 (1).jpg"
                                                alt="h3-bg1">

                                            <div class="container buil-container-1">
                                                <div class="buil-hero-3-wrap">
                                                    <div class="buil-hero-3-left">
                                                        <img decoding="async" class="buil-hero-3-left-img"
                                                             src="{{ $banners->resim }}" alt="{{ $banners->baslik }}"
                                                            alt="h3-img1">
                                                    </div>

                                                    <div class="buil-hero-3-right">
                                                        <h5 style="color: white" class="buil-heading-1  tx-subTitle">
                                                            {{ $banners->ust_baslik }} </h5>

                                                        <h2 class="tx-title buil-hero-3-heading buil-heading">
                                                            {{ $banners->baslik }}</h2>
                                                        <div class="buil-hero-3-bottom">

                                                            <p class="buil-hero-3-para">
                                                                {{ $banners->aciklama }} </p>

                                                            <div class="buil-hero-3-btn-wrap">
                                                                <a class="buil-pri-3-btn" aria-label="name"
                                                                    href="$banners->button_url" target="_self"
                                                                    rel="">
                                                                    <span>{{ $banners->button_text }}</span>

                                                                    <i aria-hidden="true"
                                                                        class="flaticon flaticon_2-right-arrow-2"></i>
                                                                </a>
                                                            </div>
                                                        </div>

                                                        <a href="#" title="Aşağı Kaydır " target="_self" rel=""
                                                            class="buil-hero-3-circle-btn">
                                                            <img decoding="async"
                                                                src="{{ asset('frontend') }}/wp-content/uploads/2024/05/h3-circle1.webp"
                                                                alt="h3-circle1">
                                                            <i aria-hidden="true"
                                                                class="flaticon flaticon_2-down-arrow"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    <!-- navigator  -->
                                    <div class="buil-hero-3-navigate">
                                        <div class="buil-hero-3-next">
                                            <img decoding="async"
                                                src="{{ asset('frontend') }}/wp-content/uploads/2024/05/h3-bg2.webp"
                                                alt="h3-bg2" style="display: none;">
                                            <i class="fa-solid fa-angle-left"></i>
                                        </div>
                                        <div class="buil-hero-3-prev">
                                            <img decoding="async"
                                                src="{{ asset('frontend') }}/wp-content/uploads/2024/05/h3-bg2.webp"
                                                alt="h3-bg2" style="display: none;">
                                            <i class="fa-solid fa-angle-right"></i>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
