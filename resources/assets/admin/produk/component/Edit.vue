<template>
	<div>
		<h5>
			produk <i class="fa fa-angle-right"></i>
			<router-link :to="{ name: 'index'}">List Data produk</router-link> <i class="fa fa-angle-right"></i>
			Edit produk
		</h5>
		<div class="row">
		  	<div class="col-lg-12">
			  	<div class="form-panel">
	          	  	<h4 class="mb"><i class="fa fa-users"></i> Form Edit produk</h4>
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
								<input 
									type="file" 
									multiple
									name="gambar" 
									id="gambar" 
									accept="image/*" >
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
		name: 'Edit',
		props: ['id'],
		data(){
			return {
				data: {
					'kode': '',
					'nama': '',
					'harga': '',
					'deskripsi': '',
				}
			}
		},
		methods:{
			getData(){
				let that = this
				that.$http.get('/'+that.id)
				.then(res => {
					Vue.set(that.$data, 'data', res.data)
				})
			},
			simpan(){
				const formData = new FormData()
				formData.append('kode', this.data.kode)
				formData.append('nama', this.data.nama)
				formData.append('harga', this.data.harga)
				formData.append('deskripsi', this.data.deskripsi)

				let fileList = $('input[type="file"]')[0].files
				console.log(fileList)
				if (!fileList.length){
					formData.append('gambar', '')
				}else{
					Array
						.from(Array(fileList.length).keys())
						.map(x => {
							formData.append('gambar', fileList[x], fileList[x].name);
						})
					
				}

				this.$http.put('/'+this.id, this.data)
				.then(res => {
					this.$swal({
						title: res.data.message,
						type: "success",
						timer: 5000,
					}).then(() => {
						this.$router.push({name: 'index'})
					})
				})
			},
		},
		beforeMount(){
			this.getData()
		}
	}
</script>