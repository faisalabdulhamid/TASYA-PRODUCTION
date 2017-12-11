<template>
	<div>
		<h5>
			Calon Daerah Pemasaran <i class="fa fa-angle-right"></i>
			<router-link :to="{ name: 'index'}">List Data Calon Daerah Pemasaran</router-link> <i class="fa fa-angle-right"></i>
			Lihat Calon Daerah Pemasaran
		</h5>
		<div class="row">
		  	<div class="col-lg-12">
			  	<div class="form-panel">
	          	  	<h4 class="mb"><i class="fa fa-users"></i> Form Lihat Calon Daerah Pemasaran</h4>
	              	<table class="table table-bordered">
	              		<tbody>
	              			<tr>
	              				<th>Nama</th>
	              				<td>:</td>
	              				<td>{{ data.nama }}</td>
	              			</tr>
	              			<tr>
	              				<th>Email</th>
	              				<td>:</td>
	              				<td>{{ data.email }}</td>
	              			</tr>
	              			<tr>
	              				<th>Status</th>
	              				<td>:</td>
	              				<td>{{ data.status }}</td>
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