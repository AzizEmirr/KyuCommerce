@extends('admin.admin_master')

@php
$seo = App\Models\Seo::find(2);
@endphp

@section('title'){{$seo->site_adi}} | Profil Düzenle | {{ Auth::user()->name }} @endsection
@section('author'){{$seo->author}}@endsection
@section('description'){{$seo->description}}@endsection

@section('admin')
    <div class="container-xxl">

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-4 align-self-center mb-3 mb-lg-0">
                                <div class="d-flex align-items-center flex-row flex-wrap">
                                    <div class="position-relative me-3">
                                        <div style="inline-size: 120px;  block-size: 120px; overflow: hidden;">
                                            <img src="{{ !empty(Auth::user()->resim) ? url('uploads/admin/' . Auth::user()->resim) : url('uploads/admin/resim-yok.png') }}"
                                                alt="UserAvatar" height="120" width="120" class="rounded-circle"
                                                style="object-fit: cover;">
                                        </div>
                                        <a href="#"
                                            class="thumb-md justify-content-center d-flex align-items-center bg-primary text-white rounded-circle position-absolute end-0 bottom-0 border border-3 border-card-bg">
                                            <i class="fas fa-camera"></i>
                                        </a>
                                    </div>
                                    <div class="">
                                        <h5 class="fw-semibold fs-22 mb-1">{{ Auth::user()->name }}</h5>
                                        <p class="mb-0 text-muted fw-medium">{{ ucfirst(strtolower(Auth::user()->rol)) }}</p>
                                    </div>
                                </div>
                            </div><!--end col-->

                            <div class="col-lg-4 ms-auto align-self-center">
                                <div class="d-flex justify-content-center">
                                    <div class="border-dashed rounded border-theme-color p-2 me-2 flex-grow-1 flex-basis-0">
                                        <h5 class="fw-semibold fs-22 mb-1">0</h5>
                                        <p class="text-muted mb-0 fw-medium">Proje</p>
                                    </div>
                                    <div class="border-dashed rounded border-theme-color p-2 me-2 flex-grow-1 flex-basis-0">
                                        <h5 class="fw-semibold fs-22 mb-1">0%</h5>
                                        <p class="text-muted mb-0 fw-medium">Başarı Oranı</p>
                                    </div>
                                    <div class="border-dashed rounded border-theme-color p-2 me-2 flex-grow-1 flex-basis-0">
                                        <h5 class="fw-semibold fs-22 mb-1">$0</h5>
                                        <p class="text-muted mb-0 fw-medium">kazanç</p>
                                    </div>
                                </div>
                            </div><!--end col-->
                        </div><!--end row-->
                    </div><!--end card-body-->
                </div><!--end card-->
            </div> <!--end col-->
        </div><!--end row-->

        <div class="row justify-content-center">
            <div class="col-md-8">
                <ul class="nav nav-tabs mb-3" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link fw-medium active" data-bs-toggle="tab" href="#settings" role="tab"
                            aria-selected="true">Settings</a>
                    </li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane active" id="settings" role="tabpanel">
                        @include('profile.partials.update-profile-information-form')
                        @include('profile.partials.update-password-form')
                        @include('profile.partials.resim')
                        @include('profile.partials.delete-user-form')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
