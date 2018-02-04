<template>
	<div>
		<h5>
			Kriteria Daerah Pemasaran <i class="fa fa-angle-right"></i>
			List Data Kriteria Daerah Pemasaran
		</h5>
		<div class="row">
		  <div class="col-lg-12">

			<div class="content-panel">
				<router-link class="btn btn-success pull-right" :to="{ name: 'create'}">Tambah Kriteria Daerah Pemasaran</router-link>
				<h4><i class="fa fa-users"></i> Data Kriteria Daerah Pemasaran</h4>

				<hr>
				<table class="table">
				  <thead>
				  <tr>
				      <th>Kriteria</th>
				      <th>Bobot</th>
				      <th>Benefit</th>
				      <th width="150px">Aksi</th>
				  </tr>
				  </thead>
				  <tbody v-if="table.data.length > 0">
				  <tr v-for="item in table.data">
				      <td>{{item.kriteria}}</td>
				      <td>{{item.bobot}}</td>
				      <td>{{item.benefit}}</td>
				      <td>
						<router-link class="btn btn-primary btn-xs" :to="{ name: 'edit', params: { id: item.id }}">ubah</router-link>
						<a v-on:click="hapus(item.id)" class="btn btn-danger btn-xs">hapus</a>
				      </td>
				  </tr>
				  </tbody>
				  <tbody v-if="table.data.length == 0">
				  	<tr>
				  		<td  colspan="4">
				  			<h1>data yg dicari tidak ada</h1>
				  		</td>
				  	</tr>
				  </tbody>
				  <tfoot>
				  	<tr>
				  		<td colspan="3"></td>
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
	export default{
		name: "Index",
		data(){
			return {
				table: {}
			}
		},
		methods:{
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
					title: "Apakah Anda Yakin?",
					text: "",
					type: "warning",
					showCancelButton: true,
				})
				.then((result) => {
					if (result.value) {
						var that = this
						that.$http.delete('/'+id).then(res => {
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
			}
			
		},
		beforeMount(){
			this.getData()
		}
	}
</script>

<style lang="scss" scoped>
	.pull-right{
		margin-right: 20px;
	}
</style>