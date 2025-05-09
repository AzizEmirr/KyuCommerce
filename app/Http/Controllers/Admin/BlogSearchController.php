<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blogicerik;
use App\Models\Blogkategoriler;

class BlogSearchController extends Controller
{
    public function search(Request $request)
    {
        $searchTerm = $request->input('q');

        if (empty($searchTerm)) {
            return redirect()->back()->with('error', 'Lütfen bir arama terimi girin.');
        }

        // Blog içerikleri ve kategorilerde arama
        $bloglar = BlogIcerik::query()
            ->where('baslik', 'LIKE', "%{$searchTerm}%")   
            ->orWhere('metin', 'LIKE', "%{$searchTerm}%")  
            ->orWhereHas('Kategoriler', function($query) use ($searchTerm) {
                $query->where('kategori_adi', 'LIKE', "%{$searchTerm}%");
            })
            ->get();  

        return view('frontend.blog.search', compact('bloglar', 'searchTerm'));
    }
}
