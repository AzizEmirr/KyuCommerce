@extends('admin.admin_master')

@php
$seo = App\Models\Seo::find(2);
@endphp

@section('title'){{$seo->site_adi}} | Banka Hesap Bİlgileri  @endsection

@section('admin')
    <div class="container-xxl">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h4 class="card-title">Banka Hesap Bilgileri Sayfasını Düzenle</h4>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <form method="post" action="{{ route('banka.guncelle') }}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $banka->id }}">
                            <div class="mb-3">
                                <label for="baslik" class="form-label">Başlık</label>
                                <input type="text" name="baslik" class="form-control" value="{{ $banka->baslik }}"
                                    placeholder="Lütfen bir başlık giriniz.">
                            </div>

                            
                            <div class="mb-3">
                                <textarea name="metin" id="metin" class="required form-control" placeholder="Lütfen Metin giriniz.">{{ $banka->metin }}</textarea>
                            </div>


                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-outline-primary btn-lg">Güncelle</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
