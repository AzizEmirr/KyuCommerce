<?php
namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Anasayfa;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class AnasayfaController extends Controller
{
    public function AnasayfaDuzenle()
    {
        $anasayfa = Anasayfa::find(1);
        return view('admin.anasayfa.anasayfa', compact('anasayfa'));
    }
    // FONKSİYON BİTTİ

    #ANASAYFA AKTİF PASİF İŞLEMİ
    public function AnasayfaDurum(Request $request)
    {
        $anasayfa = Anasayfa::first();
        if (! $anasayfa) {
            return response()->json([
                'success'    => false,
                'message'    => 'Anasayfa ayarları bulunamadı.',
                'alert-type' => 'error',
            ]);
        }

        $field = $request->field;
        if (! in_array($field, ['headerdurum', 'bannerdurum', 'kategoridurum', 'discorddurum', 'urundurum', 'referansdurum', 'sosyaldurum', 'footerdurum'])) {
            return response()->json([
                'success'    => false,
                'message'    => 'Geçersiz alan.',
                'alert-type' => 'error',
            ]);
        }

        $anasayfa->$field = $request->durum;
        $anasayfa->save();

        return response()->json([
            'success'    => true,
            'message'    => 'Durum güncellendi.',
            'alert-type' => $request->durum == 1 ? 'success' : 'warning',
        ]);
    }
    //AKTİF PASİF İŞLEMİ BİTTİ

    #DİSCORD FORUM
    public function AnasayfaGuncelle(Request $request)
    {
        $anasayfa_id = $request->id;

        $anasayfa = Anasayfa::findOrFail($anasayfa_id);

        if ($request->hasFile('dcarkaplanresim')) {
            $dcarkaplanresim      = $request->file('dcarkaplanresim');
            $dcarkaplanresimadi   = hexdec(uniqid()) . '.' . $dcarkaplanresim->getClientOriginalExtension();
            $dcarkaplanresim_path = public_path('uploads/discord/' . $dcarkaplanresimadi);

            Image::make($dcarkaplanresim)->resize(1920, 915)->save($dcarkaplanresim_path);

            if (file_exists(public_path($anasayfa->dcarkaplanresim))) {
                unlink(public_path($anasayfa->dcarkaplanresim));
            }

            $dcarkaplanresim_kaydet = 'uploads/discord/' . $dcarkaplanresimadi;

            $anasayfa->update([
                'dcyoutubevideo'  => $request->dcyoutubevideo,
                'dcbaslik'        => $request->dcbaslik,
                'dcaciklama'      => $request->dcaciklama,
                'dcbuton'      => $request->dcbuton,
                'dcarkaplanresim' => $dcarkaplanresim_kaydet,
            ]);
        } else {
            $anasayfa->update([
                'dcyoutubevideo' => $request->dcyoutubevideo,
                'dcbaslik'       => $request->dcbaslik,
                'dcaciklama'     => $request->dcaciklama,
                'dcbuton'     => $request->dcbuton,
            ]);
        }

        $mesaj = [
            'bildirim'   => 'Discord kısmı başarıyla güncellendi.',
            'alert-type' => 'success',
        ];

        return Redirect()->back()->with($mesaj);
    }
    //END ELSE

}
