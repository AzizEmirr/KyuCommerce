<?php
namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Intervention\Image\Facades\Image;

class BannerController extends Controller
{
    public function BannerListe()
    {
        $bannerliste = Banner::latest()->get();
        return view('admin.banner.banner_liste', compact('bannerliste'));
    }
    //FONKSİYON BİTTİ

    #BANNER AKTİF PASİF İŞLEMİ
    public function BannerDurum(Request $request)
    {
        $urun = Banner::find($request->urun_id);
        if (! $urun) {
            return response()->json([
                'success'    => false,
                'message'    => 'Banner bulunamadı.',
                'alert-type' => 'error',
            ]);
        }

        $urun->durum = $request->durum;
        $urun->save();

        $message = $request->durum == 1 ? 'Banner aktif hale getirildi.' : 'Banner pasif hale getirildi.';

        return response()->json([
            'success'    => true,
            'message'    => $message,
            'alert-type' => $request->durum == 1 ? 'success' : 'warning',
        ]);
    }
    //AKTİF PASİF İŞLEMİ BİTTİ

    public function BannerEkle()
    {
        return view('admin.banner.banner_ekle');
    }
    //FONKSİYON BİTTİ

    #BANNER EKLEME FORMU
    public function BannerEkleForm(Request $request)
    {

        $banner              = new Banner();
        $banner->ust_baslik  = $request->ust_baslik;
        $banner->baslik      = $request->baslik;
        $banner->aciklama    = $request->aciklama;
        $banner->button_text = $request->button_text;
        $banner->button_url  = $request->button_url;
        $banner->durum       = 1;
        $banner->sirano      = $request->sirano;
        $banner->created_at  = Carbon::now();

        if ($request->hasFile('resim')) {
            $resim      = $request->file('resim');
            $resimadi   = hexdec(uniqid()) . '.' . $resim->getClientOriginalExtension();
            $resim_path = public_path('uploads/banner/' . $resimadi);

            Image::make($resim)->save($resim_path);

            $banner->resim = 'uploads/banner/' . $resimadi;
        }

        if ($request->hasFile('arkaplan')) {
            $arkaplan      = $request->file('arkaplan');
            $arkaplanadi   = hexdec(uniqid()) . '.' . $arkaplan->getClientOriginalExtension();
            $arkaplan_path = public_path('uploads/banner/' . $arkaplanadi);

            Image::make($arkaplan)->save($arkaplan_path);

            $banner->arkaplan = 'uploads/banner/' . $arkaplanadi;
        }

        if ($request->hasFile('yaziresim')) {
            $yaziresim      = $request->file('yaziresim');
            $yaziresimadi   = hexdec(uniqid()) . '.' . $yaziresim->getClientOriginalExtension();
            $yaziresim_path = public_path('uploads/banner/' . $yaziresimadi);

            Image::make($yaziresim)->resize(297, 54)->save($yaziresim_path);

            $banner->yaziresim = 'uploads/banner/' . $yaziresimadi;
        }

        $banner->save();

        $mesaj = [
            'bildirim'   => 'Banner başarıyla eklendi.',
            'alert-type' => 'success',
        ];

        return Redirect()->route('banner.liste')->with($mesaj);
    }
    //BANNER EKLEME FORMU BİTTİ

    public function BannerDuzenle($id)
    {
        $bannerduzenle = Banner::findOrFail($id);
        return view('admin.banner.banner_duzenle', compact('bannerduzenle'));
    }
    //FONKSİYON BİTTİ

    #BANNER GÜNCELLEME FORMU
    public function BannerGuncelle(Request $request)
    {

        $bannerduzenle = $request->id;
        $eski_resim    = $request->onceki_resim;
        $eski_arkaplan    = $request->onceki_arkaplan;

        // Kategori kaydını bul
        $bannerduzenle = Banner::findOrFail($bannerduzenle);

        $bannerduzenle->ust_baslik  = $request->ust_baslik;
        $bannerduzenle->baslik      = $request->baslik;
        $bannerduzenle->aciklama    = $request->aciklama;
        $bannerduzenle->button_text = $request->button_text;
        $bannerduzenle->button_url  = $request->button_url;
        $bannerduzenle->sirano      = $request->sirano;
        $bannerduzenle->updated_at  = Carbon::now();

        if ($request->hasFile('resim')) {
            $resim      = $request->file('resim');
            $resimadi   = hexdec(uniqid()) . '.' . $resim->getClientOriginalExtension();
            $resim_path = public_path('uploads/banner/' . $resimadi);

            Image::make($resim)->save($resim_path);

            $bannerduzenle->resim = 'uploads/banner/' . $resimadi;

            if ($eski_resim && file_exists(public_path($eski_resim))) {
                unlink(public_path($eski_resim));
            }
        }

        if ($request->hasFile('arkaplan')) {
            $arkaplan      = $request->file('arkaplan');
            $arkaplanadi   = hexdec(uniqid()) . '.' . $arkaplan->getClientOriginalExtension();
            $arkaplan_path = public_path('uploads/banner/' . $arkaplanadi);

            Image::make($arkaplan)->resize(1920, 1080)->save($arkaplan_path);

            $bannerduzenle->arkaplan = 'uploads/banner/' . $arkaplanadi;

            if ($eski_arkaplan && file_exists(public_path($eski_arkaplan))) {
                unlink(public_path($eski_arkaplan));
            }
        }

        if ($request->hasFile('yaziresim')) {
            $yaziresim      = $request->file('yaziresim');
            $yaziresimadi   = hexdec(uniqid()) . '.' . $yaziresim->getClientOriginalExtension();
            $yaziresim_path = public_path('uploads/banner/' . $yaziresimadi);

            Image::make($yaziresim)->resize(297, 54)->save($yaziresim_path);

            $bannerduzenle->yaziresim = 'uploads/banner/' . $yaziresimadi;

            if ($eski_yaziresim && file_exists(public_path($eski_yaziresim))) {
                unlink(public_path($eski_yaziresim));
            }
        }

        $bannerduzenle->save();

        $mesaj = [
            'bildirim'   => 'Banner başarıyla güncellendi.',
            'alert-type' => 'success',
        ];

        return Redirect()->route('banner.liste')->with($mesaj);
    }
    //BANNER GÜNCELLEME FORMU BİTTİ

    #BANNER SİL
    public function BannerSil($id)
    {
        $banner = Banner::findOrFail($id);
    
        $resimler = [
            $banner->resim,
            $banner->arkaplan,
            $banner->yaziresim,
        ];
    
        // Her dosyayı ayrı ayrı kontrol edip sil
        foreach ($resimler as $resim) {
            if (!empty($resim) && file_exists(public_path($resim))) {
                unlink(public_path($resim));
            }
        }
    
        $banner->delete();
    
        $mesaj = [
            'bildirim'   => 'Banner Başarıyla Silindi.',
            'alert-type' => 'success',
        ];
    
        return redirect()->back()->with($mesaj);
    }
    
    //BANNER SİLME BİTTİ

} // CLASS BİTTİ
