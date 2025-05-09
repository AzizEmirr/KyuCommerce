@extends('admin.admin_master')

@php
    $seo = App\Models\Seo::find(2);
@endphp

@section('title')
    {{ $seo->site_adi }} | Banner Ekle
@endsection

@section('admin')
    <div class="container-xxl">
        <div class="row justify-content-center">
            <div class="col-9">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h4 class="card-title">Banner Ekle</h4>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <form id="Form" method="post" action="{{ route('banner.ekle.form') }}"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3">
                                <label for="ust_baslik" class="form-label">Üst Başlık</label>
                                <input type="text" name="ust_baslik"
                                    class="form-control {{ $errors->has('ust_baslik') ? 'is-invalid' : '' }} {{ old('ust_baslik') ? 'is-valid' : '' }}"
                                    placeholder="Lütfen bir üst başlık giriniz." value="{{ old('ust_baslik') }}">
                            </div>

                            <div class="mb-3">
                                <label for="baslik" class="form-label">Başlık</label>
                                <input type="text" name="baslik"
                                    class="form-control {{ $errors->has('baslik') ? 'is-invalid' : '' }} {{ old('baslik') ? 'is-valid' : '' }}"
                                    placeholder="Lütfen bir başlık giriniz." value="{{ old('baslik') }}">
                            </div>

                            <div class="mb-3">
                                <label for="aciklama" class="form-label">Açıklama</label>
                                <input type="text" name="aciklama"
                                    class="form-control {{ $errors->has('aciklama') ? 'is-invalid' : '' }} {{ old('aciklama') ? 'is-valid' : '' }}"
                                    placeholder="Lütfen bir açıklama giriniz." value="{{ old('aciklama') }}">
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="button_text" class="form-label">Buton Yazısı</label>
                                    <input type="text" name="button_text"
                                        class="form-control {{ $errors->has('button_text') ? 'is-invalid' : '' }} {{ old('button_text') ? 'is-valid' : '' }}"
                                        placeholder="Lütfen bir buton yazısı giriniz." value="{{ old('button_text') }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="button_url" class="form-label">Buton URL</label>
                                    <input type="text" name="button_url"
                                        class="form-control {{ $errors->has('button_url') ? 'is-invalid' : '' }} {{ old('button_url') ? 'is-valid' : '' }}"
                                        placeholder="Lütfen bir buton URL'i giriniz." value="{{ old('button_url') }}">
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="sirano" class="form-label">Sıra No</label>
                                <input type="number" name="sirano"
                                    class="form-control {{ $errors->has('sirano') ? 'is-invalid' : '' }} {{ old('sirano') ? 'is-valid' : '' }}"
                                    placeholder="Lütfen sıra no giriniz." value="{{ old('sirano') ?: 1 }}">
                            </div>

                            <!-- Banner Resmi -->
                            <div class="mb-3 row">
                                <label for="resim" class="col-sm-3 col-form-label">Banner Resmi (594x810)</label>
                                <div class="col-sm-9">
                                    <input type="file" name="resim" id="resim" class="form-control"
                                        onchange="previewImage(event, 'resimGoster')">
                                    <div class="mt-2">
                                        <img id="resimGoster"
                                            src="{{ old('resim') ?? url('uploads/banner/resim-yok.jpg') }}"
                                            alt="Banner Resmi" class="img-fluid rounded shadow-sm"
                                            style="max-width: 200px;">
                                    </div>
                                </div>
                            </div>

                            <!-- Arkaplan Resmi -->
                            <div class="mb-3 row">
                                <label for="arkaplan" class="col-sm-3 col-form-label">Arka Plan Resmi (1920x1080)</label>
                                <div class="col-sm-9">
                                    <input type="file" name="arkaplan" id="arkaplan" class="form-control"
                                        onchange="previewImage(event, 'arkaplanGoster')">
                                    <div class="mt-2">
                                        <img id="arkaplanGoster"
                                            src="{{ old('arkaplan') ?? url('uploads/banner/resim-yok.jpg') }}"
                                            alt="Arkaplan Resmi" class="img-fluid rounded shadow-sm"
                                            style="max-width: 200px;">
                                    </div>
                                </div>
                            </div>

                            <!-- Yazı Resmi -->
                            <div class="mb-3 row">
                                <label for="yaziresim" class="col-sm-3 col-form-label">Yazı Arka Plan Resmi (297x54)</label>
                                <div class="col-sm-9">
                                    <input type="file" name="yaziresim" id="yaziresim" class="form-control"
                                        onchange="previewImage(event, 'yaziresimGoster')">
                                    <div class="mt-2">
                                        <img id="yaziresimGoster"
                                            src="{{ old('yaziresim') ?? url('uploads/banner/resim-yok.jpg') }}"
                                            alt="Yazı Arka Plan Resmi" class="img-fluid rounded shadow-sm"
                                            style="max-width: 200px;">
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-outline-primary btn-lg btn-custom">Banner
                                    Ekle</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
