<template>
	<div>
		<h5>
			Produk <i class="fa fa-angle-right"></i>
			List Data Produk
		</h5>
		<div class="row">
		  <div class="col-lg-12">

			<div class="content-panel">
				<router-link class="btn btn-success pull-right" :to="{ name: 'create'}"><i class="fa fa-plus"></i></router-link>
				<h4><i class="fa fa-users"></i> Data Produk</h4>

				<hr>
				<table class="table">
				  <thead>
				  <tr>
				      <th>Kode</th>
				      <th>Nama</th>
				      <th>#</th>
				  </tr>
				  </thead>
				  <tbody>
				  <tr v-for="item in table.data">
				      <td>{{item.kode}}</td>
				      <td>{{item.nama}}</td>
				      <td>
						<router-link class="btn btn-success btn-xs" :to="{ name: 'show', params: { id: item.id }}"><i class="fa fa-search-plus"></i></router-link>
						<router-link class="btn btn-primary btn-xs" :to="{ name: 'edit', params: { id: item.id }}"><i class="fa fa-edit"></i></router-link>
						<button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button>
				      </td>
				  </tr>
				  </tbody>
				</table>
			</div>

		  </div><!-- /col-lg-12 END SECTION MIDDLE -->
		</div><!-- /row -->
		
	</div>
</template>

<script>
import { mapActions, mapGetters} from 'vuex'
	
	export default{
		name: "IndexProduk",
		data(){
			return {
				table: {}
			}
		},
		computed:{
			...mapGetters({
				token: 'oauth'
			})
		},
		methods:{
			...mapActions({
				'Oauth': 'setOauth',
				getData(){
					let that = this
					that.$http.get('', {
						headers: {
							Authorization: that.token.token_type+' '+that.token.access_token
						}
					}).then(res => {
						Vue.set(that.$data, 'table', res.data)
					}).catch(error => {
						console.log(error)
					})
				},
				next(){
					let that = this
					that.$http.get(that.table.next_page_url, {
						headers: {
							Authorization: that.token.token_type+' '+that.token.access_token
						}
					}).then(res => {
						Vue.set(that.$data, 'model', res.data.data)
						Vue.set(that.$data, 'table', res.data)
					}).catch(error => {
						console.log(error)
					})
				},
				prev(){
					let that = this
					that.$http.get(that.table.prev_page_url, {
						headers: {
							Authorization: that.token.token_type+' '+that.token.access_token
						}
					}).then(res => {
						Vue.set(that.$data, 'model', res.data.data)
						Vue.set(that.$data, 'table', res.data)
					}).catch(error => {
						console.log(error)
					})
				}
			}),
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
						that.$http.delete('/'+id, {
							headers: {
								Authorization: that.token.token_type+' '+that.token.access_token
							}
						}).then(res => {
							this.$swal({
								title: "Deleted!",
								text: res.data.message,
								type: "success",
								timer: 5000
							}).then(() => {
								that.getData()
							})
						}).catch(err => {
							console.log(err)
						})
					}
				})
			}
			
		},
		created(){
			this.Oauth()
			this.getData()
		},
		beforeMount(){
			
		}
	}
</script>

<style lang="scss" scoped>
	.pull-right{
		margin-right: 20px;
	}
</style>