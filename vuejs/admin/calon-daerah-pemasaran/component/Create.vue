<template>
	<div>
		<h5>
			Calon Daerah Pemasaran <i class="fa fa-angle-right"></i>
			<router-link :to="{ name: 'index'}">List Data Calon Daerah Pemasaran</router-link> <i class="fa fa-angle-right"></i>
			Tambah Calon Daerah Pemasaran
		</h5>
		<div class="row">
		  	<div class="col-lg-12">
			  	<div class="form-panel">
	          	  	<h4 class="mb"><i class="fa fa-users"></i> Form Tambah Calon Daerah Pemasaran</h4>
	              	<form class="form-horizontal" v-on:submit.prevent="simpan">
						
						<div class="form-group">
							<label for="provinsi" class="control-label col-md-2">Provinsi</label>
							<div class="col-md-10">
								<select v-on:change="getDataKota" class="form-control" id="provinsi" v-model="data.provinsi">
									<option v-for="item in provinsi" :value="item.id">{{item.provinsi}}</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="kota" class="control-label col-md-2">Kota</label>
							<div class="col-md-10">
								<select class="form-control" id="kota" v-model="data.kota">
									<option v-for="item in kota" :value="item.id">{{item.kota}}</option>
								</select>
							</div>
						</div>

						<div v-for="(item, idx) in data.kriterias" class="form-group">
							<label for="nilai" class="control-label col-md-2">Nilai {{ item.kriteria }}</label>
							<div class="col-md-10">
								<input type="text" class="form-control" id="nilai" :key="item.id" v-model="item.nilai">
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
				data: {
					provinsi: '',
					kota: '',
					kriterias: []
				},
				provinsi: [],
				kota: [],
				kriteria: [],
			}
		},
		methods:{
			getDataProvinsi(){
				let that = this
				that.$http.get(base_url+'/select/provinsi')
				.then(res => {
					Vue.set(that.$data, 'provinsi', res.data)
				})
			},
			getDataKota(){
				let that = this
				that.$http.get(base_url+'/select/kota/'+that.data.provinsi)
				.then(res => {
					Vue.set(that.$data, 'kota', res.data)
				})
			},
			getDataKriteria(){
				let that = this
				that.$http.get(base_url+'/select/kriteria')
				.then(res => {
					this.data.kriterias = res.data
					Vue.set(that.$data, 'kriteria', res.data)
				})
			},
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
			}
		},
		beforeMount(){
			this.getDataKriteria()
			this.getDataProvinsi()
		}
	}
</script>