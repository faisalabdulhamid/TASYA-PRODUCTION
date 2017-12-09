<template>
	<div>
		<h5>
			Pesanan <i class="fa fa-angle-right"></i>
			<router-link :to="{ name: 'index'}">List Data Pesanan</router-link> <i class="fa fa-angle-right"></i>
			Lihat Pelanggan
		</h5>
		<div class="row">
		  	<div class="col-lg-12">
			  	<div class="form-panel">
	          	  	<h4 class="mb"><i class="fa fa-users"></i> Form Lihat Pesanan</h4>
	              	<table class="table table-bordered">
	              		<tbody>
	              			<tr>
	              				<th>Pelanggan</th>
	              				<td>:</td>
	              				<td>{{ data.pelanggan }}</td>
	              			</tr>
	              			<tr>
	              				<th>Tanggal</th>
	              				<td>:</td>
	              				<td>{{ data.tanggal }}</td>
	              			</tr>
	              			<tr>
	              				<th>Total Bayar</th>
	              				<td>:</td>
	              				<td>{{ data.total_bayar }}</td>
	              			</tr>
	              			<tr>
	              				<td colspan="3">
	              					<table class="table table-striped">
		              					<thead>
		              						<tr>
		              							<th>Produk</th>
		              							<th>Qty</th>
		              							<th>Harga</th>
		              							<th>Subtotal</th>
		              						</tr>
		              					</thead>
		              					<tbody>
		              						<tr>
		              							<td></td>
		              							<td></td>
		              							<td></td>
		              							<td></td>
		              						</tr>
		              					</tbody>
		              					<tfoot>
		              						<tr>
		              							<th colspan="3" class="text-right"></th>
		              							<th>30000</th>
		              						</tr>
		              					</tfoot>
		              				</table>
	              				</td>
	              			</tr>
	              		</tbody>
	              	</table>
            	</div>
		  	</div>
		</div>
	</div>
</template>

<script>
	import { mapActions, mapGetters} from 'vuex'

	export default{
		name: 'Show',
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
			}),
			getData(){
				let that = this
				that.$http.get('/'+that.id, {
					headers: {
						Authorization: that.token.token_type+' '+that.token.access_token
					}
				})
					.then(res => {
						Vue.set(that.$data, 'data', res.data)
					})
					.catch(error => {
						console.log(error)
					})
			}
		},
		beforeMount(){
			this.Oauth()
			this.getData()
		}
	}
</script>