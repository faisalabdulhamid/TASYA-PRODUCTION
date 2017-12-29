<template>
	<div>
		<h5>
			Pegawai <i class="fa fa-angle-right"></i>
			<router-link :to="{ name: 'index'}">List Data Pegawai</router-link> <i class="fa fa-angle-right"></i>
			Tambah Pegawai
		</h5>
		<div class="row">
		  	<div class="col-lg-12">
			  	<div class="form-panel">
	          	  	<h4 class="mb"><i class="fa fa-users"></i> Form Tambah Pegawai</h4>
	              	<form class="form-horizontal" v-on:submit.prevent="simpan">
						<div class="form-group">
							<label for="nama" class="control-label col-md-2">Nama</label>
							<div class="col-md-10">
								<input type="text" class="form-control" id="nama" v-model="data.nama">
							</div>
						</div>
						<div class="form-group">
							<label for="email" class="control-label col-md-2">Email</label>
							<div class="col-md-10">
								<input type="email" class="form-control" id="email" v-model="data.email">
							</div>
						</div>
						<div class="form-group">
							<label for="password" class="control-label col-md-2">Password</label>
							<div class="col-md-10">
								<input type="password" class="form-control" id="password" v-model="data.password">
							</div>
						</div>
						<div class="form-group">
							<label for="status" class="control-label col-md-2">Status</label>
							<div class="col-md-10">
								<select class="form-control" id="status" v-model="data.status">
									<option value="marketing">Marketing</option>
									<option value="admin">Admin</option>
								</select>
							</div>
						</div>
						<button class="btn btn-default">Simpan</button>
              		</form>
            	</div>
		  	</div>
		</div>
	</div>
</template>

<script>
	export default{
		name: 'Create',
		data(){
			return {
				data: {
					nama: '',
					email: '',
					password: '',
					status: ''
				}
			}
		},
		methods:{
			simpan(){
				let that = this
				that.$http.post('', that.data,{
				}).then(res => {
					this.$swal({
						text: res.data.message,
						type: "success",
						timer: 5000
					}).then(() => {
						this.$router.push({name: 'index'})
					})
				})
			}
		},
	}
</script>