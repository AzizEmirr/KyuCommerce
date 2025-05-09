<?php

namespace Database\Seeders\Permissions;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleHasPermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('role_has_permissions')->insert([
            ['permission_id' => 1, 'role_id' => 4],
            ['permission_id' => 2, 'role_id' => 4],
            ['permission_id' => 3, 'role_id' => 4],
            ['permission_id' => 4, 'role_id' => 4],
            ['permission_id' => 5, 'role_id' => 4],
            ['permission_id' => 6, 'role_id' => 4],
            ['permission_id' => 7, 'role_id' => 4],
            ['permission_id' => 8, 'role_id' => 4],
            ['permission_id' => 9, 'role_id' => 4],
            ['permission_id' => 11, 'role_id' => 4],
            ['permission_id' => 12, 'role_id' => 4],
            ['permission_id' => 13, 'role_id' => 4],
            ['permission_id' => 14, 'role_id' => 4],
            ['permission_id' => 15, 'role_id' => 4],
            ['permission_id' => 16, 'role_id' => 4],
            ['permission_id' => 17, 'role_id' => 4],
            ['permission_id' => 18, 'role_id' => 4],
            ['permission_id' => 19, 'role_id' => 4],
            ['permission_id' => 20, 'role_id' => 4],
            ['permission_id' => 37, 'role_id' => 4],
            ['permission_id' => 38, 'role_id' => 4],
            ['permission_id' => 39, 'role_id' => 4],
            ['permission_id' => 40, 'role_id' => 4],
            ['permission_id' => 41, 'role_id' => 4],
            ['permission_id' => 42, 'role_id' => 4],
            ['permission_id' => 43, 'role_id' => 4],
            ['permission_id' => 44, 'role_id' => 4],
            ['permission_id' => 45, 'role_id' => 4],
            ['permission_id' => 46, 'role_id' => 4],
            ['permission_id' => 47, 'role_id' => 4],
            ['permission_id' => 48, 'role_id' => 4],
            ['permission_id' => 49, 'role_id' => 4],
            ['permission_id' => 50, 'role_id' => 4],
            ['permission_id' => 51, 'role_id' => 4],
            ['permission_id' => 52, 'role_id' => 4],
            ['permission_id' => 53, 'role_id' => 4],
            ['permission_id' => 60, 'role_id' => 4],
            ['permission_id' => 61, 'role_id' => 4],
            ['permission_id' => 62, 'role_id' => 4],
            ['permission_id' => 63, 'role_id' => 4],
            ['permission_id' => 64, 'role_id' => 4],
            ['permission_id' => 65, 'role_id' => 4],
            ['permission_id' => 69, 'role_id' => 4],
            ['permission_id' => 70, 'role_id' => 4],
            ['permission_id' => 71, 'role_id' => 4],
            ['permission_id' => 72, 'role_id' => 4],
            ['permission_id' => 73, 'role_id' => 4],
            ['permission_id' => 74, 'role_id' => 4],
            ['permission_id' => 75, 'role_id' => 4],
            ['permission_id' => 76, 'role_id' => 4],
            ['permission_id' => 77, 'role_id' => 4],
            ['permission_id' => 78, 'role_id' => 4],
            ['permission_id' => 79, 'role_id' => 4],
            ['permission_id' => 80, 'role_id' => 4],
            ['permission_id' => 81, 'role_id' => 4],
            ['permission_id' => 82, 'role_id' => 4],
            ['permission_id' => 83, 'role_id' => 4],
        ]);
    }
}
