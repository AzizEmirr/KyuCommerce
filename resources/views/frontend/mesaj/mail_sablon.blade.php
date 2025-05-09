<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teklif Formu - {{ $data['konu'] }}</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f1f2f6;
        }

        .container {
            max-width: 700px;
            margin: 20px auto;
            background-color: #ffffff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .header {
            background-color: #007bff;
            color: #ffffff;
            padding: 20px;
            border-radius: 12px 12px 0 0;
            text-align: center;
        }

        .header h1 {
            margin: 0;
            font-size: 28px;
            font-weight: 600;
        }

        .content {
            padding: 20px;
            line-height: 1.8;
            color: #333333;
        }

        .content p {
            margin: 0 0 15px;
        }

        .content strong {
            color: #007bff;
        }

        .footer {
            padding: 15px;
            background-color: #f1f2f6;
            border-radius: 0 0 12px 12px;
            text-align: center;
            font-size: 16px;
            color: #888888;
        }

        .footer p {
            margin: 0;
        }

        @media only screen and (max-width: 600px) {
            .container {
                padding: 15px;
            }

            .header h1 {
                font-size: 24px;
            }

            .footer {
                font-size: 14px;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>Teklif Formu - {{ $data['konu'] }}</h1>
        </div>
        <div class="content">
            <p><strong>İsim:</strong> {{ $data['adi'] }}</p>
            <p><strong>E-posta:</strong> {{ $data['email'] }}</p>
            <p><strong>Telefon:</strong> {{ $data['telefon'] }}</p>
            <p><strong>Konu:</strong> {{ $data['konu'] }}</p>
            <p><strong>Mesaj:</strong><br> {{ $data['text'] }}</p>
        </div>
        <div class="footer">
            <p>Bu e-posta, {{ config('app.name') }} tarafından otomatik olarak gönderilmiştir.</p>
        </div>
    </div>
</body>

</html>
