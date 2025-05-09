@php
    $seo = App\Models\Seo::find(1);
    $logocek = App\Models\Logo::find(1);
@endphp
@section('title'){{$seo->site_adi}}@endsection
<!DOCTYPE html>
<html lang="en" dir="ltr" data-startbar="dark" data-bs-theme="dark">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>


    <meta charset="utf-8" />
    <title>Giriş Yap | @yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="shortcut icon" href="{{url($logocek->favicon)}}">
    <link rel="manifest" href="{{ asset('frontend') }}/assets/img/favicons/manifest.json">
    <link href="{{ asset('backend') }}/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend') }}/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend') }}/assets/css/app.min.css" rel="stylesheet" type="text/css" />

</head>


<body>
    <div class="container-xxl">
        <div class="row vh-100 d-flex justify-content-center">
            <div class="col-12 align-self-center">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-4 mx-auto">
                            <div class="card">
                                <div class="card-body p-0 bg-black auth-header-box rounded-top">
                                    <div class="text-center p-3">
                                        <a style="pointer-events: none;">
                                            <img src="{{ $seo->logo }}" height="170" alt="logo"
                                                class="auth-logo">
                                        </a>
                                        <h4 class="mt-3 mb-1 fw-semibold text-white fs-18">Holgeldin.</h4>
                                        <p class="text-muted fw-medium mb-0">Hesabınıza giriş yapmak için
                                            bilgilerinizi girin</p>
                                    </div>
                                </div>
                                <div class="card-body pt-0">
                                    <form class="my-4" method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <!-- Hata mesajları -->
                                        @if ($errors->any())
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                <ul class="mb-0">
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                        <div class="form-group mb-2">
                                            <x-input-label class="form-label" for="email" :value="__('Email')" />
                                            <x-text-input id="email" class="form-control" type="email"
                                                name="email" :value="old('email')" autofocus autocomplete="username"
                                                placeholder="E-posta adresinizi girin" />
                                        </div>

                                        <div class="form-group">
                                            <x-input-label class="form-label" for="password" :value="__('Şifre')" />
                                            <div style="margin-block-start: 10px" class="input-group"
                                                id="show_hide_password">
                                                <x-text-input id="password" class="form-control border-end-0"
                                                    type="password" name="password" autocomplete="current-password"
                                                    placeholder="Şifrenizi girin" />
                                                <a href="javascript:;" class="input-group-text bg-transparent"
                                                    onclick="event.preventDefault(); togglePasswordVisibility();">
                                                    <i id="password-icon" class="fa fa-eye"></i>
                                                </a>
                                            </div>
                                        </div>

                                        <script>
                                            function togglePasswordVisibility() {
                                                const passwordField = document.getElementById('password');
                                                const passwordIcon = document.getElementById('password-icon');
                                                if (passwordField.type === 'password') {
                                                    passwordField.type = 'text';
                                                    passwordIcon.classList.remove('fa-eye');
                                                    passwordIcon.classList.add('fa-eye-slash');
                                                } else {
                                                    passwordField.type = 'password';
                                                    passwordIcon.classList.remove('fa-eye-slash');
                                                    passwordIcon.classList.add('fa-eye');
                                                }
                                            }
                                        </script>

                                        <div class="form-group row mt-3">
                                            <div class="col-sm-6">
                                                <div class="form-check form-switch form-switch-success">
                                                    <input class="form-check-input" id="remember_me" type="checkbox"
                                                        name="remember">
                                                    <label class="form-check-label"
                                                        for="remember_me">{{ __('Beni Hatırla') }}</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 text-end">
                                                @if (Route::has('password.request'))
                                                    <a class='text-muted font-13'
                                                        href='{{ route('password.request') }}'><i
                                                            class="dripicons-lock"></i>
                                                        {{ __('Şifrenizi mi unuttunuz?') }}</a>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group mb-0 row">
                                            <div class="col-12">
                                                <div class="d-grid mt-3">
                                                    <x-primary-button class="btn btn-primary"
                                                        type="submit">{{ __('Giriş Yap') }} <i
                                                            class="fas fa-sign-in-alt ms-1"></i></x-primary-button>

                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="d-flex justify-content-center">
                                        <a href="#"
                                            class="d-flex justify-content-center align-items-center thumb-md bg-blue-subtle text-blue rounded-circle me-2">
                                            <i class="fab fa-facebook align-self-center"></i>
                                        </a>
                                        <a href="#"
                                            class="d-flex justify-content-center align-items-center thumb-md bg-info-subtle text-info rounded-circle me-2">
                                            <i class="fab fa-twitter align-self-center"></i>
                                        </a>
                                        <a href="#"
                                            class="d-flex justify-content-center align-items-center thumb-md bg-danger-subtle text-danger rounded-circle">
                                            <i class="fab fa-google align-self-center"></i>
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

    <!-- bildiri -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
                timer: 3000, // 3 seconds
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            });
        @endif
    </script>
    <!-- bildiri -->

</body>

</html>
