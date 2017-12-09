<template>
	<div>
		<h5>
			Pelanggan <i class="fa fa-angle-right"></i>
			<router-link :to="{ name: 'index'}">List Data Pelanggan</router-link> <i class="fa fa-angle-right"></i>
			Tambah Pelanggan
		</h5>
		<div class="row">
		  	<div class="col-lg-12">
			  	<div class="form-panel">
	          	  	<h4 class="mb"><i class="fa fa-users"></i> Form Tambah Pelanggan</h4>
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
		name: 'Create',
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
				simpan(){
					let that = this
					
					that.$http.post('', that.data,{
						headers: {
							Authorization: that.token.token_type+' '+that.token.access_token
						}
					}).then(res => {
						this.$swal({
							text: res.data.message,
							type: "success",
							timer: 5000
						}).then(() => {
							this.$router.push({name: 'index'})
						})
					}).catch(error => {
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
			})
		},
		created(){
			this.Oauth()
		},
		beforeMount(){

		}
	}
</script>