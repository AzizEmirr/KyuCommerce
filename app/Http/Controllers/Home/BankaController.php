<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banka;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Carbon;

class BankaController extends Controller
{
    public function Banka()
    {
        $banka = Banka::find(1);
        return view('admin.anasayfa.banka_duzenle', compact('banka'));
    }
    // FONKSİYON BİTTİ

    public function BankaGuncelle(Request $request)
    {
        $banka_id = $request->id;

        $banka = Banka::findOrFail($banka_id);

            $banka->update([
                'baslik' => $request->baslik,
                'metin' => $request->metin,
            ]);

        $mesaj = [
            'bildirim' => 'Güncelleme Başarılı.',
            'alert-type' => 'success',
        ];

        return Redirect()->back()->with($mesaj);
    }
    //END ELSE

} // CLASS BİTTİ
