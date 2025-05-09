<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AnasayfaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('anasayfas')->insert([
            'headerdurum' => true,
            'bannerdurum' => true,
            'kategoridurum' => true,
            'discorddurum' => true,
            'dcarkaplanresim' => 'uploads/discord/1824323959837298.jpg',
            'dcyoutubevideo' => 'https://www.youtube.com/embed/dQw4w9WgXcQ',
            'dcbaslik' => 'Topluluğumuza Katıl!',
            'dcaciklama' => 'Discord kanalımıza davetlisiniz.',
            'dcbuton' => 'Discorda Katıl',
            'urundurum' => true,
            'referansdurum' => true,
            'sosyaldurum' => true,
            'footerdurum' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
