let mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix
	.js('resources/assets/js/login/login.js', 'public/js')
	.js('resources/assets/js/pegawai/pegawai.js', 'public/js')
	.js('resources/assets/js/pelanggan/pelanggan.js', 'public/js')
	.js('resources/assets/js/produk/produk.js', 'public/js')
	.js('resources/assets/js/pesanan/pesanan.js', 'public/js')
	// .js('resources/assets/js/app.js', 'public/js')
	// .sass('resources/assets/sass/app.scss', 'public/css');
