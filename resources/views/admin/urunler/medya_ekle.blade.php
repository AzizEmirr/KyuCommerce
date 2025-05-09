@extends('admin.admin_master')

@php
    $seo = App\Models\Seo::find(2);
@endphp

@section('title')
    {{ $seo->site_adi }} | Çoklu Resim
@endsection

@section('admin')
    <div class="container-xxl">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h4 class="card-title">Çoklu Resim Ekle</h4>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <form id="Form" method="post" action="{{ route('medya.ekle.form') }}"
                            enctype="multipart/form-data">
                            @csrf
                            
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <div class="mb-3">
                                <label class="form-label">Ürün Seç</label>
                                <select class="required form-select" id="urun_id" name="urun_id">
                                    <option value="" selected disabled>Ürün Seç</option>
                                    @foreach ($urunler as $urun)
                                        <option value="{{ $urun->id }}">{{ $urun->baslik }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Resim ve Video yükleme alanı -->
                            <div class="mb-3 row">
                                <label for="resim" class="form-label">Ürün İçin Birden Fazla Resim veya Video Ekle
                                    (537x545)</label>
                                <div class="col-sm-9">
                                    <input type="file" name="resim[]" id="resim" class="form-control" multiple=""
                                        accept="image/*,video/*">
                                </div>
                            </div>

                            <!-- Resim gösterme alanı -->
                            <div class="mb-3 row">
                                <label class="form-label">Güncel Resim</label>
                                <div class="col-sm-9 d-flex align-items-center">
                                    <img id="resimGoster" src="{{ url('uploads/banner/resim-yok.jpg') }}" alt="Ürün Resimi"
                                        class="image">
                                </div>
                            </div>

                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-outline-primary btn-lg btn-custom">Çoklu Resim
                                    Ekle</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
