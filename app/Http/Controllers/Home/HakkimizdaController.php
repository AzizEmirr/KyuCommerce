<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Hakkimizda;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Carbon;
class HakkimizdaController extends Controller
{
    public function Hakkimizda()
    {
        $hakkimizda = Hakkimizda::find(1);
        return view('admin.anasayfa.hakkimizda_duzenle', compact('hakkimizda'));
    }
    // FONKSİYON BİTTİ

    #HAKKIMIZDA AKTİF PASİF İŞLEMİ
    public function HakkimizdaDurum(Request $request)
    {
        $urun = Hakkimizda::find($request->urun_id);
        if (! $urun) {
            return response()->json([
                'success'    => false,
                'message'    => 'Hakkımızda kısmı bulunamadı.',
                'alert-type' => 'error',
            ]);
        }

        $urun->durum = $request->durum;
        $urun->save();

        $message = $request->durum == 1 ? 'Hakkımızda sayfası aktif hale getirildi.' : 'Hakkımızda sayfası pasif hale getirildi.';

        return response()->json([
            'success'    => true,
            'message'    => $message,
            'alert-type' => $request->durum == 1 ? 'success' : 'warning',
        ]);
    }
    //AKTİF PASİF İŞLEMİ BİTTİ

    public function HakkimizdaGuncelle(Request $request)
    {
        $hakkimizda_id = $request->id;
    
        $hakkimizda = Hakkimizda::findOrFail($hakkimizda_id);
    
        if ($request->hasFile('resim')) {
            $resim = $request->file('resim');
            $resimadi = hexdec(uniqid()) . '.' . $resim->getClientOriginalExtension();
            $resim_path = public_path('uploads/hakkimizda/' . $resimadi);
    
            Image::make($resim)->resize(363, 487)->save($resim_path);
    
            if (file_exists(public_path($hakkimizda->resim))) {
                unlink(public_path($hakkimizda->resim));
            }
    
            $resim_kaydet = 'uploads/hakkimizda/' . $resimadi;
        }
    
        if ($request->hasFile('resim2')) {
            $resim2 = $request->file('resim2');
            $resim2adi = hexdec(uniqid()) . '.' . $resim2->getClientOriginalExtension();
            $resim2_path = public_path('uploads/hakkimizda/' . $resim2adi);
    
            Image::make($resim2)->resize(519, 382)->save($resim2_path);
    
            if (file_exists(public_path($hakkimizda->resim2))) {
                unlink(public_path($hakkimizda->resim2));
            }
    
            $resim2_kaydet = 'uploads/hakkimizda/' . $resim2adi;
        }
    
        $hakkimizda->update([
            'baslik' => $request->baslik,
            'aciklama' => $request->aciklama,
            'metin' => $request->metin,
            'resim' => isset($resim_kaydet) ? $resim_kaydet : $hakkimizda->resim,
            'resim2' => isset($resim2_kaydet) ? $resim2_kaydet : $hakkimizda->resim2,
        ]);
    
        $mesaj = [
            'bildirim' => 'Güncelleme Başarılı.',
            'alert-type' => 'success',
        ];
    
        return Redirect()->back()->with($mesaj);
    }
    
    //END ELSE

    public function HakkimizdaFront()
    {
        $hakkimizda = Hakkimizda::find(1);

        return view('frontend.sayfalar.hakkimizda', compact('hakkimizda'));
    }
    //FONKSİYON BİTTİ
} // CLASS BİTTİ
