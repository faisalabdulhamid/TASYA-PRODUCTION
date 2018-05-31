<template>
	<div>
		<h5>
			Kriteria Distributor <i class="fa fa-angle-right"></i>
			<router-link :to="{ name: 'index'}">List Data Kriteria Distributor</router-link> <i class="fa fa-angle-right"></i>
			Edit Kriteria Distributor
		</h5>
		<div class="row">
		  	<div class="col-lg-12">
			  	<div class="form-panel">
	          	  	<h4 class="mb"><i class="fa fa-users"></i> Form Edit Kriteria Distributor</h4>
	              	<form class="form-horizontal" v-on:submit.prevent="simpan">
						<div class="form-group">
							<label for="kriteria" class="control-label col-md-2">Kriteria</label>
							<div class="col-md-10">
								<input type="text" class="form-control" id="kriteria" v-model="data.kriteria">
							</div>
						</div>
						<div class="form-group">
							<label for="bobot" class="control-label col-md-2">Bobot</label>
							<div class="col-md-10">
								<input type="text" class="form-control" id="bobot" v-model="data.bobot">
							</div>
						</div>
						<div class="form-group">
							<label for="benefit" class="control-label col-md-2">benefit</label>
							<div class="col-md-10">
								<select class="form-control" id="benefit" v-model="data.benefit">
									<option value="1">Plus</option>
									<option value="0">Minus</option>
								</select>
							</div>
						</div>
						<div class="form-group" v-for="(item, idx) in jawaban">
							<label for="benefit" class="control-label col-md-2">Jawaban {{idx + 1 }}</label>
							<div class="col-md-10">
								<div class="input-group">
									<input type="text" 
										class="form-control" 
										v-model="item.jawaban" 
										>
									<span class="input-group-btn">
										<button class="btn btn-default" @click="add" type="button">Tambah Jawaban</button>
										<button class="btn btn-default" @click="remove(idx)" type="button">Hapus Jawaban</button>
									</span>
								</div>
								<span class="text-help">Nilai Jawaban Sesuai Urutan</span>
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
				jawaban: [],
				data: {
					kriteria: '',
					bobot: '',
					benefit: '',
				}
			}
		},
		methods:{
			add() {
				this.jawaban.push({'jawaban': ''})
			},
			remove (idx) {
				if (this.jawaban.length > 1) {
					this.jawaban.splice(idx, 1)
				}
			},
			getData(){
				this.$http.get('/'+this.id)
				.then(res => {
					Vue.set(this.$data, 'data', res.data)
					Vue.set(this.$data, 'jawaban', JSON.parse(res.data.jawaban))
				})
			},
			simpan(){
				this.$http.put('/'+this.id, Object.assign(this.data, {jawaban: this.jawaban}, {jawaban_1: JSON.stringify(this.jawaban)}))
				.then(res => {
					this.$swal({
						title: res.data.message,
						type: "success",
						timer: 5000,
					}).then(() => {
						this.$router.push({name: 'index'})
					})
				})
			}
		},
		beforeMount(){
			this.getData()
		}
	}
</script>