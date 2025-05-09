<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kyu Software Ödeme Formu</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Styles (isteğe bağlı) -->
    <style>
        body {
            background-color: #f8f9fa;
        }
        .form-container {
            max-width: 500px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="form-container">
            <h2 class="text-center mb-4">Ödeme Formu</h2>
            <form action="{{ route('odeme.sonuc') }}" method="POST" class="needs-validation" novalidate>
                {{ csrf_field() }}
                
                <div class="mb-3">
                    <label for="adsoyad" class="form-label">Ad Soyad</label>
                    <input type="text" class="form-control" id="adsoyad" name="adsoyad" placeholder="Ad Soyad" required>
                    <div class="invalid-feedback">
                        Ad Soyad Alanı Zorunludur!
                    </div>
                </div>
                
                <div class="mb-3">
                    <label for="telefon" class="form-label">Telefon</label>
                    <input type="tel" class="form-control" id="telefon" name="telefon" placeholder="Telefon" pattern="^(\+90|0)?5\d{9}$" required>
                    <div class="invalid-feedback">
                        Lütfen geçerli bir Türkiye telefon numarası giriniz (örn: +905xxxxxxxxx veya 05xxxxxxxxx).
                    </div>
                </div>
                
                <div class="mb-3">
                    <label for="miktar" class="form-label">Miktar</label>
                    <input type="number" class="form-control" id="miktar" name="miktar" placeholder="Miktar" required>
                    <div class="invalid-feedback">
                        Miktar Alanı Zorunludur!
                    </div>
                </div>
                
                <div class="mb-3">
                    <label for="urun" class="form-label">Hizmet Seçiniz</label>
                    <select class="form-select" id="urun" name="urun" required>
                        <option value="">Hizmet Seçiniz</option>
                        <option value="Grafik-tasarim">Grafik Tasarım</option>
                        <option value="web-tasarim">Web Tasarım</option>
                        <option value="teknik-destek">Teknik Destek</option>
                        <option value="Domain-Hosting">Domain + Hosting</option>
                    </select>
                    <div class="invalid-feedback">
                        Lütfen bir hizmet seçiniz.
                    </div>
                </div>

                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary btn-lg">Ödeme Yap</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS ve gerekli bağımlılıklar (Popper.js) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Bootstrap 5 form validation script -->
    <script>
        (function () {
            'use strict'
            var forms = document.querySelectorAll('.needs-validation')
            Array.prototype.slice.call(forms).forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }
                    form.classList.add('was-validated')
                }, false)
            })
        })()
    </script>
</body>
</html>
