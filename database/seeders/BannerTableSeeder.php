<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BannerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('banners')->insert([
            'id' => 5,
            'baslik' => 'En iyi Yazılımlar',
            'ust_baslik' => 'Kyu Software',
            'aciklama' => 'her zaman bir adım önde olun',
            'button_text' => 'İletişime Geç',
            'button_url' => 'http://localhost:8000/',
            'durum' => 1,
            'sirano' => 1,
            'resim' => 'uploads/banner/1824345017201405.png',
            'arkaplan' => 'uploads/banner/1824232892091060.png',
            'yaziresim' => 'uploads/banner/1824232892839403.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
