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
	              				<td>{{ data.nama_pelanggan }}</td>
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
		              						<tr v-for="item in data.produks">
		              							<td>{{ item.nama }}</td>
		              							<td>{{ item.jumlah }}</td>
		              							<td>{{ item.harga }}</td>
		              							<td>{{ item.jumlah * item.harga }}</td>
		              						</tr>
		              					</tbody>
		              					<tfoot>
		              						<tr>
		              							<th colspan="3" class="text-right"></th>
		              							<th>{{ data.total_bayar }}</th>
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
	export default{
		name: 'Show',
		props: ['id'],
		data(){
			return {
				data: {}
			}
		},
		methods:{
			getData(){
				let that = this
				that.$http.get('/'+that.id)
				.then(res => {
					Vue.set(that.$data, 'data', res.data)
				})
			}
		},
		beforeMount(){
			this.getData()
		}
	}
</script>