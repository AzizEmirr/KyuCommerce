<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Urunler;
use App\Models\Altkategoriler;

class SearchController extends Controller
{
    public function search(Request $request){
        $searchTerm = $request->input('q');
        $sonurunler = Urunler::where('durum', 1)->orderBy('created_at', 'desc')->limit(3)->get();
        $altkategoriler = Altkategoriler::orderBy('altkategori_adi', 'ASC')->get();
        if (empty($searchTerm)) {
            return redirect()->back()->with('error', 'Lütfen bir arama terimi girin.');
        }

        $urunler = Urunler::query()
            ->where('baslik', 'LIKE', "%{$searchTerm}%")   
            ->orWhere('aciklama', 'LIKE', "%{$searchTerm}%")  
            ->orWhere('url', 'LIKE', "%{$searchTerm}%")   
            ->orWhere('resim', 'LIKE', "%{$searchTerm}%")  
            ->orWhere('tag', 'LIKE', "%{$searchTerm}%")  
            ->orWhere('metin', 'LIKE', "%{$searchTerm}%")  
            ->paginate(10);

        return view('frontend.pages.search', compact('urunler', 'searchTerm','sonurunler', 'altkategoriler'));
    }

    
}
