<template>
	<div>
		<h5>
			Calon Distributor <i class="fa fa-angle-right"></i>
			<router-link :to="{ name: 'index'}">List Data Calon Distributor</router-link> <i class="fa fa-angle-right"></i>
			Tambah Calon Distributor
		</h5>
		<div class="row">
		  	<div class="col-lg-12">
			  	<div class="form-panel">
	          	  	<h4 class="mb"><i class="fa fa-users"></i> Form Tambah Calon Distributor</h4>
	              	<form class="form-horizontal" v-on:submit.prevent="simpan">
						
						<div class="form-group">
							<label for="pelanggan" class="control-label col-md-2">pelanggan</label>
							<div class="col-md-10">
								<select class="form-control" id="pelanggan" v-model="data.pelanggan">
									<option v-for="item in pelanggan" :value="item.id">{{item.nama}}</option>
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
					pelanggan: '',
					kriterias: []
				},
				pelanggan: [],
				kriteria: [],
			}
		},
		methods:{
			getDatapelanggan(){
				let that = this
				that.$http.get(base_url+'/select/pelanggan')
				.then(res => {
					Vue.set(that.$data, 'pelanggan', res.data)
				})
			},
			getDataKriteria(){
				let that = this
				that.$http.get(base_url+'/select/kriteria-distributor')
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
			this.getDatapelanggan()
		}
	}
</script>