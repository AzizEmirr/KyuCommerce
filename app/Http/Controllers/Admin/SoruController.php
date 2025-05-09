<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sorular;
use Illuminate\Support\Carbon;

class SoruController extends Controller
{
    public function SoruListe()
    {
        $soruliste = Sorular::latest()->get();
        return view('admin.sorular.soru_liste', compact('soruliste'));
    }
    //FONKSİYON BİTTİ

    #YORUM AKTİF PASİF İŞLEMİ
    public function SoruDurum(Request $request)
    {
        $urun = Sorular::find($request->urun_id);
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

    public function SoruEkle()
    {
        $soruekle = Sorular::latest()->get();
        return view('admin.sorular.soru_ekle', compact('soruekle'));
    }
    //FONKSİYON BİTTİ

    #SORU CEVAP EKLEME İŞLEMİ
    public function SoruEkleForm(Request $request)
    {
        $request->validate(
            [
                'soru' => 'required',
                'cevap' => 'required',
                'sirano' => 'required',
            ],
            [
                'soru.required' => 'Soru kısmı boş bırakılamaz',
                'cevap.required' => 'Cevap kısmı boş bırakılamaz',
                'sirano.required' => 'Sıra no boş bırakılamaz',
            ],
        );

        $sorucevapekle = new Sorular();
        $sorucevapekle->soru = $request->soru;
        $sorucevapekle->cevap = $request->cevap;
        $sorucevapekle->sirano = $request->sirano;
        $sorucevapekle->durum = 1;
        $sorucevapekle->created_at = Carbon::now();

        $sorucevapekle->save();

        $mesaj = [
            'bildirim' => 'Soru Cevap başarıyla eklendi.',
            'alert-type' => 'success',
        ];

        return Redirect()->route('soru.liste')->with($mesaj);
    }
    //SORU CEVAP EKLEME BİTTİ

    public function SoruDuzenle($id)
    {
        $sorularduzenle = Sorular::findOrFail($id);
        return view('admin.sorular.sorular_duzenle', compact('sorularduzenle'));
    }
    //FONKSİYON BİTTİ

    #SORU CEVAP GÜNCELLEME FORMU

    public function SoruGuncelle(Request $request)
    {
        $request->validate(
            [
                'soru' => 'required',
                'cevap' => 'required',
                'sirano' => 'required',
            ],
            [
                'soru.required' => 'Soru kısmı boş bırakılamaz',
                'cevap.required' => 'Cevap kısmı boş bırakılamaz',
                'sirano.required' => 'Sıra no boş bırakılamaz',
            ],
        );

        $sorucevap_id = $request->id;

        // Soru Cevap kaydını bul
        $sorucevapguncelle = Sorular::findOrFail($sorucevap_id);

        $sorucevapguncelle->soru = $request->soru;
        $sorucevapguncelle->cevap = $request->cevap;
        $sorucevapguncelle->sirano = $request->sirano;
        $sorucevapguncelle->updated_at = Carbon::now();
        $sorucevapguncelle->save();

        $mesaj = [
            'bildirim' => 'Soru Cevap başarıyla güncellendi.',
            'alert-type' => 'success',
        ];

        return Redirect()->route('soru.liste')->with($mesaj);
    }
    //SORU CEVAP GÜNCELLEME FORMU BİTTİ

    #SORU CEVAP SİL
    public function Sorusil($id)
    {
        $sorucevap = Sorular::findOrFail($id);

        $sorucevap->delete();

        $mesaj = [
            'bildirim' => 'Başarıyla Silindi.',
            'alert-type' => 'success',
        ];

        return redirect()->back()->with($mesaj);
    }
    //SORU CEVAP SİLME BİTTİ
}
