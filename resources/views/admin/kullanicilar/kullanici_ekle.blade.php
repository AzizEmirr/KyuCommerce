@extends('admin.admin_master')

@php
$seo = App\Models\Seo::find(2);
@endphp

@section('title'){{$seo->site_adi}} | Kullanıcı Ekle @endsection

@section('admin')
    <div class="container-xxl">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h4 class="card-title">Kullanıcı Ekle</h4>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <form id="Form" method="post" action="{{ route('kullanici.ekle.form') }}">
                            @csrf

                            <div class="mb-3">
                                <label for="name" class="form-label">Kullanıcı Adı</label>
                                <input type="text" name="name"
                                    class="required form-control {{ $errors->has('name') ? 'is-invalid' : '' }} {{ old('name') ? 'is-valid' : '' }}"
                                    placeholder="Lütfen bir kullanıcı adı giriniz." value="{{ old('name') }}">
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">E-Mail</label>
                                <input type="text" name="email"
                                    class="required form-control {{ $errors->has('email') ? 'is-invalid' : '' }} {{ old('email') ? 'is-valid' : '' }}"
                                    placeholder="Lütfen bir isim giriniz." value="{{ old('email') }}">
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Şifre</label>
                                <input type="password" name="password" class="required form-control"
                                    placeholder="Lütfen bir şifre giriniz.">
                                @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Rol Seç</label>
                                <select class="form-select" id="default" name="rol" required>
                                    <option value="" selected disabled>Rol Seç</option>
                                    @foreach ($roller as $rol)
                                        <option value="{{ $rol->id }}">{{ $rol->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('rol')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div style="margin-top: 40px" class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-outline-primary">Kullanıcı
                                    Ekle</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
