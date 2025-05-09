<?php

use App\Http\Controllers\Admin\AltkategoriController;
use App\Http\Controllers\Admin\BlogicerikController;
use App\Http\Controllers\Admin\BlogkategoriController;
use App\Http\Controllers\Admin\GaleriController;
use App\Http\Controllers\Admin\KategoriController;
use App\Http\Controllers\Admin\RenkPaletiController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SoruController;
use App\Http\Controllers\Admin\SearchController;
use App\Http\Controllers\Admin\UrunController;
use App\Http\Controllers\Home\AnasayfaController;
use App\Http\Controllers\Home\AyarlarController;
use App\Http\Controllers\Home\BankaController;
use App\Http\Controllers\Home\BannerController;
use App\Http\Controllers\Home\FrontController;
use App\Http\Controllers\Home\HakkimizdaController;
use App\Http\Controllers\Home\KurumsalController;
use App\Http\Controllers\Home\LogoController;
use App\Http\Controllers\Home\SeoController;
use App\Http\Controllers\Home\YorumController;
use App\Http\Controllers\Home\ReferansController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ThemeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
 */

// yönlendirme
Route::middleware('auth')->group(function () {

    //ThemeController
    Route::post('/update-mode', [ThemeController::class, 'updateMode'])->name('updateMode');

    //Ayarlar
    Route::controller(AyarlarController::class)->group(function () {
        Route::get('/ayarlar/duzenle', 'AyarlarDuzenle')->name('ayarlar.duzenle')->middleware('role_or_permission:ayarlar.duzenle');
        Route::post('/ayarlar/guncelle', 'AyarlarGuncelle')->name('ayarlar.guncelle');
    });

    //AnaSayfa
    Route::controller(AnasayfaController::class)->group(function () {
        Route::get('/anasayfa/duzenle', 'AnasayfaDuzenle')->name('anasayfa.duzenle')->middleware('role_or_permission:anasayfa.duzenle');
        Route::get('/anasayfa/durum', 'AnasayfaDurum');
        Route::post('/anasayfa/guncelle', 'AnasayfaGuncelle')->name('anasayfa.guncelle');
    });

    //Referanslar
    Route::controller(ReferansController::class)->group(function () {
        Route::get('/referans/liste', 'ReferansListe')->name('referans.liste')->middleware('role_or_permission:referans.liste');
        Route::get('/referans/ekle', 'ReferansEkle')->name('referans.ekle')->middleware('role_or_permission:referans.ekle');
        Route::get('/referans/durum', 'ReferansDurum');
        Route::post('/referans/ekle/form', 'ReferansEkleForm')->name('referans.ekle.form')->middleware('role_or_permission:referans.ekle');
        Route::get('/referans/duzenle/{id}', 'ReferansDuzenle')->name('referans.duzenle')->middleware('role_or_permission:referans.duzenle');
        Route::post('/referans/guncelle/form', 'ReferansGuncelle')->name('referans.guncelle.form')->middleware('role_or_permission:referans.duzenle');
        Route::delete('/referans/sil/{id}', 'ReferansSil')->name('referans.sil')->middleware('role_or_permission:referans.sil');
    });

    //Renk
    Route::controller(RenkPaletiController::class)->group(function () {
        Route::get('/renk/paleti', 'RenkPaleti')->name('renkpaleti')->middleware('role_or_permission:renk.ayarlari');
        Route::post('/renk/guncelle', 'RenkGuncelle')->name('renk.guncelle');
    });

    //Seo
    Route::controller(SeoController::class)->group(function () {
        Route::get('/seo/duzenle', 'SeoDuzenle')->name('seo.duzenle')->middleware('role_or_permission:seo.duzenle');
        Route::post('/seo/guncelle', 'SeoGuncelle')->name('seo.guncelle');
    });

    //Logo
    Route::controller(LogoController::class)->group(function () {
        Route::get('/logo/duzenle', 'LogoDuzenle')->name('logo.duzenle')->middleware('role_or_permission:logo.duzenle');
        Route::post('/logo/guncelle', 'LogoGuncelle')->name('logo.guncelle');
    });

    //Banner
    Route::controller(BannerController::class)->group(function () {
        Route::get('/banner/liste', 'BannerListe')->name('banner.liste')->middleware('role_or_permission:banner.liste');
        Route::get('/banner/durum', 'BannerDurum');
        Route::get('/banner/ekle', 'BannerEkle')->name('banner.ekle')->middleware('role_or_permission:banner.ekle');
        Route::post('/banner/ekle/form', 'BannerEkleForm')->name('banner.ekle.form')->middleware('role_or_permission:banner.ekle');
        Route::get('/banner/duzenle/{id}', 'BannerDuzenle')->name('banner.duzenle')->middleware('role_or_permission:banner.duzenle');
        Route::post('/banner/guncelle', 'BannerGuncelle')->name('banner.guncelle')->middleware('role_or_permission:banner.duzenle');
        Route::delete('/banner/sil/{id}', 'BannerSil')->name('banner.sil')->middleware('role_or_permission:banner.sil');

    });

    //Galeri
    Route::controller(GaleriController::class)->group(function () {
        Route::get('/galeri/liste', 'GaleriListe')->name('galeri.liste')->middleware('role_or_permission:galeri.liste');
        Route::get('/galeri/durum', 'GaleriDurum');
        Route::get('/galeri/ekle', 'GaleriEkle')->name('galeri.ekle')->middleware('role_or_permission:galeri.ekle');
        Route::post('/galeri/ekle/form', 'GaleriEkleForm')->name('galeri.ekle.form')->middleware('role_or_permission:galeri.ekle');
        Route::get('/galeri/duzenle/{id}', 'GaleriDuzenle')->name('galeri.duzenle')->middleware('role_or_permission:galeri.duzenle');
        Route::post('/galeri/guncelle', 'GaleriGuncelle')->name('galeri.guncelle')->middleware('role_or_permission:galeri.duzenle');
        Route::delete('/galeri/sil/{id}', 'GaleriSil')->name('galeri.sil')->middleware('role_or_permission:galeri.sil');

    });

    //Hakkımızda
    Route::controller(HakkimizdaController::class)->group(function () {
        Route::get('/hakkimizda/duzenle', 'Hakkimizda')->name('hakkimizdaduzenle')->middleware('role_or_permission:hak.duzenle');
        Route::get('/hakkimizda/durum', 'HakkimizdaDurum');
        Route::post('/hakkimizda/guncelle', 'HakkimizdaGuncelle')->name('hakkimizda.guncelle');
    });

    //Kurumsal
    Route::controller(KurumsalController::class)->group(function () {
        Route::get('/kurumsal/duzenle', 'Kurumsal')->name('kurumsal')->middleware('role_or_permission:kurumsal');
        Route::get('/kurumsal/durum', 'kurumsalDurum');
        Route::put('/kurumsal/guncelle/{id}', 'kurumsalGuncelle')->name('kurumsal.guncelle');
    });

    //Banka
    Route::controller(BankaController::class)->group(function () {
        Route::get('/banka/hesap/bilgilerini/duzenle', 'Banka')->name('bankaback')->middleware('role_or_permission:banka.hesap.goruntule');
        Route::post('/banka/guncelle', 'BankaGuncelle')->name('banka.guncelle');
    });

    //Ürün Kategori
    Route::controller(KategoriController::class)->group(function () {
        Route::get('/kategori/hepsi', 'KategoriHepsi')->name('kategori.hepsi')->middleware('role_or_permission:kategori.liste');
        Route::get('/kategori/durum', 'KategoriDurum');
        Route::get('/kategori/ekle', 'KategoriEkle')->name('kategori.ekle')->middleware('role_or_permission:kategori.ekle');
        Route::post('/kategori/ekle/form', 'KategoriEkleForm')->name('kategori.ekle.form')->middleware('role_or_permission:kategori.ekle');
        Route::get('/kategori/duzenle/{id}', 'KategoriDuzenle')->name('kategori.duzenle')->middleware('role_or_permission:kategori.duzenle');
        Route::post('/kategori/guncelle/form', 'KategoriGuncelleForm')->name('kategori.guncelle.form')->middleware('role_or_permission:kategori.duzenle');
        Route::delete('/kategori/sil/{id}', 'KategoriSil')->name('kategori.sil')->middleware('role_or_permission:kategori.sil');
    });

    //Ürün Alt Kategori
    Route::controller(AltkategoriController::class)->group(function () {
        Route::get('/altkategori/liste', 'AltkategoriListe')->name('altkategori.liste')->middleware('role_or_permission:altkategori.liste');
        Route::get('/altkategori/durum', 'AltKategoriDurum');
        Route::get('/altkategori/ekle', 'AltKategoriEkle')->name('altkategori.ekle')->middleware('role_or_permission:altkategori.ekle');
        Route::post('/altkategori/ekle/form', 'AltKategoriEkleForm')->name('altkategori.ekle.form')->middleware('role_or_permission:altkategori.ekle');
        Route::get('/altkategori/duzenle/{id}', 'AltKategoriDuzenle')->name('altkategori.duzenle')->middleware('role_or_permission:altkategori.duzenle');
        Route::post('/altkategori/guncelle', 'AltKategoriGuncelle')->name('altkategori.guncelle')->middleware('role_or_permission:altkategori.duzenle');
        Route::delete('/altkategori/sil/{id}', 'AltKategoriSil')->name('altkategori.sil')->middleware('role_or_permission:altkategori.sil');
        Route::get('/altkategoriler/ajax/{kategori_id}', 'AltAjax');
    });

    //Ürün
    Route::controller(UrunController::class)->group(function () {
        Route::get('/urun/liste', 'UrunListe')->name('urun.liste')->middleware('role_or_permission:urun.liste');
        Route::get('/urun/ekle', 'UrunEkle')->name('urun.ekle')->middleware('role_or_permission:urun.ekle');

        Route::post('/urun/ekle/form', 'UrunEkleForm')->name('urun.ekle.form')->middleware('role_or_permission:urun.duzenle');
        Route::get('/urun/duzenle/{id}', 'UrunDuzenle')->name('urun.duzenle')->middleware('role_or_permission:urun.duzenle');
        Route::post('/urun/guncelle/form', 'UrunGuncelle')->name('urun.guncelle.form')->middleware('role_or_permission:urun.duzenle');
        Route::delete('/urun/sil/{id}', 'UrunSil')->name('urun.sil')->middleware('role_or_permission:urun.sil');

        Route::get('/tum/medya', 'TumMedya')->name('tum.medya')->middleware('role_or_permission:coklu.liste');
        Route::get('/medya/ekle', 'MedyaEkle')->name('medya.ekle')->middleware('role_or_permission:coklu.ekle');
        Route::get('/medya/durum', 'MedyaDurum');
        Route::post('/medya/ekle/form', 'MedyaEkleForm')->name('medya.ekle.form')->middleware('role_or_permission:coklu.ekle');
        Route::get('/medya/duzenle/{id}', 'MedyaDuzenle')->name('medya.duzenle')->middleware('role_or_permission:coklu.duzenle');
        Route::post('/medya/guncelle/form', 'MedyaGuncelle')->name('medya.guncelle.form')->middleware('role_or_permission:coklu.duzenle');
        Route::delete('/medya/sil/{id}', 'MedyaSil')->name('medya.sil')->middleware('role_or_permission:coklu.sil');
    });

    //Ürün
    Route::controller(UrunController::class)->group(function () {
        Route::get('/urun/liste', 'UrunListe')->name('urun.liste')->middleware('role_or_permission:urun.liste');
        Route::get('/urun/ekle', 'UrunEkle')->name('urun.ekle')->middleware('role_or_permission:urun.ekle');
        Route::get('/urun/durum', 'UrunDurum');
        Route::post('/urun/ekle/form', 'UrunEkleForm')->name('urun.ekle.form')->middleware('role_or_permission:urun.duzenle');
        Route::get('/urun/duzenle/{id}', 'UrunDuzenle')->name('urun.duzenle')->middleware('role_or_permission:urun.duzenle');
        Route::post('/urun/guncelle/form', 'UrunGuncelle')->name('urun.guncelle.form')->middleware('role_or_permission:urun.duzenle');
        Route::delete('/urun/sil/{id}', 'UrunSil')->name('urun.sil')->middleware('role_or_permission:urun.sil');
    });

    //Blog Kategori
    Route::controller(BlogkategoriController::class)->group(function () {
        Route::get('/blog/kategori/liste', 'BlogListe')->name('blog.liste')->middleware('role_or_permission:blogkategori.liste');
        Route::get('/blog/kategori/ekle', 'BlogKategoriEkle')->name('blog.kategori.ekle')->middleware('role_or_permission:blogkategori.ekle');
        Route::get('/blog/kategori/durum', 'BlogKategoriDurum');
        Route::post('/blog/kategori/form', 'BlogKategoriForm')->name('blog.kategori.form')->middleware('role_or_permission:blogkategori.ekle');
        Route::get('/blog/kategori/duzenle/{id}', 'BlogKategoriDuzenle')->name('blog.kategori.duzenle')->middleware('role_or_permission:blogkategori.duzenle');
        Route::post('/blog/kategori/guncelle/', 'BlogKategoriGuncelle')->name('blog.kategori.guncelle')->middleware('role_or_permission:blogkategori.duzenle');
        Route::delete('/blog/kategori/sil/{id}', 'BlogKategoriSil')->name('blog.kategori.sil')->middleware('role_or_permission:blogkategori.sil');
    });

    //Blog İçerik
    Route::controller(BlogicerikController::class)->group(function () {
        Route::get('/icerik/liste', 'IcerikListe')->name('icerik.liste')->middleware('role_or_permission:blogicerik.liste');
        Route::get('/blog/icerik/ekle', 'BlogIcerikEkle')->name('blog.icerik.ekle')->middleware('role_or_permission:blogicerik.ekle');
        Route::get('/blog/icerik/durum', 'BlogIcerikDurum');
        Route::post('/blog/icerik/ekle/form', 'BlogIcerikEkleForm')->name('blog.icerik.ekle.form')->middleware('role_or_permission:blogicerik.ekle');
        Route::get('/blog/icerik/duzenle/{id}', 'BlogIcerikDuzenle')->name('blog.icerik.duzenle')->middleware('role_or_permission:blogicerik.duzenle');
        Route::post('/blog/icerik/guncelle/form', 'BlogIcerikGuncelleForm')->name('blog.icerik.guncelle.form')->middleware('role_or_permission:blogicerik.duzenle');
        Route::delete('/blog/icerik/sil/{id}', 'BlogIcerikSil')->name('blog.icerik.sil')->middleware('role_or_permission:blogicerik.sil');
    });

    //Sorular
    Route::controller(SoruController::class)->group(function () {
        Route::get('/soru/liste', 'SoruListe')->name('soru.liste')->middleware('role_or_permission:soru.liste');
        Route::get('/soru/ekle', 'SoruEkle')->name('soru.ekle')->middleware('role_or_permission:soru.ekle');
        Route::get('/soru/durum', 'SoruDurum');
        Route::post('/soru/ekle/form', 'SoruEkleForm')->name('soru.ekle.form')->middleware('role_or_permission:soru.ekle');
        Route::get('/soru/duzenle/{id}', 'SoruDuzenle')->name('soru.duzenle')->middleware('role_or_permission:soru.duzenle');
        Route::post('/soru/guncelle/form', 'SoruGuncelle')->name('soru.guncelle')->middleware('role_or_permission:soru.duzenle');
        Route::delete('/soru/sil/{id}', 'SoruSil')->name('soru.sil')->middleware('role_or_permission:soru.sil');
    });

    //Yorumlar
    Route::controller(YorumController::class)->group(function () {
        Route::get('/yorum/liste', 'YorumListe')->name('yorum.liste')->middleware('role_or_permission:yorum.liste');
        Route::get('/yorum/ekle', 'YorumEkle')->name('yorum.ekle')->middleware('role_or_permission:yorum.ekle');
        Route::get('/yorum/durum', 'YorumDurum');
        Route::post('/yorum/ekle/form', 'YorumEkleForm')->name('yorum.ekle.form')->middleware('role_or_permission:yorum.ekle');
        Route::get('/yorum/duzenle/{id}', 'YorumDuzenle')->name('yorum.duzenle')->middleware('role_or_permission:yorum.duzenle');
        Route::post('/yorum/guncelle/form', 'YorumGuncelle')->name('yorum.guncelle')->middleware('role_or_permission:yorum.duzenle');
        Route::delete('/yorum/sil/{id}', 'YorumSil')->name('yorum.sil')->middleware('role_or_permission:yorum.sil');
    });

    //İzinler
    Route::controller(RoleController::class)->group(function () {
        Route::get('/izin/liste', 'IzinListe')->name('izin.liste')->middleware('role_or_permission:izin.liste');
        Route::get('/izin/ekle', 'IzinEkle')->name('izin.ekle')->middleware('role_or_permission:izin.ekle');
        Route::post('/izin/ekle/form', 'IzinEkleForm')->name('izin.ekle.form')->middleware('role_or_permission:izin.ekle');
        Route::get('/izin/duzenle/{id}', 'IzinDuzenle')->name('izin.duzenle')->middleware('role_or_permission:izin.duzenle');
        Route::post('/izin/guncelle/form', 'IzinGuncelle')->name('izin.guncelle.form')->middleware('role_or_permission:izin.duzenle');
        Route::delete('/izin/sil/{id}', 'IzinSil')->name('izin.sil')->middleware('role_or_permission:izin.sil');
    });

    //Roller
    Route::controller(RoleController::class)->group(function () {
        Route::get('/rol/liste', 'RolListe')->name('rol.liste')->middleware('role_or_permission:rol.liste');
        Route::get('/rol/ekle', 'RolEkle')->name('rol.ekle')->middleware('role_or_permission:rol.ekle');
        Route::post('/rol/ekle/form', 'RolEkleForm')->name('rol.ekle.form')->middleware('role_or_permission:rol.ekle');
        Route::get('/rol/duzenle/{id}', 'RolDuzenle')->name('rol.duzenle')->middleware('role_or_permission:rol.duzenle');
        Route::post('/rol/guncelle/form', 'RolGuncelle')->name('rol.guncelle.form')->middleware('role_or_permission:rol.duzenle');
        Route::delete('/rol/sil/{id}', 'RolSil')->name('rol.sil')->middleware('role_or_permission:rol.sil');

        //Rol İzin / Yetki
        Route::get('/rol/yetki/duzenle/{id}', 'RolYetkiDuzenle')->name('rol.yetki.duzenle')->middleware('role_or_permission:rol.yetki.duzenle');
        Route::post('/rol/yetki/guncelle/{id}', 'RolYetkiGuncelle')->name('rol.yetki.guncelle')->middleware('role_or_permission:rol.yetki.duzenle');

        //Kullanıcılar
        Route::get('/kullanici/liste', 'KullaniciListe')->name('kullanici.liste')->middleware('role_or_permission:kullanici.liste');
        Route::get('/kullanici/ekle', 'KullaniciEkle')->name('kullanici.ekle')->middleware('role_or_permission:kullanici.ekle');
        Route::post('/kullanici/ekle/form', 'KullaniciEkleForm')->name('kullanici.ekle.form')->middleware('role_or_permission:kullanici.ekle');
        Route::get('/kullanici/duzenle/{id}', 'KullaniciDuzenle')->name('kullanici.duzenle')->middleware('role_or_permission:kullanici.duzenle');
        Route::put('/kullanici/guncelle/{id}', 'KullaniciGuncelleForm')->name('kullanici.guncelle.form')->middleware('role_or_permission:kullanici.duzenle');
        Route::delete('/kullanici/sil/{id}', 'KullaniciSil')->name('kullanici.sil')->middleware('role_or_permission:kullanici.sil');
    });

    Route::get('/dashboard', function () {
        return view('admin.index');
    })
        ->middleware(['auth', 'verified'])
        ->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit')->middleware('role_or_permission:profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update')->middleware('role_or_permission:profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy')->middleware('role_or_permission:profile.destroy');
});

