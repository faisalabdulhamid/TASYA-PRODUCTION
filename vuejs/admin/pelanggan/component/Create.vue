<template>
	<div>
		<h5>
			Pelanggan <i class="fa fa-angle-right"></i>
			<router-link :to="{ name: 'index'}">List Data Pelanggan</router-link> <i class="fa fa-angle-right"></i>
			Tambah Pelanggan
		</h5>
		<div class="row">
		  	<div class="col-lg-12">
			  	<div class="form-panel">
	          	  	<h4 class="mb"><i class="fa fa-users"></i> Form Tambah Pelanggan</h4>
	              	<form class="form-horizontal" v-on:submit.prevent="simpan">
						<div class="form-group">
							<label for="nama" class="control-label col-md-2">Nama</label>
							<div class="col-md-10">
								<input type="text" class="form-control" id="nama" v-model="data.nama">
							</div>
						</div>
						<div class="form-group">
							<label for="no_telepon" class="control-label col-md-2">No Telepon</label>
							<div class="col-md-10">
								<input type="text" class="form-control" id="no_telepon" v-model="data.no_telepon">
							</div>
						</div>
						<div class="form-group">
							<label for="alamat" class="control-label col-md-2">Alamat</label>
							<div class="col-md-10">
								<textarea class="form-control" id="alamat" v-model="data.alamat"></textarea>
							</div>
						</div>
						<div class="form-group">
							<label for="provinsi" class="control-label col-md-2">Provinsi</label>
							<div class="col-md-10">
								<select v-on:change="updateProvinsi" class="form-control" id="provinsi" v-model="data.provinsi">
									<option v-for="item in provinsi" :value="item.id">{{ item.provinsi }}</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="kota" class="control-label col-md-2">Kota</label>
							<div class="col-md-10">
								<select class="form-control" id="kota" v-model="data.kota">
									<option v-for="item in kota" :value="item.id">{{ item.kota }}</option>
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
	import {base_url} from './../../config/env.config'
	
	export default{
		name: 'Create',
		data(){
			return {
				data: {},
				provinsi: [],
				kota: []
			}
		},
		methods:{
			simpan(){
				let that = this
				that.$http.post('', that.data)
				.then(res => {
					this.$swal({
						text: res.data.message,
						type: "success",
						timer: 5000
					}).then(() => {
						this.$router.push({name: 'index'})
					})
				})
			},
			getProvinsi(){
				let that = this
				that.$http.get(base_url+'/select/provinsi')
				.then(res => {
					Vue.set(that.$data, 'provinsi', res.data)
				})
			},
			updateProvinsi(){
				let that = this
				that.$http.get(base_url+'/select/kota/'+that.data.provinsi)
				.then(res => {
					Vue.set(that.$data, 'kota', res.data)
				})
			}
		},
		beforeMount(){
			this.getProvinsi()
		}
	}
</script>