<!DOCTYPE html>
<html lang="tr" dir="ltr" data-startbar="{{ Auth::user()->mode == 1 ? 'dark' : 'light' }}"
    data-bs-theme="{{ Auth::user()->mode == 1 ? 'dark' : 'light' }}">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <meta charset="utf-8" />
    <title> @yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="shortcut icon" href="{{ asset('backend/KYU SOFTWARE Logo - White - Favicon - 32x32.png') }}">
    <link href="{{ asset('backend') }}/assets/libs/mobius1-selectr/selectr.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend') }}/assets/libs/huebee/huebee.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend') }}/assets/libs/vanillajs-datepicker/css/datepicker.min.css" rel="stylesheet"
        type="text/css" />
    <link rel="stylesheet" href="{{ asset('backend/assets/libs/jsvectormap/css/jsvectormap.min.css') }}">
    <link href="{{ asset('backend/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend/assets/libs/simple-datatables/style.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend/assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend/assets/css/style.css') }}" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/froala-editor@4.0.14/css/froala_editor.pkgd.min.css" rel="stylesheet">

</head>

<body>
    @include('admin.include.header')

    @include('admin.include.sidebar')

    <div class="page-wrapper">

        <div class="page-content">

            @yield('admin')

            @include('admin.include.footer')

        </div>
    </div>


    <script src="{{ asset('backend/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('backend/assets/data/stock-prices.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/jsvectormap/js/jsvectormap.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/jsvectormap/maps/world.js') }}"></script>
    <script src="{{ asset('backend/assets/js/pages/index.init.js') }}"></script>
    <script src="{{ asset('backend/assets/js/app.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="{{ asset('backend/assets/libs/simple-datatables/umd/simple-datatables.js') }}"></script>
    <script src="{{ asset('backend/assets/js/pages/datatable.init.js') }}"></script>
    <script src="{{ asset('backend') }}/assets/libs/mobius1-selectr/selectr.min.js"></script>
    <script src="{{ asset('backend') }}/assets/libs/huebee/huebee.pkgd.min.js"></script>
    <script src="{{ asset('backend') }}/assets/libs/vanillajs-datepicker/js/datepicker-full.min.js"></script>
    <script src="{{ asset('backend') }}/assets/js/moment.js"></script>
    <script src="{{ asset('backend') }}/assets/libs/imask/imask.min.js"></script>
    <script src="{{ asset('backend') }}/assets/js/pages/forms-advanced.js"></script>
    <script src="https://cdn.tiny.cloud/1/e0polwqmz6ik7s9gxmkzi1g8eh1k0sigx4zd2usn1pb5k0vm/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>
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

        //Resim Gösterme Alanı
        $(document).ready(function() {
            $('#resim').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#resimGoster').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });

        //Arkaplan Gösterme Alanı
        $(document).ready(function() {
            $('#arkaplan').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#arkaplanGoster').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });

        //Yazı Arkaplan Gösterme Alanı
        $(document).ready(function() {
            $('#yaziresim').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#yaziresimGoster').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });

        //Hoşgeldin Mesajı
        function getGreeting() {
            const hours = new Date().getHours();
            let greeting = '';

            if (hours >= 5 && hours < 13) {
                greeting = 'Günaydın, {{ Auth::user()->name }}!';
            } else if (hours >= 13 && hours < 17) {
                greeting = 'Tünaydın, {{ Auth::user()->name }}!';
            } else if (hours >= 17 && hours < 23) {
                greeting = 'İyi Akşamlar, {{ Auth::user()->name }}!';
            } else {
                greeting = 'İyi Geceler, {{ Auth::user()->name }}!';
            }

            return greeting;
        }

        //Saat
        function updateGreetingAndTime() {
            const now = new Date();
            const hours = now.getHours().toString().padStart(2, '0');
            const minutes = now.getMinutes().toString().padStart(2, '0');
            const seconds = now.getSeconds().toString().padStart(2, '0');
            const timeString = `Saat: ${hours}:${minutes}:${seconds}`;

            document.getElementById('greeting').textContent = getGreeting();
            document.getElementById('time').textContent = timeString;
        }

        setInterval(updateGreetingAndTime, 1000);
        updateGreetingAndTime();

        //Zorunlu Alanlar
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('Form');
            const requiredFields = form.querySelectorAll('input.required, textarea.required');

            form.addEventListener('submit', function(event) {
                let hasError = false;

                requiredFields.forEach(field => {
                    if (field.value.trim() === '') {
                        field.classList.add('is-invalid');
                        field.classList.remove('is-valid');
                        field.classList.add('shake');
                        setTimeout(() => field.classList.remove('shake'), 300);
                        hasError = true;
                    } else {
                        field.classList.remove('is-invalid');
                        field.classList.add('is-valid');
                    }
                });

                if (hasError) {
                    event.preventDefault();
                }
            });

            requiredFields.forEach(field => {
                field.addEventListener('input', function() {
                    if (this.value.trim() !== '') {
                        this.classList.remove('is-invalid');
                        this.classList.add('is-valid');
                    } else {
                        this.classList.remove('is-valid');
                        this.classList.add('is-invalid');
                    }
                });
            });
        });

        //Aktif/Pasif Bildirimi
        $(function() {
            function showToast(type, title, text) {
                Swal.fire({
                    toast: true,
                    position: 'top-end',
                    icon: type,
                    title: title,
                    text: text,
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                });
            }

            //Ürünler
            $('.urunler').change(function() {
                var durum = $(this).prop('checked') ? 1 : 0;
                var urun_id = $(this).data('id');

                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: '/urun/durum',
                    data: {
                        'durum': durum,
                        'urun_id': urun_id
                    },
                    success: function(data) {
                        if (data.success) {
                            showToast(data['alert-type'], data.message, '');
                        } else {
                            showToast('error', 'Hata', data.message);
                        }
                    },
                    error: function(xhr, status, error) {
                        showToast('error', 'Hata', 'Bir hata oluştu. Lütfen tekrar deneyin.');
                    }
                });
            });

            //Blog Kategoriler
            $('.blogkategoriler').change(function() {
                var durum = $(this).prop('checked') ? 1 : 0;
                var urun_id = $(this).data('id');

                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: '/blog/kategori/durum',
                    data: {
                        'durum': durum,
                        'urun_id': urun_id
                    },
                    success: function(data) {
                        if (data.success) {
                            showToast(data['alert-type'], data.message, '');
                        } else {
                            showToast('error', 'Hata', data.message);
                        }
                    },
                    error: function(xhr, status, error) {
                        showToast('error', 'Hata', 'Bir hata oluştu. Lütfen tekrar deneyin.');
                    }
                });
            });

            //Blog İçerikler
            $('.blogicerikler').change(function() {
                var durum = $(this).prop('checked') ? 1 : 0;
                var urun_id = $(this).data('id');

                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: '/blog/icerik/durum',
                    data: {
                        'durum': durum,
                        'urun_id': urun_id
                    },
                    success: function(data) {
                        if (data.success) {
                            showToast(data['alert-type'], data.message, '');
                        } else {
                            showToast('error', 'Hata', data.message);
                        }
                    },
                    error: function(xhr, status, error) {
                        showToast('error', 'Hata', 'Bir hata oluştu. Lütfen tekrar deneyin.');
                    }
                });
            });

            //Soru Cevap Kısmı
            $('.sorular').change(function() {
                var durum = $(this).prop('checked') ? 1 : 0;
                var urun_id = $(this).data('id');

                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: '/soru/durum',
                    data: {
                        'durum': durum,
                        'urun_id': urun_id
                    },
                    success: function(data) {
                        if (data.success) {
                            showToast(data['alert-type'], data.message, '');
                        } else {
                            showToast('error', 'Hata', data.message);
                        }
                    },
                    error: function(xhr, status, error) {
                        showToast('error', 'Hata', 'Bir hata oluştu. Lütfen tekrar deneyin.');
                    }
                });
            });

            //Yorum Kısmı
            $('.yorumlar').change(function() {
                var durum = $(this).prop('checked') ? 1 : 0;
                var urun_id = $(this).data('id');

                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: '/yorum/durum',
                    data: {
                        'durum': durum,
                        'urun_id': urun_id
                    },
                    success: function(data) {
                        if (data.success) {
                            showToast(data['alert-type'], data.message, '');
                        } else {
                            showToast('error', 'Hata', data.message);
                        }
                    },
                    error: function(xhr, status, error) {
                        showToast('error', 'Hata', 'Bir hata oluştu. Lütfen tekrar deneyin.');
                    }
                });
            });

            //Kategoriler
            $('.kategoriler').change(function() {
                var durum = $(this).prop('checked') ? 1 : 0;
                var urun_id = $(this).data('id');

                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: '/kategori/durum',
                    data: {
                        'durum': durum,
                        'urun_id': urun_id
                    },
                    success: function(data) {
                        if (data.success) {
                            showToast(data['alert-type'], data.message, '');
                        } else {
                            showToast('error', 'Hata', data.message);
                        }
                    },
                    error: function(xhr, status, error) {
                        showToast('error', 'Hata', 'Bir hata oluştu. Lütfen tekrar deneyin.');
                    }
                });
            });

            //Alt Kategoriler
            $('.altkategori').change(function() {
                var durum = $(this).prop('checked') ? 1 : 0;
                var urun_id = $(this).data('id');

                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: '/altkategori/durum',
                    data: {
                        'durum': durum,
                        'urun_id': urun_id
                    },
                    success: function(data) {
                        if (data.success) {
                            showToast(data['alert-type'], data.message, '');
                        } else {
                            showToast('error', 'Hata', data.message);
                        }
                    },
                    error: function(xhr, status, error) {
                        showToast('error', 'Hata', 'Bir hata oluştu. Lütfen tekrar deneyin.');
                    }
                });
            });

            //Banner
            $('.banner').change(function() {
                var durum = $(this).prop('checked') ? 1 : 0;
                var urun_id = $(this).data('id');

                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: '/banner/durum',
                    data: {
                        'durum': durum,
                        'urun_id': urun_id
                    },
                    success: function(data) {
                        if (data.success) {
                            showToast(data['alert-type'], data.message, '');
                        } else {
                            showToast('error', 'Hata', data.message);
                        }
                    },
                    error: function(xhr, status, error) {
                        showToast('error', 'Hata', 'Bir hata oluştu. Lütfen tekrar deneyin.');
                    }
                });
            });
            //Galeri
            $('.galeri').change(function() {
                var durum = $(this).prop('checked') ? 1 : 0;
                var urun_id = $(this).data('id');

                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: '/galeri/durum',
                    data: {
                        'durum': durum,
                        'urun_id': urun_id
                    },
                    success: function(data) {
                        if (data.success) {
                            showToast(data['alert-type'], data.message, '');
                        } else {
                            showToast('error', 'Hata', data.message);
                        }
                    },
                    error: function(xhr, status, error) {
                        showToast('error', 'Hata', 'Bir hata oluştu. Lütfen tekrar deneyin.');
                    }
                });
            });
            //Medya
            $('.medya').change(function() {
                var durum = $(this).prop('checked') ? 1 : 0;
                var urun_id = $(this).data('id');

                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: '/medya/durum',
                    data: {
                        'durum': durum,
                        'urun_id': urun_id
                    },
                    success: function(data) {
                        if (data.success) {
                            showToast(data['alert-type'], data.message, '');
                        } else {
                            showToast('error', 'Hata', data.message);
                        }
                    },
                    error: function(xhr, status, error) {
                        showToast('error', 'Hata', 'Bir hata oluştu. Lütfen tekrar deneyin.');
                    }
                });
            });
            //Hakkımızda
            $('.hakkimizda').change(function() {
                var durum = $(this).prop('checked') ? 1 : 0;
                var urun_id = $(this).data('id');

                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: '/hakkimizda/durum',
                    data: {
                        'durum': durum,
                        'urun_id': urun_id
                    },
                    success: function(data) {
                        if (data.success) {
                            showToast(data['alert-type'], data.message, '');
                        } else {
                            showToast('error', 'Hata', data.message);
                        }
                    },
                    error: function(xhr, status, error) {
                        showToast('error', 'Hata', 'Bir hata oluştu. Lütfen tekrar deneyin.');
                    }
                });
            });
            //kurumsal
            $('.kurumsal').change(function() {
                var durum = $(this).prop('checked') ? 1 : 0;
                var urun_id = $(this).data('id');

                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: '/kurumsal/durum',
                    data: {
                        'durum': durum,
                        'urun_id': urun_id
                    },
                    success: function(data) {
                        if (data.success) {
                            showToast(data['alert-type'], data.message, '');
                        } else {
                            showToast('error', 'Hata', data.message);
                        }
                    },
                    error: function(xhr, status, error) {
                        showToast('error', 'Hata', 'Bir hata oluştu. Lütfen tekrar deneyin.');
                    }
                });
            });
            //Anasayfa
            $('.anasayfadurum').change(function() {
                var durum = $(this).prop('checked') ? 1 : 0;
                var field = $(this).attr('name');
                var fieldNames = {
                    'headerdurum': 'Header',
                    'bannerdurum': 'Banner',
                    'kategoridurum': 'Kategori',
                    'discorddurum': 'Discord',
                    'urundurum': 'Ürün',
                    'referansdurum': 'Referans',
                    'sosyaldurum': 'Sosyal',
                    'footerdurum': 'Footer'
                };

                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: '/anasayfa/durum',
                    data: {
                        'durum': durum,
                        'field': field
                    },
                    success: function(data) {
                        if (data.success) {
                            var fieldName = fieldNames[field] ||
                            field;
                            var message = durum ? (fieldName + ' aktif hale getirildi.') : (
                                fieldName + ' pasif hale getirildi.');
                            showToast(data['alert-type'], message, '');
                        } else {
                            showToast('error', 'Hata', data.message);
                        }
                    },
                    error: function(xhr, status, error) {
                        showToast('error', 'Hata', 'Bir hata oluştu. Lütfen tekrar deneyin.');
                    }
                });
            });


        });

        //Ürün Aktif/Pasif
        function updateLabel(checkbox) {
            var label = document.querySelector('label[for="' + checkbox.id + '"]');
            label.textContent = checkbox.checked ? 'Aktif' : 'Pasif';
        }

        // ThemeController
        document.getElementById('light-dark-mode').addEventListener('click', function() {
            var currentMode = document.getElementById('mode-input').value;
            var newMode = currentMode == 0 ? 1 : 0;
            document.getElementById('mode-input').value = newMode;
            document.getElementById('mode-form').submit();
        });

        // TinyMCE'yi başlat
        tinymce.init({
            selector: '#metin',
            menubar: true, // Menü çubuğunu gizle
            plugins: 'link image code', // Eklentiler: Link, resim ve kod desteği
            toolbar: 'undo redo | bold italic | alignleft aligncenter alignright | code', // Araç çubuğu seçenekleri
            setup: function(editor) {
                // Form gönderildiğinde
                document.querySelector('form').addEventListener('submit', function() {
                    // TinyMCE içeriğini form alanına aktar
                    editor.save();
                });
            }
        });

        //Dinamik Kategori Kısmı
        document.addEventListener('DOMContentLoaded', function() {
            const kategoriSelect = document.querySelector('select[name="kategori_id"]');
            const altKategoriSelect = document.querySelector('select[name="altkategori_id"]');

            kategoriSelect.querySelector('option[value=""]').setAttribute('disabled', true);
            altKategoriSelect.querySelector('option[value=""]').setAttribute('disabled', true);

            kategoriSelect.addEventListener('change', function() {
                const kategoriId = this.value;

                altKategoriSelect.innerHTML = '<option value="" disabled>Seçim yapılmadı</option>';

                if (kategoriId) {
                    fetch(`/altkategoriler/ajax/${kategoriId}`)
                        .then(response => response.json())
                        .then(data => {
                            data.forEach(altkategori => {
                                const option = document.createElement('option');
                                option.value = altkategori.id;
                                option.textContent = altkategori.altkategori_adi;
                                altKategoriSelect.appendChild(option);
                            });
                        })
                        .catch(error => {
                            console.error('Hata:', error);
                        });
                }
            });
        });

        //Tag Ekleme Alanı
        document.addEventListener("DOMContentLoaded", function() {
            const tagsInput = document.getElementById('tags-input');
            const tagsContainer = document.getElementById('tags-container');
            const tagsHiddenInput = document.getElementById('tags-hidden');

            let tags = tagsHiddenInput.value ? tagsHiddenInput.value.split(',') : [];

            function addTagElement(tag) {
                const tagElement = document.createElement('span');
                tagElement.classList.add('badge', 'bg-primary', 'me-1');
                tagElement.innerHTML = `${tag} <span class="remove-tag" style="cursor:pointer;">&times;</span>`;
                tagsContainer.appendChild(tagElement);

                tagElement.querySelector('.remove-tag').addEventListener('click', function() {
                    tags = tags.filter(t => t !== tag);
                    tagsContainer.removeChild(tagElement);
                    tagsHiddenInput.value = tags.join(',');
                });
            }

            tags.forEach(tag => {
                addTagElement(tag);
            });

            tagsInput.addEventListener('keydown', function(e) {
                if (e.key === 'Enter') {
                    e.preventDefault();
                    const tag = tagsInput.value.trim();
                    if (tag && !tags.includes(tag)) {
                        tags.push(tag);
                        addTagElement(tag);
                        tagsHiddenInput.value = tags.join(',');
                    }
                    tagsInput.value = '';
                }
            });
        });

        //Şifre Göster/Gizle
        function togglePasswordVisibility(fieldId, iconId) {
            const passwordField = document.getElementById(fieldId);
            const passwordIcon = document.getElementById(iconId);
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

</body>

</html>
