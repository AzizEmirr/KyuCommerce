<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UrunKategoriTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('kategorilers')->insert([
            'id' => 1,
            'kategori_adi' => 'Hile Kategorisi',
            'kategori_url' => 'hile-kategorisi',
            'anahtar' => null,
            'aciklama' => null,
            'resim' => null,
            'durum' => 1,
            'sirano' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $altkategoriler = [
            ['id' => 1, 'altkategori_adi' => 'Valorant', 'altkategori_url' => 'valorant', 'aciklama' => 'Valorant Hack'],
            ['id' => 2, 'altkategori_adi' => 'Counter-Strike 2', 'altkategori_url' => 'counter-strike-2', 'aciklama' => 'Counter-Strike 2 Hack'],
            ['id' => 3, 'altkategori_adi' => 'Fortnite', 'altkategori_url' => 'fortnite', 'aciklama' => 'Fortnite Hack'],
            ['id' => 4, 'altkategori_adi' => 'PUBG: Battlegrounds', 'altkategori_url' => 'pubg-battlegrounds', 'aciklama' => 'PUBG: Battlegrounds Hack'],
            ['id' => 5, 'altkategori_adi' => 'Wolfteam', 'altkategori_url' => 'wolfteam', 'aciklama' => 'Wolfteam Hack'],
        ];

        foreach ($altkategoriler as $index => $item) {
            DB::table('altkategorilers')->insert([
                'id' => $item['id'],
                'kategori_id' => 1,
                'altkategori_adi' => $item['altkategori_adi'],
                'altkategori_url' => $item['altkategori_url'],
                'anahtar' => null,
                'aciklama' => $item['aciklama'],
                'sirano' => $index + 1,
                'durum' => 1,
                'resim' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        $urunler = [
            ['id' => 1, 'baslik' => 'Counter-Strike 2', 'altkategori_id' => 2],
            ['id' => 2, 'baslik' => 'Valorant', 'altkategori_id' => 1],
            ['id' => 3, 'baslik' => 'Fortnite', 'altkategori_id' => 3],
            ['id' => 4, 'baslik' => 'PUBG: Battlegrounds', 'altkategori_id' => 4],
            ['id' => 5, 'baslik' => 'Wolfteam', 'altkategori_id' => 5],
        ];

        foreach ($urunler as $index => $item) {
            DB::table('urunlers')->insert([
                'id' => $item['id'],
                'kategori_id' => 1,
                'altkategori_id' => $item['altkategori_id'],
                'baslik' => $item['baslik'],
                'url' => strtolower(str_replace(' ', '-', $item['baslik'])),
                'tag' => 'Windows 10,Windows 11,H24H2',
                'anahtar' => null,
                'aciklama' => null,
                'metin' => '<table class="table table-sm" style="width: 96.985%;">...</table>',
                'resim' => null,
                'durum' => 1,
                'sirano' => $index + 1,
                'fiyat' => 0.00,
                'kontenjan' => null,
                'baslangic_tarihi' => null,
                'bitis_tarihi' => null,
                'kalkis_noktasi' => null,
                'gidilecek_yerler' => null,
                'sure' => null,
                'stok' => 0,
                'link' => 'http://localhost:8000/',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        DB::table('urun_medyas')->insert([
            [
                'id' => 125,
                'urun_id' => 2,
                'medya_url' => 'uploads/urunler/urun_medya/1824258720411435.jpg',
                'medya_tipi' => 'image',
                'durum' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 126,
                'urun_id' => 2,
                'medya_url' => 'uploads/urunler/urun_medya/1824258732797529.mp4',
                'medya_tipi' => 'video',
                'durum' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
