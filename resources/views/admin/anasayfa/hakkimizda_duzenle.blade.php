@extends('admin.admin_master')

@php
    $seo = App\Models\Seo::find(2);
@endphp

@section('title')
    {{ $seo->site_adi }} | Hakkımızda
@endsection

@section('admin')
    <div class="container-xxl">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h4 class="card-title">Hakkımızda Sayfasını Düzenle</h4>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <form method="post" action="{{ route('hakkimizda.guncelle') }}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $hakkimizda->id }}">
                            @if (Auth::user()->can('hak.durum'))
                                <div class="d-flex justify-content-end">
                                    <div class="form-check form-switch">
                                        <input type="checkbox" class="hakkimizda form-check-input"
                                            data-id='{{ $hakkimizda->id }}' id="urun-{{ $hakkimizda->id }}"
                                            {{ $hakkimizda->durum ? 'checked' : '' }} onchange="updateLabel(this)">
                                        <label class="form-check-label" for="urun-{{ $hakkimizda->id }}"
                                            id="label-{{ $hakkimizda->id }}">
                                            {{ $hakkimizda->durum ? 'Aktif' : 'Pasif' }}
                                        </label>
                                    </div>
                                </div>
                            @endif
                            <div class="mb-3">
                                <label for="baslik" class="form-label">Başlık</label>
                                <textarea name="baslik" class="form-control" rows="5">{{ $hakkimizda->baslik }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label for="aciklama" class="form-label">Açıklama</label>
                                <input type="text" name="aciklama" class="form-control"
                                    value="{{ $hakkimizda->aciklama }}" placeholder="Lütfen bir Açıklama giriniz.">
                            </div>

                            <div class="mb-3">
                                <label for="metin" class="form-label">Metin</label>
                                <textarea name="metin" class="form-control" rows="8">{{ $hakkimizda->metin }}</textarea>
                            </div>


                            <!-- Banner Resmi -->
                            <div class="mb-3 row">
                                <label for="resim" class="col-sm-3 col-form-label">Hakkımızda Resmi (363x487)</label>
                                <div class="col-sm-9">
                                    <input type="file" name="resim" id="resim" class="form-control">
                                    <div class="mt-2">
                                        <img id="resimGoster"
                                            src="{{ !empty($hakkimizda->resim) ? url($hakkimizda->resim) : url('uploads/hakkimizda/resim-yok.jpg') }}"
                                            alt="Hakkımızda Resmi" class="img-fluid rounded" style="max-width: 200px;">
                                    </div>
                                </div>
                            </div>
                            <!-- Banner Resmi -->
                            <div class="mb-3 row">
                                <label for="resim" class="col-sm-3 col-form-label">Hakkımızda Resmi 2 (519x382)</label>
                                <div class="col-sm-9">
                                    <input type="file" name="resim2" id="resim" class="form-control">
                                    <div class="mt-2">
                                        <img id="resimGoster"
                                            src="{{ !empty($hakkimizda->resim2) ? url($hakkimizda->resim2) : url('uploads/hakkimizda/resim-yok.jpg') }}"
                                            alt="Hakkımızda Resmi 2" class="img-fluid rounded" style="max-width: 200px;">
                                    </div>
                                </div>
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
