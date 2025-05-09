@extends('admin.admin_master')

@php
    $seo = App\Models\Seo::find(2);
@endphp

@section('title')
    {{ $seo->site_adi }} | Kurumsal
@endsection

@section('admin')
    <div class="container-xxl">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Kurumsal Sayfaları Düzenle</h4>
                    </div>
                    <div class="card-body pt-0">
                        <ul class="nav nav-tabs" id="kurumsalTabs">
                            @foreach ($kurumsal as $index => $icerik)
                                <li class="nav-item">
                                    <a class="nav-link {{ $index == 0 ? 'active' : '' }}" data-bs-toggle="tab"
                                        href="#tab{{ $icerik->id }}">
                                        @if ($index == 0)
                                            İade Politikası
                                        @elseif($index == 1)
                                            Hizmet Şartları
                                        @elseif($index == 2)
                                            Gizlilik Politikası
                                        @else
                                            {{ $icerik->baslik }}
                                        @endif
                                    </a>
                                </li>
                            @endforeach
                        </ul>


                        <div class="tab-content mt-3">
                            @foreach ($kurumsal as $index => $icerik)
                                <div class="tab-pane fade {{ $index == 0 ? 'show active' : '' }}"
                                    id="tab{{ $icerik->id }}">
                                    <form method="post" action="{{ route('kurumsal.guncelle', $icerik->id) }}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')

                                        <div class="d-flex justify-content-end">
                                            <div class="form-check form-switch">
                                                <input type="checkbox" class="kurumsal form-check-input"
                                                    data-id='{{ $icerik->id }}' id="urun-{{ $icerik->id }}"
                                                    {{ $icerik->durum ? 'checked' : '' }} onchange="updateLabel(this)">
                                                <label class="form-check-label" for="urun-{{ $icerik->id }}"
                                                    id="label-{{ $icerik->id }}">
                                                    {{ $icerik->durum ? 'Aktif' : 'Pasif' }}
                                                </label>
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Üst Başlık</label>
                                            <input type="text" name="ustbaslik" class="form-control"
                                                value="{{ $icerik->ustbaslik }}" required>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Başlık</label>
                                            <input type="text" name="baslik" class="form-control"
                                                value="{{ $icerik->baslik }}" required>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Metin</label>
                                            <textarea name="metin" class="form-control" rows="5" required>{{ $icerik->metin }}</textarea>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Görsel (İsteğe Bağlı)</label>
                                            <input type="file" name="resim" class="form-control">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Mevcut Resim</label>
                                            <div>
                                                <img src="{{ !empty($icerik->resim) ? url($icerik->resim) : url('uploads/hakkimizda/resim-yok.jpg') }}"
                                                    alt="Kurumsal Resim" class="image">
                                            </div>
                                        </div>

                                        <div class="d-flex justify-content-center">
                                            <button type="submit" class="btn btn-outline-primary btn-lg">Güncelle</button>
                                        </div>
                                    </form>
                                </div>
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
