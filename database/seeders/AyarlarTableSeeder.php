<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AyarlarTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('ayarlars')->insert([
            'telefon' => '0123456789',
            'mail' => 'info@example.com',
            'adres' => 'Örnek Mahallesi, Örnek Cad. No:10, İstanbul',
            'aciklama' => 'Bu, örnek bir açıklamadır.',
            'facebook' => 'https://facebook.com/example',
            'twitter' => 'https://twitter.com/example',
            'instagram' => 'https://instagram.com/example',
            'whatsapp' => '+90 123 456 7890',
            'discord' => 'https://discord.gg/example',
            'harita' => 'https://maps.google.com/example',
            'youtube' => 'https://youtube.com/example',
            'snowflake' => '0',
        ]);
    }
}
