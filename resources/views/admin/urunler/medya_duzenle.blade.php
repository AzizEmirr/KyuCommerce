@extends('admin.admin_master')

@php
    $seo = App\Models\Seo::find(2);
@endphp

@section('title')
    {{ $seo->site_adi }} | Çoklu Resim Düzenle | {{ $urun->baslik }}
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
                                    <i class="fas fa-edit"></i> Çoklu Resim Düzenle:
                                    <span class="text-dark">
                                        "{{ $urun->baslik }}"
                                    </span>
                                </h4>
                                <hr class="mb-4">
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <form id="Form" method="post" action="{{ route('medya.guncelle.form') }}"
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

                            <!-- Medya ID ve önceki medya URL'lerini sakla -->
                            <input type="hidden" name="id" value="{{ $resim->id }}">
                            <input type="hidden" name="onceki_resim" value="{{ $resim->medya_url }}">

                            <!-- Ürün seçimi -->
                            <div class="mb-3 row">
                                <label class="form-label">Ürün Seç</label>
                                <select name="urun_id" id="default" class="form-control">
                                    @foreach ($urunler as $urun)
                                        <option value="{{ $urun->id }}"
                                            {{ old('urun_id', $resim->urun_id) == $urun->id ? 'selected' : '' }}>
                                            {{ $urun->baslik }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Yeni medya yükleme alanı (birden fazla dosya seçilebilir) -->
                            <div class="mb-3 row">
                                <label for="resim" class="form-label">Medya Yükle/Düzenle (537x545)</label>
                                <div class="col-sm-9">
                                    <input type="file" name="resim[]" id="resim" class="form-control" multiple>
                                </div>
                            </div>

                            <!-- Güncel medya gösterme alanı -->
                            <div class="mb-3 row">
                                <label class="form-label">Güncel Medya</label>
                                <div class="col-sm-9 d-flex align-items-center">
                                    @if (in_array(pathinfo($resim->medya_url, PATHINFO_EXTENSION), ['mp4', 'mov', 'avi']))
                                        <!-- Video dosyası ise video göster -->
                                        <video width="320" height="240" controls>
                                            <source src="{{ asset($resim->medya_url) }}"
                                                type="video/{{ pathinfo($resim->medya_url, PATHINFO_EXTENSION) }}">
                                            Tarayıcınız video elementini desteklemiyor.
                                        </video>
                                    @else
                                        <!-- Resim dosyası ise resim göster -->
                                        <img id="resimGoster" src="{{ asset($resim->medya_url) }}" alt="Mevcut Medya"
                                            class="image" width="200">
                                    @endif
                                </div>
                            </div>

                            <!-- Güncelleme butonu -->
                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-outline-primary btn-lg btn-custom">Medya
                                    Güncelle</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
