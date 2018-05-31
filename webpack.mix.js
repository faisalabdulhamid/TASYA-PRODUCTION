let mix = require('laravel-mix');

mix
	.js('vuejs/admin/login/login.js', 'public/js')
	.js('vuejs/admin/pegawai/pegawai.js', 'public/js')
	.js('vuejs/admin/pelanggan/pelanggan.js', 'public/js')
	.js('vuejs/admin/produk/produk.js', 'public/js')
	.js('vuejs/admin/pesanan/pesanan.js', 'public/js')
	
	.js('vuejs/admin/kriteria-daerah-pemasaran/kriteria-daerah-pemasaran.js', 'public/js')
	.js('vuejs/admin/calon-daerah-pemasaran/calon-daerah-pemasaran.js', 'public/js')
	.js('vuejs/admin/hitung-pemasaran/hitung-pemasaran.js', 'public/js')

	.js('vuejs/admin/kriteria-distibutor/kriteria-distibutor.js', 'public/js')
	.js('vuejs/admin/distributor/distributor.js', 'public/js')
	.js('vuejs/admin/calon-distributor/calon-distributor.js', 'public/js')
	.js('vuejs/admin/hitung-distributor/hitung-distributor.js', 'public/js')

	.js('vuejs/client/client.js', 'public/js')
