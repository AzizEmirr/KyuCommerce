<?php
namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Kurumsal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class KurumsalController extends Controller
{

    public function Kurumsal()
    {
        $kurumsal = Kurumsal::whereIn('id', [1, 2, 3])->get();
        return view('admin.anasayfa.kurumsal', compact('kurumsal'));
    } // FONKSİYON BİTTİ

    #KURUMSAL AKTİF PASİF İŞLEMİ
    public function KurumsalDurum(Request $request)
    {
        $urun = Kurumsal::find($request->urun_id);
        if (!$urun) {
            return response()->json([
                'success' => false,
                'message' => 'İçerik bulunamadı.',
                'alert-type' => 'error',
            ]);
        }
    
        $urun->durum = $request->durum;
        $urun->save();
    
        $message = $request->durum == 1 ? 'Sayfa aktif hale getirildi.' : 'Sayfa pasif hale getirildi.';
    
        return response()->json([
            'success'    => true,
            'message'    => $message,
            'alert-type' => $request->durum == 1 ? 'success' : 'warning',
        ]);
    }
    
    //AKTİF PASİF İŞLEMİ BİTTİ

    public function kurumsalGuncelle(Request $request, $id)
    {

        $kurumsal = Kurumsal::findOrFail($id);

        if ($request->hasFile('resim')) {
            $resim      = $request->file('resim');
            $resimadi   = hexdec(uniqid()) . '.' . $resim->getClientOriginalExtension();
            $resim_path = public_path('uploads/kurumsal/' . $resimadi);

            Image::make($resim)->save($resim_path);

            if (! empty($kurumsal->resim) && File::exists(public_path($kurumsal->resim))) {
                File::delete(public_path($kurumsal->resim));
            }

            $resim_kaydet = 'uploads/kurumsal/' . $resimadi;
        } else {
            $resim_kaydet = $kurumsal->resim;
        }

        $kurumsal->update([
            'ustbaslik' => $request->ustbaslik,
            'baslik'    => $request->baslik,
            'metin'     => $request->metin,
            'resim'     => $resim_kaydet,
        ]);

        $kurumsal->save();

        $mesaj = [
            'bildirim'   => 'Güncelleme Başarılı.',
            'alert-type' => 'success',
        ];

        return Redirect()->back()->with($mesaj);
    }
    //GUNCELLEME İŞLEMİ BİTTİ

}
