<template>
	<div>
		<h5>
			Kriteria Distributor <i class="fa fa-angle-right"></i>
			<router-link :to="{ name: 'index'}">List Data Kriteria Distributor</router-link> <i class="fa fa-angle-right"></i>
			Edit Kriteria Distributor
		</h5>
		<div class="row">
		  	<div class="col-lg-12">
			  	<div class="form-panel">
	          	  	<h4 class="mb"><i class="fa fa-users"></i> Form Edit Kriteria Distributor</h4>
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
		name: 'Edit',
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
			},
			simpan(){
				let that = this
				that.$http.put('/'+that.id, that.data)
				.then(res => {
					that.$swal({
						title: res.data.message,
						type: "success",
						timer: 5000,
					}).then(() => {
						that.$router.push({name: 'index'})
					})
				})
			}
		},
		beforeMount(){
			this.getData()
		}
	}
</script>