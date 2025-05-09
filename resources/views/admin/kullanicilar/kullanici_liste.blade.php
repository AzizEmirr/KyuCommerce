@extends('admin.admin_master')

@php
    $seo = App\Models\Seo::find(2);
@endphp

@section('title')
    {{ $seo->site_adi }} | Kullanıcı Liste
@endsection

@section('admin')
    <div class="container-xxl">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h4 class="card-title">Tüm Kullanıcıların Listesi</h4>
                            </div>
                            @if (Auth::user()->can('kullanici.ekle'))
                                <div class="col text-end">
                                    <a href="{{ route('kullanici.ekle') }}"
                                        class="btn btn-outline-primary btn-custom">Kullanıcı
                                        Ekle</a>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div class="table-responsive">
                            <table class="table datatable" id="datatable_1">
                                <thead class="table-light">
                                    <tr>
                                        <th>Sıra</th>
                                        <th>Resim</th>
                                        <th>Adı</th>
                                        <th>E-posta</th>
                                        <th>Rol</th>
                                        @if (Auth::user()->can('kullanici.duzenle') || Auth::user()->can('kullanici.sil'))
                                            <th>İşlem</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($kullanici_liste->reverse() as $index => $kullanicilar)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                <div style="width: 100px; height: 100px; overflow: hidden;">
                                                    <img src="{{ !empty($kullanicilar->resim) ? url('uploads/admin/' . $kullanicilar->resim) : url('uploads/kullanicilar/resim-yok.jpg') }}"
                                                        alt="Resim yolu bulunamadı"
                                                        style="width: 100%; height: 100%; object-fit: cover;">
                                                </div>
                                            </td>

                                            <td>{{ $kullanicilar->name }}</td>
                                            <td>{{ $kullanicilar->email }}</td>
                                            @foreach ($kullanicilar->roles as $rol)
                                                <td>{{ $rol->name }}</td>
                                            @endforeach

                                            <td>
                                                @if (Auth::user()->can('kullanici.duzenle'))
                                                    <a href="{{ route('kullanici.duzenle', $kullanicilar->id) }}"
                                                        class="btn btn-info sm m-2" title="Düzenle">
                                                        <i class="fas fa-edit"></i></a>
                                                @endif
                                                @if (Auth::user()->can('kullanici.sil'))
                                                    <!-- Silme Butonu -->
                                                    <button type="button" class="btn btn-danger sm m-2"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#deleteModal{{ $kullanicilar->id }}" title="Sil">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                @endif
                                            </td>
                                        </tr>
                                        @if (Auth::user()->can('kullanici.sil'))
                                            <!-- Modal -->
                                            <div class="modal fade" id="deleteModal{{ $kullanicilar->id }}" tabindex="-1"
                                                aria-labelledby="deleteModalLabel{{ $kullanicilar->id }}"
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-danger text-white">
                                                            <h5 class="modal-title"
                                                                id="deleteModalLabel{{ $kullanicilar->id }}">
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
                                                            <form action="{{ route('kullanici.sil', $kullanicilar->id) }}"
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
