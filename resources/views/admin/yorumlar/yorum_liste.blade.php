@extends('admin.admin_master')

@php
    $seo = App\Models\Seo::find(2);
@endphp

@section('title')
    {{ $seo->site_adi }} | Yorum Liste
@endsection

@section('admin')
    <div class="container-xxl">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h4 class="card-title">Tüm Yorumların Listesi</h4>
                            </div>
                            @if (Auth::user()->can('yorum.ekle'))
                                <div class="col text-end">
                                    <a href="{{ route('yorum.ekle') }}" class="btn btn-outline-primary btn-custom">Yorum
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
                                        <th>Adı</th>
                                        <th>Metin</th>
                                        <th>Durum</th>
                                        @if (Auth::user()->can('yorum.duzenle') || Auth::user()->can('yorum.sil'))
                                            <th>İşlem</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($yorumliste->reverse() as $index => $yorumlar)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td> {{ $yorumlar->adi }} </td>
                                            <td> {{ $yorumlar->metin }} </td>
                                            <td>
                                                <div class="form-check form-switch">
                                                    <input type="checkbox" class="yorumlar form-check-input"
                                                        data-id='{{ $yorumlar->id }}' id="urun-{{ $yorumlar->id }}"
                                                        {{ $yorumlar->durum ? 'checked' : '' }}
                                                        onchange="updateLabel(this)">
                                                    <label class="form-check-label" for="urun-{{ $yorumlar->id }}"
                                                        id="label-{{ $yorumlar->id }}">
                                                        {{ $yorumlar->durum ? 'Aktif' : 'Pasif' }}
                                                    </label>
                                                </div>
                                            </td>


                                            <td>
                                                @if (Auth::user()->can('yorum.duzenle'))
                                                    <a href="{{ route('yorum.duzenle', $yorumlar->id) }}"
                                                        class="btn btn-info sm m-2" title="Düzenle">
                                                        <i class="fas fa-edit"></i></a>
                                                @endif
                                                @if (Auth::user()->can('yorum.sil'))
                                                    <!-- Silme Butonu -->
                                                    <button type="button" class="btn btn-danger sm m-2"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#deleteModal{{ $yorumlar->id }}" title="Sil">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                @endif
                                            </td>
                                        </tr>
                                        @if (Auth::user()->can('yorum.sil'))
                                            <!-- Modal -->
                                            <div class="modal fade" id="deleteModal{{ $yorumlar->id }}" tabindex="-1"
                                                aria-labelledby="deleteModalLabel{{ $yorumlar->id }}" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-danger text-white">
                                                            <h5 class="modal-title"
                                                                id="deleteModalLabel{{ $yorumlar->id }}">
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
                                                            <form action="{{ route('yorum.sil', $yorumlar->id) }}"
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
