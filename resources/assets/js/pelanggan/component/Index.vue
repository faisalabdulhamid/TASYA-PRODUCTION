<template>
	<div>
		<h5>
			Pelanggan <i class="fa fa-angle-right"></i>
			List Data Pelanggan
		</h5>
		<div class="row">
		  <div class="col-lg-12">

			<div class="content-panel">
				<router-link class="btn btn-success pull-right" :to="{ name: 'create'}"><i class="fa fa-plus"></i></router-link>
				<h4><i class="fa fa-users"></i> Data Pelanggan</h4>

				<hr>
				<table class="table">
				  <thead>
				  <tr>
				      <th>Nama</th>
				      <th>Telepon</th>
				      <th>#</th>
				  </tr>
				  </thead>
				  <tbody>
				  <tr v-for="item in table.data">
				      <td>{{item.nama}}</td>
				      <td>{{item.no_telepon}}</td>
				      <td>
						<router-link class="btn btn-success btn-xs" :to="{ name: 'show', params: { id: item.id }}"><i class="fa fa-search-plus"></i></router-link>
						<router-link class="btn btn-primary btn-xs" :to="{ name: 'edit', params: { id: item.id }}"><i class="fa fa-edit"></i></router-link>
						<a v-on:click="hapus(item.id)" class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></a>
				      </td>
				  </tr>
				  </tbody>
				  <tfoot>
				  	<tr>
				  		<td colspan="2"></td>
				  		<td>
				  			<a v-on:click="prev" :disabled="table.prev_page_url === null" class="btn btn-info btn-xs"><i class="fa fa-arrow-left"></i></a>
				  			<a v-on:click="next" :disabled="table.next_page_url === null" class="btn btn-info btn-xs"><i class="fa fa-arrow-right"></i></a>
				  		</td>
				  	</tr>
				  </tfoot>
				</table>
			</div>

		  </div><!-- /col-lg-12 END SECTION MIDDLE -->
		</div><!-- /row -->
		
	</div>
</template>

<script>
	export default{
		name: "IndexPelanggan",
		data(){
			return {
				table: {}
			}
		},
		methods:{
			getData(){
				let that = this
				that.$http.get('').then(res => {
					Vue.set(that.$data, 'table', res.data)
				})
			},
			next(){
				let that = this
				that.$http.get(that.table.next_page_url).then(res => {
					Vue.set(that.$data, 'table', res.data)
				})
			},
			prev(){
				let that = this
				that.$http.get(that.table.prev_page_url).then(res => {
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
						let that = this
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