<template>
	<div>
		<h5>
			Calon Distributor <i class="fa fa-angle-right"></i>
			List Data Calon Distributor
		</h5>
		<div class="row">
		  <div class="col-lg-12">
			<div class="content-panel">
				<router-link class="btn btn-success pull-right" :to="{ name: 'create'}">Tambah Calon Distributor</router-link>
				<h4><i class="fa fa-users"></i> Data Calon Distributor</h4>
				<hr>
				<div class="form-group col-md-12">
					<select class="form-control" v-model="form_search" v-on:change="UpdateProvinsi">
						<option value="">Pilih Provinsi</option>
						<option v-for="item in provinsi" :value="item.id">{{item.provinsi}}</option>
					</select>
				</div>
				<hr>
				<table class="table table-bordered">
				  <thead>
				  <tr>
				      <th class="text_center">Pelanggan</th>
				      <th v-for="item in kriteria" class="text_center kriteria">{{ item.kriteria }}</th>
				      <th width="150px">Aksi</th>
				  </tr>
				  </thead>
				  <tbody v-if="table.length > 0">
				  <tr v-for="(item, idx) in table" :class="{'active': !item.status}">
				      <td>{{item.nama_pelanggan}}</td>
				      <td v-for="(k, i) in kriteria" class="text_center">{{ $store.getters.nilaiCalon(k.id, idx) }}</td>
				      <td>
						<div class="btn-group btn-group-xs" v-show="item.status">
							<router-link class="btn btn-primary" :to="{ name: 'edit', params: { id: item.id }}">ubah</router-link>
							<a v-on:click="hapus(item.id)" class="btn btn-danger">hapus</a>
						</div>
						<a v-show="!item.status" v-on:click="check(item.id)" class="btn btn-success btn-xs">tampilkan</a>
				      </td>
				  </tr>
				  </tbody>
				  <tbody v-if="table.length == 0">
				  	<tr>
				  		<td  :colspan="kriteria.length + 2">
				  			<h1>data yg dicari tidak ada</h1>
				  		</td>
				  	</tr>
				  </tbody>
				</table>
			</div>
		  </div>
		</div>
	</div>
</template>

<script>
	import {base_url} from './../../config/env.config'
	import {mapGetters, mapActions} from 'vuex'
	export default{
		name: "Index",
		data(){
			return {
				// table: {},
				// kriteria: [],
				form_search: '',
				provinsi: [],
			}
		},
		computed: {
			...mapGetters({
				'table': 'calon',
				'kriteria': 'kriteria'
			})
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
					// Vue.set(that.$data, 'table', res.data.calon)
					this.$store.dispatch('setCalon', res.data.calon)
				})
			},
			getData(){
				let that = this
				that.$http.get('')
					.then(res => {
						this.$store.dispatch('setCalon', res.data.calon)
						this.$store.dispatch('setKriteria', res.data.kriteria)
						// Vue.set(that.$data, 'table', res.data.calon)
						// Vue.set(that.$data, 'kriteria', res.data.kriteria)
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
			// this.getKriteria()
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