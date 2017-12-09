<?php

use Illuminate\Database\Seeder;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $produk = [
			['DKP S', 'DK Celana Panjang Putih S', '108000'],
			['DKP M', 'DK Celana Panjang Putih M', '113000'],
			['DKP L', 'DK Celana Panjang Putih L', '118000'],
			['DKP XL', 'DK Celana Panjang Putih XL', '123000'],
			['DKP Tks', 'DK Celana Panjang Putih Tks', '108000'],
			['DKP POP', 'DK Celana Pop Putih', '69000'],
			['DKP PDK', 'DK Celana Pendek Putih', '73000'],
			['DKP BNKG', 'DK Baju Neci Putih Kutung', '71000'],
			['DKP BNPDK', 'DK Baju Neci Putih Pendek', '74000'],
			['DKP BNPJG', 'DK Baju Neci Putih Panjang', '77000'],
			['DKW S', 'DK Celana Panjang Warna S', '111000'],
			['DKW M', 'DK Celana Panjang Warna M', '116000'],
			['DKW L', 'DK Celana Panjang Warna L', '121000'],
			['DKW XL', 'DK Celana Panjang Warna XL', '126000'],
			['DKW Tks', 'DK Celana Panjang Warna Tks', '111000'],
			['DKW POP', 'DK Celana Pop  Warna ', '72000'],
			['DKW PDK', 'DK Celana Pendek Warna ', '77000'],
			['DKW BNKG', 'DK Baju Neci Warna Kutung', '73000'],
			['DKW BNPDK', 'DK Baju Neci Warna Pendek', '76000'],
			['DKW BNPJG', 'DK Baju Neci  Warna  Panjang', '79000'],
			['TCP S', 'Celana Panjang Putih S', '101000'],
			['TCP M', 'Celana Panjang Putih M', '106000'],
			['TCP L', 'Celana Panjang Putih L', '111000'],
			['TCP XL', 'Celana Panjang Putih XL', '116000'],
			['TCP Tks', 'Celana Panjang Putih Tks', '101000'],
			['TCP POP', 'Celana Pop Putih', '62000'],
			['TCP PDK', 'Celana Pendek Putih', '68000'],
			['TCP BNKTG', 'Baju Neci Putih Kutung', '66000'],
			['TCP BNPDK', 'Baju Neci Putih Pendek', '69000'],
			['TCP BNPJG', 'Baju Neci Putih Panjang', '72000'],
			['TCP BOS', 'Baju Oblong Putih S', '103000'],
			['TCP BOM', 'Baju Oblong Putih M', '108000'],
			['TCP BOL', 'Baju Oblong Putih L', '113000'],
			['TCP BOXL', 'Baju Oblong Putih XL', '118000'],
			['TCP BBKTG', 'Baju Bis Putih Kutung', '69000'],
			['TCP BBPDK', 'Baju Bis Putih Pendek', '73000'],
			['TCP BBPJG', 'Baju Bis Putih Panjang', '77000'],
			['TCP PL', 'Popok Lapis Putih', '54000'],
			['TCP BDG', 'Bedongan putih', '250000'],
			['TCW S', 'Celana Panjang Warna S', '106000'],
			['TCW M', 'Celana Panjang Warna M', '111000'],
			['TCW L', 'Celana Panjang Warna L', '116000'],
			['TCW XL', 'Celana Panjang Warna XL', '121000'],
			['TCW Tks', 'Celana Panjang Warna Tks', '106000'],
			['TCW POP', 'Celana Pop Warna', '66000'],
			['TCW PDK', 'Celana Pendek Warna', '70000'],
			['TCW BNKTG', 'Baju Neci Warna Kutung', '68000'],
			['TCW BNPDK', 'Baju Neci Warna Pendek', '71000'],
			['TCW BNPJG', 'Baju Neci Warna Panjang', '74000'],
			['TCW BOS', 'Baju Oblong Warna S', '103000'],
			['TCW BOM', 'Baju Oblong Warna M', '108000'],
			['TCW BOL', 'Baju Oblong Warna L', '113000'],
			['TCW BOXL', 'Baju Oblong Warna XL', '118000'],
			['LJ S', 'LJ Celana Panjang Warna S', '106000'],
			['LJ M', 'LJ Celana Panjang Warna M', '111000'],
			['LJ L', 'LJ Celana Panjang Warna L', '116000'],
			['LJ XL', 'LJ Celana Panjang Warna XL', '121000'],
			['LJ Tks', 'LJ Celana Panjang Warna Tks', '106000'],
			['LJ POP', 'LJ Celana Pop Warna', '66000'],
			['LJ PDK', 'LJ Celana Pendek Warna', '70000'],
			['LJ BNKTG', 'LJ Baju Neci Warna Kutung', '68000'],
			['LJ BNPDK', 'LJ Baju Neci Warna Pendek', '71000'],
			['LJ BNPJG', 'LJ Baju Neci Warna Panjang', '74000'],
        ];

        foreach ($produk as $key => $value) {
        	App\Entities\Produk::create(['kode'=>$value[0], 'nama'=>$value[1], 'harga'=>$value[2]]);
        }
    }
}
