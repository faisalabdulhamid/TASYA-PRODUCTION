<?php

use App\Entities\Kategori;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kategori = ['Celana', 'Baju', 'Popok'];
        foreach ($kategori as $key => $value) {
        	Kategori::create(['url' => str_slug($value), 'nama'=>$value]);
        }
    }
}
