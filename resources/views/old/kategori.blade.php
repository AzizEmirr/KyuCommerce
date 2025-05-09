@php
    $kategoriler = App\Models\Kategoriler::where('durum', 1)->orderBy('sirano')->get();
    $urunler = App\Models\Urunler::where('durum', 1)->orderBy('sirano')->get();
@endphp

<section class="tournament-section pb-120">
    <div class="tournament-wrapper alt">
        <div class="container-fluid">
            <div class="row justify-content-between align-items-end mb-8">
                <div class="col">
                    <h2 class="display-four tcn-1 cursor-scale growUp title-anim">Ürünlerimiz</h2>
                </div>
            </div>
            <div class="singletab tournaments-tab">
                <style>
                    @media (max-width: 767px) {
                        .mobile-center {
                            text-align: center;
                            width: 100%;
                        }
                    }
                </style>
                <div class="d-between gap-6 flex-wrap mb-lg-15 mb-sm-10 mb-6">
                    <ul class="tablinks d-flex flex-wrap align-items-center gap-3">
                        <li class="nav-links active">
                            <button class="tablink py-1 px-4 rounded-pill tcn-1" data-target="all">Tüm Ürünler</button>
                        </li>
                        @foreach ($kategoriler as $kategori)
                            @php
                                $kategoriUrunler = $urunler->where('kategori_id', $kategori->id);
                            @endphp
                            @if ($kategoriUrunler->isNotEmpty())
                                <li class="nav-links">
                                    <button class="tablink py-1 px-4 rounded-pill tcn-1"
                                        data-target="kategori-{{ $kategori->id }}">
                                        {{ $kategori->kategori_adi }}
                                    </button>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                    <div class="px-0 px-sm-3 mobile-center">
                        <a href="{{route ('urunler')}}" class="btn-half-border position-relative d-inline-block py-2 bgp-1 px-6 rounded-pill">Daha Fazlasını Keşfet</a>
                    </div>
                </div>
                
                <div class="tabcontents">
                    <div class="tabitem active" data-target="all">
                        <div class="row justify-content-md-start justify-content-center g-6">
                            @foreach ($kategoriler as $kategori)
                                @php
                                    $kategoriUrunler = $urunler->where('kategori_id', $kategori->id);
                                @endphp
                                @foreach ($kategoriUrunler as $urun)
                                    <div class="col-xxl-3 col-lg-4 col-md-6 col-sm-8">
                                        <div class="tournament-card p-xl-4 p-3 pb-xl-8 bgn-4">
                                            <div class="tournament-img mb-8 position-relative">
                                                <div class="img-area overflow-hidden">
                                                    <img class="w-100"
                                                        src="{{ !empty($urun->resim) ? url($urun->resim) : url('uploads/urunler/resim-yok.jpg') }}"
                                                        alt="tournament">
                                                </div>
                                                <span
                                                    class="card-status position-absolute start-0 py-2 px-6 tcn-1 fs-sm">
                                                    <span
                                                        class="dot-icon alt-icon ps-3">{{ $kategori->kategori_adi }}</span>
                                                </span>
                                            </div>
                                            <div class="tournament-content px-xxl-4">
                                                <div class="tournament-info mb-5">
                                                    <a href="{{ url('urun/' . $urun->id . '/' . $urun->url) }}"
                                                        class="d-block">
                                                        <h4
                                                            class="tournament-title tcn-1 mb-1 cursor-scale growDown title-anim">
                                                            {{ $urun->baslik }}
                                                        </h4>
                                                    </a>
                                                    <span class="tcn-6 fs-sm">{{ $urun->aciklama }}</span>
                                                </div>
                                                <div class="hr-line line3"></div>
                                                <div class="hr-line line3"></div>
                                                <div class="card-more-info d-between mt-6">
                                                    <div class="teams-info d-between gap-xl-5 gap-3">
                                                        <div class="player d-flex align-items-center gap-1">
                                                            <i class="ti ti-user fs-base"></i>
                                                            <span
                                                                class="tcn-6 fs-sm player-count">{{ $urun->player_count }}
                                                                Players</span>
                                                        </div>
                                                    </div>
                                                    <a href="{{ url('urun/' . $urun->id . '/' . $urun->url) }}"
                                                        class="btn2">
                                                        <i class="ti ti-arrow-right fs-2xl"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endforeach
                        </div>
                    </div>
                    @foreach ($kategoriler as $kategori)
                        @php
                            $kategoriUrunler = $urunler->where('kategori_id', $kategori->id);
                        @endphp
                        @if ($kategoriUrunler->isNotEmpty())
                            <div class="tabitem" data-target="kategori-{{ $kategori->id }}">
                                <div class="row justify-content-md-start justify-content-center g-6">
                                    @foreach ($kategoriUrunler as $urun)
                                        <div class="col-xxl-3 col-lg-4 col-md-6 col-sm-8">
                                            <div class="tournament-card p-xl-4 p-3 pb-xl-8 bgn-4">
                                                <div class="tournament-img mb-8 position-relative">
                                                    <div class="img-area overflow-hidden">
                                                        <img class="w-100"
                                                            src="{{ !empty($urun->resim) ? url($urun->resim) : url('uploads/urunler/resim-yok.jpg') }}"
                                                            alt="tournament">
                                                    </div>
                                                    <span
                                                        class="card-status position-absolute start-0 py-2 px-6 tcn-1 fs-sm">
                                                        <span
                                                            class="dot-icon alt-icon ps-3">{{ $kategori->kategori_adi }}</span>
                                                    </span>
                                                </div>
                                                <div class="tournament-content px-xxl-4">
                                                    <div class="tournament-info mb-5">
                                                        <a href="{{ url('urun/' . $urun->id . '/' . $urun->url) }}"
                                                            class="d-block">
                                                            <h4
                                                                class="tournament-title tcn-1 mb-1 cursor-scale growDown title-anim">
                                                                {{ $urun->baslik }}
                                                            </h4>
                                                        </a>
                                                        <span class="tcn-6 fs-sm">{{ $urun->aciklama }}</span>
                                                    </div>
                                                    <div class="hr-line line3"></div>
                                                    <div class="hr-line line3"></div>
                                                    <div class="card-more-info d-between mt-6">
                                                        <div class="teams-info d-between gap-xl-5 gap-3">
                                                            <div class="player d-flex align-items-center gap-1">
                                                                <i class="ti ti-user fs-base"></i>
                                                                <span
                                                                    class="tcn-6 fs-sm player-count">{{ $urun->player_count }}
                                                                    Players</span>
                                                            </div>
                                                        </div>
                                                        <a href="{{ url('urun/' . $urun->id . '/' . $urun->url) }}"
                                                            class="btn2">
                                                            <i class="ti ti-arrow-right fs-2xl"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
