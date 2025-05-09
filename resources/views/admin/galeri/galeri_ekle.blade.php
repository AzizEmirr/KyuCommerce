@extends('admin.admin_master')

@php
    $seo = App\Models\Seo::find(2);
@endphp

@section('title')
    {{ $seo->site_adi }} | Fotoğraf Ekle
@endsection

@section('admin')
    <div class="container-xxl">
        <div class="row justify-content-center">
            <div class="col-9">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h4 class="card-title">Fotoğraf Ekle</h4>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <form id="Form" method="post" action="{{ route('galeri.ekle.form') }}"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3 ">
                                <label for="sirano" class="form-label">Sıra No</label>
                                <input type="number" name="sirano"
                                    class=" form-control {{ $errors->has('sirano') ? 'is-invalid' : '' }} {{ old('sirano') ? 'is-valid' : '' }}"
                                    placeholder="Lütfen sıra no giriniz." value="{{ old('sirano') ?: 1 }}">
                            </div>

                            <!-- Resim yükleme alanı -->
                            <div class="mb-3 row">
                                <label for="resim" class="form-label">Resim (1920x1080)</label>
                                <div class="col-sm-9">
                                    <input type="file" name="resim" id="resim" class="form-control">
                                </div>
                            </div>

                            <!-- Resim gösterme alanı -->
                            <div class="mb-3 row">
                                <label class="form-label">Güncel Resim</label>
                                <div class="col-sm-9 d-flex align-items-center">
                                    <img id="resimGoster" src="{{ url('uploads/galeri/resim-yok.jpg') }}"
                                        alt="Resim" class="image">
                                </div>
                            </div>

                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-outline-primary btn-lg btn-custom">Fotoğraf
                                    Ekle</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
