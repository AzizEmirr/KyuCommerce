@extends('admin.admin_master')

@php
    $seo = App\Models\Seo::find(2);
@endphp

@section('title')
    {{ $seo->site_adi }} | Site Renklerini Düzenle
@endsection

@section('admin')
<div class="container-xxl">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h4 class="card-title">Renk Paletini Düzenle</h4>
                        </div>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <form method="post" action="{{ route('renk.guncelle') }}" class="p-4 border rounded shadow-sm" style="background-color: #222; color: #fff;">
                        @csrf
                        <input type="hidden" name="id" value="{{ $renkpaleti->id }}">
                    
                        <!-- Renk Kodu -->
                        <div class="mb-4">
                            <label for="renk_kodu" class="form-label">Renk Kodu</label>
                            <input type="text" name="renk_kodu" id="renk_kodu" class="form-control mb-2" value="{{ $renkpaleti->renk_kodu }}" required placeholder="Renk Kodunu Girin (Örneğin: #FF5733)">
                        </div>
                    
                        <!-- Renk Seçim Alanı -->
                        <div class="mb-4">
                            <label class="form-label">Renk Seçin</label>
                            <div class="d-flex flex-wrap justify-content-start mb-3">
                                <!-- 16 Renk Seçeneği -->
                                <button type="button" class="color-option" style="background-color: #FF5733;" data-color="#FF5733"></button>
                                <button type="button" class="color-option" style="background-color: #33FF57;" data-color="#33FF57"></button>
                                <button type="button" class="color-option" style="background-color: #5733FF;" data-color="#5733FF"></button>
                                <button type="button" class="color-option" style="background-color: #F1C40F;" data-color="#F1C40F"></button>
                                <button type="button" class="color-option" style="background-color: #9B59B6;" data-color="#9B59B6"></button>
                                <button type="button" class="color-option" style="background-color: #1ABC9C;" data-color="#1ABC9C"></button>
                                <button type="button" class="color-option" style="background-color: #E74C3C;" data-color="#E74C3C"></button>
                                <button type="button" class="color-option" style="background-color: #16A085;" data-color="#16A085"></button>
                                <button type="button" class="color-option" style="background-color: #F39C12;" data-color="#F39C12"></button>
                                <button type="button" class="color-option" style="background-color: #D35400;" data-color="#D35400"></button>
                                <button type="button" class="color-option" style="background-color: #C0392B;" data-color="#C0392B"></button>
                                <button type="button" class="color-option" style="background-color: #2ECC71;" data-color="#2ECC71"></button>
                                <button type="button" class="color-option" style="background-color: #2980B9;" data-color="#2980B9"></button>
                                <button type="button" class="color-option" style="background-color: #8E44AD;" data-color="#8E44AD"></button>
                                <button type="button" class="color-option" style="background-color: #34495E;" data-color="#34495E"></button>
                                <button type="button" class="color-option" style="background-color: #7F8C8D;" data-color="#7F8C8D"></button>
                            </div>
                    
                            <!-- Özel Renk Seçimi ve Önizleme -->
                            <div class="d-flex align-items-center">
                                <label for="custom-color" class="form-label me-3">Özel Renk Seçin (Hex Kodu)</label>
                                <input type="color" id="custom-color" class="form-control mb-2" value="{{ $renkpaleti->renk_kodu }}" onchange="updateColorPreview(this.value)" style="width: 50px;">
                            </div>
                        </div>
                    
                        <!-- Renk Önizleme -->
                        <div class="mb-4">
                            <label class="form-label">Seçilen Renk</label>
                            <div id="color-preview" class="p-4 mb-2" style="background-color: {{ $renkpaleti->renk_kodu }}; height: 100px; border-radius: 5px;"></div>
                        </div>
                    
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-outline-light btn-lg">Güncelle</button>
                        </div>
                    </form>
                    
                    <script>
                        // Renk seçimini güncelleme işlevi
                        const renkKoduInput = document.getElementById('renk_kodu');
                        const colorPreview = document.getElementById('color-preview');
                        const colorButtons = document.querySelectorAll('.color-option');
                        const customColorInput = document.getElementById('custom-color');
                    
                        colorButtons.forEach(button => {
                            button.addEventListener('click', function() {
                                const selectedColor = this.getAttribute('data-color');
                                renkKoduInput.value = selectedColor;
                                colorPreview.style.backgroundColor = selectedColor;
                            });
                        });
                    
                        // Özel renk seçimi ile önizlemeyi güncelleme
                        function updateColorPreview(color) {
                            renkKoduInput.value = color;
                            colorPreview.style.backgroundColor = color;
                        }
                    </script>
                    
                    <style>
                        .color-option {
                            width: 40px;
                            height: 40px;
                            border: 2px solid #fff;
                            border-radius: 50%;
                            cursor: pointer;
                            margin: 5px;
                            transition: transform 0.3s ease;
                        }
                    
                        .color-option:hover {
                            opacity: 0.8;
                            transform: scale(1.1);
                        }
                    </style>
                    

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
