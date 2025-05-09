@extends('admin.admin_master')

@php
$seo = App\Models\Seo::find(2);
@endphp

@section('title'){{$seo->site_adi}} | İzin Ekle @endsection

@section('admin')
    <div class="container-xxl">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h4 class="card-title">İzin Ekle</h4>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <form id="Form" method="post" action="{{ route('izin.ekle.form') }} ">
                            @csrf

                            <div class="mb-3">
                                <label for="name" class="form-label">İzin Adı</label>
                                <input type="text" name="name"
                                    class="required form-control {{ $errors->has('name') ? 'is-invalid' : '' }} {{ old('name') ? 'is-valid' : '' }}"
                                    placeholder="Lütfen bir izin adı giriniz." value="{{ old('name') }}">
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Grup Adı</label>
                                <select class="form-select" id="default" name="grup_adi" required>
                                    <option value="" selected disabled>Grup Adı Seç</option>
                                    <option value="ayarlar">Site Ayarları</option>
                                    <option value="seo">Seo Ayarları</option>
                                    <option value="logo">Logo Ayarları</option>
                                    <option value="banner">Banner</option>
                                    <option value="banka">Banka Hesap</option>
                                    <option value="hakkimizda">Hakkımızda</option>
                                    <option value="kurumsal">Kurumsal</option>
                                    <option value="sorular">Sorular</option>
                                    <option value="yorumlar">Yorumlar</option>
                                    <option value="kategoriler">Kategoriler</option>
                                    <option value="altkategoriler">Alt Kategoriler</option>
                                    <option value="urunler">Ürünler</option>
                                    <option value="blogkategoriler">Blog Kategorileri</option>
                                    <option value="blogicerikler">Blog İçerikler</option>
                                    <option value="kullanicilar">Kullanıcılar</option>
                                    <option value="izinler">İzinler</option>
                                    <option value="roller">Roller</option>
                                    <option value="galeri">Galeri</option>
                                    <option value="profil">Profil</option>
                                    <option value="referans">Referans</option>
                                    <option value="renk">Renk Ayarları</option>
                                </select>
                                @error('grup_adi')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-outline-primary btn-lg btn-custom">Kategori
                                    Ekle</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
