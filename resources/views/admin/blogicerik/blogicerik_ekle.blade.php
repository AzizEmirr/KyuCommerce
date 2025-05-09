@extends('admin.admin_master')

@php
$seo = App\Models\Seo::find(2);
@endphp

@section('title'){{$seo->site_adi}} | Blog Yazısı Ekle @endsection

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
                                <h4 class="card-title">Blog Yazısı Ekle</h4>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <form id="Form" method="post" action="{{ route('blog.icerik.ekle.form') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="container">
                                <div class="row">
                                    <!-- Sol Taraf -->
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="baslik" class="form-label">Başlık</label>
                                            <input type="text" name="baslik"
                                                class="required form-control {{ $errors->has('baslik') ? 'is-invalid' : '' }} {{ old('baslik') ? 'is-valid' : '' }}"
                                                id="baslik" placeholder="Lütfen bir başlık giriniz."
                                                value="{{ old('baslik') }}">
                                            @error('baslik')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="tags" class="form-label">Tags (Opsiyonel)</label>
                                            <input type="text" id="tags-input" class="form-control"
                                                placeholder="Lütfen tag giriniz.">
                                            <div style="font-size: 1.2rem" id="tags-container" class="mt-2"></div>
                                            <input type="hidden" name="tags_hidden" id="tags-hidden" value="{{ old('tags_hidden') }}">
                                        </div>                                        



                                        <div class="mb-3">
                                            <label for="metin" class="required form-label">Metin</label>
                                            <textarea name="metin" id="metin"
                                                class="required form-control {{ $errors->has('metin') ? 'is-invalid' : '' }} {{ old('metin') ? 'is-valid' : '' }}"
                                                placeholder="Lütfen Metin giriniz.">{{ old('metin') }}</textarea>
                                            @error('metin')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Kategori Seç</label>
                                            <select class="required form-select" id="default" name="kategori_id" required>
                                                <option value="" disabled>Kategori Seç</option>
                                                @foreach ($kategoriler as $kategori)
                                                    <option value="{{ $kategori->id }}" 
                                                        {{ old('kategori_id') == $kategori->id ? 'selected' : '' }}>
                                                        {{ $kategori->kategori_adi }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('kategori_id')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        
                                        <div class="mb-3">
                                            <label for="sirano" class="form-label">Sıra No</label>
                                            <input type="number" name="sirano"
                                                class="required form-control {{ $errors->has('sirano') ? 'is-invalid' : '' }} {{ old('sirano') ? 'is-valid' : '' }}"
                                                id="sirano" placeholder="Lütfen sıra no giriniz."
                                                value="{{ old('sirano') ?: 1 }}">
                                        </div>

                                        <div class="mb-3">
                                            <label for="aciklama" class="form-label">Açıklama</label>
                                            <input type="text" name="aciklama"
                                                class="required form-control {{ $errors->has('aciklama') ? 'is-invalid' : '' }} {{ old('aciklama') ? 'is-valid' : '' }}"
                                                id="aciklama" placeholder="Lütfen bir açıklama giriniz."
                                                value="{{ old('aciklama') }}">
                                            @error('aciklama')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="anahtar" class="form-label">anahtar</label>
                                            <input type="text" name="anahtar"
                                                class="required form-control {{ $errors->has('anahtar') ? 'is-invalid' : '' }} {{ old('anahtar') ? 'is-valid' : '' }}"
                                                id="anahtar" placeholder="Lütfen bir anahtar kelime giriniz."
                                                value="{{ old('anahtar') }}">
                                            @error('anahtar')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <!-- Resim yükleme alanı -->
                                        <div style="margin-block-start: 20px" class="mb-3">
                                            <label for="resim" class="form-label">Blog Resmi (Opsiyonel)</label>
                                            <input type="file" name="resim" id="resim" class="form-control">
                                        </div>

                                        <!-- Resim gösterme alanı -->
                                        <div class="mb-3">
                                            <label class="form-label">Güncel Resim</label>
                                            <div class="d-flex align-items-center">
                                                <img id="resimGoster" src="{{ url('uploads/bloglar/resim-yok.jpg') }}"
                                                    alt="Blog Resmi" class="image">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-left justify-content-md-start justify-content-center">
                                        <button type="submit" class="btn btn-outline-primary btn-lg btn-custom">Blog
                                            Yazısı
                                            Ekle</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
