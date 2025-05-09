<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Seo;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Carbon;

class SeoController extends Controller
{
    public function SeoDuzenle()
    {
        $seo = Seo::find(1);
        return view('admin.anasayfa.seo_duzenle', compact('seo'));
    }
    // FONKSİYON BİTTİ

    public function SeoGuncelle(Request $request)
    {
        $seo_id = $request->id;

        // Seo'yu veritabanından al
        $seo = Seo::findOrFail($seo_id);

        if ($request->hasFile('resim')) {
            // Yeni resmi yükle
            $resim = $request->file('resim');
            $resimadi = hexdec(uniqid()) . '.' . $resim->getClientOriginalExtension();
            $resim_path = public_path('uploads/seo/' . $resimadi);

            Image::make($resim)->resize(1200, 630)->save($resim_path);

            // Eski resmi sil
            if (file_exists(public_path($seo->resim))) {
                unlink(public_path($seo->resim));
            }

            $resim_kaydet = 'uploads/seo/' . $resimadi;

            $seo->update([
                'title' => $request->title,
                'url' => $request->url,
                'site_adi' => $request->site_adi,
                'description' => $request->description,
                'keywords' => $request->keywords,
                'resim' => $resim_kaydet,
            ]);
        } else {
            $seo->update([
                'title' => $request->title,
                'url' => $request->url,
                'site_adi' => $request->site_adi,
                'description' => $request->description,
                'keywords' => $request->keywords,
            ]);
        }

        $mesaj = [
            'bildirim' => 'Seo Güncelleme Başarılı.',
            'alert-type' => 'success',
        ];

        return Redirect()->back()->with($mesaj);
    }
    //END ELSE
}
