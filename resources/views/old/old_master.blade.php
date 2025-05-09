@php
    $ayarlar = App\Models\Ayarlar::find(1);
    $logocek = App\Models\Logo::find(1);
    $seocek = App\Models\Seo::find(1);
@endphp

<!DOCTYPE html>
<html lang="zxx">


<!-- Mirrored from andit.co/projects/html/and-tour/demo/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 05 Nov 2024 12:40:47 GMT -->
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
	
	<link href="https://fonts.googleapis.com/css2?family=Lexend:wght@300;400;500;600;700;800;900&amp;display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&amp;display=swap" rel="stylesheet">
	
	<link rel="shortcut icon" href="{{url($logocek->favicon)}}" type="image/x-icon" />
	<link rel="icon" href="{{url($logocek->favicon)}}" type="image/x-icon" />
	
	<!-- Responsive -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

    <!-- Bootstrap css -->
    <link rel="stylesheet" href="{{ asset ('frontend')}}/assets/css/bootstrap.min.css" />
    <!-- animate css -->
    <link rel="stylesheet" href="{{ asset ('frontend')}}/assets/css/animate.min.css" />
    <!-- Fontawesome css -->
    <link rel="stylesheet" href="{{ asset ('frontend')}}/assets/css/fontawesome.all.min.css" />
    <link rel="stylesheet" href="cdn.jsdelivr.net/npm/bootstrap-icons%401.8.2/font/bootstrap-icons.css">
    <!-- owl.carousel css -->
    <link rel="stylesheet" href="{{ asset ('frontend')}}/assets/css/owl.carousel.min.css" />
    <!-- owl.theme.default css -->
    <link rel="stylesheet" href="{{ asset ('frontend')}}/assets/css/owl.theme.default.min.css" />
    <!-- navber css -->
    <link rel="stylesheet" href="{{ asset ('frontend')}}/assets/css/navber.css" />
    <!-- meanmenu css -->
    <link rel="stylesheet" href="{{ asset ('frontend')}}/assets/css/meanmenu.css" />
    <!-- Style css -->
    <link rel="stylesheet" href="{{ asset ('frontend')}}/assets/css/style.css" />
    <!-- Responsive css -->
    <link rel="stylesheet" href="{{ asset ('frontend')}}/assets/css/responsive.css" />

    <link href="https://cdn.jsdelivr.net/npm/froala-editor@4.0.14/css/froala_editor.pkgd.min.css" rel="stylesheet">

</head>

<body>

    <!-- preloader Area -->
    <div class="preloader">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="lds-spinner">
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
            </div>
        </div>
    </div>

	
    <!-- Header Area -->
	@include('frontend.include.header')

	@yield('main')

    <!-- Footer  -->
    @include('frontend.include.footer')

    <div class="go-top">
        <i class="fas fa-chevron-up"></i>
        <i class="fas fa-chevron-up"></i>
    </div>


    
    <script src="{{ asset ('frontend')}}/assets/js/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap js -->
    <script src="{{ asset ('frontend')}}/assets/js/bootstrap.bundle.js"></script>
    <!-- Meanu js -->
    <script src="{{ asset ('frontend')}}/assets/js/jquery.meanmenu.js"></script>
    <!-- owl carousel js -->
    <script src="{{ asset ('frontend')}}/assets/js/owl.carousel.min.js"></script>
    <!-- wow.js -->
    <script src="{{ asset ('frontend')}}/assets/js/wow.min.js"></script>
    <!-- Custom js -->
    <script src="{{ asset ('frontend')}}/assets/js/custom.js"></script>
    <script src="{{ asset ('frontend')}}/assets/js/add-form.js"></script>
    <script src="{{ asset ('frontend')}}/assets/js/form-dropdown.js"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/froala-editor@4.0.14/js/froala_editor.pkgd.min.js"></script>

    <script type="text/javascript">
        //Bildirim 
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


<!-- Mirrored from andit.co/projects/html/and-tour/demo/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 05 Nov 2024 12:41:21 GMT -->
</html>