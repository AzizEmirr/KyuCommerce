<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LogoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('logos')->insert([
            'id' => 1,
            'siyahLogo' => 'uploads/logo/1817838206862201.png',
            'beyazLogo' => 'uploads/logo/1817838207068012.png',
            'favicon' => 'uploads/logo/1817838207268634.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
