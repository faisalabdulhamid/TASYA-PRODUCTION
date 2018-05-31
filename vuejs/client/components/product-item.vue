<template>
	<div class="col-lg-4 col-md-4 col-sm-4 mb">
		<div class="product-panel-2 pn" v-bind:style="warnaBackgroud">
			<div class="badge badge-hot">{{product.kategori_id}}</div>
			<img class="img-responsive" width="120px" v-bind:src="product.gambar" v-bind:alt="product.nama">
			<h5 class="mt">{{product.nama}}</h5>
			<h6>{{product.harga}}</h6>
			<router-link :to="{name:'product-detail', params: {param: product.id}}" class="btn btn-small btn-theme04"><b>Lihat Detail</b></router-link>
		</div>
	</div>
</template>

<script>
	
	export default {
		name: 'Product-ItemM',
		props: ['product'],
		computed:{
			warnaBackgroud(){
				let back = [
					{ background: '#4CAF50', color: '#fff'},
					{ background: '#C63D0F', color: '#3B3738'}, 
					{ background: '#558C89', color: '#fff'},
					{ background: '#A8CD1B', color: '#fff'},
					{ background: '#D4E157', color: '#000'},
				]
				return back[Math.floor(Math.random() * back.length)]
			}
		}
	}
</script>

<style type="scss" scoped>
	.img-responsive{
		display: initial;
	}
</style>