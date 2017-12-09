<template>
	<div>
		<h5>
			Pesanan <i class="fa fa-angle-right"></i>
			<router-link :to="{ name: 'index'}">List Data Pesanan</router-link> <i class="fa fa-angle-right"></i>
			Edit Pesanan
		</h5>
		<div class="row">
		  	<div class="col-lg-12">
			  	<div class="form-panel">
	          	  	<h4 class="mb"><i class="fa fa-users"></i> Form Edit Pesanan</h4>
	              	<form class="form-horizontal" v-on:submit.prevent="simpan">
						<div class="form-group">
							<label for="pelanggan" class="control-label col-md-2">Pelanggan</label>
							<div class="col-md-10">
								<select class="form-control" id="pelanggan" v-model="data.pelanggan"></select>
							</div>
						</div>
						<div class="form-group">
							<label for="tanggal" class="control-label col-md-2">Tanggal</label>
							<div class="col-md-10">
								<input type="text" class="form-control" id="tanggal" v-model="data.tanggal">
							</div>
						</div>
						<div class="form-group">
							<label for="total_bayar" class="control-label col-md-2">Total Bayar</label>
							<div class="col-md-10">
								<input type="text" class="form-control" id="total_bayar" v-model="data.total_bayar">
							</div>
						</div>

						<div class="form-group">
							<table class="table table-bordered">
								<thead>
									<tr>
										<th>Produk</th>
										<th>Qty</th>
										<th>Harga</th>
										<th>Sub Total</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>
											<select class="form-control"></select>
										</td>
										<td>
											<input type="text" class="form-control">
										</td>
										<td>
											Harga
										</td>
										<td>
											Subtotal
										</td>
									</tr>
								</tbody>
								<tfoot>
									<tr>
										<th colspan="3" class="text-right">Total </th>
										<th>TotalBayar</th>
									</tr>
								</tfoot>
							</table>
						</div>
						<button class="btn btn-default">Simpan</button>
              		</form>
            	</div>
		  	</div>
		</div>
	</div>
</template>

<script>
	import { mapActions, mapGetters} from 'vuex'

	export default{
		name: 'Edit',
		props: ['id'],
		data(){
			return {
				data: {}
			}
		},
		computed:{
			...mapGetters({
				token: 'oauth'
			})
		},
		methods:{
			...mapActions({
				'Oauth': 'setOauth',
				getData(){
					let that = this
					that.$http.get('/'+that.id, {
						headers: {
							Authorization: that.token.token_type+' '+that.token.access_token
						}
					}).then(res => {
						Vue.set(that.$data, 'data', res.data)
					}).catch(error => {
						this.$swal({
						  title: error.response.data.message,
						  type: 'error',
						  timer: 5000,
						})
					})
				},
				simpan(){
					let that = this
					that.$http.put('/'+that.id, that.data,{
						headers: {
							Authorization: that.token.token_type+' '+that.token.access_token
						}
					}).then(res => {
						console.log(res)
						that.$swal({
							title: res.data.message,
							type: "success",
							timer: 5000,
						}).then(() => {
							that.$router.push({name: 'index'})
						})
					}).catch(error => {
						// console.log(error)
						var contentHtml = '';
						Object.keys(error.response.data.errors).forEach((key) => {
							contentHtml +=  '<p class="text-danger">'+error.response.data.errors[key][0]+'</p>'
						})
						
						this.$swal({
						  title: error.response.data.message,
						  html: contentHtml,
						  type: 'error',
						  timer: 5000,
						})
					})
				}
			}),
		},
		created(){
			this.Oauth()
		},
		beforeMount(){
			this.getData()
		}
	}
</script>