<template>
	<div class="row">
		<div class="col-md-12">
			<div class="panel">
				<div class="panel-heading">
					<h3 class="heading-title">Branda</h3>
				</div>
				<div class="panel-body">
					<div class="text-center">
						<img :src="logo">
					</div>
						<p>
							Selamat datang di website kami. Supplier baju bayi berkwalitas di Kota Bandung. Kami menjual berbagai macam pakaian bayi yang dibutuhkan.
						</p>
						<p>
							Kami hadir untuk mensupply segala kebutuhan pakaian bayi untuk toko/baby shop anda. Produk kami telah tersebar di berbagai kota di Indonesia mulai dari Medan, Palembang, Pekanbaru, Bangka Belitung, Jakarta, Bandung, Surabaya dan kota – kota besar lainnya. Prinsip kami adalah mempermudah para pelanggan untuk mendapatkan produk - produk berkwalitas dengan harga kompetitif yang telah kami pasarkan, supaya bisa menjangkau lebih luas di kalangan – kalangan masyarakat sampai ke pelosok negeri.

						</p>
				</div>
			</div>
		</div>
	</div>
</template>

<script>

	export default {
		name: 'Branda',
		data(){
			return {
				logo: '/images/branda.png'
			}
		},
	}
</script>

<style lang="scss">
	.panel{
		border: 1px solid #000;
	}
	.panel-heading{
		border-bottom: 1px solid #000;
	}
	.site-min-height{
		min-height: 100vh;
	}
</style>