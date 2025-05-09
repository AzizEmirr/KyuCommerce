@extends('admin.admin_master')

@php
    $seo = App\Models\Seo::find(2);
@endphp

@section('title')
    {{ $seo->site_adi }} | Logo Düzenle
@endsection

@section('admin')
    <div class="container-xxl">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h4 class="card-title">Logoları Düzenle</h4>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <form method="post" action="{{ route('logo.guncelle') }}" enctype="multipart/form-data"
                            class="p-4 border rounded shadow-sm ">
                            @csrf
                            <input type="hidden" name="id" value="{{ $logoduzenle->id }}">

                            <!-- Siyah Logo -->
                            <div class="mb-4">
                                <h5 class="mb-3">Siyah Logo</h5>
                                <label for="siyahLogo" class="form-label">Resim (381x86)</label>
                                <input type="file" name="siyahLogo" id="siyahLogo" class="form-control mb-2">
                                <div class="text-center">
                                    <img id="siyahLogoGoster"
                                        src="{{ !empty($logoduzenle->siyahLogo) ? url($logoduzenle->siyahLogo) : url('uploads/logo/resim-yok.jpg') }}"
                                        alt="Siyah Logo" class="img-fluid rounded border">
                                </div>
                            </div>

                            <!-- Beyaz Logo -->
                            <div class="mb-4">
                                <h5 class="mb-3">Beyaz Logo</h5>
                                <label for="beyazLogo" class="form-label">Resim (381x86)</label>
                                <input type="file" name="beyazLogo" id="beyazLogo" class="form-control mb-2">
                                <div class="text-center">
                                    <img id="beyazLogoGoster"
                                        src="{{ !empty($logoduzenle->beyazLogo) ? url($logoduzenle->beyazLogo) : url('uploads/logo/resim-yok.jpg') }}"
                                        alt="Beyaz Logo" class="img-fluid rounded border">
                                </div>
                            </div>

                            <!-- Favicon -->
                            <div class="mb-4">
                                <h5 class="mb-3">Favicon</h5>
                                <label for="favicon" class="form-label">Resim (16x16)</label>
                                <input type="file" name="favicon" id="favicon" class="form-control mb-2">
                                <div class="text-center">
                                    <img id="faviconGoster"
                                        src="{{ !empty($logoduzenle->favicon) ? url($logoduzenle->favicon) : url('uploads/logo/resim-yok.jpg') }}"
                                        alt="Favicon" class="img-fluid rounded border">
                                </div>
                            </div>

                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-outline-light btn-lg">Güncelle</button>
                            </div>
                        </form>

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
