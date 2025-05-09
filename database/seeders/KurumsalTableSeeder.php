<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KurumsalTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
          DB::table('kurumsals')->insert([
            [
                'id' => 1,
                'ustbaslik' => 'İade Politikası',
                'baslik' => 'İade Politikası',
                'metin' => 'Lorem ipsum dolor sit amet, consteur adipiscing Du...',
                'resim' => 'uploads/kurumsal/1824240681080247.jpg',
                'durum' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'ustbaslik' => 'Hizmet Şartları',
                'baslik' => 'Hizmet Şartları',
                'metin' => 'Lorem ipsum dolor sit amet, consteur adipiscing Du...',
                'resim' => 'uploads/kurumsal/1824240689148444.jpg',
                'durum' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'ustbaslik' => 'Gizlilik Politikası',
                'baslik' => 'Gizlilik Politikası',
                'metin' => 'Lorem ipsum dolor sit amet, consteur adipiscing Du...',
                'resim' => 'uploads/kurumsal/1824240695138747.jpg',
                'durum' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
