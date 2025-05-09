<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Ayarlar;
use App\Models\Banner;
use App\Models\Kurumsal;
use App\Models\Logo;
use App\Models\Referanslar;
use Database\Seeders\Permissions\ModelHasPermissionsTableSeeder;
use Database\Seeders\Permissions\ModelHasRolesTableSeeder;
use Database\Seeders\Permissions\PermissionsTableSeeder;
use Database\Seeders\Permissions\RoleHasPermissionsTableSeeder;
use Database\Seeders\Permissions\RolesTableSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([
            SeoSeeder::class,
            AnasayfaSeeder::class,
            RenkPaletiSeeder::class,
            LogoSeeder::class,
            AyarlarTableSeeder::class,
            UserTableSeeder::class,
            HakkimizdaTableSeeder::class,
            KurumsalTableSeeder::class,
            ReferanslarTableSeeder::class,
            BannerTableSeeder::class,
            UrunKategoriTableSeeder::class,
            PermissionsTableSeeder::class,
            RolesTableSeeder::class,
            RoleHasPermissionsTableSeeder::class,
            ModelHasPermissionsTableSeeder::class,
            ModelHasRolesTableSeeder::class,
        ]);
    }
}
