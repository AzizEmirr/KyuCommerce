<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BildirimController extends Controller
{
    public function bildirim(Request $request)
    {
        $data = $request->all();
        
        // Hash kontrolü
        $merchant_key = 'dEbGi317bCFcynaP'; // Buraya gerçek anahtarınızı ekleyin
        $merchant_salt = 'zMmqzrSCt5wXnnJ3'; // Buraya gerçek tuzunuzu ekleyin

        $hash = base64_encode(hash_hmac('sha256', $data['merchant_oid'] . $merchant_salt . $data['status'] . $data['total_amount'], $merchant_key, true));

        if ($hash != $data['hash']) {
            die('PAYTR notification failed: bad hash');
        }

        // Ödeme durumu kontrolü
        if ($data['status'] == 'success') {
            // Ödemeyi onaylayın
        } else {
            // Ödemeyi iptal edin
        }

        echo "OK";
        exit;
    }
}
