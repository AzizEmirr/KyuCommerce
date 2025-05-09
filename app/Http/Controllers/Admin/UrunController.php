<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kategoriler;
use App\Models\Altkategoriler;
use App\Models\Urunler;
use App\Models\UrunMedya;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class UrunController extends Controller
{
    
    public function UrunListe()
    {
        $urunliste = Urunler::orderby('sirano' , 'DESC')->get();
        return view('admin.urunler.urun_liste', compact('urunliste'));
    }
    //FONKSİYON BİTTİ

    #ÜRÜN AKTİF PASİF İŞLEMİ
    public function UrunDurum(Request $request)
    {
        $urun = Urunler::find($request->urun_id);
        if (!$urun) {
            return response()->json([
                'success' => false,
                'message' => 'Ürünbulunamadı.',
                'alert-type' => 'error',
            ]);
        }

        $urun->durum = $request->durum;
        $urun->save();

        $message = $request->durum == 1 ? 'Ürün Aktif hale getirildi.' : 'Ürün Pasif hale getirildi.';

        return response()->json([
            'success' => true,
            'message' => $message,
            'alert-type' => $request->durum == 1 ? 'success' : 'warning',
        ]);
    }
    //AKTİF PASİF İŞLEMİ BİTTİ

    public function UrunEkle()
    {
        $kategoriler = Kategoriler::latest()->get();
        return view('admin.urunler.urun_ekle', compact('kategoriler'));
    }
    //FONKSİYON BİTTİ

    #ÜRÜN EKLEME İŞLEMİ
    public function UrunEkleForm(Request $request)
    {
        $request->validate(
            [
                'kategori_id' => 'required',
                'altkategori_id' => 'required',
            ],
            [
                'kategori_id.required' => 'Lütfen bir kategori seçiniz',
                'altkategori_id.required' => 'Lütfen bir alt kategori seçiniz',
            ],
        );
    
        $urunekle = new Urunler();
        $urunekle->kategori_id = $request->kategori_id;
        $urunekle->altkategori_id = $request->altkategori_id;
        $urunekle->baslik = $request->baslik;
        $urunekle->url = str()->slug($request->baslik);
    
        // Tagleri işleme
        if ($request->filled('tags_hidden')) {
            $tags = explode(',', $request->tags_hidden);
            $urunekle->tag = implode(',', $tags);
        }
    
        $urunekle->metin = $request->metin;
        $urunekle->anahtar = $request->anahtar;
        $urunekle->aciklama = $request->aciklama;
        $urunekle->sirano = $request->sirano;
        $urunekle->fiyat = $request->fiyat;
        $urunekle->stok = $request->stok;
        $urunekle->link = $request->link;
        $urunekle->durum = 1;
        $urunekle->created_at = Carbon::now();
    
        // Resim işlemi
        if ($request->hasFile('resim')) {
            $resim = $request->file('resim');
            $resimadi = hexdec(uniqid()) . '.' . $resim->getClientOriginalExtension();
            $resim_path = public_path('uploads/urunler/' . $resimadi);
    
            Image::make($resim)->resize(537, 545)->save($resim_path);
            $urunekle->resim = 'uploads/urunler/' . $resimadi;
        }
    
        $urunekle->save();
    
        $mesaj = [
            'bildirim' => 'Ürün başarıyla eklendi.',
            'alert-type' => 'success',
        ];
    
        return Redirect()->route('urun.liste')->with($mesaj);
    }
    //ÜRÜN EKLEME BİTTİ

    public function UrunDuzenle($id)
    {
        $kategoriler = Kategoriler::latest()->get();
        $altkategoriler = Altkategoriler::latest()->get();
        $urunler = Urunler::findOrFail($id);
        return view('admin.urunler.urun_duzenle', compact('kategoriler', 'altkategoriler', 'urunler'));
    }
    //FONKSİYON BİTTİ

    #ÜRÜN GÜNCELLE
    public function UrunGuncelle(Request $request)
    {
        $request->validate(
            [
                'kategori_id' => 'required',
                'altkategori_id' => 'required',
            ],
            [
                'kategori_id.required' => 'Lütfen bir kategori seçiniz',
                'altkategori_id.required' => 'Lütfen bir alt kategori seçiniz',
            ],
        );
    
        $urun_id = $request->id;
        $eski_resim = $request->onceki_resim;
    
        $urunler = Urunler::findOrFail($urun_id);
    
        $urunler->kategori_id = $request->kategori_id;
        $urunler->altkategori_id = $request->altkategori_id;
        $urunler->baslik = $request->baslik;
        $urunler->url = str()->slug($request->baslik);
    
        if ($request->filled('tags_hidden')) {
            $tags = explode(',', $request->tags_hidden);
            $urunler->tag = implode(',', $tags);
        } else {
            $urunler->tag = null;
        }
    
        $urunler->metin = $request->metin;
        $urunler->anahtar = $request->anahtar;
        $urunler->aciklama = $request->aciklama;
        $urunler->sirano = $request->sirano;
        $urunler->fiyat = $request->fiyat;
        $urunler->durum = $urunler->durum;
        $urunler->stok = $request->stok;
        $urunler->link = $request->link;
        $urunler->updated_at = Carbon::now();
    
        // Yeni resim yükleme işlemi
        if ($request->hasFile('resim')) {
            $resim = $request->file('resim');
            $resimadi = hexdec(uniqid()) . '.' . $resim->getClientOriginalExtension();
            $resim_path = public_path('uploads/urunler/' . $resimadi);
    
            Image::make($resim)->resize(537, 545)->save($resim_path);
    
            // Eski resmi silme
            if ($eski_resim && file_exists(public_path($eski_resim))) {
                unlink(public_path($eski_resim));
            }
    
            $urunler->resim = 'uploads/urunler/' . $resimadi;
        }
    
        $urunler->save();
    
        $mesaj = [
            'bildirim' => 'Ürün başarıyla güncellendi.',
            'alert-type' => 'success',
        ];
    
        return redirect()->route('urun.liste')->with($mesaj);
    }
    
    //ÜRÜN GÜNCELLEME BİTTİ

    #ÜRÜN SİLME
    public function UrunSil($id)
    {
        $urunler = Urunler::findOrFail($id);
        $resim = $urunler->resim;

        // Dosyanın var olup olmadığını kontrol ediyoruz
        if (file_exists($resim)) {
            unlink($resim);
        }

        $urunler->delete();

        $mesaj = [
            'bildirim' => 'ÜrünBaşarıyla Silindi.',
            'alert-type' => 'success',
        ];

        return redirect()->back()->with($mesaj);
    }
    // ÜRÜN SİLME BİTTİ



    // MEDYA KISMI AŞAĞIDA



    public function MedyaEkle()
    {
        $urunler = Urunler::all();
        return view('admin.urunler.medya_ekle', compact('urunler'));
    }
    //FONKSİYON BİTTİ
    
    #URUN MEDYA EKLEME
    public function MedyaEkleForm(Request $request) {
        $request->validate([
            'urun_id' => 'required', 
            'resim.*' => 'mimes:jpg,jpeg,png,gif,mp4,mov,avi,video/mp4,video/quicktime', 
        ], [
            'urun_id'=> 'Bir Ürün Seçmeniz Gerekmektedir',
            'resim.*.mimes' => 'Sadece JPG, JPEG, PNG, GIF resimleri ve MP4, MOV, AVI videolarını yükleyebilirsiniz.',
            'resim.*.max' => 'Dosya boyutu 10MB\'ı geçemez.',
        ]);
        
    
        $urun_id = $request->input('urun_id'); 
    
        $resimler = $request->file('resim');
        if ($resimler && is_array($resimler)) {
            foreach ($resimler as $resim) {
                $resimadi = hexdec(uniqid()) . '.' . $resim->getClientOriginalExtension();
                $path = 'uploads/urunler/urun_medya/' . $resimadi;
            
                if (in_array($resim->getClientOriginalExtension(), ['jpg', 'jpeg', 'png', 'gif'])) {
                    Image::make($resim)->resize(537, 545)->save($path);
                } else {
                    $resim->move(public_path('uploads/urunler/urun_medya'), $resimadi);
                }
            
                $resim_kaydet = $path;
            
                UrunMedya::insert([
                    'urun_id' => $urun_id,
                    'medya_url' => $resim_kaydet,
                    'medya_tipi' => in_array($resim->getClientOriginalExtension(), ['mp4', 'mov', 'avi']) ? 'video' : 'image',
                    'created_at' => Carbon::now(),
                ]);
            }
            
    
            $mesaj = [
                'bildirim' => 'Medya Başarıyla Eklendi.',
                'alert-type' => 'success',
            ];
        } else {
            $mesaj = [
                'bildirim' => 'Hiçbir dosya yüklenmedi.',
                'alert-type' => 'error',
            ];
        }
    
        return redirect()->back()->with($mesaj);
    }
    //ÜRÜN MEDYA EKLEME BİTTİ

    public function TumMedya()
    {
        $urunler = Urunler::all();
        $tummedya = UrunMedya::all();
        return view('admin.urunler.tum_medya', compact('urunler','tummedya'));
    }
    //FONKSİYON BİTTİ

    public function MedyaDuzenle($id)
    {
        $resim = UrunMedya::findOrFail($id);
        $urunler = Urunler::all();
        $urun = Urunler::find($resim->urun_id);
        return view('admin.urunler.medya_duzenle', compact('resim', 'urunler', 'urun'));
    }
    //FONKSİYON BİTTİ

    #URUN MEDYA GÜNCELLEME
    public function MedyaGuncelle(Request $request)
    {
        $request->validate([
            'urun_id' => 'required', 
            'resim.*' => 'mimes:jpg,jpeg,png,gif,mp4,mov,avi,video/mp4,video/quicktime', 
        ], [
            'urun_id'=> 'Bir Ürün Seçmeniz Gerekmektedir',
            'resim.*.mimes' => 'Sadece JPG, JPEG, PNG, GIF resimleri ve MP4, MOV, AVI videolarını yükleyebilirsiniz.',
            'resim.*.max' => 'Dosya boyutu 10MB\'ı geçemez.',
        ]);
    
        $medya_id = $request->id; 
        $onceki_resim = $request->onceki_resim; 
    
        $medya = UrunMedya::findOrFail($medya_id);
    
        $medya->urun_id = $request->urun_id;
    
        if ($request->hasFile('resim')) {
            $resimler = $request->file('resim');
    
            foreach ($resimler as $resim) {
                $resimadi = hexdec(uniqid()) . '.' . $resim->getClientOriginalExtension();
                $path = 'uploads/urunler/urun_medya/' . $resimadi;
    
                if (in_array($resim->getClientOriginalExtension(), ['jpg', 'jpeg', 'png', 'gif'])) {
                    Image::make($resim)->resize(537, 545)->save($path); 
                } else {
                    $resim->move(public_path('uploads/urunler/urun_medya'), $resimadi);
                }
    
                $medya->medya_url = $path;
    
                // Eski medyayı sil
                if ($onceki_resim && file_exists(public_path($onceki_resim))) {
                    unlink(public_path($onceki_resim)); 
                }
            }
        }
    
        // Medya kaydını güncelle
        $medya->save();
    
        // Başarı mesajı
        $mesaj = [
            'bildirim' => 'Medya başarıyla güncellendi.',
            'alert-type' => 'success',
        ];
    
        return redirect()->route('tum.medya')->with($mesaj);
    }
    //ÜRÜN MEDYA GÜNCELLEME BİTTİ

    public function MedyaDurum(Request $request)
    {
        $urun = UrunMedya::find($request->urun_id);
        if (!$urun) {
            return response()->json([
                'success' => false,
                'message' => 'Medya Bulunamadı.',
                'alert-type' => 'error',
            ]);
        }

        $urun->durum = $request->durum;
        $urun->save();

        $message = $request->durum == 1 ? 'Medya Aktif hale getirildi.' : 'Medya Pasif hale getirildi.';

        return response()->json([
            'success' => true,
            'message' => $message,
            'alert-type' => $request->durum == 1 ? 'success' : 'warning',
        ]);
    }
    //MEDYA DURUM BİTTİ

    #URUN MEDYA SİLME
    public function MedyaSil($id)
    {
        $medya = UrunMedya::findOrFail($id);

        if ($medya->medya_url && file_exists(public_path($medya->medya_url))) {
            unlink(public_path($medya->medya_url));
        }

        $medya->delete();

        $mesaj = [
            'bildirim' => 'Medya başarıyla silindi.',
            'alert-type' => 'success',
        ];

        return redirect()->route('tum.medya')->with($mesaj); 
    }



}
