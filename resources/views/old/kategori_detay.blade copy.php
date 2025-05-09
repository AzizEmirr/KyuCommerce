@extends('frontend.main_master')

@php
    $seo = App\Models\Seo::find(1);
@endphp


@section('title')
    {{ $seo->site_adi }} | {{ $kategori->kategori_adi }}
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
    <!-- wrapper-box start -->
    <div class="tx-breadcrumb breadcrumb-area bg-default "
        data-background="https://themexriver.com/wp/builta/wp-content/uploads/2024/05/breadcrumb-bg-1.webp">
        <div class="container">
            <div class="row">
                <div class="col-xxl-12">
                    <div class="breadcrumb-wrap text-center">
                        <h1 class="breadcrumb-title mb-0 blta-split-text split-in-left">{{ $kategori->kategori_adi }}</h1>
                        <div class="breadcrumb-list wow fadeInUp mt-20" data-wow-duration="2s">
                            <nav aria-label="Breadcrumbs" class="tx-breadcrumb__wrapper">
                                <ul class="bread-crumb tx-breadcrumbLists clearfix list-unstyled d-flex flex-wrap m-0"
                                    itemscope itemtype="http://schema.org/BreadcrumbList">
                                    <li itemprop="item ListElement" itemscope itemtype="http://schema.org/ListItem"
                                        class="item taBcrumb-begin"><a href="{{ url('/') }}" rel="home"
                                            itemprop="item"><span itemprop="name">Anasayfa</span></a>
                                        <meta itemprop="position" content="1" /><i class="flaticon_2-home"></i>
                                    </li>
                                    <li class="item taBcrumb-end"><span>{{ $kategori->kategori_adi }}</span><i class="flaticon_2-home"></i>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="breadcrumb-marquee-wrap">
            <img class="breadcrumb-marquee-img-1" src="../wp-content/uploads/2024/05/breadcrumb-m-img-1.webp"
                alt="">

            <img class="breadcrumb-marquee-img-2" src="../wp-content/uploads/2024/05/breadcrumb-m-img-1.webp"
                alt="">
        </div>

    </div>
    @if ($urunler->isEmpty())
        <div style="margin-top: 200px"class="alert alert-warning text-center important"
            role="alert">
            <h4 class="alert-heading">Üzgünüz!</h4>
            <p>Bu kategoride henüz ürün bulunmamaktadır. Yeni ürünler eklenene kadar bizi takip etmeye
                devam
                edin!</p>
        </div>
    @else
        <div data-elementor-type="wp-page" data-elementor-id="50" class="elementor elementor-50">
            <section
                class="elementor-section elementor-top-section elementor-element elementor-element-926df19 elementor-section-full_width elementor-section-height-default elementor-section-height-default"
                data-id="926df19" data-element_type="section">
                <div class="elementor-container elementor-column-gap-default">
                    <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-95388ef"
                        data-id="95388ef" data-element_type="column">
                        <div class="elementor-widget-wrap elementor-element-populated">
                            <section
                                class="elementor-section elementor-inner-section elementor-element elementor-element-1797302 elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                                data-id="1797302" data-element_type="section">
                                <div class="elementor-container elementor-column-gap-default">
                                    <div class="elementor-column elementor-col-100 elementor-inner-column elementor-element elementor-element-a7b5ca4"
                                        data-id="a7b5ca4" data-element_type="column">
                                        <div class="elementor-widget-wrap elementor-element-populated">
                                            <div class="elementor-element elementor-element-dda776d elementor-widget elementor-widget-tx_heading elh-el tx_heading"
                                                data-id="dda776d" data-element_type="widget"
                                                data-settings="{&quot;design_style&quot;:&quot;style_1&quot;}"
                                                data-widget_type="tx_heading.default">
                                                <div class="elementor-widget-container">
                                                    <div
                                                        class="blta-project-1-section-title tx-heading-section text-center ">
                                                        <div class="icon mb-25 blta-scale-plus">
                                                            <i aria-hidden="true" class="fas fa-list"></i>
                                                        </div>


                                                        <h2
                                                            class="tx-title blta-section-title-1  blta-split-text split-in-left">
                                                            "{{ $kategori->kategori_adi }}" Kategorisinde Bulunan Ürünler</h2>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <section
                                class="elementor-section elementor-inner-section elementor-element elementor-element-8504a5f elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                                data-id="8504a5f" data-element_type="section">
                                <div class="elementor-container elementor-column-gap-default">
                                    @foreach ($urunler as $urun)
                                        <div class="elementor-column elementor-col-33 elementor-inner-column elementor-element elementor-element-f0e3f6c"
                                            data-id="f0e3f6c" data-element_type="column">
                                            <div class="elementor-widget-wrap elementor-element-populated">
                                                <div class="elementor-element elementor-element-1ed75c1 elementor-widget elementor-widget-tx_info_box elh-el tx_info_box"
                                                    data-id="1ed75c1" data-element_type="widget"
                                                    data-settings="{&quot;design_style&quot;:&quot;style_2&quot;}"
                                                    data-widget_type="tx_info_box.default">
                                                    <div class="elementor-widget-container">
                                                        <div class="blta-project-1-item-single tx-serviceBox">
                                                            <div class="main-img img-cover fix">
                                                                <img decoding="async"
                                                                    src="{{ !empty($urun->resim) ? url($urun->resim) : url('uploads/urunler/resim-yok.jpg') }}"
                                                                    alt="" />
                                                            </div>

                                                            <h3 class="item-title blta-heading-1 font-800 tx-title">
                                                                <a class="d-flex align-items-center"
                                                                    href="{{ url('urun/' . $urun->id . '/' . $urun->url) }}"
                                                                    target="_self" rel="" aria-label="name">
                                                                    <i aria-hidden="true"
                                                                        class="flaticon flaticon-process"></i> {{ $urun->baslik }} </a>
                                                            </h3>

                                                            <div class="hover-content">
                                                                <h3
                                                                    class="item-title-2 blta-heading-1 has-color-white font-800 tx-title">
                                                                    <a href="{{ url('urun/' . $urun->id . '/' . $urun->url) }}"
                                                                        target="_self" rel= "" aria-label="name">
                                                                        {{ $urun->baslik }} </a>
                                                                </h3>

                                                                <p class="blta-para-1 item-disc tx-description">{!! Str::limit($urun->metin, 100) !!}...</p>

                                                                <a class="blta-arrow-btn-1"
                                                                    href="{{ url('urun/' . $urun->id . '/' . $urun->url) }}"
                                                                    target="_self" rel= "" aria-label="name">
                                                                    <span class="icon-1">
                                                                        <i aria-hidden="true"
                                                                            class=" fa-light fa-arrow-up-right"></i>
                                                                    </span>
                                                                    <span class="icon-2">
                                                                        <i aria-hidden="true"
                                                                            class=" fa-light fa-arrow-up-right"></i>
                                                                    </span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <style>
                                    .th-pagination {
                                        display: flex;
                                        justify-content: center;
                                        padding: 20px 0;
                                    }
                                </style>

                                <div class="th-pagination">
                                    {{ $urunler->links('vendor.pagination.custom') }}
                                </div>

                            </section>

                        </div>
                    </div>
                </div>
            </section>
        </div>
    @endif
@endsection
