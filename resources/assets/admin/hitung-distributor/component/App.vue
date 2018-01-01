<template>
	<div id="root">
		<h3><i class="fa fa-users"></i> Calon Distributor</h3>
		<hr>
	<div>
		<h5>
			Calon Distributor <i class="fa fa-angle-right"></i>
			Hitung Distributor
		</h5>
		<div class="row">
		  <div class="col-lg-12">
			<div class="content-panel">
				<h4><i class="fa fa-users"></i> Data Calon Distributor</h4>
				<hr>
				<div class="form-group col-md-12">
					<select class="form-control" v-model="form_search" v-on:change="UpdateProvinsi">
						<option v-for="item in provinsi" :value="item.id">{{item.provinsi}}</option>
					</select>
				</div>
				<hr>
				<table class="table table-bordered">
				  <thead>
				  <tr>
				      <th class="text_center">Kota</th>
				      <th>Nilai S</th>
				      <th>Nilai V</th>
				  </tr>
				  </thead>
				  <tbody>
				  <tr v-for="item in table">
				      <td>{{item.pelanggan.nama}}</td>
				      <td>{{item.nilai_s}}</td>
				      <td>{{item.nilai_v}}</td>
				  </tr>
				  </tbody>
				</table>
			</div>
		  </div>
		</div>
	</div>
	</div>
</template>

<script>
	import {base_url} from './../../config/env.config'
	
	export default{
		name: "Index",
		data(){
			return {
				table: {},
				kriteria: [],
				form_search: '',
				provinsi: [],
			}
		},
		methods:{
			getProvinsi(){
				let that = this
				that.$http.get(base_url+'/select/provinsi')
				.then(res => {
					Vue.set(that.$data, 'provinsi', res.data)
				})
			},
			UpdateProvinsi(){
				let that = this
				that.$http.get('?provinsi='+that.form_search)
				.then(res => {
					let arr = res.data
					let sor = arr.sort((a, b) => {
						return b.nilai_v - a.nilai_v
					})
					
					Vue.set(that.$data, 'table', sor)
				})
			},
			getData(){
				let that = this
				that.$http.get('')
				.then(res => {
					Vue.set(that.$data, 'table', res.data)
				})
			},			
		},
		beforeMount(){
			this.getData()
			this.getProvinsi()
		}
	}
</script>

<style lang="scss" scoped>
	.pull-right{
		margin-right: 20px;
	}
	.text_center{
		vertical-align: middle;
		text-align: center;
	}
	.kriteria{
		width: 150px;
	}
</style>