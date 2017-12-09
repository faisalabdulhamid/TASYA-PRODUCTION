<template>
	<div>
		<h5>
			Pelanggan <i class="fa fa-angle-right"></i>
			<router-link :to="{ name: 'index'}">List Data Pelanggan</router-link> <i class="fa fa-angle-right"></i>
			Edit Pelanggan
		</h5>
		<div class="row">
		  	<div class="col-lg-12">
			  	<div class="form-panel">
	          	  	<h4 class="mb"><i class="fa fa-users"></i> Form Edit Pelanggan</h4>
	              	<form class="form-horizontal" v-on:submit.prevent="simpan">
						<div class="form-group">
							<label for="nama" class="control-label col-md-2">Nama</label>
							<div class="col-md-10">
								<input type="text" class="form-control" id="nama" v-model="data.nama">
							</div>
						</div>
						<div class="form-group">
							<label for="no_telepon" class="control-label col-md-2">No Telepon</label>
							<div class="col-md-10">
								<input type="text" class="form-control" id="no_telepon" v-model="data.no_telepon">
							</div>
						</div>
						<div class="form-group">
							<label for="alamat" class="control-label col-md-2">Alamat</label>
							<div class="col-md-10">
								<textarea class="form-control" id="alamat" v-model="data.alamat"></textarea>
							</div>
						</div>
						<div class="form-group">
							<label for="provinsi" class="control-label col-md-2">Provinsi</label>
							<div class="col-md-10">
								<select class="form-control" id="provinsi" v-model="data.provinsi"></select>
							</div>
						</div>
						<div class="form-group">
							<label for="kota" class="control-label col-md-2">Kota</label>
							<div class="col-md-10">
								<select class="form-control" id="kota" v-model="data.kota"></select>
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
	import { mapActions, mapGetters} from 'vuex'

	export default{
		name: 'Edit',
		props: ['id'],
		data(){
			return {
				data: {}
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
					that.$http.get('/'+that.id, {
						headers: {
							Authorization: that.token.token_type+' '+that.token.access_token
						}
					}).then(res => {
						Vue.set(that.$data, 'data', res.data)
					}).catch(error => {
						this.$swal({
						  title: error.response.data.message,
						  type: 'error',
						  timer: 5000,
						})
					})
				},
				simpan(){
					let that = this
					that.$http.put('/'+that.id, that.data,{
						headers: {
							Authorization: that.token.token_type+' '+that.token.access_token
						}
					}).then(res => {
						console.log(res)
						that.$swal({
							title: res.data.message,
							type: "success",
							timer: 5000,
						}).then(() => {
							that.$router.push({name: 'index'})
						})
					}).catch(error => {
						// console.log(error)
						var contentHtml = '';
						Object.keys(error.response.data.errors).forEach((key) => {
							contentHtml +=  '<p class="text-danger">'+error.response.data.errors[key][0]+'</p>'
						})
						
						this.$swal({
						  title: error.response.data.message,
						  html: contentHtml,
						  type: 'error',
						  timer: 5000,
						})
					})
				}
			}),
		},
		created(){
			this.Oauth()
		},
		beforeMount(){
			this.getData()
		}
	}
</script>