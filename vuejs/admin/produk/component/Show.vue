<template>
	<div>
		<h5>
			Produk <i class="fa fa-angle-right"></i>
			<router-link :to="{ name: 'index'}">List Data Produk</router-link> <i class="fa fa-angle-right"></i>
			Lihat Pelanggan
		</h5>
		<div class="row">
		  	<div class="col-lg-12">
			  	<div class="form-panel">
	          	  	<h4 class="mb"><i class="fa fa-users"></i> Form Lihat Produk</h4>
	              	<table class="table table-bordered">
	              		<tbody>
	              			<tr>
	              				<th>Kode</th>
	              				<td>:</td>
	              				<td>{{ data.kode }}</td>
	              			</tr>
	              			<tr>
	              				<th>Nama</th>
	              				<td>:</td>
	              				<td>{{ data.nama }}</td>
	              			</tr>
	              			<tr>
	              				<th>Kategori</th>
	              				<td>:</td>
	              				<td>{{ data.kategori_id }}</td>
	              			</tr>
	              			<tr>
	              				<th>Harga</th>
	              				<td>:</td>
	              				<td>{{ data.harga }}</td>
	              			</tr>
	              			<tr>
	              				<th>Gambar</th>
	              				<td>:</td>
	              				<td><img width="70px" :src="data.gambar" :alt="data.gambar"></td>
	              			</tr>
	              			<tr>
	              				<th>Deskripsi</th>
	              				<td>:</td>
	              				<td>{{ data.deskripsi }}</td>
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