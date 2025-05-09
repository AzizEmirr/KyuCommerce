<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RenkPaleti;
use Illuminate\Support\Carbon;

class RenkPaletiController extends Controller
{
    public function RenkPaleti()
    {
        // İlgili renk paletini bul
        $renkpaleti = RenkPaleti::first();  // veya find(1), ID'ye göre de alabilirsiniz.
        return view('admin.anasayfa.renkpaleti', compact('renkpaleti'));
    }

    public function RenkGuncelle(Request $request)
    {
        $renk_id = $request->id;

        // Renk paleti kaydını bul
        $update = RenkPaleti::findOrFail($renk_id);  // id'ye göre bul

        $update->renk_adi = $request->renk_adi;
        $update->renk_kodu = $request->renk_kodu;
        $update->updated_at = Carbon::now();
        $update->save();

        $mesaj = [
            'bildirim' => 'Renk Paleti başarıyla güncellendi.',
            'alert-type' => 'success',
        ];

        return Redirect()->route('renkpaleti')->with($mesaj);
    }
}
