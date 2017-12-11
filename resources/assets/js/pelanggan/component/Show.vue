<template>
	<div>
		<h5>
			Pelanggan <i class="fa fa-angle-right"></i>
			<router-link :to="{ name: 'index'}">List Data Pelanggan</router-link> <i class="fa fa-angle-right"></i>
			Lihat Pelanggan
		</h5>
		<div class="row">
		  	<div class="col-lg-12">
			  	<div class="form-panel">
	          	  	<h4 class="mb"><i class="fa fa-users"></i> Form Lihat Pelanggan</h4>
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
	              				<th>Alamat</th>
	              				<td>:</td>
	              				<td>{{ data.alamat }}</td>
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