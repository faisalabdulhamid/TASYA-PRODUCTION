<template>
	<div>
		<h5>
			Distributor <i class="fa fa-angle-right"></i>
			<router-link :to="{ name: 'index'}">List Data Distributor</router-link> <i class="fa fa-angle-right"></i>
			Lihat Distributor
		</h5>
		<div class="row">
		  	<div class="col-lg-12">
			  	<div class="form-panel">
	          	  	<h4 class="mb"><i class="fa fa-users"></i> Form Lihat Distributor</h4>
	              	<table class="table table-bordered">
	              		<tbody>
	              			<tr>
	              				<th>Nama</th>
	              				<td>:</td>
	              				<td>{{ data.nama }}</td>
	              			</tr>
	              			<tr>
	              				<th>Telepon</th>
	              				<td>:</td>
	              				<td>{{ data.no_telepon }}</td>
	              			</tr>
	              			<tr>
	              				<th>Kota</th>
	              				<td>:</td>
	              				<td>{{ data.nama_kota }}</td>
	              			</tr>
	              			<tr>
	              				<th>Alamat</th>
	              				<td>:</td>
	              				<td>{{ data.alamat }}</td>
	              			</tr>
	              		</tbody>
	              	</table>
	              	<table class="table table-bordered">
	              		<thead>
	              			<tr>
	              				<th>Tanggal</th>
	              				<th>Totak Bayar</th>
	              			</tr>
	              		</thead>
	              		<tbody>
	              			<tr v-for="item in data.pesanan">
	              				<td>{{ item.tanggal }}</td>
	              				<td>{{item.total_bayar}}</td>
	              			</tr>
	              		</tbody>
	              	</table>
            	</div>
		  	</div>
		</div>
	</div>
</template>

<script>
	import {base_url} from './../../config/env.config'
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
				that.$http.get(base_url+'/pelanggan/'+that.id)
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