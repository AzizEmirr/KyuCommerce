<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blogicerik;
use App\Models\Blogkategoriler;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class BlogicerikController extends Controller
{

    public function IcerikListe()
    {
        $blogicerik = Blogicerik::latest()->get();
        return view('admin.blogicerik.blogicerik_liste', compact('blogicerik'));
    }
    //FONKSİYON BİTTİ

    #BLOG KATEGORİ AKTİF PASİF İŞLEMİ
    public function BlogIcerikDurum(Request $request)
    {
        $urun = Blogicerik::find($request->urun_id);
        if (!$urun) {
            return response()->json([
                'success' => false,
                'message' => 'Ürün bulunamadı.',
                'alert-type' => 'error',
            ]);
        }

        $urun->durum = $request->durum;
        $urun->save();

        $message = $request->durum == 1 ? 'Blog yazısı aktif hale getirildi.' : 'Blog yazısı pasif hale getirildi.';

        return response()->json([
            'success' => true,
            'message' => $message,
            'alert-type' => $request->durum == 1 ? 'success' : 'warning',
        ]);
    }
    //AKTİF PASİF İŞLEMİ BİTTİ

    public function BlogIcerikEkle()
    {
        $kategoriler = Blogkategoriler::latest()->get();
        return view('admin.blogicerik.blogicerik_ekle', compact('kategoriler'));
    }
    //FONKSİYON BİTTİ

    #BLOG YAZISI EKLEME İŞLEMİ
    public function BlogIcerikEkleForm(Request $request)
    {
        $request->validate(
            [
                'baslik' => 'required',
                'metin' => 'required',
                'kategori_id' => 'required',
                'sirano' => 'required',
                'anahtar' => 'required',
                'aciklama' => 'required',
                'tags_hidden' => 'nullable|string',
            ],
            [
                'baslik.required' => 'Başlık boş olamaz',
                'metin.required' => 'Metin kısmı boş bırakılamaz',
                'kategori_id.required' => 'Lütfen bir kategori seçiniz',
                'sirano.required' => 'Sıra no boş bırakılamaz',
                'anahtar.required' => 'Anahtar kelime boş bırakılamaz',
                'aciklama.required' => 'Açıklama kısmı boş bırakılamaz',
            ],
        );
    
        $blogekle = new Blogicerik();
        $blogekle->kategori_id = $request->kategori_id;
        $blogekle->baslik = $request->baslik;
        $blogekle->url = str()->slug($request->baslik);
    
        // Tagleri işleme ve URL dostu formatta kaydetme
        if ($request->filled('tags_hidden')) {
            $tags = explode(',', $request->tags_hidden);
            // Her tag için slug oluştur
            $sluggedTags = array_map(function($tag) {
                return str()->slug(trim($tag));
            }, $tags);
            $blogekle->tag = implode(',', $sluggedTags);
        } else {
            $blogekle->tag = null;
        }
    
        $blogekle->metin = $request->metin;
        $blogekle->anahtar = $request->anahtar;
        $blogekle->aciklama = $request->aciklama;
        $blogekle->sirano = $request->sirano;
        $blogekle->durum = 1;
        $blogekle->created_at = Carbon::now();
    
        if ($request->hasFile('resim')) {
            $resim = $request->file('resim');
            $resimadi = hexdec(uniqid()) . '.' . $resim->getClientOriginalExtension();
            $resim_path = public_path('uploads/bloglar/' . $resimadi);
    
            Image::make($resim)->resize(1920, 1080)->save($resim_path);
    
            $blogekle->resim = 'uploads/bloglar/' . $resimadi;
        }
    
        $blogekle->save();
    
        $mesaj = [
            'bildirim' => 'Blog başarıyla eklendi.',
            'alert-type' => 'success',
        ];
    
        return Redirect()->route('icerik.liste')->with($mesaj);
    }
    
    //BLOG YAZISI EKLEME BİTTİ

    public function BlogIcerikDuzenle($id)
    {
        $kategoriler = Blogkategoriler::latest()->get();
        $icerikler = Blogicerik::findOrFail($id);
        return view('admin.blogicerik.blogicerik_duzenle', compact('kategoriler', 'icerikler'));
    }
    //FONKSİYON BİTTİ

    #BLOG İCERİK GÜNCELLE
    public function BlogIcerikGuncelleForm(Request $request)
    {
        $request->validate(
            [
                'baslik' => 'required',
                'metin' => 'required',
                'kategori_id' => 'required',
                'sirano' => 'required',
                'anahtar' => 'required',
                'aciklama' => 'required',
                'tags_hidden' => 'nullable|string',
            ],
            [
                'baslik.required' => 'Başlık boş olamaz',
                'metin.required' => 'Metin kısmı boş bırakılamaz',
                'kategori_id.required' => 'Lütfen bir kategori seçiniz',
                'sirano.required' => 'Sıra no boş bırakılamaz',
                'anahtar.required' => 'Anahtar kelime boş bırakılamaz',
                'aciklama.required' => 'Açıklama kısmı boş bırakılamaz',
            ],
        );
    
        $urun_id = $request->id;
        $eski_resim = $request->onceki_resim;
    
        // icerik kaydını bul
        $icerikler = Blogicerik::findOrFail($urun_id);
    
        // iceriği güncelle
        $icerikler->kategori_id = $request->kategori_id;
        $icerikler->baslik = $request->baslik;
        $icerikler->url = str()->slug($request->baslik);
    
        // Tagleri işleme ve URL dostu formatta kaydetme
        if ($request->filled('tags_hidden')) {
            $tags = explode(',', $request->tags_hidden);
            // Her tag için slug oluştur
            $sluggedTags = array_map(function($tag) {
                return str()->slug(trim($tag));
            }, $tags);
            $icerikler->tag = implode(',', $sluggedTags);
        } else {
            $icerikler->tag = null;
        }
    
        $icerikler->metin = $request->metin;
        $icerikler->anahtar = $request->anahtar;
        $icerikler->aciklama = $request->aciklama;
        $icerikler->sirano = $request->sirano;
        $icerikler->updated_at = Carbon::now();
    
        // Yeni resim yükleme işlemi
        if ($request->hasFile('resim')) {
            $resim = $request->file('resim');
            $resimadi = hexdec(uniqid()) . '.' . $resim->getClientOriginalExtension();
            $resim_path = public_path('uploads/bloglar/' . $resimadi);
    
            Image::make($resim)->resize(1920, 1080)->save($resim_path);
    
            // Eski resmi silme
            if ($eski_resim && file_exists(public_path($eski_resim))) {
                unlink(public_path($eski_resim));
            }
    
            $icerikler->resim = 'uploads/bloglar/' . $resimadi;
        }
    
        $icerikler->save();
    
        $mesaj = [
            'bildirim' => 'Blog Yazısı Başarıyla Güncellendi.',
            'alert-type' => 'success',
        ];
    
        return redirect()->route('icerik.liste')->with($mesaj);
    }
    
    //BLOG İCERİK GÜNCELLEME BİTTİ

    #BLOG İCERİK SİLME
    public function BlogIcerikSil($id)
    {
        $icerikler = Blogicerik::findOrFail($id);
        $resim = $icerikler->resim;

        // Dosyanın var olup olmadığını kontrol ediyoruz
        if (file_exists($resim)) {
            unlink($resim);
        }

        $icerikler->delete();

        $mesaj = [
            'bildirim' => 'Blog Yazısı Başarıyla Silindi.',
            'alert-type' => 'success',
        ];

        return redirect()->back()->with($mesaj);
    }
    // BLOG İCERİK SİLME BİTTİ
}
