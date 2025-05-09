<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mesaj;
use Illuminate\Support\Carbon;

class MesajController extends Controller
{
    public function Iletisim()
    {
        return view('frontend.mesaj.iletisim');
    }
    public function TeklifFormu(Request $request)
    {
        $request->validate(
            [
                'adi' => 'required',
                'email' => 'required|email',
                'telefon' => 'required|numeric',
                'konu' => 'required',
                'text' => 'required',
            ],
            [
                'adi.required' => 'Ad ve soyad alanı zorunludur.',
                'email.required' => 'E-posta adresi zorunludur.',
                'email.email' => 'Lütfen geçerli bir e-posta adresi giriniz.',
                'telefon.required' => 'Telefon numarası zorunludur.',
                'telefon.numeric' => 'Lütfen geçerli bir telefon numarası giriniz.',
                'konu.required' => 'Konu seçilmelidir.',
                'text.required' => 'Mesaj kısmı boş bırakılamaz.',
            ],
        );

        Mesaj::create($request->all());

        $mesaj = [
            'bildirim' => 'Talebiniz başarıyla iletildi.',
            'alert-type' => 'success',
        ];

        // Geriye yönlendir ve mesajı göster
        return redirect()->back()->with($mesaj);
    }
}
