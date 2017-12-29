<template>
	<div>
		<h5>
			Calon Daerah Pemasaran <i class="fa fa-angle-right"></i>
			List Data Calon Daerah Pemasaran
		</h5>
		<div class="row">
		  <div class="col-lg-12">
			<div class="content-panel">
				<router-link class="btn btn-success pull-right" :to="{ name: 'create'}"><i class="fa fa-plus"></i></router-link>
				<h4><i class="fa fa-users"></i> Data Calon Daerah Pemasaran</h4>
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
				      <th v-for="item in kriteria" class="text_center kriteria">{{ item.kriteria }}</th>
				      <th style="width: 150px">#</th>
				  </tr>
				  </thead>
				  <tbody>
				  <tr v-for="item in table.data" :class="{'active': !item.status}">
				      <td>{{item.nama_kota}}</td>
				      <td v-for="(k, i) in kriteria" class="text_center">{{item.kriterias[i].nilai}}</td>
				      <td>
						<div class="btn-group btn-group-xs" v-show="item.status">
							<router-link class="btn btn-success" :to="{ name: 'show', params: { id: item.id }}"><i class="fa fa-search-plus"></i></router-link>
							<router-link class="btn btn-primary" :to="{ name: 'edit', params: { id: item.id }}"><i class="fa fa-edit"></i></router-link>
							<a v-on:click="hapus(item.id)" class="btn btn-danger"><i class="fa fa-times"></i></a>
						</div>
						<a v-show="!item.status" v-on:click="check(item.id)" class="btn btn-success btn-xs"><i class="fa fa-check "></i></a>
				      </td>
				  </tr>
				  </tbody>
				  <tfoot>
				  	<tr>
				  		<td :colspan="1 + kriteria.length"></td>
				  		<td>
				  			<a v-on:click="prev" :disabled="table.prev_page_url === null" class="btn btn-info btn-xs"><i class="fa fa-arrow-left"></i></a>
				  			<a v-on:click="next" :disabled="table.next_page_url === null" class="btn btn-info btn-xs"><i class="fa fa-arrow-right"></i></a>
				  		</td>
				  	</tr>
				  </tfoot>
				</table>
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
			getKriteria(){
				let that = this
				that.$http.get(base_url+'/select/kriteria')
				.then(res => {
					Vue.set(that.$data, 'kriteria', res.data)
				})
			},
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
					Vue.set(that.$data, 'table', res.data)
				})
			},
			getData(){
				let that = this
				that.$http.get('')
				.then(res => {
					Vue.set(that.$data, 'table', res.data)
				})
			},
			next(){
				let that = this
				that.$http.get(that.table.next_page_url)
				.then(res => {
					Vue.set(that.$data, 'table', res.data)
				})
			},
			prev(){
				let that = this
				that.$http.get(that.table.prev_page_url)
				.then(res => {
					Vue.set(that.$data, 'table', res.data)
				})
			},
			hapus(id){
				this.$swal({
					title: "Are you sure?",
					text: "Are you sure that you want to leave this page?",
					type: "warning",
					showCancelButton: true,
				})
				.then((result) => {
					if (result.value) {
						var that = this
						that.$http.delete('/'+id)
						.then(res => {
							this.$swal({
								title: "Deleted!",
								text: res.data.message,
								type: "success",
								timer: 5000
							}).then(() => {
								that.getData()
							})
						})
					}
				})
			},
			check(id){
				let that = this
				that.$http.post('/'+id+'/check', '')
				.then(res => {
					this.$swal({
						title: "check ",
						text: res.data.message,
						type: "success",
						timer: 5000
					}).then(() => {
						that.getData()
					})
				})
			}
			
		},
		beforeMount(){
			this.getData()
			this.getKriteria()
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