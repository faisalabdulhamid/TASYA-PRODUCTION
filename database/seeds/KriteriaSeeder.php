<?php

use App\Entities\Kriteria;
use Illuminate\Database\Seeder;

class KriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $k = new Kriteria();
        $k->kriteria = 'Usia 0 Tahun';
        $k->bobot = 0.25;
        
        $k->save();
        
        $k = new Kriteria();
        $k->kriteria = 'Wanita Usia Subur';
        $k->bobot = 0.25;
        $k->save();
        
        $k = new Kriteria();
        $k->kriteria = 'Rata – rata anak yang dilahirkan per wanita';
        $k->bobot = 0.25;
        $k->save();

        $k = new Kriteria();
        $k->kriteria = 'Peserta KB';
        $k->bobot = 0.25;
        $k->benefit = 0;
        $k->save();
    }
}
