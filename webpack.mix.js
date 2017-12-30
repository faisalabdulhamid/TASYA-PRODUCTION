let mix = require('laravel-mix');

mix
	.js('resources/assets/admin/login/login.js', 'public/js')
	.js('resources/assets/admin/pegawai/pegawai.js', 'public/js')
	.js('resources/assets/admin/pelanggan/pelanggan.js', 'public/js')
	.js('resources/assets/admin/produk/produk.js', 'public/js')
	.js('resources/assets/admin/pesanan/pesanan.js', 'public/js')
	
	.js('resources/assets/admin/kriteria-daerah-pemasaran/kriteria-daerah-pemasaran.js', 'public/js')
	.js('resources/assets/admin/calon-daerah-pemasaran/calon-daerah-pemasaran.js', 'public/js')
	.js('resources/assets/admin/hitung-pemasaran/hitung-pemasaran.js', 'public/js')

	.js('resources/assets/admin/kriteria-distibutor/kriteria-distibutor.js', 'public/js')
	.js('resources/assets/admin/distributor/distributor.js', 'public/js')
	.js('resources/assets/admin/calon-distributor/calon-distributor.js', 'public/js')
	.js('resources/assets/admin/hitung-distributor/hitung-distributor.js', 'public/js')

	.js('resources/assets/client/client.js', 'public/js')
