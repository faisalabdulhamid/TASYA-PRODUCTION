<template>
	<div class="row">
		<div class="col-md-4">
			<img :src="data.gambar" class="img-responsive">
		</div>
		<div class="col-md-8">
			<div class="panel">
				<div class="panel-heading">
					<h3 class="heading-title">{{ data.nama }}</h3>
				</div>
				<div class="panel-body">
					<table class="table table-bordered">
						<tbody>
							<tr>
								<td>Kode</td>
								<td>{{data.kode}}</td>
							</tr>
							<tr>
								<td>Harga</td>
								<td>{{data.harga}}</td>
							</tr>
							<tr>
								<td>Keterangan</td>
								<td>{{data.deskripsi}}</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
	import {base_url} from './../config/env.config'

	export default {
		name: 'Product-Detail',
		props: ['param'],
		data(){
			return {
				data: {}
			}
		},
		methods: {
			title(i){
				// return _.keys(_.findIndex(this.data, i))
				return _.indexOf(this.data, 1)
			}
		},
		created(){
			let self = this
			axios.get(`${base_url}/produk/${this.param}`)
				.then(res => {
					Vue.set(self.$data, 'data', res.data)
				})
		}
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