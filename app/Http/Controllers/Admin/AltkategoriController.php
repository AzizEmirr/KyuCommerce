<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Altkategoriler;
use App\Models\Kategoriler;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Spatie\Activitylog\Models\Activity;

class AltkategoriController extends Controller
{
    public function AltkategoriListe()
    {
        $altkategoriler = Altkategoriler::orderby('sirano','DESC')->get();
        return view('admin.altkategoriler.altkategori_liste', compact('altkategoriler'));
    }
    //FONKSİYON BİTTİ

    #ÜRÜN AKTİF PASİF İŞLEMİ
    public function AltKategoriDurum(Request $request)
    {
        $urun = Altkategoriler::find($request->urun_id);
    
        if (!$urun) {
            return response()->json([
                'success' => false,
                'message' => 'Alt Kategori bulunamadı.',
                'alert-type' => 'error',
            ]);
        }
    
        // Alt kategori durumunu güncelle
        $urun->durum = $request->durum;
        $urun->save();
    
        // Durum değişikliği mesajını ayarla
        $message = $request->durum == 1 ? 'Alt Kategori aktif hale getirildi.' : 'Alt Kategori pasif hale getirildi.';
    
        // Aktivite logu oluştur
        activity()
            ->performedOn($urun) // İşlem yapılan nesne
            ->causedBy(auth()->user()) // İşlemi yapan kullanıcı
            ->withProperties(['durum' => $request->durum]) // Ekstra özellikler
            ->log($message); // Log mesajı
    
        return response()->json([
            'success' => true,
            'message' => $message,
            'alert-type' => $request->durum == 1 ? 'success' : 'warning',
        ]);
    }
    //AKTİF PASİF İŞLEMİ BİTTİ

    public function AltKategoriEkle()
    {
        $kategorigoster = Kategoriler::orderBy('kategori_adi', 'ASC')->get();
        return view('admin.altkategoriler.altkategori_ekle', compact('kategorigoster'));
    }
    //FONKSİYON BİTTİ

    #ALT KATEGORİ EKLEME FORMU
    public function AltKategoriEkleForm(Request $request)
    {
        $request->validate(
            [
                'altkategori_adi' => 'required',
                'aciklama' => 'required',
                'sirano' => 'required',
            ],
            [
                'altkategori_adi.required' => 'Alt kategori adı boş olamaz',
                'aciklama.required' => 'Açıklama kısmı boş bırakılamaz',
                'sirano.required' => 'Sıra numarası boş bırakılamaz',
            ],
        );

        $altkategori = new Altkategoriler();
        $altkategori->kategori_id = $request->kategori_id;
        $altkategori->altkategori_adi = $request->altkategori_adi;
        $altkategori->altkategori_url = str()->slug($request->altkategori_adi);
        $altkategori->anahtar = $request->anahtar;
        $altkategori->aciklama = $request->aciklama;
        $altkategori->durum = 1;
        $altkategori->sirano = $request->sirano;
        $altkategori->created_at = Carbon::now();

        if ($request->hasFile('resim')) {
            $resim = $request->file('resim');
            $resimadi = hexdec(uniqid()) . '.' . $resim->getClientOriginalExtension();
            $resim_path = public_path('uploads/altkategoriler/' . $resimadi);

            Image::make($resim)->resize(1920, 1080)->save($resim_path);

            $altkategori->resim = 'uploads/altkategoriler/' . $resimadi;
        }

        $altkategori->save();

        $mesaj = [
            'bildirim' => 'Alt Kategori başarıyla eklendi.',
            'alert-type' => 'success',
        ];

        return Redirect()->route('altkategori.liste')->with($mesaj);
    }
    //ALT KATEGORİ EKLEME BİTTİ

    public function AltKategoriDuzenle($id)
    {
        $kategoriler = Kategoriler::orderBy('kategori_adi', 'asc')->get();
        $altkategoriler = Altkategoriler::findOrFail($id);
        return view('admin.altkategoriler.altkategori_duzenle', compact('kategoriler', 'altkategoriler'));
    }
    //FONKSİYON BİTTİ

    #ALT KATEGORİ GÜNCELLE

    public function AltKategoriGuncelle(Request $request)
    {
        $request->validate(
            [
                'altkategori_adi' => 'required',
                'aciklama' => 'required',
                'sirano' => 'required',
            ],
            [
                'altkategori_adi.required' => 'Alt kategori adı boş olamaz',
                'aciklama.required' => 'Açıklama kısmı boş bırakılamaz',
                'sirano.required' => 'Sıra numarası boş bırakılamaz',
            ],
        );

        $altkategori_id = $request->id;
        $eski_resim = $request->onceki_resim;

        // Kategori kaydını bul
        $altkategori = AltKategoriler::findOrFail($altkategori_id);

        $altkategori->kategori_id = $request->kategori_id;
        $altkategori->altkategori_adi = $request->altkategori_adi;
        $altkategori->altkategori_url = Str::slug($request->altkategori_adi);
        $altkategori->anahtar = $request->anahtar;
        $altkategori->aciklama = $request->aciklama;
        $altkategori->sirano = $request->sirano;

        // Yeni resim yükleme işlemi
        if ($request->hasFile('resim')) {
            $resim = $request->file('resim');
            $resimadi = hexdec(uniqid()) . '.' . $resim->getClientOriginalExtension();
            $resim_path = public_path('uploads/altkategoriler/' . $resimadi);

            Image::make($resim)->resize(1920, 1080)->save($resim_path);

            $altkategori->resim = 'uploads/altkategoriler/' . $resimadi;

            // Eski resmi silme
            if ($eski_resim && file_exists(public_path($eski_resim))) {
                unlink(public_path($eski_resim));
            }
        }

        $altkategori->save();

        $mesaj = [
            'bildirim' => 'Alt Kategori başarıyla güncellendi.',
            'alert-type' => 'success',
        ];

        return redirect()->route('altkategori.liste')->with($mesaj);
    }
    //ALT KATEGORİ GÜNCELLEME BİTTİ

    #ALT KATEGORİ SİL
    public function AltKategoriSil($id)
    {
        // Alt kategoriyi bul
        $altkategori = Altkategoriler::findOrFail($id);

        // Alt kategoriye ait ürünleri sil
        $altkategori->urunler()->each(function ($urun) {
            // Ürüne ait resim varsa sil
            if (file_exists($urun->resim)) {
                unlink($urun->resim);
            }
            // Ürünü sil
            $urun->delete();
        });

        // Alt kategoriye ait resim varsa sil
        $resim = $altkategori->resim;
        if (file_exists($resim)) {
            unlink($resim);
        }

        // Alt kategoriyi sil
        $altkategori->delete();

        $mesaj = [
            'bildirim' => 'Alt Kategori ve İlişkili Ürünler Başarıyla Silindi.',
            'alert-type' => 'success',
        ];

        return redirect()->back()->with($mesaj);
    }

    // ALT KATEGORİ SİLME BİTTİ

    #AJAX İSTEĞİ
    public function AltAjax($kategori_id)
    {
        $altgetir = Altkategoriler::where('kategori_id', $kategori_id)->orderBy('altkategori_adi', 'ASC')->get();
        return json_encode($altgetir);
    }
    // AJAX İSTEĞİ BİTTİ
}
//CLASS BİTTİ
