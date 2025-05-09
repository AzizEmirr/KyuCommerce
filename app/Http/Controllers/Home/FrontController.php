<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Urunler;
use App\Models\Kategoriler;
use App\Models\Altkategoriler;
use App\Models\Blogicerik;
use App\Models\Blogkategoriler;
use App\Models\Galeri;

use function Pest\Laravel\get;

class FrontController extends Controller
{

    public function Urunler()
    {
        $urunler = Urunler::all(); 
        return view('frontend.urunler.urunler', compact('urunler'));
    }

    public function Gizlilik()
    {
        return view('frontend.pages.gizlilik_politikasi');
    }
    public function Hizmet()
    {
        return view('frontend.pages.hizmet_sozlesmesi');
    }
    public function İade()
    {
        return view('frontend.pages.iade_sartlari');
    }
    public function Hakkimizda()
    {
        return view('frontend.pages.hakkimizda');
    }

    public function UrunDetay($id, $url)
    {
        $urunler = Urunler::findOrFail($id);
        $sonurunler = Urunler::where('durum', 1)->orderBy('created_at', 'desc')->limit(4)->get();
        $etiketler = $urunler->tag;
        $etiket = explode(',', $etiketler);

        return view('frontend.urunler.urun_detay', compact('urunler', 'etiket', 'sonurunler'));
    }

    public function KategoriDetay(Request $request, $id, $url)
    {
        $urunler = Urunler::where('durum', 1)->where('kategori_id', $id)->orderBy('sirano', 'ASC')->paginate(9);
        $sonurunler = Urunler::where('durum', 1)->orderBy('created_at', 'desc')->limit(3)->get();
        $kategoriler = Kategoriler::orderBy('kategori_adi', 'ASC')->get();
        $kategori = Kategoriler::where('id', $id)->first();
        return view('frontend.kategoriler.kategori_detay', compact('urunler', 'kategoriler', 'kategori','sonurunler'));
    }
    

    public function AltDetay(Request $request, $id, $url)
    {
        $urunler = Urunler::where('durum', 1)->where('altkategori_id', $id)->orderBy('sirano', 'ASC')->paginate(8);
        $sonurunler = Urunler::where('durum', 1)->orderBy('created_at', 'desc')->limit(3)->get();
        $altkategoriler = Altkategoriler::orderBy('altkategori_adi', 'ASC')->get();
        $altkategori = Altkategoriler::where('id', $id)->first();

        return view('frontend.kategoriler.altkategori_detay', compact('urunler', 'altkategoriler', 'altkategori','sonurunler'));
    }

    public function IcerikDetay($id)
    {
        $icerikHepsi = Blogicerik::where('durum', 1)->orderBy('sirano', 'ASC')->limit(5)->get();
        $icerik = Blogicerik::findOrFail($id);
        $kategoriler = Blogkategoriler::where('durum', 1)->orderBy('sirano', 'ASC')->get();

        $tag = $icerik->tag;
        $etikettag = explode(',', $tag);

        $etiketler = Blogicerik::where('durum', 1)
            ->pluck('tag')
            ->map(function ($tags) {
                return explode(',', $tags);
            })
            ->flatten()
            ->countBy()
            ->sortDesc()
            ->take(10);

        return view('frontend.blog.icerik_detay', compact('icerikHepsi', 'icerik', 'kategoriler', 'etiketler', 'etikettag'));
    }

    public function BlogKategoriDetay($id)
    {
        $blogpost = Blogicerik::where('durum', 1)->where('kategori_id', $id)->orderBy('sirano', 'ASC')->paginate(6);
        $icerikHepsi = Blogicerik::where('durum', 1)->orderBy('sirano', 'ASC')->get();
        $kategoriler = Blogkategoriler::where('durum', 1)->orderBy('sirano', 'ASC')->get();
        $kategoriAdi = Blogkategoriler::findOrFail($id);

        $etiketler = Blogicerik::where('durum', 1)
            ->pluck('tag')
            ->map(function ($tags) {
                return explode(',', $tags);
            })
            ->flatten()
            ->countBy()
            ->sortDesc()
            ->take(10);

        return view('frontend.blog.kategori_detay', compact('blogpost', 'icerikHepsi', 'kategoriler', 'kategoriAdi', 'etiketler'));
    }

    public function BlogHepsi()
    {
        $kategoriler = Blogkategoriler::where('durum', 1)
            ->orderBy('sirano', 'ASC')
            ->get()
            ->map(function ($kategori) {
                $kategori->icerik_sayisi = Blogicerik::where('kategori_id', $kategori->id)
                    ->where('durum', 1)
                    ->count();
                return $kategori;
            });
    
        $icerikHepsi = Blogicerik::where('durum', 1)->orderBy('sirano', 'ASC')->paginate(6);
    
        $etiketler = Blogicerik::where('durum', 1)
            ->pluck('tag')
            ->map(function ($tags) {
                return explode(',', $tags);
            })
            ->flatten()
            ->countBy()
            ->sortDesc()
            ->take(10);
    
        return view('frontend.blog.blog_hepsi', compact('icerikHepsi', 'kategoriler', 'etiketler'));
    }


}
