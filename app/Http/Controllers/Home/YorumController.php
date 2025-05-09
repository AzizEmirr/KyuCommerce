<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Yorumlar;
use Illuminate\Support\Carbon;

class YorumController extends Controller
{
    public function YorumListe()
    {
        $yorumliste = Yorumlar::latest()->get();
        return view('admin.yorumlar.yorum_liste', compact('yorumliste'));
    }
    //FONKSİYON BİTTİ

    #YORUM AKTİF PASİF İŞLEMİ
    public function YorumDurum(Request $request)
    {
        $urun = Yorumlar::find($request->urun_id);
        if (!$urun) {
            return response()->json([
                'success' => false,
                'message' => 'Soru Cevap bulunamadı.',
                'alert-type' => 'error',
            ]);
        }

        $urun->durum = $request->durum;
        $urun->save();

        $message = $request->durum == 1 ? 'aktif hale getirildi.' : 'pasif hale getirildi.';

        return response()->json([
            'success' => true,
            'message' => $message,
            'alert-type' => $request->durum == 1 ? 'success' : 'warning',
        ]);
    }
    //AKTİF PASİF İŞLEMİ BİTTİ

    public function YorumEkle()
    {
        $yorumekle = Yorumlar::latest()->get();
        return view('admin.yorumlar.yorum_ekle', compact('yorumekle'));
    }
    //FONKSİYON BİTTİ

    #YORUM EKLEME İŞLEMİ
    public function YorumEkleForm(Request $request)
    {
        $request->validate(
            [
                'adi' => 'required',
                'metin' => 'required',
                'sirano' => 'required',
            ],
            [
                'adi.required' => 'Ad Soyad kısmı boş bırakılamaz',
                'metin.required' => 'Metin kısmı boş bırakılamaz',
                'sirano.required' => 'Sıra no boş bırakılamaz',
            ],
        );

        $yorumekle = new Yorumlar();
        $yorumekle->adi = $request->adi;
        $yorumekle->metin = $request->metin;
        $yorumekle->sirano = $request->sirano;
        $yorumekle->durum = 1;
        $yorumekle->created_at = Carbon::now();

        $yorumekle->save();

        $mesaj = [
            'bildirim' => 'Yorum başarıyla eklendi.',
            'alert-type' => 'success',
        ];

        return Redirect()->route('yorum.liste')->with($mesaj);
    }
    //YORUM EKLEME BİTTİ

    public function YorumDuzenle($id)
    {
        $yorumduzenle = Yorumlar::findOrFail($id);
        return view('admin.yorumlar.yorum_duzenle', compact('yorumduzenle'));
    }
    //FONKSİYON BİTTİ

    #YORUM GÜNCELLEME FORMU

    public function YorumGuncelle(Request $request)
    {
        $request->validate(
            [
                'adi' => 'required',
                'metin' => 'required',
                'sirano' => 'required',
            ],
            [
                'adi.required' => 'Ad Soyad kısmı boş bırakılamaz',
                'metin.required' => 'Metin kısmı boş bırakılamaz',
                'sirano.required' => 'Sıra no boş bırakılamaz',
            ],
        );

        $yorumduzenle = $request->id;

        // Yorum kaydını bul
        $yorumduzenle = Yorumlar::findOrFail($yorumduzenle);

        $yorumduzenle->adi = $request->adi;
        $yorumduzenle->metin = $request->metin;
        $yorumduzenle->sirano = $request->sirano;
        $yorumduzenle->updated_at = Carbon::now();
        $yorumduzenle->save();

        $mesaj = [
            'bildirim' => 'Yorum başarıyla güncellendi.',
            'alert-type' => 'success',
        ];

        return Redirect()->route('yorum.liste')->with($mesaj);
    }
    //YORUM GÜNCELLEME FORMU BİTTİ

    #YORUM SİL
    public function YorumSil($id)
    {
        $yorumsil = Yorumlar::findOrFail($id);

        $yorumsil->delete();

        $mesaj = [
            'bildirim' => 'Yorum Başarıyla Silindi.',
            'alert-type' => 'success',
        ];

        return redirect()->back()->with($mesaj);
    }
    //YORUM SİLME BİTTİ
}
