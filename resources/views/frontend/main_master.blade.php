@php
    $ayarlar = App\Models\Ayarlar::find(1);
    $logocek = App\Models\Logo::find(1);
    $renkcek = App\Models\RenkPaleti::find(1);
    $anasayfa = App\Models\Anasayfa::find(1);
    $banner = App\Models\Banner::where('durum', 1)->orderBy('sirano')->first();
	$hakkimizda = App\Models\Hakkimizda::where('durum', 1)->first();
    
    if (!function_exists('hexToRgba')) {
        function hexToRgba($hex, $alpha = 1)
        {
            $hex = str_replace('#', '', $hex);
            $r = hexdec(substr($hex, 0, 2));
            $g = hexdec(substr($hex, 2, 2));
            $b = hexdec(substr($hex, 4, 2));
            return "rgba($r, $g, $b, $alpha)";
        }
    }

@endphp

<!doctype html>
<html class="no-js" lang="en">

<head>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="profile" href="https://gmpg.org/xfn/11">
        <title>@yield('title')</title>
        <meta name="robots" content="max-image-preview:large" />
        <meta name="author" content="@yield('author')">
        <meta name="description" content="@yield('description')">
        <meta name="keywords" content="@yield('keywords')">
        <meta name="language" content="tr">

        <!-- Open Graph / Facebook -->
        <meta property="og:title" content="@yield('title')">
        <meta property="og:description" content="@yield('description')">
        <meta property="og:image" content="@yield('resim')">
        <meta property="og:url" content="@yield('url')">
        <meta property="og:type" content="website">

        <!-- Twitter -->
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="@yield('title')">
        <meta name="twitter:description" content="@yield('description')">
        <meta name="twitter:image" content="@yield('resim')">

        <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@300;400;500;600;700;800;900&amp;display=swap"
            rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&amp;display=swap"
            rel="stylesheet">

        <link rel="shortcut icon" href="{{ url($logocek->favicon) }}" type="image/x-icon" />
        <link rel="icon" href="{{ url($logocek->favicon) }}" type="image/x-icon" />

        <!-- Responsive -->
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
        <link href="https://cdn.jsdelivr.net/npm/froala-editor@4.0.14/css/froala_editor.pkgd.min.css" rel="stylesheet">

        <!-- CSS here -->
        <link rel="stylesheet" href="{{ asset('frontend') }}/css/plugins.css">
        <link rel="stylesheet" href="{{ asset('frontend') }}/css/main.css">

        <!-- Page-Revealer -->
        <script src="{{ asset('frontend') }}/js/tg-page-head.js"></script>
        <style>
            :root {
                --tg-common-color-teal: <?= hexToRgba($renkcek->renk_kodu) ?>;
                --tg-common-color-cyan: <?= hexToRgba($renkcek->renk_kodu) ?>;
                --tg-theme-primary: <?= hexToRgba($renkcek->renk_kodu) ?>;
            }
        
            .slider__content .title {
                text-shadow: -1px 5px 0px <?= hexToRgba($renkcek->renk_kodu, 0.8) ?>;
            }
        
            .cb-cursor:before {
                background: linear-gradient(40deg, {{ $renkcek->renk_kodu }} 0%, {{ $renkcek->renk_kodu }} 100%);
            }
        
            .snowflake {
                position: fixed;
                top: -50px;
                z-index: 9999;
                color: white;
                font-size: 24px;
                user-select: none;
                pointer-events: none;
                opacity: 0.8;
                animation: fall linear infinite;
            }
        
            @if ($banner)
                .slider__content .sub-title::before {
                    background-image: url({{ $banner->yaziresim }});
                }
            @endif
        
            @keyframes fall {
                0% {
                    transform: translateX(0) translateY(-100px);
                    opacity: 1;
                }
        
                100% {
                    transform: translateX(100px) translateY(100vh);
                    opacity: 0;
                }
            }
        
            .snowflakes {
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                pointer-events: none;
            }
        
            /* Snowflakes aktif olduğunda */
            @if ($ayarlar->snowflake == 1)
                .snowflakes {
                    display: block;
                }
            @else
                .snowflakes {
                    display: none;
                }
            @endif
        </style>
        
    </head>

<body>


    <!-- scroll-top -->
    <button class="scroll__top scroll-to-target" data-target="html">
        <i class="flaticon-right-arrow"></i>
    </button>
    <!-- scroll-top-end-->

    <!-- header-area -->
    @if($anasayfa->headerdurum == 1)
    @include('frontend.include.header')
    @endif
    <!-- header-area-end -->



    <!-- main-area -->
    @yield('main')
    <!-- main-area-end -->


    <!-- footer-area-start -->
    @if($anasayfa->footerdurum == 1)
    @include('frontend.include.footer')
    @endif
    <!-- footer-start-end -->



    <!-- JS here -->
    <script src="{{ asset('frontend') }}/js/vendor/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('frontend') }}/js/plugins.js"></script>
    <script src="{{ asset('frontend') }}/js/ajax-form.js"></script>
    <script src="{{ asset('frontend') }}/js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/froala-editor@4.0.14/js/froala_editor.pkgd.min.js"></script>

    <script type="text/javascript">
        @if (Session::has('bildirim'))
            var type = "{{ Session::get('alert-type', 'info') }}";
            var message = "{{ Session::get('bildirim') }}";
            var title = '';
            var iconType = '';

            switch (type) {
                case 'info':
                    title = 'Bilgi';
                    iconType = 'info';
                    break;
                case 'success':
                    title = 'Başarılı';
                    iconType = 'success';
                    break;
                case 'warning':
                    title = 'Uyarı';
                    iconType = 'warning';
                    break;
                case 'error':
                    title = 'Hata';
                    iconType = 'error';
                    break;
            }

            Swal.fire({
                toast: true,
                position: 'top-end',
                icon: iconType,
                title: title,
                text: message,
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            });
        @endif
    </script>
</body>

</html>
