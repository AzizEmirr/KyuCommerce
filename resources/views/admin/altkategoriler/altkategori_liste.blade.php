@extends('admin.admin_master')

@php
    $seo = App\Models\Seo::find(2);
@endphp

@section('title')
    {{ $seo->site_adi }} | Alt Kategori Liste
@endsection

@section('admin')
    <div class="container-xxl">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h4 class="card-title">Tüm Alt Kategorilerin Listesi</h4>
                            </div>
                            @if (Auth::user()->can('altkategori.ekle'))
                                <div class="col text-end">
                                    <a href="{{ route('altkategori.ekle') }}" class="btn btn-outline-primary btn-custom">Alt
                                        Kategori Ekle</a>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div class="table-responsive">
                            <table class="table datatable" id="datatable_1">
                                <thead class="table-light">
                                    <tr>
                                        <th>Resim</th>
                                        <th>Kategori Adı</th>
                                        <th>Alt Kategori Adı</th>
                                        <th>Alt Kategori Numarası</th>
                                        <th>Durum</th>
                                        <th>İşlem</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($altkategoriler as $altkategori)
                                        <tr>
                                            <td>
                                                <img src="{{ !empty($altkategori->resim) ? url($altkategori->resim) : url('uploads/altkategoriler/resim-yok.jpg') }}"
                                                    alt="Resim yolu bulunamadı"
                                                    style="max-inline-size: 150px;  max-block-size: 150px; object-fit: cover;">
                                            </td>
                                            <td> {{ $altkategori['iliskikategori']['kategori_adi'] }} </td>
                                            <td>{{ $altkategori->altkategori_adi }}</td>
                                            <td>{{ $altkategori->sirano }}</td>
                                            <td>
                                                <div class="form-check form-switch">
                                                    <input type="checkbox" class="altkategori form-check-input"
                                                        data-id='{{ $altkategori->id }}' id="urun-{{ $altkategori->id }}"
                                                        {{ $altkategori->durum ? 'checked' : '' }}
                                                        onchange="updateLabel(this)">
                                                    <label class="form-check-label" for="urun-{{ $altkategori->id }}"
                                                        id="label-{{ $altkategori->id }}">
                                                        {{ $altkategori->durum ? 'Aktif' : 'Pasif' }}
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                @if (Auth::user()->can('altkategori.duzenle'))
                                                    <a href="{{ route('altkategori.duzenle', $altkategori->id) }}"
                                                        class="btn btn-info sm m-2" title="Düzenle">
                                                        <i class="fas fa-edit"></i></a>
                                                @endif
                                                @if (Auth::user()->can('altkategori.sil'))
                                                    <!-- Silme Butonu -->
                                                    <button type="button" class="btn btn-danger sm m-2"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#deleteModal{{ $altkategori->id }}" title="Sil">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                @endif
                                            </td>
                                        </tr>
                                        @if (Auth::user()->can('altkategori.sil'))
                                            <!-- Modal -->
                                            <div class="modal fade" id="deleteModal{{ $altkategori->id }}" tabindex="-1"
                                                aria-labelledby="deleteModalLabel{{ $altkategori->id }}"
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-danger text-white">
                                                            <h5 class="modal-title"
                                                                id="deleteModalLabel{{ $altkategori->id }}">
                                                                <i class="fas fa-exclamation-triangle"></i> Dikkat!
                                                            </h5>
                                                            <button type="button" class="btn-close btn-close-white"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body text-center">
                                                            <h5 class="text-danger">Bu öğeyi silmek istediğinizden emin
                                                                misiniz?
                                                            </h5>
                                                            <p class="text-muted">Bu işlem geri alınamaz.</p>
                                                            <div class="my-3">
                                                                <span style="font-size: 50px;">⚠️</span>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer justify-content-center">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Vazgeç</button>
                                                            <form action="{{ route('altkategori.sil', $altkategori->id) }}"
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
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
