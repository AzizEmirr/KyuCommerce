@extends('admin.admin_master')

@php
$seo = App\Models\Seo::find(2);
@endphp

@section('title'){{$seo->site_adi}} | Blog Kategori Ekle @endsection

@section('admin')
    <div class="container-xxl">
        <div class="row justify-content-center">
            <div class="col-9">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h4 class="card-title">Blog Kategori Ekle</h4>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <form id="Form" method="post" action="{{ route('blog.kategori.form') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="container">
                                <div class="row">
                                    <div class="mb-3">
                                        <label for="kategori_adi" class="form-label">Kategori Adu</label>
                                        <input type="text" name="kategori_adi"
                                            class="required form-control {{ $errors->has('kategori_adi') ? 'is-invalid' : '' }} {{ old('kategori_adi') ? 'is-valid' : '' }}"
                                            id="kategori_adi" placeholder="Lütfen bir başlık giriniz."
                                            value="{{ old('kategori_adi') }}">
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
                                            value="{{ old('sirano') }}">
                                        @error('sirano')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="d-flex justify-content-center">
                                    <button type="submit" class="btn btn-outline-primary btn-lg btn-custom">Blog
                                        Kategori
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
