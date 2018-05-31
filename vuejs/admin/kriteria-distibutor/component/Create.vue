<template>
	<div>
		<h5>
			Kriteria Distributor <i class="fa fa-angle-right"></i>
			<router-link :to="{ name: 'index'}">List Data Kriteria Distributor</router-link> <i class="fa fa-angle-right"></i>
			Tambah Kriteria Distributor
		</h5>
		<div class="row">
		  	<div class="col-lg-12">
			  	<div class="form-panel">
	          	  	<h4 class="mb"><i class="fa fa-users"></i> Form Tambah Kriteria Distributor</h4>
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
						<div class="form-group" v-for="(item, idx) in data.jawaban">
							<label for="benefit" class="control-label col-md-2">Jawaban {{idx + 1 }}</label>
							<div class="col-md-10">
								<div class="input-group">
									<input type="text" class="form-control" v-model="item.jawaban">
									<span class="input-group-btn">
										<button class="btn btn-default" @click="add" type="button">Tambah Jawaban</button>
										<button class="btn btn-default" @click="remove(idx)" type="button">Hapus Jawaban</button>
									</span>
								</div><!-- /input-group -->
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
		name: 'Create',
		data(){
			return {
				data: {
					kriteria: '',
					bobot: '',
					benefit: '',
					jawaban: [
						{jawaban: ''}
					]
				}
			}
		},
		methods:{
			add() {
				this.data.jawaban.push({'jawaban': ''})
			},
			remove (idx) {
				if (this.data.jawaban.length > 1) {
					this.data.jawaban.splice(idx, 1)
				}
			},
			simpan(){
				this.$http.post('', Object.assign(this.data, {jawaban_1: JSON.stringify(this.data.jawaban)})).then(res => {
					this.$swal({
						text: res.data.message,
						type: "success",
						timer: 5000
					}).then(() => {
						this.$router.push({name: 'index'})
					})
				})				
			}
		}
	}
</script>