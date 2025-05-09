@extends('admin.admin_master')

@php
$seo = App\Models\Seo::find(2);
@endphp

@section('title'){{$seo->site_adi}} | Ana Sayfayı Düzenle @endsection

@section('admin')

<div class="container-xxl">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card shadow-lg border-0 rounded-3">
                <div class="card-header bg-primary text-white text-center py-3">
                    <h4 class="card-title mb-0">Anasayfa Düzenleme</h4>
                </div>
                <div class="card-body pt-4">
                    <form method="post" action="{{ route('anasayfa.guncelle') }}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $anasayfa->id }}">
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3 form-check">
                                    <input type="checkbox" name="headerdurum" class="anasayfadurum" id="headerdurum" {{ $anasayfa->headerdurum ? 'checked' : '' }}>
                                    <label class="form-check-label" for="headerdurum">Header Durumu</label>
                                </div>
                                <div class="mb-3 form-check">
                                    <input type="checkbox" name="bannerdurum" class="anasayfadurum" id="bannerdurum" {{ $anasayfa->bannerdurum ? 'checked' : '' }}>
                                    <label class="form-check-label" for="bannerdurum">Banner Durumu</label>
                                </div>
                                <div class="mb-3 form-check">
                                    <input type="checkbox" name="kategoridurum" class="anasayfadurum" id="kategoridurum" {{ $anasayfa->kategoridurum ? 'checked' : '' }}>
                                    <label class="form-check-label" for="kategoridurum">Kategori Durumu</label>
                                </div>
                                <div class="mb-3 form-check">
                                    <input type="checkbox" name="discorddurum" class="anasayfadurum" id="discorddurum" {{ $anasayfa->discorddurum ? 'checked' : '' }}>
                                    <label class="form-check-label" for="discorddurum">Discord Durumu</label>
                                </div>
                                <div class="mb-3 form-check">
                                    <input type="checkbox" name="urundurum" class="anasayfadurum" id="urundurum" {{ $anasayfa->urundurum ? 'checked' : '' }}>
                                    <label class="form-check-label" for="urundurum">Ürün Durumu</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3 form-check">
                                    <input type="checkbox" name="referansdurum" class="anasayfadurum" id="referansdurum" {{ $anasayfa->referansdurum ? 'checked' : '' }}>
                                    <label class="form-check-label" for="referansdurum">Referans Durumu</label>
                                </div>
                                <div class="mb-3 form-check">
                                    <input type="checkbox" name="sosyaldurum" class="anasayfadurum" id="sosyaldurum" {{ $anasayfa->sosyaldurum ? 'checked' : '' }}>
                                    <label class="form-check-label" for="sosyaldurum">Sosyal Medya Durumu</label>
                                </div>
                                <div class="mb-3 form-check">
                                    <input type="checkbox" name="footerdurum" class="anasayfadurum" id="footerdurum" {{ $anasayfa->footerdurum ? 'checked' : '' }}>
                                    <label class="form-check-label" for="footerdurum">Footer Durumu</label>
                                </div>
                            </div>
                        </div>
                        

                        <hr>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Discord Başlık</label>
                            <input type="text" name="dcbaslik" class="form-control" placeholder="Discord başlığını girin..." value="{{ $anasayfa->dcbaslik }}">
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Discord YouTube Video URL</label>
                            <input type="text" name="dcyoutubevideo" class="form-control" placeholder="YouTube video URL'si girin..." value="{{ $anasayfa->dcyoutubevideo }}">
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Discord Açıklama</label>
                            <textarea name="dcaciklama" class="form-control" rows="5" placeholder="Açıklama girin...">{{ $anasayfa->dcaciklama }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Buton</label>
                            <input type="text" name="dcbuton" class="form-control" placeholder="Buton adı girin..." value="{{ $anasayfa->dcbuton }}">
                        </div>
                        <div class="mb-3 row">
                            <label for="dcarkaplanresim" class="col-sm-3 col-form-label">Dc Arka Plan Resmi 2 (1920x915)</label>
                            <div class="col-sm-9">
                                <input type="file" name="dcarkaplanresim" id="dcarkaplanresim" class="form-control">
                                <div class="mt-2">
                                    <img id="resimGoster"
                                        src="{{ !empty($anasayfa->dcarkaplanresim) ? url($anasayfa->dcarkaplanresim) : url('uploads/discord/resim-yok.jpg') }}"
                                        alt="Dc Arka Plan Resmi" class="img-fluid rounded" style="max-width: 200px;">
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-center mt-4">
                            <button type="submit" class="btn btn-primary px-5 py-2 fw-bold">
                                <i class="fas fa-save me-2"></i> Güncelle
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection