<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blogkategoriler;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class BlogkategoriController extends Controller
{

    public function BlogListe()
    {
        $blogliste = Blogkategoriler::latest()->get();
        return view('admin.blogkategoriler.blog_liste', compact('blogliste'));
    }
    //FONKSİYON BİTTİ

    #BLOG KATEGORİ AKTİF PASİF İŞLEMİ
    public function BlogKategoriDurum(Request $request)
    {
        $urun = Blogkategoriler::find($request->urun_id);
        if (!$urun) {
            return response()->json([
                'success' => false,
                'message' => 'Ürün bulunamadı.',
                'alert-type' => 'error',
            ]);
        }

        $urun->durum = $request->durum;
        $urun->save();

        $message = $request->durum == 1 ? 'Ürün aktif hale getirildi.' : 'Ürün pasif hale getirildi.';

        return response()->json([
            'success' => true,
            'message' => $message,
            'alert-type' => $request->durum == 1 ? 'success' : 'warning',
        ]);
    }
    //AKTİF PASİF İŞLEMİ BİTTİ
    public function BlogKategoriEkle()
    {
        return view('admin.blogkategoriler.blogkategori_ekle');
    }
    //FONKSİYON BİTTİ

    #BLOG KATEGORİ EKLEME İŞLEMİ
    public function BlogKategoriForm(Request $request)
    {
        $request->validate(
            [
                'kategori_adi' => 'required',
                'sirano' => 'required',
            ],
            [
                'kategori_adi.required' => 'Kategori adı boş olamaz',
                'sirano.required' => 'Sıra no boş olamaz',
            ],
        );

        $blogkategoriekle = new Blogkategoriler();
        $blogkategoriekle->kategori_adi = $request->kategori_adi;
        $blogkategoriekle->url = str()->slug($request->kategori_adi);
        $blogkategoriekle->sirano = $request->sirano;
        $blogkategoriekle->durum = 1;
        $blogkategoriekle->created_at = Carbon::now();

        $blogkategoriekle->save();

        $mesaj = [
            'bildirim' => 'Blog kategorisi başarıyla eklendi.',
            'alert-type' => 'success',
        ];

        return Redirect()->route('blog.liste')->with($mesaj);
    }
    //BLOG KATEGORİ EKLEME BİTTİ
    public function BlogKategoriDuzenle($id)
    {
        $blogkategoriler = Blogkategoriler::findOrFail($id);
        return view('admin.blogkategoriler.blogkategori_duzenle', compact('blogkategoriler'));
    }
    //FONKSİYON BİTTİ

    #BLOG KATEGORİ GÜNCELLEME FORMU
    public function BlogKategoriGuncelle(Request $request)
    {
        $request->validate(
            [
                'kategori_adi' => 'required',
                'sirano' => 'required',
            ],
            [
                'kategori_adi.required' => 'Kategori adı boş olamaz',
                'sirano.required' => 'Sıra no boş olamaz',
            ],
        );

        $kategori_id = $request->id;

        // Blog Kategori kaydını bul
        $blogkategori = Blogkategoriler::findOrFail($kategori_id);

        $blogkategori->kategori_adi = $request->kategori_adi;
        $blogkategori->url = str()->slug($request->kategori_adi);
        $blogkategori->sirano = $request->sirano;
        $blogkategori->updated_at = Carbon::now();
        $blogkategori->save();

        $mesaj = [
            'bildirim' => 'Blog kategori başarıyla güncellendi.',
            'alert-type' => 'success',
        ];

        return Redirect()->route('blog.liste')->with($mesaj);
    }
    //BLOG KATEGORİ GÜNCELLEME FORMU BİTTİ

    public function BlogKategoriSil($id)
    {
        $blogkategori = Blogkategoriler::findOrFail($id);
    
        foreach ($blogkategori->blogicerikler as $icerik) {
            if (file_exists($icerik->resim)) {
                unlink($icerik->resim);
            }
    
            $icerik->delete();
        }
    
        $blogkategori->delete();
    
        $mesaj = [
            'bildirim' => 'Blog Kategori ve İlgili İçerikler Başarıyla Silindi.',
            'alert-type' => 'success',
        ];
    
        return redirect()->back()->with($mesaj);
    }
    
}
