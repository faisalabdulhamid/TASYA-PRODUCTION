<template>
	<div>
		<h5>
			Pesanan <i class="fa fa-angle-right"></i>
			List Data Pesanan
		</h5>
		<div class="row">
		  <div class="col-lg-12">

			<div class="content-panel">
				<router-link class="btn btn-success pull-right" :to="{ name: 'create'}"><i class="fa fa-plus"></i></router-link>
				<h4><i class="fa fa-users"></i> Data Pesanan</h4>
				<hr>
				<table class="table">
				  <thead>
				  <tr>
				      <th>Pelanggan</th>
				      <th>Tanggal</th>
				      <th>Total Bayar</th>
				      <th>#</th>
				  </tr>
				  </thead>
				  <tbody>
				  <tr v-for="item in table.data">
				      <td>{{item.nama_pelanggan}}</td>
				      <td>{{item.tanggal}}</td>
				      <td>{{item.total_bayar}}</td>
				      <td>
						<router-link class="btn btn-success btn-xs" :to="{ name: 'show', params: { id: item.id }}"><i class="fa fa-search-plus"></i></router-link>
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
		name: "IndexPesanan",
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