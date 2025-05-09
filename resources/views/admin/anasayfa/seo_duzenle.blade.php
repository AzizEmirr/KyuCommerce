@extends('admin.admin_master')

@php
$seoo = App\Models\Seo::find(2);
@endphp

@section('title'){{$seoo->site_adi}} | SEO Ayarları  @endsection

@section('admin')
    <div class="container-xxl">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h4 class="card-title">Seo Ayarları Düzenle</h4>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <form method="post" action="{{ route('seo.guncelle') }}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $seo->id }}">
                            <div class="mb-3">
                                <label for="title" class="form-label">Site Adı (Tüm Sayfalarda Görünecek)</label>
                                <input type="text" name="title" class="form-control" value="{{ $seo->title }}" placeholder="Lütfen site adını giriniz.">
                            </div>
                            
                            <div class="mb-3">
                                <label for="site_adi" class="form-label">Ana Sayfa Başlığı (Sadece Ana Sayfada Görünecek)</label>
                                <input type="text" name="site_adi" class="form-control" value="{{ $seo->site_adi }}" placeholder="Lütfen ana sayfa başlığını giriniz.">
                            </div>

                            <div class="mb-3">
                                <label for="url" class="form-label">Site URL</label>
                                <input type="text" name="url" class="form-control" value="{{ $seo->url }}"
                                    placeholder="Lütfen sitenizin URL'sini giriniz.">
                            </div>



                            <div class="mb-3">
                                <label for="description" class="form-label">Açıklama (Site Açıklaması)</label>
                                <textarea name="description" class="form-control" placeholder="Lütfen açıklama giriniz.">{{ $seo->description }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label for="keywords" class="form-label">Anahtar Kelime</label>
                                <input type="text" id="tags-input" class="form-control"
                                    placeholder="Lütfen anahtar kelimeleri giriniz.">
                                <div style="font-size: 1.2rem" id="tags-container" class="mt-2"></div>
                                <input type="hidden" name="keywords" id="tags-hidden"
                                    value="{{ $seo->keywords }}">
                            </div>

                            <!-- Resim yükleme alanı -->
                            <div class="mb-3 row">
                                <label for="resim" class="form-label">Seo Site Resmi (1200 x 630)</label>
                                <div class="col-sm-9">
                                    <input type="file" name="resim" id="resim" class="form-control">
                                </div>
                            </div>

                            <!-- Resim gösterme alanı -->
                            <div class="mb-3 row">
                                <label class="form-label">Güncel Resim</label>
                                <div class="col-sm-9 d-flex align-items-center">
                                    <img id="resimGoster"
                                        src="{{ !empty($seo->resim) ? url($seo->resim) : url('uploads/seo/resim-yok.jpg') }}"
                                        alt="Seo Site Resmi" class="image">
                                </div>
                            </div>

                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-outline-primary btn-lg">Güncelle</button>
                            </div>
                        </form>

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
