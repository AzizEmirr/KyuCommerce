@extends('admin.admin_master')

@php
$seo = App\Models\Seo::find(2);
@endphp

@section('title'){{$seo->site_adi}} | Rol Yetki Düzenle | {{ $rol->name }} @endsection

@section('admin')
    <div class="container-xxl">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h4 class="card-title text-center text-primary font-weight-bold">
                                    <i class="fas fa-edit"></i> Rol Yetkisini Düzenle:
                                    <span class="text-dark">
                                        "{{ $rol->name }}"
                                    </span>
                                </h4>
                                
                            </div>
                        </div>
                    </div>       
                    <div class="card-body pt-0">
                        <form id="Form" method="post" action="{{ route('rol.yetki.guncelle', $rol->id) }} ">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Rol Seç</label>
                                <select class="form-select" name="name" required>
                                    <option value="{{ $rol->name }}">{{ $rol->name }}</option>
                                </select>
                            </div>
                            <div class="card mb-3">
                                <div class="card-header">
                                    <div class="d-flex align-items-center">
                                        <div class="form-check me-2">
                                            <input class="form-check-input" type="checkbox" id="selectAllPermissions"
                                                onclick="toggleAllPermissions()">
                                            <label class="form-check-label" for="selectAllPermissions">
                                                Tam Yetki
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            @foreach ($izin_gruplar as $grup)
                                @php
                                    $yetkigrup = App\Models\User::YetkiGruplar($grup->grup_adi);
                                @endphp
                                <div class="card mb-3">
                                    <div class="card-header">
                                        <div class="d-flex align-items-center">
                                            <div class="form-check me-2">
                                                <input class="form-check-input" type="checkbox"
                                                    id="selectAll{{ $grup->grup_adi }}"
                                                    onclick="toggleGroup('{{ $grup->grup_adi }}')"
                                                    {{ App\Models\User::RolYetkileri($rol, $yetkigrup) ? 'checked' : '' }}>
                                                <label class="form-check-label" for="selectAll{{ $grup->grup_adi }}">
                                                    {{ ucwords(str_replace('.', ' ', $grup->grup_adi)) }}
                                                </label>
                                            </div>
                                            <small id="groupInfo{{ $grup->grup_adi }}" class="text-muted ms-2"></small>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            @foreach ($yetkigrup as $yetki)
                                                <div class="col-md-4 col-lg-3 mb-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input yetki-checkbox" type="checkbox"
                                                            name="yetki[]"
                                                            {{ $rol->hasPermissionTo($yetki->name) ? 'checked' : '' }}
                                                            value="{{ $yetki->id }}" id="flexCheck{{ $yetki->id }}"
                                                            data-group="{{ $grup->grup_adi }}"
                                                            onchange="checkGroupSelection('{{ $grup->grup_adi }}')">
                                                        <label class="form-check-label" for="flexCheck{{ $yetki->id }}">
                                                            {{ ucwords(str_replace('.', ' ', $yetki->name)) }}
                                                        </label>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            
                            <script>
                                function toggleAllPermissions() {
                                    const isChecked = document.getElementById('selectAllPermissions').checked;
                                    document.querySelectorAll('.yetki-checkbox').forEach(checkbox => {
                                        checkbox.checked = isChecked;
                                    });
                            
                                    document.querySelectorAll('.form-check-input[id^="selectAll"]').forEach(groupCheckbox => {
                                        groupCheckbox.checked = isChecked;
                                    });
                                }
                            
                                function toggleGroup(groupName) {
                                    const isChecked = document.getElementById(`selectAll${groupName}`).checked;
                                    document.querySelectorAll(`.yetki-checkbox[data-group="${groupName}"]`).forEach(checkbox => {
                                        checkbox.checked = isChecked;
                                    });
                            
                                    checkAllGroups();
                                }
                            
                                function checkGroupSelection(groupName) {
                                    const checkboxes = document.querySelectorAll(`.yetki-checkbox[data-group="${groupName}"]`);
                                    const groupCheckbox = document.getElementById(`selectAll${groupName}`);
                                    const allChecked = Array.from(checkboxes).every(checkbox => checkbox.checked);
                                    groupCheckbox.checked = allChecked;
                            
                                    checkAllGroups();
                                }
                            
                                function checkAllGroups() {
                                    const allCheckboxes = document.querySelectorAll('.yetki-checkbox');
                                    const allChecked = Array.from(allCheckboxes).every(checkbox => checkbox.checked);
                                    document.getElementById('selectAllPermissions').checked = allChecked;
                                }
                            
                                document.addEventListener('DOMContentLoaded', () => {
                                    checkAllGroups();
                                });
                            </script>
                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-outline-primary btn-lg btn-custom">Role Yetki
                                    Ekle</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
