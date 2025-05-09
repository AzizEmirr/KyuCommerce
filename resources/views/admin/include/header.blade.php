<div class="topbar d-print-none">
    <div class="container-xxl">
        <nav class="topbar-custom d-flex justify-content-between" id="topbar-custom">

            <ul class="topbar-item list-unstyled d-inline-flex align-items-center mb-0">
                <li>
                    <button class="nav-link mobile-menu-btn nav-icon" id="togglemenu">
                        <i class="iconoir-menu-scale"></i>
                    </button>
                </li>
                <li class="mx-3 welcome-text">
                    <h3 class="mb-0 fw-bold text-truncate" id="greeting"></h3>
                    <h6 style="margin-block-start: 10px" class="mb-0 fw-normal text-muted text-truncate fs-14"
                        id="time"></h6>
                </li>
            </ul>
            <ul class="topbar-item list-unstyled d-inline-flex align-items-center mb-0">
                <li class="hide-phone app-search">
                    <form role="search" action="#" method="get">
                        <input type="search" name="search" class="form-control top-search mb-0"
                            placeholder="Arama Yap">
                        <button type="submit"><i class="iconoir-search"></i></button>
                    </form>
                </li>
                <li class="topbar-item">
                    <a class="nav-link nav-icon" href="#" id="light-dark-mode">
                        <i class="icofont-moon dark-mode"></i>
                        <i class="icofont-sun light-mode"></i>
                    </a>
                </li>

                <form id="mode-form" action="{{ route('updateMode') }}" method="POST" style="display: none;">
                    @csrf
                    <input type="hidden" name="mode" id="mode-input" value="{{ Auth::user()->mode }}">
                </form>
                @php
                    $yorumliste = App\Models\Yorumlar::where('durum', 1)->orderBy('sirano', 'ASC')->get();
                @endphp
                <li class="dropdown topbar-item">
                    <a class="nav-link dropdown-toggle arrow-none nav-icon" data-bs-toggle="dropdown" href="#"
                        role="button" aria-haspopup="false" aria-expanded="false">
                        <i class="icofont-bell-alt"></i>
                    </a>
                    <div class="dropdown-menu stop dropdown-menu-end dropdown-lg py-0">

                        <h5 class="dropdown-item-text m-0 py-3 d-flex justify-content-center align-items-center">
                            Bildirimler <a href="#" class="badge text-body-tertiary badge-pill">
                            </a>
                        </h5>
                        <ul class="nav nav-tabs nav-tabs-custom nav-success nav-justified mb-1" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link mx-0 active" data-bs-toggle="tab" href="#All" role="tab"
                                    aria-selected="true">
                                    Hepsi <span
                                        class="badge bg-primary-subtle text-primary badge-pill ms-1">{{ $yorumliste->count() }}</span>
                                    <!-- Bildirim sayısı burada da gösterilir -->
                                </a>
                            </li>
                        </ul>
                        <div class="ms-0" style="max-height:230px;" data-simplebar>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="All" role="tabpanel"
                                    aria-labelledby="all-tab" tabindex="0">
                                    @foreach ($yorumliste as $yorumlar)
                                        <a href="#" class="dropdown-item py-3">
                                            <small
                                                class="float-end text-muted ps-2">{{ $yorumlar->created_at->diffForHumans() }}</small>
                                            <div class="d-flex align-items-center">
                                                <div
                                                    class="flex-shrink-0 bg-primary-subtle text-primary thumb-md rounded-circle">
                                                    <i class="iconoir-wolf fs-4"></i>
                                                </div>
                                                <div class="flex-grow-1 ms-2 text-truncate">
                                                    <h6 class="my-0 fw-normal text-dark fs-13">{{ $yorumlar->adi }}</h6>
                                                    <small class="text-muted mb-0">{{ $yorumlar->metin }}</small>
                                                </div><!-- end media-body -->
                                            </div><!-- end media -->
                                        </a><!-- end item -->
                                    @endforeach

                                </div>
                            </div>
                        </div>
                        <!-- All-->
                        <a class='dropdown-item text-center text-dark fs-13 py-2' href='{{ route('yorum.liste') }}'>
                            Hepsini Gör <i class="fi-arrow-right"></i>
                        </a>
                    </div>
                </li>

                <li class="dropdown topbar-item">
                    <a class="nav-link dropdown-toggle arrow-none nav-icon" data-bs-toggle="dropdown" href="#"
                        role="button" aria-haspopup="false" aria-expanded="false">
                        <img style="object-fit: cover"
                            src="{{ !empty(Auth::user()->resim) ? url('uploads/admin/' . Auth::user()->resim) : url('uploads/admin/resim-yok.png') }}"
                            alt="" class="thumb-lg rounded-circle">
                    </a>
                    <div class="dropdown-menu dropdown-menu-end py-0">
                        <div class="d-flex align-items-center dropdown-item py-2 bg-secondary-subtle">
                            <div class="flex-shrink-0">
                                <img style="object-fit: cover"
                                    src="{{ !empty(Auth::user()->resim) ? url('uploads/admin/' . Auth::user()->resim) : url('uploads/admin/resim-yok.png') }}"
                                    alt="" class="thumb-md rounded-circle">
                            </div>
                            <div class="flex-grow-1 ms-2 text-truncate align-self-center">
                                <h6 class="my-0 fw-medium text-dark fs-13">{{ Auth::user()->name }}</h6>
                                <p class="mb-0 text-muted fw-medium">{{ ucfirst(strtolower(Auth::user()->rol)) }}</p>
                            </div><!--end media-body-->
                        </div>
                        <div class="dropdown-divider mt-0"></div>
                        <small class="text-muted px-2 pb-1 d-block">Hesap</small>
                        <a class='dropdown-item' href='{{ route('profile.edit') }}'><i
                                class="las la-user fs-18 me-1 align-text-bottom"></i> Profil</a>
                        <small class="text-muted px-2 py-1 d-block">Ayarlar</small>
                        <a class='dropdown-item' href='{{ route('profile.edit') }}'><i
                                class="las la-cog fs-18 me-1 align-text-bottom"></i> Hesap Ayarları</a>
                        <a class='dropdown-item' href='{{ route('profile.edit') }}'><i
                                class="las la-lock fs-18 me-1 align-text-bottom"></i> Güvenlik</a>
                        <a class="dropdown-item" href="https://kyusoftware.cc/iletisim/"><i
                                class="las la-question-circle fs-18 me-1 align-text-bottom"></i> Yardım Merkezi</a>
                        <div class="dropdown-divider mb-0"></div>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a class="dropdown-item text-danger" href="javascript:;"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                <i class="las la-power-off fs-18 me-1 align-text-bottom"></i> Çıkış Yap
                            </a>
                        </form>
                    </div>
                </li>

            </ul><!--end topbar-nav-->
        </nav>
        <!-- end navbar-->
    </div>
</div>
