<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HakkimizdaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('hakkimizdas')->insert([
            'baslik' => 'Hakkımızda Başlık',
            'aciklama' => 'Hakkımızda açıklama metni.',
            'metin' => 'Bu, hakkımızda sayfasının detaylı açıklama metnidir. Burada şirketin geçmişi, misyonu, vizyonu gibi bilgiler yer alabilir.',
            'durum' => 1, 
            'resim' => 'resim1.jpg',
            'resim2' => 'resim2.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
