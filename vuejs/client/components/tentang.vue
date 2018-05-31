<template>
	<div class="row">
		<div class="col-md-12">
			<div class="panel">
				<div class="panel-heading">
					<h3 class="heading-title">About</h3>
				</div>
				<div class="panel-body">
					<div class="text-center">
						<img :src="logo">
					</div>
						<p>
							Tasya Production merupakan produsen pakaian bayi yang berdiri sejak tahun 2000. Kami telah berpengalaman dalam produksi pakaian bayi. Lebih dari 15 tahun kami telah memenuhi kebutuhan pakaian bayi untuk bayi di seluruh indonesia. Produk kami telah tersebar di berbagai kota besar dan telah menyuplai puluhan toko pakaian bayi/baby shop di indonesia. Prinsip kami adalah menjual produk dengan kepuasan pelanggan yang menjadi prioritas utama. Jadilah mitra kami dalam memenuhi kebutuhan pakaian bayi di indonesia untuk bayi indonesia yang sehat, aman dan ceria
						</p>
				</div>
			</div>
		</div>
	</div>
</template>

<script>

	export default {
		name: 'About',
		data(){
			return {
				logo: '/images/logo.png'
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