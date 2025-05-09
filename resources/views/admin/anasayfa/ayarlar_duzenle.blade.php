@extends('admin.admin_master')

@php
$seo = App\Models\Seo::find(2);
@endphp

@section('title'){{$seo->site_adi}} | Site Ayarları @endsection

@section('admin')
    <div class="container-xxl">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h4 class="card-title">Site Ayarları</h4>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <form method="post" action="{{ route('ayarlar.guncelle') }}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $ayarlar->id }}">
                            <div class="row">
                                <!-- Sol Kısım -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="telefon" class="form-label">Telefon</label>
                                        <input type="number" name="telefon" class="form-control"
                                            value="{{ $ayarlar->telefon }}"
                                            placeholder="Lütfen bir telefon numarası giriniz.">
                                    </div>
                                    <div class="mb-3">
                                        <label for="mail" class="form-label">E-Mail</label>
                                        <input type="email" name="mail" class="form-control"
                                            value="{{ $ayarlar->mail }}" placeholder="Lütfen bir mail adresi giriniz.">
                                    </div>
                                    <div class="mb-3">
                                        <label for="adres" class="form-label">Adres</label>
                                        <input type="text" name="adres" class="form-control"
                                            value="{{ $ayarlar->adres }}" placeholder="Lütfen adresinizi giriniz.">
                                    </div>
                                    <div class="mb-3">
                                        <label for="harita" class="form-label">Harita</label>
                                        <input type="text" name="harita" class="form-control"
                                            value="{{ $ayarlar->harita }}" placeholder="Lütfen harita iframe'i giriniz.">
                                    </div>
                                    <div class="mb-3">
                                        <label for="aciklama" class="form-label">Açıklama</label>
                                        <textarea type="text" name="aciklama" class="form-control" placeholder="Lütfen bir açıklama giriniz.">{{ $ayarlar->aciklama }}</textarea>
                                    </div>
                                </div>
                                <!-- Sağ Kısım -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="facebook" class="form-label">Facebook</label>
                                        <input type="text" name="facebook" class="form-control"
                                            value="{{ $ayarlar->facebook }}"
                                            placeholder="Lütfen Facebook adresinizi giriniz.">
                                    </div>
                                    <div class="mb-3">
                                        <label for="twitter" class="form-label">Twitter</label>
                                        <input type="text" name="twitter" class="form-control"
                                            value="{{ $ayarlar->twitter }}"
                                            placeholder="Lütfen Twitter adresinizi giriniz.">
                                    </div>
                                    <div class="mb-3">
                                        <label for="youtube" class="form-label">Youtube</label>
                                        <input type="text" name="youtube" class="form-control"
                                            value="{{ $ayarlar->youtube }}"
                                            placeholder="Lütfen Youtube adresinizi giriniz.">
                                    </div>
                                    <div class="mb-3">
                                        <label for="discord" class="form-label">Discord</label>
                                        <input type="text" name="discord" class="form-control"
                                            value="{{ $ayarlar->discord }}"
                                            placeholder="Lütfen Discord adresinizi giriniz.">
                                    </div>
                                    <div class="mb-3">
                                        <label for="instagram" class="form-label">Instagram</label>
                                        <input type="text" name="instagram" class="form-control"
                                            value="{{ $ayarlar->instagram }}"
                                            placeholder="Lütfen Instagram adresinizi giriniz.">
                                    </div>

                                </div>
                            </div>
                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-outline-primary btn-lg">Site Ayarlarını
                                    Güncelle</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
