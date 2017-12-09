<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(KriteriaSeeder::class);
        factory(App\Entities\Pegawai::class, 10)->create();
        // factory(App\Entities\Pelanggan::class, 100)->create();
        $this->call(ProvinsiSeeder::class);
        $this->call(KotaSeeder::class);
        $this->call(ProdukSeeder::class);
        $this->call(PelangganSeeder::class);
    }
}
