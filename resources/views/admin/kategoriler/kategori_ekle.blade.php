@extends('admin.admin_master')

@php
    $seo = App\Models\Seo::find(2);
@endphp

@section('title')
    {{ $seo->site_adi }} | Kategori Ekle
@endsection

@section('admin')
    <div class="container-xxl">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h4 class="card-title">Kategori Ekle</h4>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <form id="Form" method="post" action="{{ route('kategori.ekle.form') }}"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3">
                                <label for="kategori_adi" class="form-label">Kategori Adı</label>
                                <input type="text" name="kategori_adi"
                                    class="required form-control {{ $errors->has('kategori_adi') ? 'is-invalid' : '' }} {{ old('kategori_adi') ? 'is-valid' : '' }}"
                                    id="kategori_adi" placeholder="Lütfen bir isim giriniz."
                                    value="{{ old('kategori_adi') }}">
                                @error('kategori_adi')
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

                            <!-- Resim yükleme alanı -->
                            <div class="mb-3 row">
                                <label for="resim" class="form-label">Kategori Resmi (1920x1080)</label>
                                <div class="col-sm-9">
                                    <input type="file" name="resim" id="resim" class="form-control">
                                </div>
                            </div>

                            <!-- Resim gösterme alanı -->
                            <div class="mb-3 row">
                                <label class="form-label">Güncel Resim</label>
                                <div class="col-sm-9 d-flex align-items-center">
                                    <img id="resimGoster" src="{{ url('uploads/banner/resim-yok.jpg') }}"
                                        alt="Kategoori Resmi" class="image">
                                </div>
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
