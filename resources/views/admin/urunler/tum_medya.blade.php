@extends('admin.admin_master')

@php
    $seo = App\Models\Seo::find(2);
@endphp

@section('title')
    {{ $seo->site_adi }} | Çoklu Resim Listesi
@endsection

@section('admin')
    <div class="container-xxl">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h4 class="card-title"> Çoklu Resim Listesi</h4>
                            </div>
                            <div class="col text-end">
                                @if (Auth::user()->can('coklu.ekle') || Auth::user()->can('coklu.ekle'))
                                    <a href="{{ route('medya.ekle') }}" class="btn btn-outline-primary btn-custom">Medya
                                        Ekle</a>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div class="table-responsive">
                            <table class="table datatable" id="datatable_1">
                                <thead class="table-light">
                                    <tr>
                                        <th>Resim</th>
                                        <th>Ürün Adı</th>
                                        <th>Durum</th>
                                        @if (Auth::user()->can('coklu.duzenle') || Auth::user()->can('coklu.sil'))
                                            <th>İşlem</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tummedya as $tummedyalar)
                                        <tr>
                                            <td>
                                                @php
                                                    $medyaUrl = !empty($tummedyalar->medya_url)
                                                        ? url($tummedyalar->medya_url)
                                                        : url('uploads/urunler/resim-yok.jpg');
                                                    $isVideo = in_array(pathinfo($medyaUrl, PATHINFO_EXTENSION), [
                                                        'mp4',
                                                        'webm',
                                                        'ogg',
                                                    ]);
                                                @endphp

                                                @if ($isVideo)
                                                    <video width="150" height="150" controls style="object-fit: cover;"
                                                        poster="{{ url('uploads/urunler/video-poster.jpg') }}">
                                                        <source src="{{ $medyaUrl }}"
                                                            type="video/{{ pathinfo($medyaUrl, PATHINFO_EXTENSION) }}">
                                                        Tarayıcınız video etiketini desteklemiyor.
                                                    </video>
                                                @else
                                                    <img src="{{ $medyaUrl }}" alt="Resim yolu bulunamadı"
                                                        style="max-inline-size: 150px; max-block-size: 150px; object-fit: cover;">
                                                @endif

                                            </td>
                                            <td>{{ $tummedyalar->urun->baslik }}</td>

                                            <td>
                                                <div class="form-check form-switch">
                                                    <input type="checkbox" class="medya form-check-input"
                                                        data-id='{{ $tummedyalar->id }}' id="urun-{{ $tummedyalar->id }}"
                                                        {{ $tummedyalar->durum ? 'checked' : '' }}
                                                        onchange="updateLabel(this)">
                                                    <label class="form-check-label" for="urun-{{ $tummedyalar->id }}"
                                                        id="label-{{ $tummedyalar->id }}">
                                                        {{ $tummedyalar->durum ? 'Aktif' : 'Pasif' }}
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                @if (Auth::user()->can('coklu.duzenle'))
                                                    <a href="{{ route('medya.duzenle', $tummedyalar->id) }}"
                                                        class="btn btn-info sm m-2" title="Düzenle">
                                                        <i class="fas fa-edit"></i></a>
                                                @endif
                                                @if (Auth::user()->can('coklu.sil'))
                                                    <!-- Silme Butonu -->
                                                    <button type="button" class="btn btn-danger sm m-2"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#deleteModal{{ $tummedyalar->id }}" title="Sil">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                @endif
                                            </td>
                                        </tr>
                                        @if (Auth::user()->can('coklu.sil'))
                                            <!-- Modal -->
                                            <div class="modal fade" id="deleteModal{{ $tummedyalar->id }}" tabindex="-1"
                                                aria-labelledby="deleteModalLabel{{ $tummedyalar->id }}"
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-danger text-white">
                                                            <h5 class="modal-title"
                                                                id="deleteModalLabel{{ $tummedyalar->id }}">
                                                                <i class="fas fa-exclamation-triangle"></i> Dikkat!
                                                            </h5>
                                                            <button type="button" class="btn-close btn-close-white"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body text-center">
                                                            <h5 class="text-danger">Bu öğeyi silmek istediğinizden emin
                                                                misiniz?</h5>
                                                            <p class="text-muted">Bu işlem geri alınamaz.</p>
                                                            <div class="my-3">
                                                                <span style="font-size: 50px;">⚠️</span>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer justify-content-center">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Vazgeç</button>
                                                            <form action="{{ route('medya.sil', $tummedyalar->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger">Evet,
                                                                    Sil</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
