<template>
	<div>
		<h5>
			Kriteria Daerah Pemasaran <i class="fa fa-angle-right"></i>
			<router-link :to="{ name: 'index'}">List Data Kriteria Daerah Pemasaran</router-link> <i class="fa fa-angle-right"></i>
			Tambah Kriteria Daerah Pemasaran
		</h5>
		<div class="row">
		  	<div class="col-lg-12">
			  	<div class="form-panel">
	          	  	<h4 class="mb"><i class="fa fa-users"></i> Form Tambah Kriteria Daerah Pemasaran</h4>
	              	<form class="form-horizontal" v-on:submit.prevent="simpan">
						<div class="form-group">
							<label for="kriteria" class="control-label col-md-2">Kriteria</label>
							<div class="col-md-10">
								<input type="text" class="form-control" id="kriteria" v-model="data.kriteria">
							</div>
						</div>
						<div class="form-group">
							<label for="bobot" class="control-label col-md-2">Bobot</label>
							<div class="col-md-10">
								<input type="text" class="form-control" id="bobot" v-model="data.bobot">
							</div>
						</div>
						<div class="form-group">
							<label for="benefit" class="control-label col-md-2">benefit</label>
							<div class="col-md-10">
								<select class="form-control" id="benefit" v-model="data.benefit">
									<option value="1">Plus</option>
									<option value="0">Minus</option>
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
				that.$http.post('', that.data).then(res => {
					this.$swal({
						text: res.data.message,
						type: "success",
						timer: 5000
					}).then(() => {
						this.$router.push({name: 'index'})
					})
				})
			}
		}
	}
</script>