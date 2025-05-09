<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SeoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('seos')->insert([
            [
                'url' => '/',
                'title' => 'Kyu Software',
                'site_adi' => 'Valorant Site Template',
                'description' => 'Kyu Software - Laravel ile geliştirilmiş e-ticaret sitesi.',
                'author' => 'Kyu Software',
                'keywords' => 'e-ticaret, laravel, yazılım',
                'resim' => 'resim.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'url' => '/',
                'title' => 'Kyu Software',
                'site_adi' => 'Web Paneli',
                'description' => '',
                'author' => '',
                'keywords' => '',
                'resim' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
