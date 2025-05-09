<div class="startbar d-print-none">
    <!--start brand-->
    <div class="brand">
        <a class='logo' href=' {{ route('dashboard') }} '>
            <span class="">
                <img src="{{ asset('backend') }}/KYU SOFTWARE White with Transparent.png" height="25" alt="logo-large"
                    class="logo-lg logo-light">
                <img src="{{ asset('backend') }}/KYU SOFTWARE Black with Transparent.png" height="25" alt="logo-large"
                    class="logo-lg logo-dark">
            </span>
        </a>
    </div>
    <!--end brand-->
    <!--start startbar-menu-->
    <div class="startbar-menu">
        <div class="startbar-collapse" id="startbarCollapse" data-simplebar>
            <div class="d-flex align-items-start flex-column w-100">
                <!-- Navigation -->
                <ul class="navbar-nav mb-auto w-100">
                    <li class="menu-label pt-0 mt-0">
                        <span>ANA MENÜ</span>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dashboard') }}">
                            <i class="iconoir-home-simple menu-icon"></i>
                            <span>Kontrol Paneli</span>
                        </a>
                    </li>
                    @if (Auth::user()->can('anasayfa.duzenle'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('anasayfa.duzenle') }}">
                                <i class="iconoir-multiple-pages menu-icon"></i>
                                <span>Ana Sayfa</span>
                            </a>
                        </li>
                    @endif
                    @if (Auth::user()->can('ayarlar.duzenle'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('ayarlar.duzenle') }}">
                                <i class="iconoir-settings menu-icon"></i>
                                <span>Site Ayarları</span>
                            </a>
                        </li>
                    @endif
                    @if (Auth::user()->can('ayarlar.duzenle'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('seo.duzenle') }}">
                                <i class="iconoir-database-settings menu-icon"></i>
                                <span>SEO Ayarları</span>
                            </a>
                        </li>
                    @endif
                    @if (Auth::user()->can('logo.duzenle'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logo.duzenle') }}">
                                <i class="iconoir-media-image-list menu-icon"></i>
                                <span>Logo Ayarları</span>
                            </a>
                        </li>
                    @endif
                    @if (Auth::user()->can('renk.ayarlari'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('renkpaleti') }}">
                                <i class="iconoir-color-picker menu-icon"></i>
                                <span>Renk Ayarları</span>
                            </a>
                        </li>
                    @endif
                    @if (Auth::user()->can('hak.duzenle'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('hakkimizdaduzenle') }}">
                                <i class="iconoir-app-notification menu-icon"></i>
                                <span>Hakkımızda</span>
                            </a>
                        </li>
                    @endif

                    @if (Auth::user()->can('kurumsal'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('kurumsal') }}">
                                <i class="iconoir-menu-scale menu-icon"></i>
                                <span>Kurumsal</span>
                            </a>
                        </li>
                    @endif

                    @if (Auth::user()->can('banka.hesap.goruntule'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('bankaback') }}">
                                <i class="iconoir-database-monitor menu-icon"></i>
                                <span>Banka Hesap Bilgilerini Güncelle</span>
                            </a>
                        </li>
                    @endif
                    @if (Auth::user()->can('referans.liste') || Auth::user()->can('referans.ekle'))
                        <li class="nav-item">
                            <a class="nav-link" href="#ReferansApplications" data-bs-toggle="collapse" role="button"
                                aria-expanded="false" aria-controls="ReferansApplications">
                                <i class="iconoir-page-flip menu-icon"></i>
                                <span>Referans Ayarları</span>
                            </a>
                            <div class="collapse " id="ReferansApplications">
                                <ul class="nav flex-column">
                                    @if (Auth::user()->can('referans.liste'))
                                        <li class="nav-item">
                                            <a class='nav-link' href='{{ route('referans.liste') }}'>Tüm
                                                Referanslar</a>
                                        </li>
                                    @endif
                                    @if (Auth::user()->can('referans.ekle'))
                                        <li class="nav-item">
                                            <a class='nav-link' href='{{ route('referans.ekle') }}'>Referans Ekle</a>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                        </li>
                    @endif
                    @if (Auth::user()->can('banner.liste') || Auth::user()->can('banner.ekle'))
                        <li class="nav-item">
                            <a class="nav-link" href="#BannerApplications" data-bs-toggle="collapse" role="button"
                                aria-expanded="false" aria-controls="BannerApplications">
                                <i class="iconoir-multiple-pages-empty menu-icon"></i>
                                <span>Banner Ayarları</span>
                            </a>
                            <div class="collapse " id="BannerApplications">
                                <ul class="nav flex-column">
                                    @if (Auth::user()->can('banner.liste'))
                                        <li class="nav-item">
                                            <a class='nav-link' href='{{ route('banner.liste') }}'>Tüm Bannerlar</a>
                                        </li>
                                    @endif
                                    @if (Auth::user()->can('banner.ekle'))
                                        <li class="nav-item">
                                            <a class='nav-link' href='{{ route('banner.ekle') }}'>Banner Ekle</a>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                        </li>
                    @endif
                    @if (Auth::user()->can('galeri.liste') || Auth::user()->can('galeri.ekle'))
                        <li class="nav-item">
                            <a class="nav-link" href="#GaleriApplications" data-bs-toggle="collapse" role="button"
                                aria-expanded="false" aria-controls="GaleriApplications">
                                <i class="iconoir-media-image-folder menu-icon"></i>
                                <span>Galeri Ayarları</span>
                            </a>
                            <div class="collapse " id="GaleriApplications">
                                <ul class="nav flex-column">
                                    @if (Auth::user()->can('galeri.liste'))
                                        <li class="nav-item">
                                            <a class='nav-link' href='{{ route('galeri.liste') }}'>Tüm
                                                Fotoğraflar</a>
                                        </li>
                                    @endif
                                    @if (Auth::user()->can('galeri.ekle'))
                                        <li class="nav-item">
                                            <a class='nav-link' href='{{ route('galeri.ekle') }}'>Fotoğraf Ekle</a>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                        </li>
                    @endif
                    @if (Auth::user()->can('soru.liste') || Auth::user()->can('soru.ekle'))
                        <li class="nav-item">
                            <a class="nav-link" href="#QuestionsApplications" data-bs-toggle="collapse"
                                role="button" aria-expanded="false" aria-controls="QuestionsApplications">
                                <i class="iconoir-chat-bubble-question menu-icon"></i>
                                <span>Sıkça Sorulan Sorular</span>
                            </a>
                            <div class="collapse " id="QuestionsApplications">
                                <ul class="nav flex-column">
                                    @if (Auth::user()->can('soru.liste'))
                                        <li class="nav-item">
                                            <a class='nav-link' href='{{ route('soru.liste') }}'>Tüm Sorular</a>
                                        </li>
                                    @endif
                                    @if (Auth::user()->can('soru.ekle'))
                                        <li class="nav-item">
                                            <a class='nav-link' href='{{ route('soru.ekle') }}'>Soru Ekle</a>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                        </li>
                    @endif
                    @if (Auth::user()->can('yorum.liste') || Auth::user()->can('yorum.ekle'))
                        <li class="nav-item">
                            <a class="nav-link" href="#CommentsApplications" data-bs-toggle="collapse"
                                role="button" aria-expanded="false" aria-controls="CommentsApplications">
                                <i class="iconoir-chat-bubble menu-icon"></i>
                                <span>Yorumlar</span>
                            </a>
                            <div class="collapse " id="CommentsApplications">
                                <ul class="nav flex-column">
                                    @if (Auth::user()->can('yorum.liste'))
                                        <li class="nav-item">
                                            <a class='nav-link' href='{{ route('yorum.liste') }}'>Tüm Yorumlar</a>
                                        </li>
                                    @endif
                                    @if (Auth::user()->can('yorum.ekle'))
                                        <li class="nav-item">
                                            <a class='nav-link' href='{{ route('yorum.ekle') }}'>Yorum Ekle</a>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                        </li>
                    @endif
                    @if (Auth::user()->can('kategori.liste') || Auth::user()->can('kategori.ekle'))
                        <li class="menu-label mt-2">
                            <small class="label-border">
                                <div class="border_left hidden-xs"></div>
                                <div class="border_right"></div>
                            </small>
                            <span>KATEGORİ VE ÜrünİŞLEMLERİ</span>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#kategoriApplications" data-bs-toggle="collapse"
                                role="button" aria-expanded="false" aria-controls="kategoriApplications">
                                <i class="iconoir-folder menu-icon"></i>
                                <span>Kategori</span>
                            </a>
                            <div class="collapse " id="kategoriApplications">
                                <ul class="nav flex-column">
                                    @if (Auth::user()->can('kategori.liste'))
                                        <li class="nav-item">
                                            <a class='nav-link' href='{{ route('kategori.hepsi') }}'>Tüm
                                                Kategoriler</a>
                                        </li>
                                    @endif
                                    @if (Auth::user()->can('kategori.ekle'))
                                        <li class="nav-item">
                                            <a class='nav-link' href='{{ route('kategori.ekle') }}'>Kategori Ekle</a>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                        </li>
                    @endif
                    @if (Auth::user()->can('altkategori.liste') || Auth::user()->can('altkategori.ekle'))
                        <li class="nav-item">
                            <a class="nav-link" href="#altkategoriApplications" data-bs-toggle="collapse"
                                role="button" aria-expanded="false" aria-controls="altkategoriApplications">
                                <i class="iconoir-book-stack menu-icon"></i>
                                <span>Alt Kategorı</span>
                            </a>
                            <div class="collapse " id="altkategoriApplications">
                                <ul class="nav flex-column">
                                    @if (Auth::user()->can('altkategori.liste'))
                                        <li class="nav-item">
                                            <a class='nav-link' href='{{ route('altkategori.liste') }}'>Tüm Alt
                                                Kategoriler</a>
                                        </li>
                                    @endif
                                    @if (Auth::user()->can('altkategori.ekle'))
                                        <li class="nav-item">
                                            <a class='nav-link' href='{{ route('altkategori.ekle') }}'>Alt Kategori
                                                Ekle</a>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                        </li>
                    @endif
                    @if (Auth::user()->can('urun.liste') || Auth::user()->can('urun.ekle'))
                        <li class="nav-item">
                            <a class="nav-link" href="#UrunlerApplications" data-bs-toggle="collapse" role="button"
                                aria-expanded="false" aria-controls="UrunlerApplications">
                                <i class="iconoir-shop menu-icon"></i>
                                <span>Ürünler</span>
                            </a>
                            <div class="collapse " id="UrunlerApplications">
                                <ul class="nav flex-column">
                                    @if (Auth::user()->can('urun.liste'))
                                        <li class="nav-item">
                                            <a class='nav-link' href='{{ route('urun.liste') }}'>Tüm Ürünler</a>
                                        </li>
                                    @endif
                                    @if (Auth::user()->can('urun.ekle'))
                                        <li class="nav-item">
                                            <a class='nav-link' href='{{ route('urun.ekle') }}'>Ürün Ekle</a>
                                        </li>
                                    @endif
                                    @if (Auth::user()->can('coklu.liste'))
                                        <li class="nav-item">
                                            <a class='nav-link' href='{{ route('tum.medya') }}'>Tüm Çoklu
                                                Resimler</a>
                                        </li>
                                    @endif
                                    @if (Auth::user()->can('coklu.ekle'))
                                        <li class="nav-item">
                                            <a class='nav-link' href='{{ route('medya.ekle') }}'>Çoklu Resim Ekle</a>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                        </li>
                    @endif
                    @if (Auth::user()->can('blogkategori.liste') || Auth::user()->can('blogkategori.ekle'))
                        <li class="menu-label mt-2">
                            <small class="label-border">
                                <div class="border_left hidden-xs"></div>
                                <div class="border_right"></div>
                            </small>
                            <span>BLOG KATEGORİ VE YAZILARI</span>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#BlogCategoryApplications" data-bs-toggle="collapse"
                                role="button" aria-expanded="false" aria-controls="BlogCategoryApplications">
                                <i class="iconoir-box-iso menu-icon"></i>
                                <span>Blog Kategorileri</span>
                            </a>
                            <div class="collapse " id="BlogCategoryApplications">
                                <ul class="nav flex-column">
                                    @if (Auth::user()->can('blogkategori.liste'))
                                        <li class="nav-item">
                                            <a class='nav-link' href='{{ route('blog.liste') }}'>Tüm Blog
                                                Kategorileri</a>
                                        </li>
                                    @endif
                                    @if (Auth::user()->can('blogkategori.ekle'))
                                        <li class="nav-item">
                                            <a class='nav-link' href='{{ route('blog.kategori.ekle') }}'>Blog
                                                Kategorisi
                                                Ekle</a>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                        </li>
                    @endif
                    @if (Auth::user()->can('blogicerik.liste') || Auth::user()->can('blogicerik.ekle'))
                        <li class="nav-item">
                            <a class="nav-link" href="#BlogApplications" data-bs-toggle="collapse" role="button"
                                aria-expanded="false" aria-controls="BlogApplications">
                                <i class="iconoir-open-book menu-icon"></i>
                                <span>Blog Yazıları</span>
                            </a>
                            <div class="collapse " id="BlogApplications">
                                <ul class="nav flex-column">
                                    @if (Auth::user()->can('blogicerik.liste'))
                                        <li class="nav-item">
                                            <a class='nav-link' href='{{ route('icerik.liste') }}'>Tüm Bloglar</a>
                                        </li>
                                    @endif
                                    @if (Auth::user()->can('blogicerik.ekle'))
                                        <li class="nav-item">
                                            <a class='nav-link' href='{{ route('blog.icerik.ekle') }}'>Blog Ekle</a>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                        </li>
                    @endif
                    @if (Auth::user()->can('kullanici.liste') ||
                            Auth::user()->can('kullanici.ekle') ||
                            Auth::user()->can('izin.liste') ||
                            Auth::user()->can('izin.ekle') ||
                            Auth::user()->can('rol.liste') ||
                            Auth::user()->can('rol.ekle'))
                        <li class="menu-label mt-2">
                            <small class="label-border">
                                <div class="border_left hidden-xs"></div>
                                <div class="border_right"></div>
                            </small>
                            <span>KULLANICILAR VE ROLLER </span>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link collapsed" href="#PermissionApplications" data-bs-toggle="collapse"
                                role="button" aria-expanded="false" aria-controls="PermissionApplications">
                                <i class="iconoir-community menu-icon"></i>
                                <span>Kullanıcı Ayarları</span>
                            </a>
                            <div class="collapse" id="PermissionApplications" style="">
                                <ul class="nav flex-column">
                                    @if (Auth::user()->can('kullanici.liste') || Auth::user()->can('kullanici.ekle'))
                                        <li class="nav-item">
                                            <a class="nav-link collapsed" href="#UserAnalytics"
                                                data-bs-toggle="collapse" role="button" aria-expanded="false"
                                                aria-controls="UserAnalytics">
                                                <span>Kullanıcılar</span>
                                            </a>
                                            <div class="collapse" id="UserAnalytics" style="">
                                                <ul class="nav flex-column">
                                                    @if (Auth::user()->can('kullanici.liste'))
                                                        <li class="nav-item">
                                                            <a class="nav-link "
                                                                href="{{ route('kullanici.liste') }}">Tüm
                                                                Kullanıcılar</a>
                                                        </li>
                                                    @endif
                                                    @if (Auth::user()->can('kullanici.ekle'))
                                                        <li class="nav-item">
                                                            <a class="nav-link "
                                                                href="{{ route('kullanici.ekle') }}">Kullanıcı
                                                                Ekle</a>
                                                        </li>
                                                    @endif
                                                </ul>
                                            </div>
                                        </li>
                                    @endif
                                    @if (Auth::user()->can('rol.liste') || Auth::user()->can('rol.ekle'))
                                        <li class="nav-item">
                                            <a class="nav-link collapsed" href="#RolesAnalytics"
                                                data-bs-toggle="collapse" role="button" aria-expanded="false"
                                                aria-controls="RolesAnalytics">
                                                <span>Roller</span>
                                            </a>
                                            <div class="collapse" id="RolesAnalytics" style="">
                                                <ul class="nav flex-column">
                                                    @if (Auth::user()->can('rol.liste'))
                                                        <li class="nav-item">
                                                            <a class="nav-link " href="{{ route('rol.liste') }}">Tüm
                                                                Roller</a>
                                                        </li>
                                                    @endif
                                                    @if (Auth::user()->can('rol.ekle'))
                                                        <li class="nav-item">
                                                            <a class="nav-link " href="{{ route('rol.ekle') }}">Rol
                                                                Ekle</a>
                                                        </li>
                                                    @endif
                                                </ul>
                                            </div>
                                        </li>
                                    @endif
                                    @if (Auth::user()->can('izin.liste') || Auth::user()->can('izin.ekle'))
                                        <li class="nav-item">
                                            <a class="nav-link collapsed" href="#PermissionAnalytics"
                                                data-bs-toggle="collapse" role="button" aria-expanded="false"
                                                aria-controls="PermissionAnalytics">
                                                <span>İzinler</span>
                                            </a>
                                            <div class="collapse" id="PermissionAnalytics" style="">
                                                <ul class="nav flex-column">
                                                    @if (Auth::user()->can('izin.liste'))
                                                        <li class="nav-item">
                                                            <a class="nav-link " href="{{ route('izin.liste') }}">Tüm
                                                                İzinler</a>
                                                        </li>
                                                    @endif

                                                    @if (Auth::user()->can('izin.ekle'))
                                                        <li class="nav-item">
                                                            <a class="nav-link " href="{{ route('izin.ekle') }}">İzin
                                                                Ekle</a>
                                                        </li>
                                                    @endif
                                                </ul>
                                            </div>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                        </li>

                    @endif
                </ul>

                <div class="update-msg text-center">
                    <div
                        class="d-flex justify-content-center align-items-center thumb-lg update-icon-box  rounded-circle mx-auto">
                        <i class="iconoir-peace-hand h3 align-self-center mb-0 text-primary"></i>
                    </div>
                    <h5 class="mt-3">Kyu Software</h5>
                    <p class="mb-3 text-muted">Kyu Software ile yüksek kaliteli websiteleri.</p>
                    <a href="javascript: void(0);" class="btn text-primary shadow-sm rounded-pill">Bir sorunuz mu
                        var?</a>

                </div>
            </div>
        </div>
    </div>
</div>
<div class="startbar-overlay d-print-none"></div>
