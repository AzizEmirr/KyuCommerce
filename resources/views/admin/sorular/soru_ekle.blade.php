@extends('admin.admin_master')

@php
$seo = App\Models\Seo::find(2);
@endphp

@section('title'){{$seo->site_adi}} | Soru Ekle @endsection


@section('admin')
    <div class="container-xxl">
        <div class="row justify-content-center">
            <div class="col-9">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h4 class="card-title">Soru Cevap Ekle</h4>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <form id="Form" method="post" action="{{ route('soru.ekle.form') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="container">
                                <div class="row">
                                    <div class="mb-3">
                                        <label for="soru" class="form-label">Soru</label>
                                        <input type="text" name="soru"
                                            class="required form-control {{ $errors->has('soru') ? 'is-invalid' : '' }} {{ old('soru') ? 'is-valid' : '' }}"
                                            id="soru" placeholder="Lütfen bir soru yazınız." value="{{ old('soru') }}">
                                        @error('soru')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="cevap" class="form-label">Cevap</label>
                                        <textarea type="text" name="cevap"
                                            class="required form-control {{ $errors->has('cevap') ? 'is-invalid' : '' }} {{ old('cevap') ? 'is-valid' : '' }}"
                                            id="cevap" placeholder="Lütfen bir cevap yazınız." value="{{ old('cevap') }}"></textarea>
                                        @error('cevap')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="sirano" class="form-label">Sıra No</label>
                                        <input type="number" name="sirano"
                                            class="required form-control {{ $errors->has('sirano') ? 'is-invalid' : '' }} {{ old('sirano') ? 'is-valid' : '' }}"
                                            id="sirano" placeholder="Lütfen sıra numarası giriniz."
                                            value="{{ old('sirano') }}">
                                        @error('sirano')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="d-flex justify-content-center">
                                    <button type="submit" class="btn btn-outline-primary btn-lg btn-custom">Soru Cevap
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
