<?php

use Illuminate\Database\Seeder;

class ProvinsiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $provinsi = [
			'Aceh / Nangroe Aceh Darussalam',
			'Sumatera Utara',
			'Sumatera Barat',
			'Riau (Daratan)',
			'Kepulauan Riau',
			'Jambi',
			'Sumatera Selatan',
			'Bangka Belitung',
			'Bengkulu yang',
			'Lampung',
			'DKI Jakarta',
			'Jawa Barat',
			'Banten',
			'Jawa Tengah',
			'DI Yogyakarta',
			'Jawa Timur',
			'Bali',
			'Nusa Tenggara Barat',
			'Nusa Tenggara Timur',
			'Kalimantan Barat',
			'Kalimantan Tengah',
			'Kalimantan Selatan',
			'Kalimantan Timur',
			'Kalimantan Utara',
			'Sulawesi Utara',
			'Sulawesi Barat',
			'Sulawesi Tengah',
			'Sulawesi Tenggara',
			'Sulawesi Selatan',
			'Gorontalo',
			'Maluku',
			'Maluku Utara',
			'Papua Barat',
			'Papua',
			'Teluk Cendrawasih',
        ];

        foreach ($provinsi as $key => $value) {
        	App\Entities\Provinsi::create(['provinsi' => $value]);
        }
    }
}
