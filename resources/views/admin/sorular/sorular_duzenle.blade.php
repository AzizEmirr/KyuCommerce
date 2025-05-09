@extends('admin.admin_master')

@php
$seo = App\Models\Seo::find(2);
@endphp

@section('title'){{$seo->site_adi}} | Soru Düzenle | {{ $sorularduzenle->soru }} @endsection

@section('admin')
    <div class="container-xxl">
        <div class="row justify-content-center">
            <div class="col-9">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h4 class="card-title text-center text-primary font-weight-bold">
                                    <i class="fas fa-edit"></i> Soru Ceveap Düzenle:
                                    <span class="text-dark">
                                        "{{ $sorularduzenle->soru }}"
                                    </span>
                                </h4>
                                <hr class="mb-4">
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <form id="Form" method="post" action="{{ route('soru.guncelle') }}"
                            enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="id" value="{{ $sorularduzenle->id }}">

                            <div class="mb-3">
                                <label for="soru" class="form-label">Soru</label>
                                <input type="text" name="soru"
                                    class="required form-control {{ $errors->has('soru') ? 'is-invalid' : '' }} {{ old('soru') ? 'is-valid' : '' }}"
                                    id="soru" placeholder="Lütfen bir soru yazınız."
                                    value="{{ old('soru', $sorularduzenle->soru) }}">
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
                                    id="cevap" placeholder="Lütfen bir cevap yazınız.">{{ old('cevap', $sorularduzenle->cevap) }}</textarea>
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
                                    id="sirano" placeholder="Lütfen sıra no giriniz."
                                    value="{{ old('sirano', $sorularduzenle->sirano) }}">
                                @error('sirano')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-outline-primary btn-lg btn-custom">Soru Cevap
                                    Güncelle</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
