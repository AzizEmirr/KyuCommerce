@extends('admin.admin_master')

@php
$seo = App\Models\Seo::find(2);
@endphp

@section('title'){{$seo->site_adi}} | Blog Kategori Düzenle | {{ $blogkategoriler->kategori_adi }} @endsection

@section('admin')
    <div class="container-xxl">
        <div class="row justify-content-center">
            <div class="col-9">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h4 class="card-title text-center text-primary font-weight-bold">
                                    <i class="fas fa-edit"></i> Blog Kategorisini Düzenle:
                                    <span class="text-dark">
                                        "{{ $blogkategoriler->kategori_adi }}"
                                    </span>
                                </h4>
                                <hr class="mb-4">
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <form id="Form" method="post" action="{{ route('blog.kategori.guncelle') }}"
                            enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="id" value="{{ $blogkategoriler->id }}">
                            <input type="hidden" name="onceki_resim" value="{{ $blogkategoriler->resim }}">

                            <div class="mb-3">
                                <label for="kategori_adi" class="form-label">Kategori Adı</label>
                                <input type="text" name="kategori_adi"
                                    class="form-control {{ $errors->has('kategori_adi') ? 'is-invalid' : '' }} {{ old('kategori_adi') ? 'is-valid' : '' }}"
                                    id="kategori_adi" placeholder="Lütfen bir isim giriniz."
                                    value="{{ old('kategori_adi', $blogkategoriler->kategori_adi) }}">
                                @error('kategori_adi')
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
                                    value="{{ old('sirano', $blogkategoriler->sirano) }}">
                                @error('sirano')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>

                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-outline-primary btn-lg btn-custom">Kategori
                                    Güncelle</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
