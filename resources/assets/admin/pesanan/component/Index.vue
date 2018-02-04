<template>
	<div>
		<h5>
			Pesanan <i class="fa fa-angle-right"></i>
			List Data Pesanan
		</h5>
		<div class="row">
		  <div class="col-lg-12">

			<div class="content-panel">
				<router-link class="btn btn-success pull-right" :to="{ name: 'create'}">Tambah Pesanan</router-link>
				<h4><i class="fa fa-users"></i> Data Pesanan</h4>
				<hr>
				<table class="table">
					<thead>
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
					</thead>
				  <thead>
				  <tr>
				      <th>Pelanggan</th>
				      <th>Tanggal</th>
				      <th>Total Bayar</th>
				      <th width="150px">Aksi</th>
				  </tr>
				  </thead>
				  <tbody v-if="table.data.length > 0">
					  <tr v-for="item in table.data">
					      <td>{{item.nama_pelanggan}}</td>
					      <td>{{item.tanggal}}</td>
					      <td>{{item.total_bayar}}</td>
					      <td>
							<router-link class="btn btn-success btn-xs" :to="{ name: 'show', params: { id: item.id }}">lihat</router-link>
					      </td>
					  </tr>
				  </tbody>
				  <tbody v-if="table.data.length == 0">
				  	<tr>
				  		<td  colspan="4">
				  			<h1>data yg dicari tidak ada</h1>
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
		<date-picker v-model="date"></date-picker>
	</div>
</template>

<script>
	// import moment from 'moment'
	// import 'eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css'
	// import datePicker from 'vue-bootstrap-datetimepicker'

	export default{
		name: "IndexPesanan",
		components: {
			// datePicker
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
			}
		},
		beforeMount(){
			this.getData()
		},
		mounted (){
			// $('input#cari').daterangepicker({
			// 	opens: 'left',
			// 	singleDatePicker: true,
			// 	showDropdowns: true,
			// 	locale: {
			// 		format: 'YYYY'
			// 	},
			// 	// minDate: moment()
			// })
		}
	}
</script>

<style lang="scss" scoped>
	.pull-right{
		margin-right: 20px;
	}
</style>