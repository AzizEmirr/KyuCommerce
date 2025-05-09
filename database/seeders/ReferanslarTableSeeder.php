<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReferanslarTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('referanslars')->insert([
            [
                'id' => 1,
                'resim' => 'uploads/referanslar/1824337017576677.png',
                'created_at' =>  now(),
                'updated_at' =>  now(),
            ],
            [
                'id' => 2,
                'resim' => 'uploads/referanslar/1824337012062977.png',
                'created_at' =>  now(),
                'updated_at' =>  now(),
            ],
            [
                'id' => 3,
                'resim' => 'uploads/referanslar/1824337001841751.png',
                'created_at' =>  now(),
                'updated_at' =>  now(),
            ],
            [
                'id' => 4,
                'resim' => 'uploads/referanslar/1824337023451630.png',
                'created_at' =>  now(),
                'updated_at' =>  now(),
            ],
            [
                'id' => 5,
                'resim' => 'uploads/referanslar/1824337030564637.png',
                'created_at' =>  now(),
                'updated_at' =>  now(),
            ],
            [
                'id' => 6,
                'resim' => 'uploads/referanslar/1824337038987186.png',
                'created_at' =>  now(),
                'updated_at' =>  now(),
            ],
            [
                'id' => 7,
                'resim' => 'uploads/referanslar/1824337046981315.png',
                'created_at' =>  now(),
                'updated_at' =>  now(),
            ],
        ]);
    }
}
