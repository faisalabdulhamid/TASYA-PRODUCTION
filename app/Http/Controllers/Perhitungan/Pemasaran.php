<?php

// $this->kota = Provinsi::has('kota')->with(['kota' => function($q){
// 	$q->has('calonPemasaran')->with(['calonPemasaran' => function($q){
// 		$q->aktif();
// 	}])->get();
// }])->get()->find($provinsi);

// $this->kota = CalonDaerahPemasaran::with('kriterias')->where('kota_id', 1)->get();
// $this->kota = $kota->calonPemasaran;
// $this->kota = Kota::where('provinsi_id', $provinsi)->has('calonPemasaran')->with(['calonPemasaran' => function($q){
// 	$q->aktif();
// }])->get();
namespace App\Http\Controllers\Perhitungan;

use App\Entities\CalonDaerahPemasaran;
use App\Entities\Kota;
use App\Entities\KriteriaDaerahPemasaran;
use App\Entities\Provinsi;

class Pemasaran
{
	protected $kota = [];
	protected $kriteria = [];
	protected $_kriteria = [];

	protected $nilai_r = [];
	protected $nilai_v = [];

	public function __construct($provinsi)
	{
		$kota = Provinsi::with(['calonPemasaran' => function($q){
			$q->aktif();
		}])->get()->find($provinsi);

		$data = [];
		foreach ($kota->calonPemasaran as $value) {
			$row = [];
			$row['kota_id'] = $value['id'];
			$row['kota'] = $value['nama_kota'];

			$kriteria = [];
			$_kriteria = [];
			foreach ($value->kriterias as $v) {
				$row_kriteria = [];
				$row_kriteria['kriteria_id'] = $v->id;
				$row_kriteria['nilai'] = $v->pivot->nilai;
				$kriteria[] = $row_kriteria;

				$_kriteria[]['kriteria_id'] = $v->id;
				$_kriteria[]['nilai'] = $v->pivot->nilai;
				$this->_kriteria[$v->id][] = $v->pivot->nilai;
			}
			

			$row['kriteria'] = $kriteria;
			$data[] = $row;
		}
		$this->kota = $data;
		
	}

	public function hitung_nilai_r()
	{
		
		//.. End Kota Dengan Nilai Kriteria

		foreach (KriteriaDaerahPemasaran::all() as $key => $_kriteria) {
			$kk = $_kriteria;
			if ($_kriteria->benefit > 0) {
				// max();
				$kk['min_max'] = max($this->_kriteria[$_kriteria->id]);
			}else{
				$kk['min_max'] = min($this->_kriteria[$_kriteria->id]);
			}
			$this->kriteria[] = $kk;
		}

		//penentuan nilai r
		foreach ($this->kota as $kota) {
			$matrix = [];
			foreach ($this->kriteria as $key => $kriteria) {
				$r = 0;
				if ($kriteria->benefit > 0) {
					//max - benefit
					$r = (int) $kota['kriteria'][$key]['nilai'] / (int) $kriteria->min_max;
				}else{
					$r = (int) $kriteria->min_max / (int) $kota['kriteria'][$key]['nilai'];
				}
				$matrix[] = $r;
			}
			$this->nilai_r[] = $matrix;
		}
	}

	public function hitung_nilai_v()
	{
		//penetuan nilai v 
		foreach ($this->nilai_r as $r) {
			$v = 0;
			foreach ($r as $key => $value) {
				$v = $v + (floatval($value) * floatval($this->kriteria[$key]->bobot));
			}
			$this->nilai_v[] = $v;
		}
	}

	public function get()
	{

		//handle kosong
		if (empty($this->kota)) {
			return 'error';
		}else{
			$this->hitung_nilai_r();
			$this->hitung_nilai_v();
		}

		$data = [];
		foreach ($this->nilai_r as $index_kota => $kota) {
			$kt = [];
			//add Kota
			$kt['kota'] = $this->kota[$index_kota]['kota'];

			foreach ($kota as $index_matrix_r => $matrix_r) {
				$r = $matrix_r;
				$kt['kat_'.$index_matrix_r] = $r;
			}

			//add nilai v
			$kt['hasil'] = $this->nilai_v[$index_kota];

			$data[] = $kt;
		}

		return $data;
	}
}