<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            AturanKualitasSeeder::class,
            AturanMutuSeeder::class,
            KecamatanSeeder::class,
            DesaSeeder::class,
            KategoriKomoditasSeeder::class,
            KategoriKomoditasDetailSeeder::class,
            GudangSeeder::class,
            RoleSeeder::class,
            KelompokTaniSeeder::class,
            UserSeeder::class,
            UserInfoSeeder::class,
        ]);
    }
}
