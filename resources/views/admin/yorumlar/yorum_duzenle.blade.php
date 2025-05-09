@extends('admin.admin_master')

@php
$seo = App\Models\Seo::find(2);
@endphp

@section('title'){{$seo->site_adi}} | Yorum Düzenle | {{ $yorumduzenle->adi }} @endsection

@section('admin')
    <div class="container-xxl">
        <div class="row justify-content-center">
            <div class="col-9">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h4 class="card-title text-center text-primary font-weight-bold">
                                    <i class="fas fa-edit"></i> Yorum Düzenle:
                                    <span class="text-dark">
                                        "{{ $yorumduzenle->adi }}"
                                    </span>
                                </h4>
                                <hr class="mb-4">
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <form id="Form" method="post" action="{{ route('yorum.guncelle') }}"
                            enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="id" value="{{ $yorumduzenle->id }}">

                            <div class="mb-3">
                                <label for="adi" class="form-label">Ad Soyad</label>
                                <input type="text" name="adi"
                                    class="required form-control {{ $errors->has('adi') ? 'is-invalid' : '' }} {{ old('adi') ? 'is-valid' : '' }}"
                                    placeholder="Lütfen İsim Soyisim giriniz." value="{{ old('adi', $yorumduzenle->adi) }}">
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
                                    placeholder="Lütfen metin yazınız.">{{ old('adi', $yorumduzenle->metin) }}</textarea>
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
                                    id="sirano" placeholder="Lütfen sıra no giriniz."
                                    value="{{ old('sirano', $yorumduzenle->sirano) }}">
                                @error('sirano')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-outline-primary btn-lg btn-custom">Yorum
                                    Güncelle</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
