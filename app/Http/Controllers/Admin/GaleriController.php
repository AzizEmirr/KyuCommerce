<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Galeri;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Carbon;

class GaleriController extends Controller
{
    public function GaleriListe()
    {
        $galeriliste = Galeri::latest()->get();
        return view('admin.galeri.galeri_liste', compact('galeriliste'));
    }
    //FONKSİYON BİTTİ

    #GALERİ AKTİF PASİF İŞLEMİ
    public function GaleriDurum(Request $request)
    {
        $urun = Galeri::find($request->urun_id);
        if (!$urun) {
            return response()->json([
                'success' => false,
                'message' => 'Fotoğraf bulunamadı.',
                'alert-type' => 'error',
            ]);
        }

        $urun->durum = $request->durum;
        $urun->save();

        $message = $request->durum == 1 ? 'Fotoğraf aktif hale getirildi.' : 'Fotoğraf pasif hale getirildi.';

        return response()->json([
            'success' => true,
            'message' => $message,
            'alert-type' => $request->durum == 1 ? 'success' : 'warning',
        ]);
    }
    //AKTİF PASİF İŞLEMİ BİTTİ

    public function GaleriEkle()
    {
        return view('admin.galeri.galeri_ekle');
    }
    //FONKSİYON BİTTİ

    #GALERİ EKLEME FORMU
    public function GaleriEkleForm(Request $request)
    {

        $galeri = new Galeri();
        $galeri->durum = 1;
        $galeri->sirano = $request->sirano;
        $galeri->created_at = Carbon::now();

        if ($request->hasFile('resim')) {
            $resim = $request->file('resim');
            $resimadi = hexdec(uniqid()) . '.' . $resim->getClientOriginalExtension();
            $resim_path = public_path('uploads/galeri/' . $resimadi);

            Image::make($resim)->save($resim_path);

            $galeri->resim = 'uploads/galeri/' . $resimadi;
        }

        $galeri->save();

        $mesaj = [
            'bildirim' => 'Fotoğraf başarıyla eklendi.',
            'alert-type' => 'success',
        ];

        return Redirect()->route('galeri.liste')->with($mesaj);
    }
    //GALERİ EKLEME FORMU BİTTİ


    public function GaleriDuzenle($id)
    {
        $galeriduzenle = Galeri::findOrFail($id);
        return view('admin.galeri.galeri_duzenle', compact('galeriduzenle'));
    }
    //FONKSİYON BİTTİ


     #GALERİ GÜNCELLEME FORMU
     public function GaleriGuncelle(Request $request)
     {
 
         $galeriduzenle = $request->id;
         $eski_resim = $request->onceki_resim;
 
         // Kategori kaydını bul
         $galeriduzenle = Galeri::findOrFail($galeriduzenle);
 
         $galeriduzenle->sirano = $request->sirano;
         $galeriduzenle->updated_at = Carbon::now();
 
         // Yeni resim yükleme işlemi
         if ($request->hasFile('resim')) {
             $resim = $request->file('resim');
             $resimadi = hexdec(uniqid()) . '.' . $resim->getClientOriginalExtension();
             $resim_path = public_path('uploads/galeri/' . $resimadi);
 
             Image::make($resim)->save($resim_path);
 
             $galeriduzenle->resim = 'uploads/galeri/' . $resimadi;
 
             // Eski resmi silme
             if ($eski_resim && file_exists(public_path($eski_resim))) {
                 unlink(public_path($eski_resim));
             }
         }
 
         $galeriduzenle->save();
 
         $mesaj = [
             'bildirim' => 'Fotoğraf başarıyla güncellendi.',
             'alert-type' => 'success',
         ];
 
         return Redirect()->route('galeri.liste')->with($mesaj);
     }
     //GALERİ GÜNCELLEME FORMU BİTTİ
 
     #GALERİ SİL
        public function GaleriSil($id)
        {
            $galeri = Galeri::findOrFail($id);
            $resim = $galeri->resim;
    
            // Dosyanın var olup olmadığını kontrol ediyoruz
            if (file_exists($resim)) {
                unlink($resim);
            }
    
            $galeri->delete();
    
            $mesaj = [
                'bildirim' => 'Fotoğraf Başarıyla Silindi.',
                'alert-type' => 'success',
            ];
    
            return redirect()->back()->with($mesaj);
        }
     
     //GALERİ SİLME BİTTİ
}
