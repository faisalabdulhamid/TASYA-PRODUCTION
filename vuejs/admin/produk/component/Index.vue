<template>
	<div>
		<h5>
			Produk <i class="fa fa-angle-right"></i>
			List Data Produk
		</h5>
		<div class="row">
		  <div class="col-lg-12">

			<div class="content-panel">
				<router-link class="btn btn-success pull-right" :to="{ name: 'create'}">Tambah Produk</router-link>
				<h4><i class="fa fa-users"></i> Data Produk</h4>

				<hr>
				<table class="table">
					<thead>
						<tr>
							<th colspan="3">
								<div class="form-group">
									<label for="" class="control-label col-md-2">Cari</label>
									<div class="col-md-10">
										<div class="input-group">
									      <input type="text" class="form-control" placeholder="Cari ..." v-model="cari">
									      <span class="input-group-btn">
									        <button class="btn btn-info" type="button" v-on:click="search">Cari</button>
									      </span>
									    </div><!-- /input-group -->
									</div>
								</div>
							</th>
						</tr>
					</thead>
				  <thead>
				  <tr>
				      <th>Kode</th>
				      <th>Nama</th>
				      <th width="150px">Aksi</th>
				  </tr>
				  </thead>
				  <tbody v-if="table.data.length > 0">
				  <tr v-for="item in table.data">
				      <td>{{item.kode}}</td>
				      <td>{{item.nama}}</td>
				      <td>
						<router-link class="btn btn-success btn-xs" :to="{ name: 'show', params: { id: item.id }}">lihat</router-link>
						<router-link class="btn btn-primary btn-xs" :to="{ name: 'edit', params: { id: item.id }}">ubah</router-link>
						<a v-on:click="hapus(item.id)" class="btn btn-danger btn-xs">hapus</a>
				      </td>
				  </tr>
				  </tbody>
				  <tbody v-if="table.data.length == 0">
				  	<tr>
				  		<td  colspan="3">
				  			<h1>data yg dicari tidak ada</h1>
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
		  </div>
		</div>
		
	</div>
</template>

<script>	
	export default{
		name: "IndexProduk",
		data(){
			return {
				table: {},
				cari: ''
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
			search () {
				this.$http.get('', {
					params:{
						cari: this.cari
					}
				}).then(res => {
					Vue.set(this.$data, 'table', res.data)
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