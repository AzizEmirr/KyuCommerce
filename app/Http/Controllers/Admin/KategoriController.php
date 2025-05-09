<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kategoriler;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Carbon;

class KategoriController extends Controller
{


    public function KategoriHepsi()
    {
        $kategorihepsi = Kategoriler::orderby('sirano','DESC')->get();
        return view('admin.kategoriler.kategoriler_hepsi', compact('kategorihepsi'));
    }
    //FONKSİYON BİTTİ

    #KATEGORİ AKTİF PASİF İŞLEMİ
    public function KategoriDurum (Request $request)
    {
        $urun = Kategoriler::find($request->urun_id);
        if (!$urun) {
            return response()->json([
                'success' => false,
                'message' => 'Kategori bulunamadı.',
                'alert-type' => 'error',
            ]);
        }

        $urun->durum = $request->durum;
        $urun->save();

        $message = $request->durum == 1 ? 'Kategori aktif hale getirildi.' : 'Kategori pasif hale getirildi.';

        return response()->json([
            'success' => true,
            'message' => $message,
            'alert-type' => $request->durum == 1 ? 'success' : 'warning',
        ]);
    }
    //AKTİF PASİF İŞLEMİ BİTTİ

    public function KategoriEkle()
    {
        return view('admin.kategoriler.kategori_ekle');
    }
    //FONKSİYON BİTTİ

    #KATEGORİ EKLEME FORMU
    public function KategoriEkleForm(Request $request)
    {
        $request->validate(
            [
                'kategori_adi' => 'required',
                'aciklama' => 'required',
                'sirano' => 'required',
            ],
            [
                'kategori_adi.required' => 'Kategori adı boş olamaz',
                'aciklama.required' => 'Açıklama kısmı boş bırakılamaz',
                'sirano.required' => 'Sıra Numarası boş bırakılamaz',
            ],
        );

        $kategori = new Kategoriler();
        $kategori->kategori_adi = $request->kategori_adi;
        $kategori->kategori_url = str()->slug($request->kategori_adi);
        $kategori->anahtar = $request->anahtar;
        $kategori->aciklama = $request->aciklama;
        $kategori->durum = 1;
        $kategori->sirano = $request->sirano;
        $kategori->created_at = Carbon::now();

        if ($request->hasFile('resim')) {
            $resim = $request->file('resim');
            $resimadi = hexdec(uniqid()) . '.' . $resim->getClientOriginalExtension();
            $resim_path = public_path('uploads/kategoriler/' . $resimadi);

            Image::make($resim)->resize(1920, 1080)->save($resim_path);

            $kategori->resim = 'uploads/kategoriler/' . $resimadi;
        }

        $kategori->save();

        $mesaj = [
            'bildirim' => 'Kategori başarıyla eklendi.',
            'alert-type' => 'success',
        ];

        return Redirect()->route('kategori.hepsi')->with($mesaj);
    }
    //KATEGORİ EKLEME FORMU BİTTİ
    
    public function KategoriDuzenle($id)
    {
        $KategoriDuzenle = Kategoriler::findOrFail($id);
        return view('admin.kategoriler.kategori_duzenle', compact('KategoriDuzenle'));
    }
    //FONKSİYON BİTTİ

    #KATEGORİ GÜNCELLEME FORMU
    public function KategoriGuncelleForm(Request $request)
    {
        $request->validate(
            [
                'kategori_adi' => 'required',
                'aciklama' => 'required',
                'sirano' => 'required',
            ],
            [
                'kategori_adi.required' => 'Kategori adı boş olamaz',
                'aciklama.required' => 'Açıklama kısmı boş bırakılamaz',
                'sirano.required' => 'Sıra Numarası boş bırakılamaz',
            ],
        );

        $kategori_id = $request->id;
        $eski_resim = $request->onceki_resim;

        // Kategori kaydını bul
        $kategori = Kategoriler::findOrFail($kategori_id);

        $kategori->kategori_adi = $request->kategori_adi;
        $kategori->kategori_url = str()->slug($request->kategori_adi);
        $kategori->anahtar = $request->anahtar;
        $kategori->aciklama = $request->aciklama;
        $kategori->sirano = $request->sirano;
        $kategori->updated_at = Carbon::now();

        // Yeni resim yükleme işlemi
        if ($request->hasFile('resim')) {
            $resim = $request->file('resim');
            $resimadi = hexdec(uniqid()) . '.' . $resim->getClientOriginalExtension();
            $resim_path = public_path('uploads/kategoriler/' . $resimadi);

            Image::make($resim)->resize(1920, 1080)->save($resim_path);

            $kategori->resim = 'uploads/kategoriler/' . $resimadi;

            // Eski resmi silme
            if ($eski_resim && file_exists(public_path($eski_resim))) {
                unlink(public_path($eski_resim));
            }
        }

        $kategori->save();

        $mesaj = [
            'bildirim' => 'Kategori başarıyla güncellendi.',
            'alert-type' => 'success',
        ];

        return Redirect()->route('kategori.hepsi')->with($mesaj);
    }
    //KATEGORİ GÜNCELLEME FORMU BİTTİ

    #KATEGORİ SİL
    public function KategoriSil($id)
    {
        $kategori = Kategoriler::findOrFail($id);
        
        $kategori->altKategoriler()->each(function($altkategori) {

            $altkategori->urunler()->each(function($urun) {
                
                $resim = $urun->resim;
                if ($resim && file_exists(public_path($resim))) {
                    unlink(public_path($resim));
                }
                
                $urun->delete();
            });
    
            
            $resim = $altkategori->resim;
            if ($resim && file_exists(public_path($resim))) {
                unlink(public_path($resim));
            }
    
            $altkategori->delete();
        });
    
        $resim = $kategori->resim;
        if ($resim && file_exists(public_path($resim))) {
            unlink(public_path($resim));
        }
    
        $kategori->delete();
    
        $mesaj = [
            'bildirim' => 'Kategori ve İlişkili Alt Kategoriler ile Ürünler Başarıyla Silindi.',
            'alert-type' => 'success',
        ];
    
        return redirect()->back()->with($mesaj);
    }
    
    //KATEGORİ SİLME BİTTİ

} //class bitti
