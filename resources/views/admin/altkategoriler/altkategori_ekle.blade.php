@extends('admin.admin_master')

@php
$seo = App\Models\Seo::find(2);
@endphp

@section('title'){{$seo->site_adi}} | Alt Kategori Ekle @endsection

@section('admin')
    <div class="container-xxl">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h4 class="card-title">Alt Kategori Ekle</h4>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <form id="Form" method="post" action="{{ route('altkategori.ekle.form') }}"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3">
                                <label for="altkategori_adi" class="form-label">Alt Kategori Adı</label>
                                <input type="text" name="altkategori_adi"
                                    class="required form-control {{ $errors->has('altkategori_adi') ? 'is-invalid' : '' }} {{ old('altkategori_adi') ? 'is-valid' : '' }}"
                                    id="altkategori_adi" placeholder="Lütfen bir alt kategori  ismi giriniz."
                                    value="{{ old('altkategori_adi') }}">
                                @error('altkategori_adi')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="anahtar" class="form-label">Tags (Opsiyonel)</label>
                                <input type="text" id="tags-input" class="form-control"
                                    placeholder="Lütfen anahtar kelime giriniz.">
                                <div style="font-size: 1.2rem" id="tags-container" class="mt-2"></div>
                                <input type="hidden" name="anahtar" id="tags-hidden"
                                    value="{{ old('anahtar') }}">
                                    @error('anahtar')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
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
                                <label for="sirano" class="form-label">Sıra No</label>
                                <input type="number" name="sirano"
                                    class="required form-control {{ $errors->has('sirano') ? 'is-invalid' : '' }} {{ old('sirano') ? 'is-valid' : '' }}"
                                    id="sirano" placeholder="Lütfen sıra no giriniz." value="{{ old('sirano') ?: 1 }}">
                                @error('sirano')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Kategori Seç</label>
                                <select name="kategori_id" id="default">
                                    @foreach ($kategorigoster as $kategoriler)
                                        <option value=" {{ $kategoriler->id }} ">{{ $kategoriler->kategori_adi }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Resim yükleme alanı -->
                            <div style="margin-block-start: 20px"class="mb-3 row">
                                <label for="resim" class="form-label">Banner Resmi (1920x1080)</label>
                                <div class="col-sm-9">
                                    <input type="file" name="resim" id="resim" class="form-control">
                                </div>
                            </div>

                            <!-- Resim gösterme alanı -->
                            <div class="mb-3 row">
                                <label class="form-label">Güncel Resim</label>
                                <div class="col-sm-9 d-flex align-items-center">
                                    <img id="resimGoster" src="{{ url('uploads/banner/resim-yok.jpg') }}"
                                        alt="Banner Resmi" class="image">
                                </div>
                            </div>

                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-outline-primary btn-lg btn-custom">Alt Kategori
                                    Ekle</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
