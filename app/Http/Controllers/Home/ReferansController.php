<?php
namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Referanslar;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ReferansController extends Controller
{
    public function ReferansListe()
    {
        $referans = Referanslar::all();
        return view('admin.referans.referans_liste', compact('referans'));
    }
    //FONKSİYON BİTTİ

    public function ReferansEkle()
    {
        $referans = Referanslar::all();
        return view('admin.referans.referans_ekle', compact('referans'));
    }
    //FONKSİYON BİTTİ

    #REFERANS EKLEME FORMU
    public function ReferansEkleForm(Request $request)
    {
        $referans = new Referanslar();

        if ($request->hasFile('resim')) {
            $resim      = $request->file('resim');
            $resimadi   = hexdec(uniqid()) . '.' . $resim->getClientOriginalExtension();
            $resim_path = public_path('uploads/referanslar/' . $resimadi);

            Image::make($resim)->save($resim_path);

            $referans->resim = 'uploads/referanslar/' . $resimadi;
        }

        $referans->save();

        $mesaj = [
            'bildirim'   => 'Referans başarıyla eklendi.',
            'alert-type' => 'success',
        ];

        return Redirect()->route('referans.liste')->with($mesaj);
    }
    //REFERANS EKLEME FORMU BİTTİ

    public function ReferansDuzenle($id)
    {
        $referans = Referanslar::findOrFail($id);
        return view('admin.referans.referans_duzenle', compact('referans'));
    }
    //FONKSİYON BİTTİ

    #REFERANS GÜNCELLEME

    public function ReferansGuncelle(Request $request)
    {
        $referans = Referanslar::findOrFail($request->id);

        if ($request->hasFile('resim')) {
            $resim      = $request->file('resim');
            $resimadi   = hexdec(uniqid()) . '.' . $resim->getClientOriginalExtension();
            $resim_path = public_path('uploads/referanslar/' . $resimadi);

            Image::make($resim)->save($resim_path);

            if (file_exists(public_path($referans->resim))) {
                unlink(public_path($referans->resim));
            }

            $referans->resim = 'uploads/referanslar/' . $resimadi;
        }

        $referans->save();

        $mesaj = [
            'bildirim'   => 'Referans başarıyla güncellendi.',
            'alert-type' => 'success',
        ];

        return Redirect()->route('referans.liste')->with($mesaj);
    }

    //REFERANS GÜNCELLEME BİTTİ

    #REFERANS GÜNCELLEME

    public function ReferansSil($id)
    {
        $referans = Referanslar::findOrFail($id);

        if (! empty($referans->resim) && file_exists(public_path($referans->resim))) {
            unlink(public_path($referans->resim));
        }
        $referans->delete();

        $mesaj = [
            'bildirim'   => 'Referans başarıyla silindi.',
            'alert-type' => 'success',
        ];

        return Redirect()->route('referans.liste')->with($mesaj);
    }

}
