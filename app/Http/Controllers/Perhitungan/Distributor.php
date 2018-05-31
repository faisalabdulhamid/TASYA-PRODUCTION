<?php
namespace App\Http\Controllers\Perhitungan;

use App\Entities\CalonDistributor;
use App\Entities\Kota;
use App\Entities\KriteriaDistributor;
use App\Entities\Pelanggan;
use App\Entities\Provinsi;

class Distributor
{
	protected $provinsi;
	protected $pelanggan = []; //pelanggan_calon_provinsi_by_id
	protected $kriteria = [];
	protected $nilai_masukan_user = [];
	protected $perbaikan_bobot = [];
	protected $vektor_s = [];
	protected $ranking = [];

	public function __construct($provinsi, $nilai_kriteria)
	{
		$this->provinsi = $provinsi;
		$this->nilai_masukan_user = $nilai_kriteria;

		$this->setPelanggan();
		$this->setKriteria();

		$this->perbaikanBobot();
		$this->hitung_vektor_s();
		$this->perangkingan();
	}

	public function setPelanggan()
	{
		$kota = Kota::where('provinsi_id', $this->provinsi)->get()->pluck('id');
		$pelanggan_provinsi = Pelanggan::whereIn('kota_id', $kota)->get()->pluck('id');
		$pelanggan_not_calon = Pelanggan::has('calon', 0)->get()->pluck('id');
		$pelanggan_not_distributor = Pelanggan::has('distributor')->get()->pluck('id');
		$this->pelanggan = $pelanggan_provinsi
			->diff($pelanggan_not_calon)
			->diff($pelanggan_not_distributor)
			->values();
	}

	public function setKriteria()
	{
		$pelanggan_kriteria = CalonDistributor::whereIn('pelanggan_id', $this->pelanggan)
			->with('kriterias')
			->get();

		$this->kriteria = $pelanggan_kriteria->map(function($item, $key){
			return [
				'pelanggan_id' => $item->pelanggan_id,
				'kriteria'=> $item->kriterias->map(function($val, $k) use($item, $key){
					return [
						'kriteria_id' => $val->id,
						'nilai' => $item->kriterias[$k]->pivot->nilai,
					];
				})
			];
		});
	}

	public function perbaikanBobot()
	{
		$nilai_masukan_user = collect($this->nilai_masukan_user);
		$jumlah_masukan_user = $nilai_masukan_user->pluck('nilai')->sum();
		$this->perbaikan_bobot = $nilai_masukan_user->map(function($collection)use($jumlah_masukan_user){
			return [
				'kriteria_id' => $collection['id'],
				'nilai_w' => round($collection['nilai']/$jumlah_masukan_user, 2),
			];
		});
	}

	public function hitung_vektor_s()
	{
		$perbaikan_bobot = $this->perbaikan_bobot;
		$this->vektor_s = $this->kriteria->map(function($val, $k) use($perbaikan_bobot){
			return [
				'pelanggan_id' => $val['pelanggan_id'],
				'nilai_s' => $val['kriteria']->pipe(function($c) use($perbaikan_bobot){
					$data = $c->map(function($value, $key)use($perbaikan_bobot){
						return round(pow($value['nilai'], $perbaikan_bobot[$key]['nilai_w']), 3);
					});

					// $result = $data->chunk(count($data))
					// 	->mapSpread(function ($odd, $even) {
					// 		return $odd * $even;
					// 	});
					// $collection = collect([1, 2, 3]);
					$result = $data->reduce(function($carry, $item){
						return $carry * $item;
					}, 1);

					return $result;//$result->first();
					
				})
			];
		});
	}

	public function perangkingan()
	{
		$vektor_s = $this->vektor_s;
		$total_vektor = $vektor_s->reduce(function($carry, $item){
			return $carry + $item['nilai_s'];
		});
		$this->ranking = $vektor_s->map(function($item, $key)use($total_vektor){
			return [
				'pelanggan_id'=> $item['pelanggan_id'],
				'nilai_v'=> $item['nilai_s']/$total_vektor,
				'nilai_s'=> $item['nilai_s'],
				// 'total_vektor'=> $total_vektor,
			];
		});
	}

	public function get()
	{
		$data = $this->ranking;
		$pelanggan = new Pelanggan();
		$result = $data->map(function($item, $key)use($pelanggan){
			return [
				'pelanggan' => $pelanggan->find($item['pelanggan_id']),
				'pelanggan_id' => $item['pelanggan_id'],
				'nilai_v' => $item['nilai_v'],
				'nilai_s'=> $item['nilai_s'],
			];
		});
		return $result;	
	}
}