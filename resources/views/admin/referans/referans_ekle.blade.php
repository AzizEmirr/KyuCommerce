@extends('admin.admin_master')

@php
    $seo = App\Models\Seo::find(2);
@endphp

@section('title')
    {{ $seo->site_adi }} | Referans Ekle
@endsection

@section('admin')
    <div class="container-xxl">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h4 class="card-title">Referans Ekle</h4>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <form id="Form" method="post" action="{{ route('referans.ekle.form') }}" enctype="multipart/form-data">
                            @csrf
                        
                            <!-- Resim Yükleme Alanı -->
                            <div class="mb-3 row">
                                <label for="resim" class="form-label">Bir logo yükleyin</label>
                                <div class="col-sm-9">
                                    <input type="file" name="resim" id="resim" class="form-control" accept="image/*,video/*">
                                </div>
                            </div>
                        
                            <!-- Resim Gösterme Alanı -->
                            <div class="mb-3 row">
                                <label class="form-label">Güncel Resim</label>
                                <div class="col-sm-9 d-flex align-items-center">
                                    <img id="resimGoster" src="{{ url('uploads/banner/resim-yok.jpg') }}" alt="Referans Resimi" class="image">
                                </div>
                            </div>
                        
                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-outline-primary btn-lg btn-custom">Referans Ekle</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
