<?php

namespace Database\Seeders\Permissions;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('roles')->insert([
            'id' => 4,
            'name' => 'Admin',
            'guard_name' => 'web',
            'created_at' => Carbon::parse('2025-02-13 20:23:42'),
            'updated_at' => Carbon::parse('2025-02-13 20:23:42'),
        ]);
    }
}
