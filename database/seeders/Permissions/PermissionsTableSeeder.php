<?php

namespace Database\Seeders\Permissions;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            ['id' => 1, 'name' => 'ayarlar.duzenle', 'grup_adi' => 'ayarlar'],
            ['id' => 2, 'name' => 'seo.duzenle', 'grup_adi' => 'seo'],
            ['id' => 3, 'name' => 'logo.duzenle', 'grup_adi' => 'logo'],
            ['id' => 4, 'name' => 'banner.liste', 'grup_adi' => 'banner'],
            ['id' => 5, 'name' => 'banner.ekle', 'grup_adi' => 'banner'],
            ['id' => 6, 'name' => 'banner.duzenle', 'grup_adi' => 'banner'],
            ['id' => 7, 'name' => 'banner.sil', 'grup_adi' => 'banner'],
            ['id' => 8, 'name' => 'hak.duzenle', 'grup_adi' => 'hakkimizda'],
            ['id' => 9, 'name' => 'kategori.liste', 'grup_adi' => 'kategoriler'],
            ['id' => 11, 'name' => 'kategori.duzenle', 'grup_adi' => 'kategoriler'],
            ['id' => 12, 'name' => 'kategori.sil', 'grup_adi' => 'kategoriler'],
            ['id' => 13, 'name' => 'altkategori.liste', 'grup_adi' => 'altkategoriler'],
            ['id' => 14, 'name' => 'altkategori.ekle', 'grup_adi' => 'altkategoriler'],
            ['id' => 15, 'name' => 'altkategori.duzenle', 'grup_adi' => 'altkategoriler'],
            ['id' => 16, 'name' => 'altkategori.sil', 'grup_adi' => 'altkategoriler'],
            ['id' => 17, 'name' => 'urun.liste', 'grup_adi' => 'urunler'],
            ['id' => 18, 'name' => 'urun.ekle', 'grup_adi' => 'urunler'],
            ['id' => 19, 'name' => 'urun.duzenle', 'grup_adi' => 'urunler'],
            ['id' => 20, 'name' => 'urun.sil', 'grup_adi' => 'urunler'],
            ['id' => 37, 'name' => 'izin.liste', 'grup_adi' => 'izinler'],
            ['id' => 38, 'name' => 'izin.ekle', 'grup_adi' => 'izinler'],
            ['id' => 39, 'name' => 'izin.duzenle', 'grup_adi' => 'izinler'],
            ['id' => 40, 'name' => 'izin.sil', 'grup_adi' => 'izinler'],
            ['id' => 41, 'name' => 'rol.liste', 'grup_adi' => 'roller'],
            ['id' => 42, 'name' => 'rol.ekle', 'grup_adi' => 'roller'],
            ['id' => 43, 'name' => 'rol.duzenle', 'grup_adi' => 'roller'],
            ['id' => 44, 'name' => 'rol.sil', 'grup_adi' => 'roller'],
            ['id' => 45, 'name' => 'rol.yetki.duzenle', 'grup_adi' => 'roller'],
            ['id' => 46, 'name' => 'kullanici.liste', 'grup_adi' => 'kullanicilar'],
            ['id' => 47, 'name' => 'kullanici.ekle', 'grup_adi' => 'kullanicilar'],
            ['id' => 48, 'name' => 'kullanici.duzenle', 'grup_adi' => 'kullanicilar'],
            ['id' => 49, 'name' => 'kullanici.sil', 'grup_adi' => 'kullanicilar'],
            ['id' => 50, 'name' => 'profile.edit', 'grup_adi' => 'profil'],
            ['id' => 51, 'name' => 'profile.update', 'grup_adi' => 'profil'],
            ['id' => 52, 'name' => 'profile.destroy', 'grup_adi' => 'profil'],
            ['id' => 53, 'name' => 'profil.show', 'grup_adi' => 'profil'],
            ['id' => 60, 'name' => 'renk.ayarlari', 'grup_adi' => 'renk'],
            ['id' => 61, 'name' => 'coklu.liste', 'grup_adi' => 'urunler'],
            ['id' => 62, 'name' => 'coklu.ekle', 'grup_adi' => 'urunler'],
            ['id' => 63, 'name' => 'coklu.duzenle', 'grup_adi' => 'urunler'],
            ['id' => 64, 'name' => 'coklu.sil', 'grup_adi' => 'urunler'],
            ['id' => 65, 'name' => 'hak.durum', 'grup_adi' => 'hakkimizda'],
            ['id' => 69, 'name' => 'kurumsal', 'grup_adi' => 'kurumsal'],
            ['id' => 70, 'name' => 'anasayfa.duzenle', 'grup_adi' => 'ayarlar'],
            ['id' => 71, 'name' => 'referans.liste', 'grup_adi' => 'referans'],
            ['id' => 72, 'name' => 'referans.ekle', 'grup_adi' => 'referans'],
            ['id' => 73, 'name' => 'referans.duzenle', 'grup_adi' => 'referans'],
            ['id' => 74, 'name' => 'referans.sil', 'grup_adi' => 'referans'],
            ['id' => 75, 'name' => 'kategori.ekle', 'grup_adi' => 'kategoriler'],
            ['id' => 76, 'name' => 'blogkategori.liste', 'grup_adi' => 'blogkategoriler'],
            ['id' => 77, 'name' => 'blogkategori.ekle', 'grup_adi' => 'blogkategoriler'],
            ['id' => 78, 'name' => 'blogkategori.duzenle', 'grup_adi' => 'blogkategoriler'],
            ['id' => 79, 'name' => 'blogkategori.sil', 'grup_adi' => 'blogkategoriler'],
            ['id' => 80, 'name' => 'blogicerik.liste', 'grup_adi' => 'blogicerikler'],
            ['id' => 81, 'name' => 'blogicerik.ekle', 'grup_adi' => 'blogicerikler'],
            ['id' => 82, 'name' => 'blogicerik.duzenle', 'grup_adi' => 'blogicerikler'],
            ['id' => 83, 'name' => 'blogicerik.sil', 'grup_adi' => 'blogicerikler'],
        ];

        foreach ($permissions as $permission) {
            DB::table('permissions')->updateOrInsert(
                ['id' => $permission['id']],
                [
                    'name' => $permission['name'],
                    'grup_adi' => $permission['grup_adi'],
                    'guard_name' => 'web',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]
            );
        }
    }
}