require __DIR__ . '/auth.php';

//Front Route
Route::get('/kategori/{id}/{url}', [FrontController::class, 'KategoriDetay']);
Route::get('/altkategori/{id}/{url}', [FrontController::class, 'AltDetay']);
Route::get('/urun/{id}/{url}', [FrontController::class, 'UrunDetay']);
// Route::get('/blog/{id}/{url}', [FrontController::class, 'IcerikDetay']);
// Route::get('/blog/kategori/{id}/{url}', [FrontController::class, 'BlogKategoriDetay']);
// Route::get('/blog', [FrontController::class, 'BlogHepsi']);
// Route::get('/products', [FrontController::class, 'Urunler'])->name('urunler');
Route::get('/hakkimizda', [FrontController::class, 'Hakkimizda'])->name('hakkimizda');
Route::get('/iade/politikasi', [FrontController::class, 'İade'])->name('iade');
Route::get('/hizmet/sartlari', [FrontController::class, 'Hizmet'])->name('hizmet');
Route::get('/gizlilik/politikasi', [FrontController::class, 'Gizlilik'])->name('gizlilik');
Route::get('/', function () {return view('frontend.index');})->name('home');
Route::get('/arama', [SearchController::class, 'search'])->name('search');
// Route::get('/blog/search', [BlogSearchController::class, 'search'])->name('frontend.blog.search');

//Teklif Formu
/*
Route::controller(MesajController::class)->group(function () {
    Route::get('/contact', 'Iletisim')->name('iletisim');
    Route::post('/teklif/form', 'TeklifFormu')->name('teklif.form');
});

Route::controller(OdemeController::class)->prefix('odeme')->group(function () {
    Route::get('/', 'index')->name('odeme.index');
    Route::post('/sonuc', 'odeme')->name('odeme.sonuc');
});

Route::post('/odeme/bildirim', [BildirimController::class, 'bildirim']);
*/
