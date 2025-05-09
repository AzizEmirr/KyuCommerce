@extends('admin.admin_master')

@php
    $seo = App\Models\Seo::find(2);
@endphp

@section('title')
    {{ $seo->site_adi }} | Ürün Ekle
@endsection

@section('admin')
    <style>
        .tag {
            display: inline-block;
            background-color: #343a40;
            color: #fff;
            padding: 5px 10px;
            margin-right: 5px;
            margin-bottom: 5px;
            border-radius: 5px;
            font-size: 1.2rem;
        }

        .tag .remove-tag {
            margin-left: 10px;
            cursor: pointer;
            color: #ff4d4d;
            font-weight: bold;
        }
    </style>
    <div class="container-xxl">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h4 class="card-title">Ürün Ekle</h4>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0">

                        <form id="Form" method="post" action="{{ route('urun.ekle.form') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="container">
                                <div class="row">
                                    <!-- Sol Taraf -->
                                    <div class="col-md-6">
                                        <!-- Başlık -->
                                        <div class="mb-3">
                                            <label for="baslik" class="form-label">Başlık</label>
                                            <input type="text" name="baslik"
                                                class=" form-control {{ $errors->has('baslik') ? 'is-invalid' : '' }} {{ old('baslik') ? 'is-valid' : '' }}"
                                                id="baslik" placeholder="Lütfen bir başlık giriniz."
                                                value="{{ old('baslik') }}">
                                        </div>

                                        <!-- Tags -->
                                        <div class="mb-3">
                                            <label for="tags" class="form-label">Tags (Opsiyonel)</label>
                                            <input type="text" id="tags-input" class="form-control"
                                                placeholder="Lütfen tag giriniz.">
                                            <div style="font-size: 1.2rem" id="tags-container" class="mt-2"></div>
                                            <input type="hidden" name="tags_hidden" id="tags-hidden"
                                                value="{{ old('tags_hidden') }}">
                                        </div>

                                        <!-- Kategori -->
                                        <div class="mb-3">
                                            <label class="form-label">Kategori Seç</label>
                                            <select class="required form-select" id="default" name="kategori_id">
                                                <option value="" selected disabled>Kategori Seç</option>
                                                @foreach ($kategoriler as $kategori)
                                                    <option value="{{ $kategori->id }}">{{ $kategori->kategori_adi }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('kategori_id')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <!-- Alt Kategori -->
                                        <div class="mb-3">
                                            <label class="form-label">Alt Kategori Adı</label>
                                            <select class="required form-select" id="default" name="altkategori_id">
                                                <option value="" selected disabled> Seçim yapılmadı</option>
                                            </select>
                                            @error('altkategori_id')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="url" class="form-label">Ürün URL</label>
                                            <input type="text" name="link"
                                                class=" form-control {{ $errors->has('link') ? 'is-invalid' : '' }} {{ old('link') ? 'is-valid' : '' }}"
                                                id="link" placeholder="Lütfen ürüne tıklandıgında gidilecek URL'i giriniz"
                                                value="{{ old('link') }}">
                                        </div>

                                        <!-- Metin -->
                                        <div class="mb-3">
                                            <label for="metin" class=" form-label">Metin</label>
                                            <textarea name="metin" id="metin"
                                                class="form-control {{ $errors->has('metin') ? 'is-invalid' : '' }} {{ old('metin') ? 'is-valid' : '' }}"
                                                placeholder="Lütfen Metin giriniz.">{{ old('metin') }}</textarea>
                                        </div>


                                    </div>

                                    <div class="col-md-6">


                                        <!-- Sıra No -->
                                        <div class="mb-3">
                                            <label for="sirano" class="form-label">Sıra No</label>
                                            <input type="number" name="sirano"
                                                class=" form-control {{ $errors->has('sirano') ? 'is-invalid' : '' }} {{ old('sirano') ? 'is-valid' : '' }}"
                                                id="sirano" placeholder="Lütfen sıra no giriniz."
                                                value="{{ old('sirano') }}">
                                        </div>
                                        <!-- Açıklama -->
                                        <div class="mb-3">
                                            <label for="aciklama" class="form-label">Açıklama</label>
                                            <input type="text" name="aciklama"
                                                class=" form-control {{ $errors->has('aciklama') ? 'is-invalid' : '' }} {{ old('aciklama') ? 'is-valid' : '' }}"
                                                id="aciklama" placeholder="Lütfen bir açıklama giriniz."
                                                value="{{ old('aciklama') }}">

                                        </div>
                                        <!-- Anahtar Kelimeler -->
                                        <div class="mb-3">
                                            <label for="anahtar" class="form-label">Anahtar Kelimeler</label>
                                            <input type="text" name="anahtar"
                                                class=" form-control {{ $errors->has('anahtar') ? 'is-invalid' : '' }} {{ old('anahtar') ? 'is-valid' : '' }}"
                                                id="anahtar" placeholder="Lütfen anahtar kelimeler giriniz."
                                                value="{{ old('anahtar') }}">
                                        </div>
                                        <!-- Fiyat -->
                                        <div class="mb-3">
                                            <label for="fiyat" class="form-label">Fiyat</label>
                                            <input type="number" name="fiyat" step="0.01"
                                                class=" form-control {{ $errors->has('fiyat') ? 'is-invalid' : '' }} {{ old('fiyat') ? 'is-valid' : '' }}"
                                                id="fiyat" placeholder="Lütfen fiyat giriniz."
                                                value="{{ old('fiyat') }}">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Stok</label>
                                            <select class="form-select" name="stok">
                                                <option value="" selected disabled> Seçim yapılmadı</option>
                                                <option value="1"> Var</option>
                                                <option value="0"> Yok</option>
                                            </select>
                                        </div>
                                        <!-- Resim -->
                                        <div class="mb-3">
                                            <label for="resim" class="form-label">Ürün Resmi (537x545)</label>
                                            <input type="file" name="resim" id="resim" class="form-control">
                                        </div>

                                        <!-- Güncel Resim -->
                                        <div class="mb-3">
                                            <label class="form-label">Güncel Resim</label>
                                            <div class="d-flex align-items-center">
                                                <img id="resimGoster" src="{{ url('uploads/urunler/resim-yok.jpg') }}"
                                                    alt="ÜrünResmi" class="image">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Submit Butonu -->
                                <div class="d-flex justify-content-left justify-content-md-start justify-content-center">
                                    <button type="submit" class="btn btn-outline-primary btn-lg btn-custom">Ürün
                                        Ekle</button>
                                </div>
                            </div>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
