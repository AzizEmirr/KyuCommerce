<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RenkPaletiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('renk_paletis')->insert([
            'renk_adi'   => null,
            'renk_kodu'  => '#0dcaf0',
            'created_at' =>  now(),
            'updated_at' =>  now(),
        ]);
    }
}
