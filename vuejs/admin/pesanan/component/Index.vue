<template>
	<div>
		<h5>
			Pesanan <i class="fa fa-angle-right"></i>
			List Data Pesanan
		</h5>
		<div class="row">
		  <div class="col-lg-12">

			<div class="content-panel">
				<a @click="cari_detail = true" class="btn btn-info btn-sm pull-right"><i class="fa fa-search-plus"></i></a>
				<router-link class="btn btn-success pull-right" :to="{ name: 'create'}">Tambah Pesanan</router-link>
				<h4><i class="fa fa-users"></i> Data Pesanan</h4>
				<hr>
				<table class="table">
					<thead v-show="!cari_detail">
						<tr>
							<th colspan="4">
								<div class="form-group">
									<label for="" class="control-label col-md-2">Cari</label>
									<div class="col-md-10">
										<div class="input-group">
									      <input type="text" class="form-control" id="cari" placeholder="Cari ..." v-model="cari">
									      <!-- <date-range-picker :id="cari"/> -->
									      <span class="input-group-btn">
									        <button class="btn btn-info" type="button" v-on:click="search">Cari</button>
									      </span>
									    </div><!-- /input-group -->
									</div>
								</div>
							</th>
						</tr>
					</thead v-show="cari_detail">
					<thead>
						<tr v-show="cari_detail">
							<th colspan="4">
								<form class="form-horizontal" @submit.prevent="handleRata">
									<div class="form-group">
										<label for="" class="control-label col-md-2">
											Mulai Tanggal
										</label>
										<div class="col-md-10">
											<!-- <input type="text" v-model="cari_rata_rata.awal" class="form-control"> -->
											<date-picker :date="startTime"></date-picker>
										</div>
									</div>
									<div class="form-group">
										<label for="" class="control-label col-md-2">
											Akhir Tanggal
										</label>
										<div class="col-md-10">
											<!-- <input v-model="cari_rata_rata.akhir" type="text" class="form-control"> -->
											<date-picker :date="endTime"></date-picker>
										</div>
									</div>
									<div class="btn-group btn-group-sm pull-right">
										<button class="btn btn-sm btn-success">Submit</button>
										<a @click="cari_detail = false" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a>
									</div>
								</form>
							</th>
						</tr>
					</thead>

					<!-- Pelanggan Biasa -->
				  <thead v-show="!cari_detail">
				  <tr>
				      <th>Pelanggan</th>
				      <th>Tanggal</th>
				      <th>Total Bayar</th>
				      <th width="150px">Aksi</th>
				  </tr>
				  </thead>
				  <tbody  v-show="!cari_detail" v-if="table.data.length > 0">
					  <tr v-for="item in table.data">
					      <td>{{item.nama_pelanggan}}</td>
					      <td>{{item.tanggal}}</td>
					      <td>{{item.total_bayar}}</td>
					      <td>
							<router-link class="btn btn-success btn-xs" :to="{ name: 'show', params: { id: item.id }}">lihat</router-link>
					      </td>
					  </tr>
				  </tbody>
				  <tbody  v-show="!cari_detail" v-if="table.data.length == 0">
				  	<tr>
				  		<td  colspan="4">
				  			<h1>data yg dicari tidak ada</h1>
				  		</td>
				  	</tr>
				  </tbody>
				  <tfoot  v-show="!cari_detail">
				  	<tr>
				  		<td colspan="3"></td>
				  		<td>
				  			<a v-on:click="prev" :disabled="table.prev_page_url === null" class="btn btn-info btn-xs"><i class="fa fa-arrow-left"></i></a>
				  			<a v-on:click="next" :disabled="table.next_page_url === null" class="btn btn-info btn-xs"><i class="fa fa-arrow-right"></i></a>
				  		</td>
				  	</tr>
				  </tfoot>

				  <thead v-show="cari_detail">
				  	<tr>
				  		<th colspan="3">Nama Pelanggan</th>
				  		<th>Rata-Rata Pembelian</th>
				  	</tr>
				  </thead>
				  <tbody v-show="cari_detail">
				  	<tr v-for="item in jumlah_rata_rata">
				  		<td colspan="3">{{ item.nama }}</td>
				  		<td>{{ item.rata_rata }}</td>
				  	</tr>
				  </tbody>
				  <!-- Pelanggan Biasa -->
				</table>
			</div>
		  </div>
		</div>
	</div>
</template>

<script>
	// import moment from 'moment'
	// import 'eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css'
	// import datePicker from 'vue-bootstrap-datetimepicker'
	import myDatepicker from 'vue-datepicker'

	export default{
		name: "IndexPesanan",
		components: {
			'date-picker': myDatepicker
		},
		data(){
			return {
				table: {
					data: []
				},
				cari: '',
				date: new Date(),
		        config: {
		          format: 'DD/MM/YYYY',
		          useCurrent: false,
		        },
		        cari_detail: false,
		        jumlah_rata_rata: [],
		        cari_rata_rata: {
		        	awal: '',
		        	akhir: ''
		        },
		        startTime: {
					time: ''
				},
				endTime: {
					time: ''
				}
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
			search () {
				this.$http.get('', {
					params:{
						cari: this.cari
					}
				}).then(res => {
					Vue.set(this.$data, 'table', res.data)
				})
			},
			handleRata () {
				this.$http.get('/', {
					params: this.cari_rata_rata
				}).then(res => {
					Vue.set(this.$data, 'jumlah_rata_rata', res.data)
				})
			}
		},
		beforeMount(){
			this.getData()
		},
		watch: {
			'endTime.time': function () {
				this.cari_rata_rata.akhir = this.endTime.time
			},
			'startTime.time': function () {
				this.cari_rata_rata.awal = this.startTime.time
			},
		},
	}
</script>

<style lang="scss" scoped>
	.pull-right{
		margin-right: 20px;
	}
</style>