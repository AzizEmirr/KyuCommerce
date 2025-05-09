<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Logo;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Carbon;

class LogoController extends Controller
{
    public function LogoDuzenle()
    {
        $logoduzenle = Logo::find(1);
        return view('admin.anasayfa.logo_duzenle', compact('logoduzenle'));
    }
    // FONKSİYON BİTTİ

    #LOGO GUNCELLEME FORMU
    public function LogoGuncelle(Request $request)
    {
        $logo_id = $request->id;

        $logo = Logo::findOrFail($logo_id);

        if ($request->hasFile('siyahLogo')) {

            $siyahLogo = $request->file('siyahLogo');
            $siyahLogoAdi = hexdec(uniqid()) . '.' . $siyahLogo->getClientOriginalExtension();
            $siyahLogoPath = public_path('uploads/logo/' . $siyahLogoAdi);

            Image::make($siyahLogo)->save($siyahLogoPath);

            if (file_exists(public_path($logo->siyahLogo))) {
                unlink(public_path($logo->siyahLogo));
            }

            $siyahLogoKaydet = 'uploads/logo/' . $siyahLogoAdi;
        } else {
            $siyahLogoKaydet = $logo->siyahLogo;
        }

        if ($request->hasFile('beyazLogo')) {

            $beyazLogo = $request->file('beyazLogo');
            $beyazLogoAdi = hexdec(uniqid()) . '.' . $beyazLogo->getClientOriginalExtension();
            $beyazLogoPath = public_path('uploads/logo/' . $beyazLogoAdi);

            Image::make($beyazLogo)->save($beyazLogoPath);

            if (file_exists(public_path($logo->beyazLogo))) {
                unlink(public_path($logo->beyazLogo));
            }

            $beyazLogoKaydet = 'uploads/logo/' . $beyazLogoAdi;
        } else {
            $beyazLogoKaydet = $logo->beyazLogo;
        }

        if ($request->hasFile('favicon')) {

            $favicon = $request->file('favicon');
            $faviconAdi = hexdec(uniqid()) . '.' . $favicon->getClientOriginalExtension();
            $faviconPath = public_path('uploads/logo/' . $faviconAdi);

            Image::make($favicon)->resize(32, 32)->save($faviconPath);

            if (file_exists(public_path($logo->favicon))) {
                unlink(public_path($logo->favicon));
            }

            $faviconKaydet = 'uploads/logo/' . $faviconAdi;
        } else {
            $faviconKaydet = $logo->favicon;
        }

        $logo->update([
            'siyahLogo' => $siyahLogoKaydet,
            'beyazLogo' => $beyazLogoKaydet,
            'favicon' => $faviconKaydet,
        ]);

        $mesaj = [
            'bildirim' => 'Güncelleme Başarılı.',
            'alert-type' => 'success',
        ];

        return redirect()->back()->with($mesaj);
    }
}
