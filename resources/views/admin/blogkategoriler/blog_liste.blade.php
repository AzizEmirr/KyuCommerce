@extends('admin.admin_master')

@php
    $seo = App\Models\Seo::find(2);
@endphp

@section('title')
    {{ $seo->site_adi }} | Blog Kategori Liste
@endsection

@section('admin')
    <div class="container-xxl">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h4 class="card-title">Tüm Blog Kategorilerinin Listesi</h4>
                            </div>
                            @if (Auth::user()->can('blogkategori.ekle'))
                                <div class="col text-end">
                                    <a href="{{ route('blog.kategori.ekle') }}"
                                        class="btn btn-outline-primary btn-custom">Blog
                                        Kategorisi Ekle</a>
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
                                        <th>Kategori Numarası</th>
                                        <th>Kategori Adı</th>
                                        <th>Durum</th>
                                        @if (Auth::user()->can('blogkategori.duzenle') || Auth::user()->can('blogkategori.sil'))
                                            <th>İşlem</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($blogliste as $index => $bloglar)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $bloglar->sirano }} </td>
                                            <td> {{ $bloglar->kategori_adi }} </td>
                                            <td>
                                                <div class="form-check form-switch">
                                                    <input type="checkbox" class="blogkategoriler form-check-input"
                                                        data-id='{{ $bloglar->id }}' id="urun-{{ $bloglar->id }}"
                                                        {{ $bloglar->durum ? 'checked' : '' }} onchange="updateLabel(this)">
                                                    <label class="form-check-label" for="urun-{{ $bloglar->id }}"
                                                        id="label-{{ $bloglar->id }}">
                                                        {{ $bloglar->durum ? 'Aktif' : 'Pasif' }}
                                                    </label>
                                                </div>
                                            </td>

                                            <td>
                                                @if (Auth::user()->can('blogkategori.duzenle'))
                                                    <a href="{{ route('blog.kategori.duzenle', $bloglar->id) }}"
                                                        class="btn btn-info sm m-2" title="Düzenle">
                                                        <i class="fas fa-edit"></i></a>
                                                @endif
                                                @if (Auth::user()->can('blogkategori.sil'))
                                                    <!-- Silme Butonu -->
                                                    <button type="button" class="btn btn-danger sm m-2"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#deleteModal{{ $bloglar->id }}" title="Sil">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                @endif
                                            </td>
                                        </tr>
                                        @if (Auth::user()->can('blogkategori.sil'))
                                            <!-- Modal -->
                                            <div class="modal fade" id="deleteModal{{ $bloglar->id }}" tabindex="-1"
                                                aria-labelledby="deleteModalLabel{{ $bloglar->id }}" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-danger text-white">
                                                            <h5 class="modal-title"
                                                                id="deleteModalLabel{{ $bloglar->id }}">
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
                                                            <form action="{{ route('blog.kategori.sil', $bloglar->id) }}"
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
