@extends('admin.admin_master')

@php
$seo = App\Models\Seo::find(2);
@endphp

@section('title'){{$seo->site_adi}} | İzin Düzenle | {{ $izinler->name }} @endsection

@section('admin')
    <div class="container-xxl">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h4 class="card-title text-center text-primary font-weight-bold">
                                    <i class="fas fa-edit"></i> İzini Düzenle:
                                    <span class="text-dark">
                                        "{{ $izinler->name }}"
                                    </span>
                                </h4>
                                <hr class="mb-4">
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <form id="Form" method="post" action="{{ route('izin.guncelle.form')}}">
                            @csrf
                        
                            <input type="hidden" name="id" value="{{ $izinler->id }}">
                        
                            <div class="mb-3">
                                <label for="name" class="form-label">İzin Adı</label>
                                <input type="text" name="name"
                                    class="required form-control {{ $errors->has('name') ? 'is-invalid' : '' }} {{ old('name') ? 'is-valid' : '' }}"
                                    id="name" placeholder="Lütfen bir isim giriniz."
                                    value="{{ old('name', $izinler->name) }}">
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
                                    <option value="ayarlar" {{$izinler->grup_adi == 'ayarlar' ? 'selected' : ''}}>Site Ayarları</option>
                                    <option value="seo" {{$izinler->grup_adi == 'seo' ? 'selected' : ''}}>Seo Ayarları</option>
                                    <option value="banner" {{$izinler->grup_adi == 'banner' ? 'selected' : ''}}>Banner</option>
                                    <option value="hakkimizda" {{$izinler->grup_adi == 'hakkimizda' ? 'selected' : ''}}>Hakkımızda</option>
                                    <option value="kurumsal" {{$izinler->grup_adi == 'kurumsal' ? 'selected' : ''}}>Kurumsal</option>
                                    <option value="banka" {{$izinler->grup_adi == 'banka' ? 'selected' : ''}}>Banka</option>
                                    <option value="sorular" {{$izinler->grup_adi == 'sorular' ? 'selected' : ''}}>Sorular</option>
                                    <option value="yorumlar" {{$izinler->grup_adi == 'yorumlar' ? 'selected' : ''}}>Yorumlar</option>
                                    <option value="kategoriler" {{$izinler->grup_adi == 'kategoriler' ? 'selected' : ''}}>Kategoriler</option>
                                    <option value="altkategoriler" {{$izinler->grup_adi == 'altkategoriler' ? 'selected' : ''}}>Alt Kategoriler</option>
                                    <option value="urunler" {{$izinler->grup_adi == 'urunler' ? 'selected' : ''}}>Ürünler</option>
                                    <option value="blogkategoriler" {{$izinler->grup_adi == 'blogkategoriler' ? 'selected' : ''}}>Blog Kategorileri</option>
                                    <option value="blogicerikler" {{$izinler->grup_adi == 'blogicerikler' ? 'selected' : ''}}>Blog İçerikler</option>
                                    <option value="kullanicilar" {{$izinler->grup_adi == 'kullanicilar' ? 'selected' : ''}}>Kullanıcılar</option>
                                    <option value="izinler" {{$izinler->grup_adi == 'izinler' ? 'selected' : ''}}>İzinler</option>
                                    <option value="roller" {{$izinler->grup_adi == 'roller' ? 'selected' : ''}}>Roller</option>
                                    <option value="galeri" {{$izinler->grup_adi == 'galeri' ? 'selected' : ''}}>Galeri</option>
                                    <option value="profil" {{$izinler->grup_adi == 'profil' ? 'selected' : ''}}>Profil</option>
                                    <option value="referans" {{$izinler->grup_adi == 'referans' ? 'selected' : ''}}>Referans Ayarları</option>
                                    <option value="renk" {{$izinler->grup_adi == 'renk' ? 'selected' : ''}}>Renk Ayarları</option>
                                </select>
                        
                                @error('grup_adi')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        
                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-outline-primary btn-lg btn-custom">İzin Güncelle</button>
                            </div>
                        </form>                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
