@extends('admin.admin_master')

@php
    $seo = App\Models\Seo::find(2);
@endphp

@section('title')
    {{ $seo->site_adi }} | Referans Düzenle | {{ $referans->id }}
@endsection

@section('admin')
    <div class="container-xxl">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h4 class="card-title text-center text-primary font-weight-bold">
                                    <i class="fas fa-edit"></i> Referans Logosunu Düzenle:
                                    <span class="text-dark">
                                        "{{ $referans->id }}"
                                    </span>
                                </h4>
                                <hr class="mb-4">
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <form id="Form" method="post" action="{{ route('referans.guncelle.form') }}" enctype="multipart/form-data">
                            @csrf
                        
                            <input type="hidden" name="id" value="{{ $referans->id }}">
                            <input type="hidden" name="onceki_resim" value="{{ $referans->resim }}">
                        
                            <div class="mb-3 row">
                                <label for="resim" class="form-label">Logoyu Değiştir</label>
                                <div class="col-sm-9">
                                    <input type="file" name="resim" id="resim" class="form-control">
                                </div>
                            </div>
                        
                            <div class="mb-3 row">
                                <label class="form-label">Güncel Medya</label>
                                <div class="col-sm-9 d-flex align-items-center">
                                    <img id="resimGoster" src="{{ asset($referans->resim) }}" alt="Mevcut Medya" class="image" width="200">
                                </div>
                            </div>
                        
                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-outline-primary btn-lg btn-custom">Referans Güncelle</button>
                            </div>
                        </form>
                        

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
