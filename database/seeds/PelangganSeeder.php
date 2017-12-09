<?php

use Illuminate\Database\Seeder;

class PelangganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pelanggan = [
			['KLA/Sinar Abadi', '021-31902929', 'Kampung Bali 4 no. 5 Tn. Abang  Jakarta Pusat'],
			['Cabaru', ' 021-5307645', 'Jl. Umbut Blok 1 no. 25 Perum Kelapa Dua Pos pengumben Jakarta Barat '],
			['City Ramayana', '021-8580947', 'jl. Slamet Riyadi IV No.5A Matraman Jakarta Timur'],
			['Baby Post', '0817-9116-811', 'Jln. Sentosa Raya No. 94 Depan Kantor Pos Depok 2'],
			['Kayana', '021-77207274', 'Jl. H. Asmawi No.107 A Beji, Depok  16421'],
			[' GOLDEN FAMILY', '021-6631383', 'DHI Blok LL No.9 Kapuk Muara Jakut'],
			['Giat Jaya', '021-6913718', 'Pengukiran Raya 40 A Jakarta Utara '],
			['Hawaii', '081-322787028', 'Jl. Gajah Mada No.120, Dauh Puri Kaja, Denpasar Utara, Kota Denpasar, Bali 80231'],
			['Melati Baby Needs', '021-6013082', 'Pusat Grosir pasar pagi Mangga Dua Lantai DSR / A-059'],
			['Sayang Coll.', '021-23572303', 'Blok A Lt. 1 Los D No. 88-89 Pasar Tanah Abang Jakarta Pusat'],
			['Julian Global', '0816-1814-568', 'Blok A LT. 1 Los E No. 112, Blok A Lt. 2 Los F No. 66, Office Jl. Pluit Timur Blok Barat No.23 Jakut'],
			['Favorit', '021-39845149', 'Jembatan Hijau Blok A Lantai 2 Los C No 45-47-49 Pasar regional Tanah abang Jakpus'],
			['Cayang Coll.', '021-56966866', 'Blok B Lantai SLG Los C No. 160-161 Pasar tanah Abang Jakpus'],
			['Ade Rudi', '0821-1533-5958', ' Jl. Paseh Gg. Gn.Ceuri 1 rt04/09 no.158 Kel. TuguRaja Kec.Cihideung Kota tasikmalaya 46125 '],
			['PRO BABY', '(0542) 413394', 'JL. JEND. A YANI NO. 8B RT 33 GUNUNG SARI ULU KEL , MEKAR SARI BALIKPAPAN 76122  KALIMANTAN TIMUR'],
			['PRIMA UTAMA', '(061) 4532986', 'JL. PUSAT PASAR NO . 6 - P MEDAN  20212'],
			['MUJUR GIRI JAYA', '0813.6223.7658', 'JL. SUTOMO NO. 650  MEDAN'],
			['JERICO', '8', 'JL. KUMALA NO 80 MAKASAR'],
			['BOBO ', '(0452) 422204', 'GUNUNG SARI NO. 78 BALIKPAPAN'],
			['BOBO ', '0852.7226.8080', 'JL. S PARMAN RUKO SIMPANG NO. 5 SAMARINDA '],
			['AURELIA', '(0542) 732240', 'JL. JEND SUDIRMAN N. 5 ( KLANDASAN ) BALIKPAPAN'],
			['BABY STAR', '(0541) 4121689', 'JL. KH ABDUL MARISIE NO . 84 - 85 KEL , PASAR PAGI  SAMPING MASJID RAYA SMARINDA'],
			['RAHMAT', '8', 'JL . A . YANI NO 6 BUKIT TINGGI SUMATRA BARAT'],
			['DEWI ', '(0741) 23967', 'JL. SUPRATMAN NO. 71 JAMBI'],
			['ZAHRA', '0812.8262.8061', 'JL. AR HAKIM / BAKTI NO. 98D '],
			['CITRA', '( 0711 ) 358685', 'JL. TENGKURUK PERMAI BLOK C NO. 161 / 938'],
			['JORDANS', '( 0721) 240222', 'JL. PANGKAL PINANG NO. 3 TANJUNG KARANG BANDAR LAMPUNG'],
			['TUNAS BARU / DUNIA BARU', '0812.7516.421', 'JL. IMAM BONJOL PLAZA SUKARAME BLOK UD 01 PEKANBARU'],
			['HAWAII', '( 0361 ) 434676', 'JL. GAJAH MADA NO. 120 DENPASAR , BALI'],
			['TOPS BABY', '0858.1759.0699', 'JL. JEND . SUDIRMAN NO. 34 TOBO ALI BANGKA SELATAN , BABEL'],
			['YAHYA BABY SHOP', '0853.6139.9935', 'JL. LETDA SUDJONO NO. 6  TITI SEWA ( DEPAN AYAM PENYET AKBAR )'],
			['ADE RUDI', '0821.1533.5958', 'JL. PASEH Gg GN CEURI I  NO. 158 RT 04 / 09 KEL : TUGU RAJA KEC  :  CIHIDEUNG  TSK  46125'],
			['JELITA BABY', '0878.5140.0288', 'PGS LT 1 BLOK 1 - 3  NO.  5 - 6 SURABAYA , JATIM'],
			['SUMBER MAS', '0813.3298.8898', 'ITC LT UG B15  1 - 2 SURABAYA  ,  JATIM'],
			['ANGELYNE', '0812.3564.057', 'PS KAPASAN LANTAI 1 BLOK NB - 175 SURABAYA'],
			['AMANAH', '0819.1133.4437', 'JL. RAYA PALIMANAN NO. 150 CIREBON 45161'],
			['SUMBER MAJU', '2', 'JL. PENGUKIRAN II NO. 36 RT 08 / 03 JAKARTA BARAT 11240'],
			['CINTA', '-21,2591785', 'PALEM PARADISE BLOK KK 1 NO. 10 ( DEKAT PASAR LARIS ) JAKARTA BARAT'],
			['YUSUF', '0813.2235.7843', 'JL. SUDIRMAN NO. 13  BUKIT TINGGI'],
			['JODO', '0822.4200.9600', 'JL PEMUDA NO. 149 MAGELANG , JATENG'],
			['AGUNG', '( 024. 3515694 )', 'JL. ALUN ALUN SELATAN NO. 8 SEMARANG , JATENG'],
			['KIDDY LAND', '( 031. 7347878 )', 'PERUM DARMA HILL BLOK A NO. 27 ( DEPAN HOTEL SANGRILA ) SURABAYA , JATIM'],
			['YESTOYA', '0838.4969.5333', 'MANYAR KERTOADI NO. 75 SURABAYA'],
			['KLA / SINAR ABADI', '( 021. 30902929 )', 'KAMPUNG BALI 4 NO. 5 JAKARTA'],
        ];

        foreach ($pelanggan as $key => $value) {
        	App\Entities\Pelanggan::create(['nama'=>$value[0], 'no_telepon'=>$value[1], 'alamat'=>$value[2]]);
        }
    }
}
