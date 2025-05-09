@extends('admin.admin_master')

@php
$seo = App\Models\Seo::find(2);
@endphp

@section('title'){{$seo->site_adi}} | Rol Düzenle | {{ $rol->name }} @endsection

@section('admin')
    <div class="container-xxl">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h4 class="card-title text-center text-primary font-weight-bold">
                                    <i class="fas fa-edit"></i> Rolü Düzenle:
                                    <span class="text-dark">
                                        "{{ $rol->name }}"
                                    </span>
                                </h4>
                                <hr class="mb-4">
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <form id="Form" method="post" action="{{ route('rol.guncelle.form')}}">
                            @csrf
                        
                            <input type="hidden" name="id" value="{{ $rol->id }}">
                        
                            <div class="mb-3">
                                <label for="name" class="form-label">Rol Adı</label>
                                <input type="text" name="name"
                                    class="required form-control {{ $errors->has('name') ? 'is-invalid' : '' }} {{ old('name') ? 'is-valid' : '' }}"
                                    id="name" placeholder="Lütfen bir rol ismi giriniz."
                                    value="{{ old('name', $rol->name) }}">
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        
                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-outline-primary btn-lg btn-custom">Rol Güncelle</button>
                            </div>
                        </form>                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
