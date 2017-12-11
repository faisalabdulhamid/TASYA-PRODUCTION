<template>
	<div>
		<h5>
			Produk <i class="fa fa-angle-right"></i>
			<router-link :to="{ name: 'index'}">List Data Produk</router-link> <i class="fa fa-angle-right"></i>
			Tambah Produk
		</h5>
		<div class="row">
		  	<div class="col-lg-12">
			  	<div class="form-panel">
	          	  	<h4 class="mb"><i class="fa fa-users"></i> Form Tambah Produk</h4>
	              	<form class="form-horizontal" v-on:submit.prevent="simpan">
						<div class="form-group">
							<label for="kode" class="control-label col-md-2">Kode</label>
							<div class="col-md-10">
								<input type="text" class="form-control" id="kode" v-model="data.kode">
							</div>
						</div>
						<div class="form-group">
							<label for="nama" class="control-label col-md-2">Nama</label>
							<div class="col-md-10">
								<input type="text" class="form-control" id="nama" v-model="data.nama">
							</div>
						</div>
						<div class="form-group">
							<label for="harga" class="control-label col-md-2">Harga</label>
							<div class="col-md-10">
								<input type="text" class="form-control" id="harga" v-model="data.harga">
							</div>
						</div>
						<div class="form-group">
							<label for="gambar" class="control-label col-md-2">Gambar</label>
							<div class="col-md-10">
								<input type="file" id="gambar" v-on:change="onFileChange">
							</div>
						</div>
						<div class="form-group">
							<label for="deskripsi" class="control-label col-md-2">deskripsi</label>
							<div class="col-md-10">
								<textarea class="form-control" id="deskripsi" v-model="data.deskripsi"></textarea>
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
	export default{
		name: 'Create',
		data(){
			return {
				data: {}
			}
		},
		methods:{
			simpan(){
				let that = this
				
				that.$http.post('', that.data)
				.then(res => {
					this.$swal({
						text: res.data.message,
						type: "success",
						timer: 5000
					}).then(() => {
						this.$router.push({name: 'index'})
					})
				})
			},
			onFileChange(){

			}
		}
	}
</script>