<?php

use Illuminate\Database\Seeder;

class KotaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kota = [
        	['Bandung', 12],
        	['Kota Tasikmalaya', 12],
        	['Kab Tasikmalaya', 12],
        	['Bekasi', 12],
        	['Depok', 12],
        	['Bogor', 12],
        	['Kuningan', 12],
        	['Majalengka', 12],
        	['Cirebon', 12],
        	['Indramayu', 12],
        	['Garut', 12],
        	['Pangandaran', 12],
        	['Ciamis', 12],
        ];

        foreach ($kota as $key => $value) {
        	App\Entities\Kota::create(['kota' => $value[0], 'provinsi_id' => $value[1]]);
        }
    }
}
