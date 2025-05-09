@extends('admin.admin_master')

@php
$seo = App\Models\Seo::find(2);
@endphp

@section('title'){{$seo->site_adi}} | Yorum Ekle @endsection


@section('admin')
    <div class="container-xxl">
        <div class="row justify-content-center">
            <div class="col-9">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h4 class="card-title">Yorum Ekle</h4>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <form id="Form" method="post" action="{{ route('yorum.ekle.form') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="container">
                                <div class="row">
                                    <div class="mb-3">
                                        <label for="adi" class="form-label">Ad Soyad</label>
                                        <input type="text" name="adi"
                                            class="required form-control {{ $errors->has('adi') ? 'is-invalid' : '' }} {{ old('adi') ? 'is-valid' : '' }}"
                                            placeholder="Lütfen bir isim soyisim yazınız." value="{{ old('adi') }}">
                                        @error('adi')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="metin" class="form-label">Metin</label>
                                        <textarea type="text" name="metin"
                                            class="required form-control {{ $errors->has('metin') ? 'is-invalid' : '' }} {{ old('metin') ? 'is-valid' : '' }}"
                                            placeholder="Lütfen bir metin yazınız." value="{{ old('metin') }}"></textarea>
                                        @error('metin')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="sirano" class="form-label">Sıra No</label>
                                        <input type="number" name="sirano"
                                            class="required form-control {{ $errors->has('sirano') ? 'is-invalid' : '' }} {{ old('sirano') ? 'is-valid' : '' }}"
                                            placeholder="Lütfen sıra numarası giriniz." value="{{ old('sirano') }}">
                                        @error('sirano')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="d-flex justify-content-center">
                                    <button type="submit" class="btn btn-outline-primary btn-lg btn-custom">Yorum
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
