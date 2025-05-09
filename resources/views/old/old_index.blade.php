   @extends('frontend.main_master')

   @php
       $seo = App\Models\Seo::find(1);
   @endphp

   @section('title'){{$seo->site_adi}} | {{$seo->title}}@endsection
   @section('author'){{$seo->author}}@endsection
   @section('description'){{$seo->description}}@endsection
   @section('keywords'){{$seo->keywords}}@endsection
   @section('url'){{url('/')}}@endsection
   @section('resim'){{ url('/')}}/{{$seo->resim}}@endsection


   @section('main')

   <div data-elementor-type="wp-page" data-elementor-id="11" class="elementor elementor-11">

        <!-- banner section start -->
        @include('frontend.anasayfa.banner')
        <!-- banner section end -->

        <section
            class="elementor-section elementor-top-section elementor-element elementor-element-619e0ca elementor-section-full_width elementor-section-height-default elementor-section-height-default"
            data-id="619e0ca" data-element_type="section">
            <div class="elementor-container elementor-column-gap-default">
                <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-e0f3e81"
                    data-id="e0f3e81" data-element_type="column">
                    <div class="elementor-widget-wrap elementor-element-populated">
                        <section
                            class="elementor-section elementor-inner-section elementor-element elementor-element-ba99307 elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                            data-id="ba99307" data-element_type="section">
                            <div class="elementor-container elementor-column-gap-default">
                                <div class="elementor-column elementor-col-100 elementor-inner-column elementor-element elementor-element-126d209"
                                    data-id="126d209" data-element_type="column">
                                    <div class="elementor-widget-wrap elementor-element-populated">
                                        <div class="elementor-element elementor-element-118dc77 elementor-widget elementor-widget-tx_heading elh-el tx_heading"
                                            data-id="118dc77" data-element_type="widget"
                                            data-settings="{&quot;design_style&quot;:&quot;style_1&quot;}"
                                            data-widget_type="tx_heading.default">
                                            <div class="elementor-widget-container">
                                                <div
                                                    class="blta-project-1-section-title tx-heading-section text-center ">
                                                    <div class="icon mb-25 blta-scale-plus">
                                                        <i aria-hidden="true" class="fas fa-house-user"></i>
                                                    </div>


                                                    <h2
                                                        class="tx-title blta-section-title-1  blta-split-text split-in-left">
                                                        Construction Provided Quality<br> Contractor Services</h2>
                                                    <p class="blta-para-1 a1-disc tx-description">
                                                        We successfully cope with tasks of varying complexity,
                                                        provide long-term guarantees and regularly master new
                                                        technologies. Our portfolio includes Builter of successfully
                                                        completed projects. </p>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <section
                            class="elementor-section elementor-inner-section elementor-element elementor-element-a5044d4 elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                            data-id="a5044d4" data-element_type="section">
                            <div class="elementor-container elementor-column-gap-default">
                                <div class="elementor-column elementor-col-33 elementor-inner-column elementor-element elementor-element-433525e"
                                    data-id="433525e" data-element_type="column">
                                    <div class="elementor-widget-wrap elementor-element-populated">
                                        <div class="elementor-element elementor-element-40dd0b4 elementor-widget elementor-widget-tx_info_box elh-el tx_info_box"
                                            data-id="40dd0b4" data-element_type="widget"
                                            data-settings="{&quot;design_style&quot;:&quot;style_5&quot;}"
                                            data-widget_type="tx_info_box.default">
                                            <div class="elementor-widget-container">
                                                <div class="buil-constractor-3-card wow fadeInUp">
                                                    <img decoding="async"
                                                        src="{{asset ('frontend')}}/wp-content/uploads/2024/05/c3-img1.webp"
                                                        alt="c3-img1" />

                                                    <div class="buil-contractor-3-card-cont">
                                                        <i aria-hidden="true"
                                                            class="flaticon flaticon_2-house"></i>
                                                        <h5 class="buil-heading">
                                                            <a href="../services/general-contracting/index.html"
                                                                target="_self" rel="" aria-label="name">
                                                                Building Renovation </a>
                                                        </h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="elementor-column elementor-col-33 elementor-inner-column elementor-element elementor-element-69313ad"
                                    data-id="69313ad" data-element_type="column">
                                    <div class="elementor-widget-wrap elementor-element-populated">
                                        <div class="elementor-element elementor-element-867fab6 elementor-widget elementor-widget-tx_info_box elh-el tx_info_box"
                                            data-id="867fab6" data-element_type="widget"
                                            data-settings="{&quot;design_style&quot;:&quot;style_5&quot;}"
                                            data-widget_type="tx_info_box.default">
                                            <div class="elementor-widget-container">
                                                <div class="buil-constractor-3-card wow fadeInUp">
                                                    <img decoding="async"
                                                        src="{{asset ('frontend')}}/wp-content/uploads/2024/05/c3-img2-1.webp"
                                                        alt="c3-img2" />

                                                    <div class="buil-contractor-3-card-cont">
                                                        <i aria-hidden="true"
                                                            class="flaticon flaticon_2-supervision"></i>
                                                        <h5 class="buil-heading">
                                                            <a href="../services/general-contracting/index.html"
                                                                target="_self" rel="" aria-label="name">
                                                                General Contracting </a>
                                                        </h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="elementor-column elementor-col-33 elementor-inner-column elementor-element elementor-element-a6ce1d9"
                                    data-id="a6ce1d9" data-element_type="column">
                                    <div class="elementor-widget-wrap elementor-element-populated">
                                        <div class="elementor-element elementor-element-caf3c6d elementor-widget elementor-widget-tx_info_box elh-el tx_info_box"
                                            data-id="caf3c6d" data-element_type="widget"
                                            data-settings="{&quot;design_style&quot;:&quot;style_5&quot;}"
                                            data-widget_type="tx_info_box.default">
                                            <div class="elementor-widget-container">
                                                <div class="buil-constractor-3-card wow fadeInUp">
                                                    <img decoding="async"
                                                        src="{{asset ('frontend')}}/wp-content/uploads/2024/05/c3-img3-1.webp"
                                                        alt="c3-img3" />

                                                    <div class="buil-contractor-3-card-cont">
                                                        <i aria-hidden="true"
                                                            class="flaticon flaticon_2-engineer"></i>
                                                        <h5 class="buil-heading">
                                                            <a href="../services/general-contracting/index.html"
                                                                target="_self" rel="" aria-label="name">
                                                                Building Construction </a>
                                                        </h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </section>
    
        <section
            class="elementor-section elementor-top-section elementor-element elementor-element-f54e483 elementor-section-full_width elementor-section-height-default elementor-section-height-default"
            data-id="f54e483" data-element_type="section">
            <div class="elementor-container elementor-column-gap-default">
                <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-3445be9"
                    data-id="3445be9" data-element_type="column">
                    <div class="elementor-widget-wrap elementor-element-populated">
                        <div class="elementor-element elementor-element-a99800d elementor-widget elementor-widget-tx_cta elh-el tx_cta"
                            data-id="a99800d" data-element_type="widget"
                            data-settings="{&quot;design_style&quot;:&quot;style_3&quot;}"
                            data-widget_type="tx_cta.default">
                            <div class="elementor-widget-container">
                                <div class="buil-cta-3-area tx-section">
                                    <div class="buil-cta-3-bg image-pllx">
                                        <img decoding="async" src="{{asset ('frontend')}}/wp-content/uploads/2024/05/cta3-bg.webp"
                                            alt="cta3-bg">
                                    </div>

                                    <div class="container">
                                        <div class="blta-cta-3-content text-center">
                                            <h2
                                                class="tx-title blta-section-title-1 blta-split-text split-in-left has-color-white">
                                                Our Mission Is To Develop The Strongest Building</h2>
                                            <div class="buil-cta-3-popup-wrap">
                                                <a class="buil-cta-3-popup"
                                                    href="https://themexriver.com/wp/builta-videos/cta-3-video-1.mp4">
                                                    <i aria-hidden="true" class="fas fa-play"></i> </a>

                                                <h6 class="buil-heading text-start">Watch Video <br> Intro</h6>
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

        <section
            class="elementor-section elementor-top-section elementor-element elementor-element-81bdea0 elementor-section-full_width elementor-section-height-default elementor-section-height-default"
            data-id="81bdea0" data-element_type="section">
            <div class="elementor-container elementor-column-gap-default">
                <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-bc67360"
                    data-id="bc67360" data-element_type="column">
                    <div class="elementor-widget-wrap elementor-element-populated">
                        <div class="elementor-element elementor-element-031b2e7 elementor-widget elementor-widget-tx_about elh-el tx_about"
                            data-id="031b2e7" data-element_type="widget"
                            data-settings="{&quot;design_style&quot;:&quot;style_4&quot;}"
                            data-widget_type="tx_about.default">
                            <div class="elementor-widget-container">
                                <div class="buil-civil-3-area tx-section">
                                    <img decoding="async" class="buil-civil-3-bg-1"
                                        src="{{asset ('frontend')}}/wp-content/uploads/2024/05/a3-il-2.webp" alt="a3-il-2">

                                    <div class="container buil-container-2">
                                        <div class="buil-civil-3-wrap">
                                            <div class="buil-civil-3-left">
                                                <div class="buil-ani-threed">
                                                    <img decoding="async" class="buil-civil-3-left-img-1"
                                                        src="{{asset ('frontend')}}/wp-content/uploads/2024/05/a3-1.webp"
                                                        alt="a3-1">
                                                </div>

                                                <img decoding="async" class="buil-civil-3-left-img-2"
                                                    src="{{asset ('frontend')}}/wp-content/uploads/2024/05/a3-2.webp" alt="a3-2">

                                                <img decoding="async" class="buil-civil-3-left-img-3"
                                                    src="{{asset ('frontend')}}/wp-content/uploads/2024/05/a3-il-1.webp"
                                                    alt="a3-il-1">
                                            </div>
                                            <div class="buil-civil-3-right">
                                                <div class="buil-civil-3-head tx-heading-section">
                                                    <div class="buil-civil-3-subtitle-wrap">
                                                        <i aria-hidden="true" class="fas fa-house-user"></i>
                                                        <h5 class="buil-heading">
                                                            Welcome To Builder Corporation </h5>
                                                    </div>

                                                    <h2
                                                        class="tx-title buil-heading-1 title-3 buil-civil-3-title tx-split-text split-in-fade">
                                                        Way In Real Estate Building Civil Constructions!</h2>
                                                </div>
                                                <div class="buil-civil-3-bottom">

                                                    <p class="buil-para mt-20 wow fadeInUp tx-description">
                                                        We successfully cope with tasks of varying complexity,
                                                        provide long-term guarantees and regularly master new
                                                        technologies. Our portfolio includes dozens of successfully
                                                        completed projects </p>

                                                    <div class="buil-civil-3-experi">
                                                        <div class="buil-civil-3-experi-number-wrap">
                                                            <h2>
                                                                <span
                                                                    class="buil-civil-3-counter buil-heading">25</span>
                                                                <div>
                                                                    <span>+</span>
                                                                    <span>years</span>
                                                                </div>
                                                            </h2>
                                                        </div>

                                                        <div class="buil-civil-3-experi-divider"></div>

                                                        <div class="buil-civil-3-experi-cont-wrap">
                                                            <i aria-hidden="true"
                                                                class="flaticon flaticon_2-construction"></i>
                                                            <div class="buil-civil-3-experi-cont">
                                                                <h5 class="buil-heading">
                                                                    Architecture &amp; Building </h5>

                                                                <p>
                                                                    Jilon is a construction most responsible </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="buil-civil-3-btn-wrap">
                                                        <a class="buil-pri-3-btn" href="#" target="_self"
                                                            rel="">
                                                            <span>Button Text</span>

                                                            <i aria-hidden="true"
                                                                class="fas fa-angle-right"></i> </a>
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
            </div>
        </section>

        <section
            class="elementor-section elementor-top-section elementor-element elementor-element-adfeaac elementor-section-full_width elementor-section-height-default elementor-section-height-default"
            data-id="adfeaac" data-element_type="section">
            <div class="elementor-container elementor-column-gap-default">
                <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-d345aad"
                    data-id="d345aad" data-element_type="column">
                    <div class="elementor-widget-wrap elementor-element-populated">
                        <div class="elementor-element elementor-element-76b7c61 elementor-widget elementor-widget-tx_pricing_section elh-el tx_pricing_section"
                            data-id="76b7c61" data-element_type="widget"
                            data-settings="{&quot;design_style&quot;:&quot;style_1&quot;}"
                            data-widget_type="tx_pricing_section.default">
                            <div class="elementor-widget-container">
                                <div class="blta-price-2-area pt-115 tx-section">
                                    <div class="blta-price-2-bg img-cover image-pllx fix">
                                        <img decoding="async"
                                            src="{{asset ('frontend')}}/wp-content/uploads/2024/05/price-2-bg-1.webp"
                                            alt="price-2-bg-1">
                                    </div>

                                    <div class="container blta-container-1">

                                        <!-- section-title -->
                                        <div class="blta-services-2-section-title text-center">

                                            <div class="icon blta-scale-plus mb-25">
                                                <i aria-hidden="true" class="fas fa-house-user"></i>
                                            </div>

                                            <h5
                                                class="blta-subtitle-1 font-700 text-uppercase pr-font tx-subTitle">
                                                WELCOME TO OUR COMPANY </h5>

                                            <h2
                                                class="tx-title blta-section-title-1 blta-split-text split-in-left">
                                                Constro Provides</h2>
                                        </div>

                                        <div class="blta-price-2-grid mt-40">
                                            <div class="blta-price-2-card ">
                                                <div class="card-img fix img-cover mb-30">
                                                    <img decoding="async"
                                                        src="{{asset ('frontend')}}/wp-content/uploads/2024/05/price-2-1.webp"
                                                        alt="price-2-1">
                                                </div>

                                                <h4 class="card-title blta-heading-1 font-700">Basic Services</h4>

                                                <h3 class="card-price font-700">
                                                    &#036;20 <span class="font-500">
                                                        Per user / Month Billed Annually </span>
                                                </h3>

                                                <p class="card-disc blta-para-1">
                                                    Manage your own project documents and collaborate. </p>

                                                <a class="blta-btn-2 has-color-2" href="../about/index.html"
                                                    target="_self" rel="" aria-label="name"
                                                    data-back="more about us" data-front="more about us">
                                                    <span class="icon">
                                                        <i aria-hidden="true"
                                                            class="flaticon flaticon_2-right-arrow-2"></i> </span>
                                                </a>
                                            </div>
                                            <div class="blta-price-2-card ">
                                                <div class="card-img fix img-cover mb-30">
                                                    <img decoding="async"
                                                        src="{{asset ('frontend')}}/wp-content/uploads/2024/05/price-2-2.webp"
                                                        alt="price-2-2">
                                                </div>

                                                <h4 class="card-title blta-heading-1 font-700">Fully Gray Home
                                                </h4>

                                                <h3 class="card-price font-700">
                                                    &#036;3k <span class="font-500">
                                                        Per user / Month Billed Annually </span>
                                                </h3>

                                                <p class="card-disc blta-para-1">
                                                    Manage your own project documents and collaborate. </p>

                                                <a class="blta-btn-2 has-color-2" href="../about/index.html"
                                                    target="_self" rel="" aria-label="name"
                                                    data-back="more about us" data-front="more about us">
                                                    <span class="icon">
                                                        <i aria-hidden="true"
                                                            class="flaticon flaticon_2-right-arrow-2"></i> </span>
                                                </a>
                                            </div>
                                            <div class="blta-price-2-card ">
                                                <div class="card-img fix img-cover mb-30">
                                                    <img decoding="async"
                                                        src="{{asset ('frontend')}}/wp-content/uploads/2024/05/price-2-3.webp"
                                                        alt="price-2-3">
                                                </div>

                                                <h4 class="card-title blta-heading-1 font-700">Building Design
                                                </h4>

                                                <h3 class="card-price font-700">
                                                    &#036;10k <span class="font-500">
                                                        Per user / Month Billed Annually </span>
                                                </h3>

                                                <p class="card-disc blta-para-1">
                                                    Manage your own project documents and collaborate. </p>

                                                <a class="blta-btn-2 has-color-2" href="../about/index.html"
                                                    target="_self" rel="" aria-label="name"
                                                    data-back="more about us" data-front="more about us">
                                                    <span class="icon">
                                                        <i aria-hidden="true"
                                                            class="flaticon flaticon_2-right-arrow-2"></i> </span>
                                                </a>
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

        <section
            class="elementor-section elementor-top-section elementor-element elementor-element-4061790 elementor-section-full_width elementor-section-height-default elementor-section-height-default"
            data-id="4061790" data-element_type="section">
            <div class="elementor-container elementor-column-gap-default">
                <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-e6b9de2"
                    data-id="e6b9de2" data-element_type="column">
                    <div class="elementor-widget-wrap elementor-element-populated">
                        <div class="elementor-element elementor-element-737011a elementor-widget elementor-widget-tx_project_tab elh-el tx_project_tab"
                            data-id="737011a" data-element_type="widget"
                            data-settings="{&quot;design_style&quot;:&quot;style_2&quot;}"
                            data-widget_type="tx_project_tab.default">
                            <div class="elementor-widget-container">
                                <div class="blta-categories-2-area tx-section">

                                    <div class="blta-categories-2-bg img-cover fix image-pllx">
                                        <img decoding="async" src="{{asset ('frontend')}}/wp-content/uploads/2024/05/ct-2-bg-1.webp"
                                            alt="ct-2-bg-1">
                                    </div>

                                    <div class="container blta-container-1">

                                        <!-- section-title -->
                                        <div
                                            class="blta-categories-2-section-title mb-45 tx-heading-section text-center">
                                            <div class="icon blta-scale-plus mb-25">
                                                <i aria-hidden="true" class="fas fa-house-user"></i>
                                            </div>

                                            <h5
                                                class="blta-subtitle-1 font-700 text-uppercase pr-font has-color-white">
                                                WELCOME TO OUR COMPANY </h5>

                                            <h2
                                                class="tx-title blta-section-title-1 blta-split-text split-in-left has-color-white">
                                                Constro Provides Act</h2>
                                        </div>

                                        <div class="row">

                                            <!-- left-img -->
                                            <div class="col-lg-6">
                                                <div class="blta-categories-2-left">
                                                    <div
                                                        class="blta-categories-2-img fix img-cover blta-img blta-ani-threed">
                                                        <img decoding="async"
                                                            src="{{asset ('frontend')}}/wp-content/uploads/2024/05/ct-2-img-1.webp"
                                                            alt="ct-2-img-1">
                                                    </div>

                                                    <h4
                                                        class="blta-categories-2-pop-card blta-heading-1 font-800 blta-img-2">
                                                        9915 56th Ave. NW Edmonton, AB T6E 5L7 </h4>
                                                </div>
                                            </div>

                                            <!-- right-content -->
                                            <div class="col-lg-6">
                                                <div class="blta-categories-2-right">

                                                    <!-- tabs-btn -->
                                                    <div class="blta-categories-2-tabs-btn d-flex flex-wrap mb-30"
                                                        id="buil-constro-3-5355" role="tablist">
                                                        <div role="presentation">
                                                            <button
                                                                class="tabs-btn blta-heading-1 font-700 active"
                                                                id="projectTab-0_5355" data-bs-toggle="tab"
                                                                data-bs-target="#tab-0_5355" type="button"
                                                                role="tab" aria-controls="tab-0_5355"
                                                                aria-selected="true">
                                                                Civil Infrastructure </button>
                                                        </div>
                                                        <div role="presentation">
                                                            <button class="tabs-btn blta-heading-1 font-700 "
                                                                id="projectTab-1_5355" data-bs-toggle="tab"
                                                                data-bs-target="#tab-1_5355" type="button"
                                                                role="tab" aria-controls="tab-1_5355"
                                                                aria-selected="false">
                                                                Heavy Industrial </button>
                                                        </div>
                                                        <div role="presentation">
                                                            <button class="tabs-btn blta-heading-1 font-700 "
                                                                id="projectTab-2_5355" data-bs-toggle="tab"
                                                                data-bs-target="#tab-2_5355" type="button"
                                                                role="tab" aria-controls="tab-2_5355"
                                                                aria-selected="false">
                                                                Special Projects </button>
                                                        </div>
                                                    </div>

                                                    <!-- tabs-content -->
                                                    <div class="tab-content blta-categories-2-tabs-content"
                                                        id="buil-constro-3-5355">
                                                        <div class="tab-pane tabs-content fade show active"
                                                            id="tab-0_5355" role="tabpanel"
                                                            aria-labelledby="projectTab-0_5355">
                                                            <p class="blta-para-1 item-disc">
                                                                where or what you want to build, we mobilize the
                                                                right resources and experts to drive value and
                                                                realize your project goals.mobilize the right
                                                                resources and experts to drive value </p>

                                                            <ul class="blta-list-1 list-unstyled">
                                                                <li
                                                                    class="blta-list-1-title blta-heading-1 has-color-white font-800">
                                                                    what's in it for me? </li>

                                                                <li class="blta-list-1-item blta-para-1">
                                                                    High performing, low carbon concrete solution
                                                                </li>
                                                                <li class="blta-list-1-item blta-para-1">
                                                                    Value for workers' skills </li>
                                                                <li class="blta-list-1-item blta-para-1">
                                                                    Excellent standards in construction </li>
                                                            </ul>

                                                            <div class="blta-categories-2-counter-flex d-flex">
                                                                <div class="blta-categories-2-counter-item">
                                                                    <h2
                                                                        class="item-title blta-heading-1 font-800">
                                                                        100% </h2>
                                                                    <h5
                                                                        class="item-para blta-heading-1 font-800 has-color-white">
                                                                        Employee Owned </h5>
                                                                </div>
                                                                <div class="blta-categories-2-counter-item">
                                                                    <h2
                                                                        class="item-title blta-heading-1 font-800">
                                                                        700% </h2>
                                                                    <h5
                                                                        class="item-para blta-heading-1 font-800 has-color-white">
                                                                        active project </h5>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane tabs-content fade " id="tab-1_5355"
                                                            role="tabpanel" aria-labelledby="projectTab-1_5355">
                                                            <p class="blta-para-1 item-disc">
                                                                where or what you want to build, we mobilize the
                                                                right resources and experts to drive value and
                                                                realize your project goals.mobilize the right
                                                                resources and experts to drive value </p>

                                                            <ul class="blta-list-1 list-unstyled">
                                                                <li
                                                                    class="blta-list-1-title blta-heading-1 has-color-white font-800">
                                                                    what's in it for me? </li>

                                                                <li class="blta-list-1-item blta-para-1">
                                                                    High performing, low carbon concrete solution
                                                                </li>
                                                                <li class="blta-list-1-item blta-para-1">
                                                                    Value for workers' skills </li>
                                                                <li class="blta-list-1-item blta-para-1">
                                                                    Excellent standards in construction </li>
                                                            </ul>

                                                            <div class="blta-categories-2-counter-flex d-flex">
                                                                <div class="blta-categories-2-counter-item">
                                                                    <h2
                                                                        class="item-title blta-heading-1 font-800">
                                                                        100% </h2>
                                                                    <h5
                                                                        class="item-para blta-heading-1 font-800 has-color-white">
                                                                        Employee Owned </h5>
                                                                </div>
                                                                <div class="blta-categories-2-counter-item">
                                                                    <h2
                                                                        class="item-title blta-heading-1 font-800">
                                                                        700% </h2>
                                                                    <h5
                                                                        class="item-para blta-heading-1 font-800 has-color-white">
                                                                        active project </h5>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane tabs-content fade " id="tab-2_5355"
                                                            role="tabpanel" aria-labelledby="projectTab-2_5355">
                                                            <p class="blta-para-1 item-disc">
                                                                where or what you want to build, we mobilize the
                                                                right resources and experts to drive value and
                                                                realize your project goals.mobilize the right
                                                                resources and experts to drive value </p>

                                                            <ul class="blta-list-1 list-unstyled">
                                                                <li
                                                                    class="blta-list-1-title blta-heading-1 has-color-white font-800">
                                                                    what's in it for me? </li>

                                                                <li class="blta-list-1-item blta-para-1">
                                                                    High performing, low carbon concrete solution
                                                                </li>
                                                                <li class="blta-list-1-item blta-para-1">
                                                                    Value for workers' skills </li>
                                                                <li class="blta-list-1-item blta-para-1">
                                                                    Excellent standards in construction </li>
                                                            </ul>

                                                            <div class="blta-categories-2-counter-flex d-flex">
                                                                <div class="blta-categories-2-counter-item">
                                                                    <h2
                                                                        class="item-title blta-heading-1 font-800">
                                                                        100% </h2>
                                                                    <h5
                                                                        class="item-para blta-heading-1 font-800 has-color-white">
                                                                        Employee Owned </h5>
                                                                </div>
                                                                <div class="blta-categories-2-counter-item">
                                                                    <h2
                                                                        class="item-title blta-heading-1 font-800">
                                                                        700% </h2>
                                                                    <h5
                                                                        class="item-para blta-heading-1 font-800 has-color-white">
                                                                        active project </h5>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="blta-categories-2-il fix blta-fade-down">
                                        <img decoding="async" src="{{asset ('frontend')}}/wp-content/uploads/2024/05/ct-2-il-1.webp"
                                            alt="ct-2-il-1">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section
            class="elementor-section elementor-top-section elementor-element elementor-element-463a398 elementor-section-full_width elementor-section-height-default elementor-section-height-default"
            data-id="463a398" data-element_type="section">
            <div class="elementor-container elementor-column-gap-default">
                <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-2fe4b18"
                    data-id="2fe4b18" data-element_type="column">
                    <div class="elementor-widget-wrap elementor-element-populated">
                        <div class="elementor-element elementor-element-92ed2a5 elementor-widget elementor-widget-tx_service_lists elh-el tx_service_lists"
                            data-id="92ed2a5" data-element_type="widget"
                            data-settings="{&quot;design_style&quot;:&quot;style_6&quot;}"
                            data-widget_type="tx_service_lists.default">
                            <div class="elementor-widget-container">
                                <div class="buil-service-3-area tx-section">

                                    <img decoding="async" class="buil-service-3-img-1 buil-fade-left"
                                        src="{{asset ('frontend')}}/wp-content/uploads/2024/05/c4-il-2.webp" alt="c4-il-2">

                                    <img decoding="async" class="buil-service-3-img-2 buil-fade-right"
                                        src="{{asset ('frontend')}}/wp-content/uploads/2024/05/c4-il-1.webp" alt="c4-il-1">
                                    <div class="container buil-container-1">

                                        <div class="buil-service-3-top">
                                            <i aria-hidden="true" class="fas fa-house-user"></i>
                                            <h5 class="buil-heading">WELCOME TO BUILDER CORPORATION</h5>

                                            <h2
                                                class="tx-title buil-heading-1 title-3 buil-service-3-title tx-split-text split-in-fade">
                                                Quality Services</h2>
                                        </div>

                                        <div class="buil-service-3-wrap">
                                            <div class="buil-service-3-card">
                                                <i aria-hidden="true"
                                                    class="flaticon flaticon_2-construction-tool"></i>
                                                <h5 class="buil-heading">
                                                    Building Manatance </h5>

                                                <p>
                                                    tasks of varying complexity, provide long-term guarantees and
                                                    regularly master new Home technologies </p>
                                            </div>
                                            <div class="buil-service-3-card">
                                                <i aria-hidden="true" class="flaticon flaticon_2-designing"></i>
                                                <h5 class="buil-heading">
                                                    Home Design </h5>

                                                <p>
                                                    tasks of varying complexity, provide long-term guarantees and
                                                    regularly master new Home technologies </p>
                                            </div>
                                            <div class="buil-service-3-card">
                                                <i aria-hidden="true"
                                                    class="flaticon flaticon_2-interior-design"></i>
                                                <h5 class="buil-heading">
                                                    Interior Design </h5>

                                                <p>
                                                    tasks of varying complexity, provide long-term guarantees and
                                                    regularly master new Home technologies </p>
                                            </div>
                                            <div class="buil-service-3-card">
                                                <i aria-hidden="true" class="flaticon flaticon_2-engineer"></i>
                                                <h5 class="buil-heading">
                                                    Interior Repair </h5>

                                                <p>
                                                    tasks of varying complexity, provide long-term guarantees and
                                                    regularly master new Home technologies </p>
                                            </div>
                                            <div class="buil-service-3-card">
                                                <i aria-hidden="true"
                                                    class="flaticon flaticon_2-civil-engineering"></i>
                                                <h5 class="buil-heading">
                                                    Repair Services </h5>

                                                <p>
                                                    tasks of varying complexity, provide long-term guarantees and
                                                    regularly master new Home technologies </p>
                                            </div>
                                            <div class="buil-service-3-card">
                                                <i aria-hidden="true" class="flaticon flaticon_2-house"></i>
                                                <h5 class="buil-heading">
                                                    Interior Design </h5>

                                                <p>
                                                    tasks of varying complexity, provide long-term guarantees and
                                                    regularly master new Home technologies </p>
                                            </div>
                                        </div>

                                        <div class="buil-service-3-btn-wrap">
                                            <a class="buil-pri-3-btn tx-button" href="../about/index.html"
                                                target="_self" rel="">
                                                <span>More About us</span>
                                                <i aria-hidden="true"
                                                    class="flaticon flaticon_2-right-arrow-2"></i> </a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section
            class="elementor-section elementor-top-section elementor-element elementor-element-b305baa elementor-section-full_width elementor-section-height-default elementor-section-height-default"
            data-id="b305baa" data-element_type="section">
            <div class="elementor-container elementor-column-gap-default">
                <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-3b8b2a3"
                    data-id="3b8b2a3" data-element_type="column">
                    <div class="elementor-widget-wrap elementor-element-populated">
                        <div class="elementor-element elementor-element-99709c2 elementor-widget elementor-widget-tx_service_lists elh-el tx_service_lists"
                            data-id="99709c2" data-element_type="widget"
                            data-settings="{&quot;design_style&quot;:&quot;style_1&quot;}"
                            data-widget_type="tx_service_lists.default">
                            <div class="elementor-widget-container">
                                <div class="blta-range-1-area pt-135 pb-160 fix tx-section">
                                    <div class="container blta-container-1">
                                        <!-- section-title -->
                                        <div class="blta-range-1-section-title mb-20">
                                            <div class="left">
                                                <h5
                                                    class="blta-subtitle-1 font-700 text-uppercase pr-font d-inline-flex tx-subTitle">
                                                    <span class="icon">
                                                        <i aria-hidden="true" class="fas fa-house-user"></i>
                                                    </span>
                                                    WELCOME TO OUR COMPANY
                                                </h5>

                                                <h2
                                                    class="tx-title blta-section-title-1 blta-split-text split-in-left">
                                                    Builta Provides A Full Range Of Services</h2>
                                            </div>

                                            <div class="right blta-fade-right">
                                                <div class="blta-range-1-slider-btn d-flex align-items-center">
                                                    <div class="blta-slider-btn-1 range_1_prev">
                                                        <i class="far fa-long-arrow-left"></i>
                                                    </div>
                                                    <div class="blta-slider-btn-1 range_1_next">
                                                        <i class="far fa-long-arrow-right"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="blta-range-1-slider">
                                            <div class="swiper-container range-1-active fix">
                                                <div class="swiper-wrapper">
                                                    <!-- single-slide -->
                                                    <div class="swiper-slide">
                                                        <div class="blta-range-1-slider-item">
                                                            <div class="main-img img-cover fix">
                                                                <img decoding="async"
                                                                    src="{{asset ('frontend')}}/wp-content/uploads/2024/05/range-img-1.webp"
                                                                    alt="range-img-1">
                                                            </div>

                                                            <div class="content-wrap">
                                                                <h3
                                                                    class="item-title blta-heading-1 has-color-white font-700">
                                                                    SickKids Project Horizon Support Centre </h3>

                                                                <p class="item-disc blta-para-1">A modern,
                                                                    technology-enabled, wellness-focused
                                                                    workspace and sustainable office tower, SickKids
                                                                    Patient Support Centre.</p>

                                                                <ul class="item-list list-unstyled">
                                                                    <li class="blta-para-1 has-color-white">
                                                                        <b>LOCATION:</b> United State
                                                                    </li>
                                                                    <li class="blta-para-1 has-color-white">
                                                                        <b>DATE:</b> 1990-2000
                                                                    </li>
                                                                    <li class="blta-para-1 has-color-white">
                                                                    </li>
                                                                </ul>

                                                                <a class="blta-btn-2 mt-35"
                                                                    href="../about/index.html" target="_self"
                                                                    rel="" aria-label="name"
                                                                    data-back="more about us"
                                                                    data-front="more about us">
                                                                    <span class="icon">
                                                                        <i aria-hidden="true"
                                                                            class="fas fa-long-arrow-alt-right"></i>
                                                                    </span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="swiper-slide">
                                                        <div class="blta-range-1-slider-item">
                                                            <div class="main-img img-cover fix">
                                                                <img decoding="async"
                                                                    src="{{asset ('frontend')}}/wp-content/uploads/2024/05/range-img-2.webp"
                                                                    alt="range-img-2">
                                                            </div>

                                                            <div class="content-wrap">
                                                                <h3
                                                                    class="item-title blta-heading-1 has-color-white font-700">
                                                                    SickKids Project Horizon Support Centre </h3>

                                                                <p class="item-disc blta-para-1">A modern,
                                                                    technology-enabled, wellness-focused
                                                                    workspace and sustainable office tower, SickKids
                                                                    Patient Support Centre.</p>

                                                                <ul class="item-list list-unstyled">
                                                                    <li class="blta-para-1 has-color-white">
                                                                        <b>LOCATION:</b> United State
                                                                    </li>
                                                                    <li class="blta-para-1 has-color-white">
                                                                        <b>DATE:</b> 1990-2000
                                                                    </li>
                                                                    <li class="blta-para-1 has-color-white">
                                                                    </li>
                                                                </ul>

                                                                <a class="blta-btn-2 mt-35"
                                                                    href="../about/index.html" target="_self"
                                                                    rel="" aria-label="name"
                                                                    data-back="more about us"
                                                                    data-front="more about us">
                                                                    <span class="icon">
                                                                        <i aria-hidden="true"
                                                                            class="fas fa-long-arrow-alt-right"></i>
                                                                    </span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="swiper-slide">
                                                        <div class="blta-range-1-slider-item">
                                                            <div class="main-img img-cover fix">
                                                                <img decoding="async"
                                                                    src="{{asset ('frontend')}}/wp-content/uploads/2024/05/range-img-3.webp"
                                                                    alt="range-img-3">
                                                            </div>

                                                            <div class="content-wrap">
                                                                <h3
                                                                    class="item-title blta-heading-1 has-color-white font-700">
                                                                    SickKids Project Horizon Support Centre </h3>

                                                                <p class="item-disc blta-para-1">A modern,
                                                                    technology-enabled, wellness-focused
                                                                    workspace and sustainable office tower, SickKids
                                                                    Patient Support Centre.</p>

                                                                <ul class="item-list list-unstyled">
                                                                    <li class="blta-para-1 has-color-white">
                                                                        <b>LOCATION:</b> United State
                                                                    </li>
                                                                    <li class="blta-para-1 has-color-white">
                                                                        <b>DATE:</b> 1990-2000
                                                                    </li>
                                                                    <li class="blta-para-1 has-color-white">
                                                                    </li>
                                                                </ul>

                                                                <a class="blta-btn-2 mt-35"
                                                                    href="../about/index.html" target="_self"
                                                                    rel="" aria-label="name"
                                                                    data-back="more about us"
                                                                    data-front="more about us">
                                                                    <span class="icon">
                                                                        <i aria-hidden="true"
                                                                            class="fas fa-long-arrow-alt-right"></i>
                                                                    </span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div
                                            class="blta-range-1-content d-flex align-items-center flex-wrap wow fadeInUp">
                                            <img decoding="async" class="group"
                                                src="{{asset ('frontend')}}/wp-content/uploads/2024/05/range-group-1.webp"
                                                alt="range-group-1">

                                            <div class="blta-para-1 call-link">
                                                <p>Sales representative <a class="font-500 blta-heading-1"
                                                        href="%2b1%20(251)%20344%200%2066.html">+1 (251) 344 0
                                                        66</a> free call !</p>
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

        <section
            class="elementor-section elementor-top-section elementor-element elementor-element-2e3a8f7 elementor-section-boxed elementor-section-height-default elementor-section-height-default"
            data-id="2e3a8f7" data-element_type="section"
            data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
            <div class="elementor-container elementor-column-gap-default">
                <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-2f58961"
                    data-id="2f58961" data-element_type="column">
                    <div class="elementor-widget-wrap elementor-element-populated">
                        <div class="elementor-element elementor-element-96d7af2 elementor-widget elementor-widget-tx_heading elh-el tx_heading"
                            data-id="96d7af2" data-element_type="widget"
                            data-settings="{&quot;design_style&quot;:&quot;style_2&quot;}"
                            data-widget_type="tx_heading.default">
                            <div class="elementor-widget-container">
                                <div class="tx-section-wrapper tx-heading-section text-left ">

                                    <h5 class="blta-subtitle-1 font-700 text-uppercase pr-font tx-subTitle">

                                        YOUR RENOVATION </h5>

                                    <h2 class="tx-title blta-section-title-1  blta-split-text split-in-left">
                                        Building Your Visions.<br> Creating Reality.</h2>
                                </div>
                            </div>
                        </div>
                        <div class="elementor-element elementor-element-bae1780 elementor-widget elementor-widget-tx_button elh-el tx_button"
                            data-id="bae1780" data-element_type="widget"
                            data-settings="{&quot;design_style&quot;:&quot;style_1&quot;}"
                            data-widget_type="tx_button.default">
                            <div class="elementor-widget-container">
                                <div class="btn-wrapper  text-left">
                                    <a class="blta-btn-2 has-color-2 tx-button none" href="../about/index.html"
                                        target="_self" rel="" aria-label="name"
                                        data-back="more about us" data-front="more about us">
                                        <span class="icon">
                                            <i aria-hidden="true" class="flaticon flaticon_2-right-arrow-2"></i>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section
            class="elementor-section elementor-top-section elementor-element elementor-element-bcc4987 elementor-section-full_width elementor-section-height-default elementor-section-height-default"
            data-id="bcc4987" data-element_type="section">
            <div class="elementor-container elementor-column-gap-default">
                <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-c0de9c8"
                    data-id="c0de9c8" data-element_type="column">
                    <div class="elementor-widget-wrap elementor-element-populated">
                        <div class="elementor-element elementor-element-2188bcb elementor-widget elementor-widget-tx_get_quote elh-el tx_get_quote"
                            data-id="2188bcb" data-element_type="widget"
                            data-settings="{&quot;design_style&quot;:&quot;style_2&quot;}"
                            data-widget_type="tx_get_quote.default">
                            <div class="elementor-widget-container">
                                <div class="blta-price-3-area pt-155 pb-110 tx-section">
                                    <div class="container blta-container-1">
                                        <div class="row align-items-center">

                                            <!-- left-form -->
                                            <div class="col-lg-7">
                                                <div class="booking-price-bg">
                                                    <!-- form -->
                                                    <div class="blta-booking-form-wrap mb-35">
                                                        <div class="quoteform-wrapper">

                                                            <div class="wpcf7 no-js" id="wpcf7-f2962-p11-o1"
                                                                lang="en-US" dir="ltr">
                                                                <div class="screen-reader-response">
                                                                    <p role="status" aria-live="polite"
                                                                        aria-atomic="true"></p>
                                                                    <ul></ul>
                                                                </div>
                                                                <form
                                                                    action="https://themexriver.com/wp/builta/home-04/#wpcf7-f2962-p11-o1"
                                                                    method="post" class="wpcf7-form init"
                                                                    aria-label="Contact form"
                                                                    novalidate="novalidate" data-status="init">
                                                                    <div style="display: none;">
                                                                        <input type="hidden" name="_wpcf7"
                                                                            value="2962" />
                                                                        <input type="hidden"
                                                                            name="_wpcf7_version"
                                                                            value="5.9.8" />
                                                                        <input type="hidden"
                                                                            name="_wpcf7_locale"
                                                                            value="en_US" />
                                                                        <input type="hidden"
                                                                            name="_wpcf7_unit_tag"
                                                                            value="wpcf7-f2962-p11-o1" />
                                                                        <input type="hidden"
                                                                            name="_wpcf7_container_post"
                                                                            value="11" />
                                                                        <input type="hidden"
                                                                            name="_wpcf7_posted_data_hash"
                                                                            value="" />
                                                                    </div>
                                                                    <div class="blta-booking-form">
                                                                        <div class="input-item has-full-width">
                                                                            <label
                                                                                class="blta-heading-1 font-600 has-color-white form-label"
                                                                                for="house area">house
                                                                                area</label>
                                                                            <span class="wpcf7-form-control-wrap"
                                                                                data-name="position-501"><select
                                                                                    class="wpcf7-form-control wpcf7-select wpcf7-validates-as-required"
                                                                                    aria-required="true"
                                                                                    aria-invalid="false"
                                                                                    name="position-501">
                                                                                    <option
                                                                                        value="United Kingdom (UK)">
                                                                                        United Kingdom (UK)</option>
                                                                                    <option
                                                                                        value="United States (US)">
                                                                                        United States (US)</option>
                                                                                    <option value="Germany (DE)">
                                                                                        Germany (DE)</option>
                                                                                    <option
                                                                                        value="Support Engineer">
                                                                                        Support Engineer</option>
                                                                                    <option
                                                                                        value="Australia (AU)">
                                                                                        Australia (AU)</option>
                                                                                    <option
                                                                                        value="Equatorial Guinea (GQ)">
                                                                                        Equatorial Guinea (GQ)
                                                                                    </option>
                                                                                </select></span>
                                                                        </div>
                                                                        <div class="input-item">
                                                                            <label
                                                                                class="blta-heading-1 font-600 has-color-white form-label"
                                                                                for="room">room</label>
                                                                            <span class="wpcf7-form-control-wrap"
                                                                                data-name="position-502"><select
                                                                                    class="wpcf7-form-control wpcf7-select wpcf7-validates-as-required"
                                                                                    aria-required="true"
                                                                                    aria-invalid="false"
                                                                                    name="position-502">
                                                                                    <option
                                                                                        value="United Kingdom (UK)">
                                                                                        United Kingdom (UK)</option>
                                                                                    <option
                                                                                        value="United States (US)">
                                                                                        United States (US)</option>
                                                                                    <option value="Germany (DE)">
                                                                                        Germany (DE)</option>
                                                                                    <option
                                                                                        value="Support Engineer">
                                                                                        Support Engineer</option>
                                                                                    <option
                                                                                        value="Australia (AU)">
                                                                                        Australia (AU)</option>
                                                                                    <option
                                                                                        value="Equatorial Guinea (GQ)">
                                                                                        Equatorial Guinea (GQ)
                                                                                    </option>
                                                                                </select></span>
                                                                        </div>
                                                                        <div class="input-item">
                                                                            <label
                                                                                class="blta-heading-1 font-600 has-color-white form-label"
                                                                                for="bathroom">bathroom</label>
                                                                            <span class="wpcf7-form-control-wrap"
                                                                                data-name="position-503"><select
                                                                                    class="wpcf7-form-control wpcf7-select wpcf7-validates-as-required"
                                                                                    aria-required="true"
                                                                                    aria-invalid="false"
                                                                                    name="position-503">
                                                                                    <option
                                                                                        value="United Kingdom (UK)">
                                                                                        United Kingdom (UK)</option>
                                                                                    <option
                                                                                        value="United States (US)">
                                                                                        United States (US)</option>
                                                                                    <option value="Germany (DE)">
                                                                                        Germany (DE)</option>
                                                                                    <option
                                                                                        value="Support Engineer">
                                                                                        Support Engineer</option>
                                                                                    <option
                                                                                        value="Australia (AU)">
                                                                                        Australia (AU)</option>
                                                                                    <option
                                                                                        value="Equatorial Guinea (GQ)">
                                                                                        Equatorial Guinea (GQ)
                                                                                    </option>
                                                                                </select></span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="wpcf7-response-output"
                                                                        aria-hidden="true"></div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- price-tabs -->
                                                    <div class="blta-price-tabs-wrap wow fadeInUp">
                                                        <h5
                                                            class="title blta-heading-1 text-capitalize flex-wrap font-700 has-color-white text-center d-flex align-items-center justify-content-between">
                                                            building materials
                                                            <span class="blta-para-1 has-color-white font-400">
                                                                A+ House Construction Tentative Amount </span>
                                                        </h5>

                                                        <div class="blta-price-tabs-block mb-25">

                                                            <!-- tabs-btn -->
                                                            <div class="blta-price-tabs-btn" id="v-pills-7898"
                                                                role="tablist" aria-orientation="vertical">
                                                                <button
                                                                    class="nav-link active blta-heading-1 font-700"
                                                                    id="pricingTab-0_7898" data-bs-toggle="tab"
                                                                    data-bs-target="#tab-0_7898" type="button"
                                                                    role="tab" aria-controls="tab-0_7898"
                                                                    aria-selected="true">
                                                                    A+ Grey Structure </button>
                                                                <button class="nav-link  blta-heading-1 font-700"
                                                                    id="pricingTab-1_7898" data-bs-toggle="tab"
                                                                    data-bs-target="#tab-1_7898" type="button"
                                                                    role="tab" aria-controls="tab-1_7898"
                                                                    aria-selected="false">
                                                                    Premium Finishing </button>
                                                            </div>

                                                            <!-- tabs-content -->
                                                            <div class="tab-content blta-price-tabs-content"
                                                                id="v-pills-7898">
                                                                <div class="tab-pane fade show active"
                                                                    id="tab-0_7898" role="tabpanel"
                                                                    aria-labelledby="pricingTab-0_7898">
                                                                    <div class="blta-price-tabs-content-block">
                                                                        <h6
                                                                            class="price-title has-color-white blta-heading-1 font-700">
                                                                            Estimated Price : </h6>

                                                                        <h4
                                                                            class="price has-color-white blta-heading-1 font-700">
                                                                            &#036; 90,000 </h4>
                                                                    </div>
                                                                </div>
                                                                <div class="tab-pane fade " id="tab-1_7898"
                                                                    role="tabpanel"
                                                                    aria-labelledby="pricingTab-1_7898">
                                                                    <div class="blta-price-tabs-content-block">
                                                                        <h6
                                                                            class="price-title has-color-white blta-heading-1 font-700">
                                                                            Estimated Price : </h6>

                                                                        <h4
                                                                            class="price has-color-white blta-heading-1 font-700">
                                                                            &#036; 70,000 </h4>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- right-img -->
                                            <div class="col-lg-5">
                                                <div class="blta-price-3-content">
                                                    <!-- section-title -->
                                                    <div class="blta-price-3-section-title mb-30">
                                                        <h5
                                                            class="blta-subtitle-1 font-700 text-uppercase pr-font d-inline-flex has-color-2">
                                                            <span class="icon has-color-2">
                                                                <i aria-hidden="true"
                                                                    class="fas fa-house-user"></i> </span>
                                                            OUR PROJECT PRICES
                                                        </h5>

                                                        <h2
                                                            class="tx-title blta-section-title-1 blta-split-text split-in-left has-color-2">
                                                            Request A
                                                            Quote</h2>
                                                        <p class="blta-para-1 wow fadeInUp tx-description">
                                                            We successfully cope with tasks of varying complexity,
                                                            provide long- term guarantees and regularly master new
                                                            technologies. Our portfolio includes dozens of
                                                            successfully completed projects </p>
                                                    </div>

                                                    <div class="blta-price-3-content-div">
                                                        <ul class="blta-list-1 list-unstyled">
                                                            <li class="blta-list-1-item blta-para-1 wow fadeInUp">
                                                                Geographical diversity, project complexity </li>
                                                            <li class="blta-list-1-item blta-para-1 wow fadeInUp">
                                                                Whether building on land or over water </li>
                                                            <li class="blta-list-1-item blta-para-1 wow fadeInUp">
                                                                Construction companies respond </li>
                                                        </ul>
                                                        <div class="mb-40"></div>
                                                        <div class="blta-about-1-content-sig wow fadeInUp"
                                                            data-wow-delay=".5s">
                                                            <img decoding="async" class="sig-img"
                                                                src="{{asset ('frontend')}}/wp-content/uploads/2024/05/a1-sig.webp"
                                                                alt="a1-sig">

                                                            <div class="content-wrap">
                                                                <h3 class="sig-name blta-heading-1 font-800">
                                                                    Author Name </h3>

                                                                <p class="blta-para-1 sig-disc">
                                                                    Author Designation </p>
                                                            </div>
                                                        </div>

                                                        <div class="blta-price-3-content-il wow zoomIn">
                                                            <img decoding="async"
                                                                src="{{asset ('frontend')}}/wp-content/uploads/2024/05/price-3-il-1.webp"
                                                                alt="price-3-il-1">
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
                </div>
            </div>
        </section>

        <section
            class="elementor-section elementor-top-section elementor-element elementor-element-bed0050 elementor-section-content-middle elementor-section-boxed elementor-section-height-default elementor-section-height-default"
            data-id="bed0050" data-element_type="section">
            <div class="elementor-container elementor-column-gap-default">
                <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-07fca94"
                    data-id="07fca94" data-element_type="column">
                    <div class="elementor-widget-wrap elementor-element-populated">
                        <div class="elementor-element elementor-element-1333895 elementor-widget elementor-widget-tx_heading elh-el tx_heading"
                            data-id="1333895" data-element_type="widget"
                            data-settings="{&quot;design_style&quot;:&quot;style_2&quot;}"
                            data-widget_type="tx_heading.default">
                            <div class="elementor-widget-container">
                                <div class="tx-section-wrapper tx-heading-section text-left ">

                                    <h5 class="blta-subtitle-1 font-700 text-uppercase pr-font tx-subTitle">
                                        <span class="icon">
                                            <i aria-hidden="true" class="fas fa-house-user"></i> </span>

                                        OUR CLIENT
                                    </h5>

                                    <h2 class="tx-title blta-section-title-1  blta-split-text split-in-left">We’ve
                                        1500+ Global <br>Premium Clients</h2>
                                    <p class="blta-para-1 a1-disc tx-description">
                                        A modern, technology-enabled, wellness-focused <br> workspace and
                                        sustainable office tower, </p>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-a78c216"
                    data-id="a78c216" data-element_type="column">
                    <div class="elementor-widget-wrap elementor-element-populated">
                        <div class="elementor-element elementor-element-5a8155d elementor-widget elementor-widget-tx_brand elh-el tx_brand"
                            data-id="5a8155d" data-element_type="widget"
                            data-settings="{&quot;design_style&quot;:&quot;style_1&quot;}"
                            data-widget_type="tx_brand.default">
                            <div class="elementor-widget-container">
                                <div class="blta-client-1-logo-grid wow none">
                                    <a href="{{asset ('frontend')}}/wp-content/uploads/2024/05/client-1.svg" aria-label="name"
                                        class="blta-client-1-logo">
                                        <img decoding="async" src="{{asset ('frontend')}}/wp-content/uploads/2024/05/client-1.svg"
                                            alt="">
                                    </a>
                                    <a href="{{asset ('frontend')}}/wp-content/uploads/2024/05/client-2.svg" aria-label="name"
                                        class="blta-client-1-logo">
                                        <img decoding="async" src="{{asset ('frontend')}}/wp-content/uploads/2024/05/client-2.svg"
                                            alt="">
                                    </a>
                                    <a href="{{asset ('frontend')}}/wp-content/uploads/2024/05/client-3.svg" aria-label="name"
                                        class="blta-client-1-logo">
                                        <img decoding="async" src="{{asset ('frontend')}}/wp-content/uploads/2024/05/client-3.svg"
                                            alt="">
                                    </a>
                                    <a href="{{asset ('frontend')}}/wp-content/uploads/2024/05/client-4.svg" aria-label="name"
                                        class="blta-client-1-logo">
                                        <img decoding="async" src="{{asset ('frontend')}}/wp-content/uploads/2024/05/client-4.svg"
                                            alt="">
                                    </a>
                                    <a href="{{asset ('frontend')}}/wp-content/uploads/2024/05/client-5.svg" aria-label="name"
                                        class="blta-client-1-logo">
                                        <img decoding="async" src="{{asset ('frontend')}}/wp-content/uploads/2024/05/client-5.svg"
                                            alt="">
                                    </a>
                                    <a href="{{asset ('frontend')}}/wp-content/uploads/2024/05/client-6.svg" aria-label="name"
                                        class="blta-client-1-logo">
                                        <img decoding="async" src="{{asset ('frontend')}}/wp-content/uploads/2024/05/client-6.svg"
                                            alt="">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
</div>
       
   @endsection
