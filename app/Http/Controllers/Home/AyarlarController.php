<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ayarlar;
use Illuminate\Support\Carbon;

class AyarlarController extends Controller
{
    public function AyarlarDuzenle()
    {
        $ayarlar = Ayarlar::find(1);
        return view('admin.anasayfa.ayarlar_duzenle', compact('ayarlar'));
    }
    // FONKSİYON BİTTİ

    #AYARlAR GÜNCELLEME FORMU
    public function AyarlarGuncelle(Request $request)
    {
        $ayarlar = $request->id;

        // Blog Kategori kaydını bul
        $ayarlar = Ayarlar::findOrFail($ayarlar);

        $ayarlar->telefon = $request->telefon;
        $ayarlar->mail = $request->mail;
        $ayarlar->adres = $request->adres;
        $ayarlar->aciklama = $request->aciklama;
        $ayarlar->harita = $request->harita;
        $ayarlar->facebook = $request->facebook;
        $ayarlar->twitter = $request->twitter;
        $ayarlar->youtube = $request->youtube;
        $ayarlar->instagram = $request->instagram;
        $ayarlar->whatsapp = $request->whatsapp;
        $ayarlar->discord = $request->discord;
        $ayarlar->updated_at = Carbon::now();
        $ayarlar->save();

        $mesaj = [
            'bildirim' => 'Site ayarları başarıyla güncellendi.',
            'alert-type' => 'success',
        ];

        return Redirect()->back()->with($mesaj);
    }
    //AYARlAR GÜNCELLEME FORMU BİTTİ
}
