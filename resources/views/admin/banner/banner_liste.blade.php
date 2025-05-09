@extends('admin.admin_master')

@php
$seo = App\Models\Seo::find(2);
@endphp

@section('title'){{$seo->site_adi}} | Banner Liste @endsection

@section('admin')
    <div class="container-xxl">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h4 class="card-title">Tüm Bannerların Listesi</h4>
                            </div>
                            <div class="col text-end">
								@if (Auth::user()->can('banner.ekle'))
                                <a href="{{ route('banner.ekle') }}" class="btn btn-outline-primary btn-custom">Banner Ekle</a>
								@endif
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div class="table-responsive">
                            <table class="table datatable" id="datatable_1">
                                <thead class="table-light">
                                    <tr>
                                        <th>Sıra</th>
                                        <th>Resim</th>
                                        <th>Başlık</th>
                                        <th>Sıra Numarası</th>
                                        <th>Durum</th>
                                        @if (Auth::user()->can('banner.duzenle') || Auth::user()->can('banner.sil'))
                                            <th>İşlem</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($bannerliste as $index => $banner)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                <img src="{{ !empty($banner->resim) ? url($banner->resim) : url('uploads/banner/resim-yok.jpg') }}"
                                                    alt="Resim yolu bulunamadı"
                                                    style="max-inline-size: 150px;  max-block-size: 150px; object-fit: cover;">
                                            </td>
                                            <td>{{ $banner->baslik }}</td>
                                            <td>{{ $banner->sirano }}</td>
                                            <td>
                                                <div class="form-check form-switch">
                                                    <input type="checkbox" class="banner form-check-input"
                                                        data-id='{{ $banner->id }}'
                                                        id="urun-{{ $banner->id }}"
                                                        {{ $banner->durum ? 'checked' : '' }}
                                                        onchange="updateLabel(this)">
                                                    <label class="form-check-label" for="urun-{{ $banner->id }}"
                                                        id="label-{{ $banner->id }}">
                                                        {{ $banner->durum ? 'Aktif' : 'Pasif' }}
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                @if (Auth::user()->can('banner.duzenle'))
                                                    <a href="{{ route('banner.duzenle', $banner->id) }}"
                                                        class="btn btn-info sm m-2" title="Düzenle">
                                                        <i class="fas fa-edit"></i></a>
                                                @endif
                                                @if (Auth::user()->can('banner.sil'))
                                                    <!-- Silme Butonu -->
                                                    <button type="button" class="btn btn-danger sm m-2"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#deleteModal{{ $banner->id }}" title="Sil">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                @endif
                                            </td>
                                        </tr>
                                        @if (Auth::user()->can('banner.sil'))
                                            <!-- Modal -->
                                            <div class="modal fade" id="deleteModal{{ $banner->id }}" tabindex="-1"
                                                aria-labelledby="deleteModalLabel{{ $banner->id }}" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-danger text-white">
                                                            <h5 class="modal-title"
                                                                id="deleteModalLabel{{ $banner->id }}">
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
                                                            <form action="{{ route('banner.sil', $banner->id) }}"
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
