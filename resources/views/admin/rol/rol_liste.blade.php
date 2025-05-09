@extends('admin.admin_master')

@php
    $seo = App\Models\Seo::find(2);
@endphp

@section('title')
    {{ $seo->site_adi }} | Rol Liste
@endsection

@section('admin')
    <div class="container-xxl">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h4 class="card-title">Tüm Rollerin Listesi</h4>
                            </div>
                            @if (Auth::user()->can('rol.ekle'))
                                <div class="col text-end">
                                    <a href="{{ route('rol.ekle') }}" class="btn btn-outline-primary btn-custom">Rol Ekle</a>
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
                                        <th>Rol Adı</th>
                                        <th>Yetkiler</th>
                                        @if (Auth::user()->can('rol.yetki.ekle') || Auth::user()->can('rol.duzenle' || Auth::user()->can('rol.sil')))
                                            <th>İşlem</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($rol->reverse() as $index => $roller)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $roller->name }}</td>
                                            <td>
                                                @foreach ($roller->permissions as $yetkiler)
                                                    <span class="badge rounded-pill bg-primary text-white me-1 mb-1"
                                                        style="font-size: 0.70rem;">
                                                        {{ ucwords(str_replace('.', ' ', $yetkiler->name)) }}
                                                    </span>
                                                @endforeach
                                            </td>


                                            <td>
                                                @if (Auth::user()->can('rol.yetki.duzenle'))
                                                    <a href="{{ route('rol.yetki.duzenle', $roller->id) }}"
                                                        class="btn btn-success sm m-2" title="Ekle">
                                                        <i class="fas fa-plus"></i>
                                                    </a>
                                                @endif
                                                @if (Auth::user()->can('rol.duzenle'))
                                                    <a href="{{ route('rol.duzenle', $roller->id) }}"
                                                        class="btn btn-info sm m-2" title="Düzenle">
                                                        <i class="fas fa-edit"></i></a>
                                                @endif
                                                @if (Auth::user()->can('rol.sil'))
                                                    <!-- Silme Butonu -->
                                                    <button type="button" class="btn btn-danger sm m-2"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#deleteModal{{ $roller->id }}" title="Sil">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                @endif
                                            </td>
                                        </tr>
                                        @if (Auth::user()->can('rol.sil'))
                                            <!-- Modal -->
                                            <div class="modal fade" id="deleteModal{{ $roller->id }}" tabindex="-1"
                                                aria-labelledby="deleteModalLabel{{ $roller->id }}" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-danger text-white">
                                                            <h5 class="modal-title"
                                                                id="deleteModalLabel{{ $roller->id }}">
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
                                                            <form action="{{ route('rol.sil', $roller->id) }}"
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
