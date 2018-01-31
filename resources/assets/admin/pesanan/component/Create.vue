<template>
	<div>
		<h5>
			Pesanan <i class="fa fa-angle-right"></i>
			<router-link :to="{ name: 'index'}">List Data Pesanan</router-link> <i class="fa fa-angle-right"></i>
			Tambah Pesanan
		</h5>
		<div class="row">
		  	<div class="col-lg-12">
			  	<div class="form-panel">
	          	  	<h4 class="mb"><i class="fa fa-users"></i> Form Tambah Pesanan</h4>
	              	<form class="form-horizontal" v-on:submit.prevent="simpan">
						<div class="form-group">
							<label for="pelanggan" class="control-label col-md-2">Pelanggan</label>
							<div class="col-md-10">
								<select class="form-control" id="pelanggan" v-model="data.pelanggan">
									<option v-for="item in pelanggan" :value="item.id">{{ item.nama }}</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="total_bayar" class="control-label col-md-2">Total Bayar</label>
							<div class="col-md-10">
								<input type="text" class="form-control" id="total_bayar" v-model="data.total_bayar">
							</div>
						</div>

						<div class="form-group">
							<table class="table table-bordered">
								<thead>
									<tr>
										<th>Produk</th>
										<th>Qty</th>
										<th>Harga</th>
										<th>Sub Total</th>
										<th width="150px">Aksi</th>
									</tr>
								</thead>
								<tbody>
									<tr v-for="(item, idx) in data.produks">
										<td>
											<select v-model="data.produks[idx].produk_id" class="form-control" v-on:change="updateProduk($event, idx)">
												<option v-for="item in produk" :value="item.id">{{ item.nama }}</option>
											</select>
										</td>
										<td>
											<input v-on:input="updateQty($event, idx)" v-model="item.jumlah" type="text" class="form-control">
										</td>
										<td>
											{{ form[idx].harga }}
										</td>
										<td>
											<input type="text" class="form-control" v-model="item.sub_total" readonly="">
										</td>
										<td>
											<a v-on:click="removeItem(idx)" class="btn btn-danger btn-xs">hapus</a>
											<a v-on:click="addItem" class="btn btn-info btn-xs">tambah</a>
										</td>
									</tr>
								</tbody>
								<tfoot>
									<tr>
										<th colspan="3" class="text-right">Total </th>
										<th>{{ data.total_bayar }}</th>
									</tr>
								</tfoot>
							</table>
						</div>
						<button class="btn btn-default">Simpan</button>
              		</form>
            	</div>
		  	</div>
		</div>
	</div>
</template>

<script>
	import {base_url} from './../../config/env.config'

	export default{
		name: 'Create',
		data(){
			return {
				data: {
					produks: [
						{produk_id: '', jumlah: 1}
					]
				},
				pelanggan: [],
				produk: [],
				form: [{id: '', harga: 0}]
			}
		},
		methods:{
			getPelanggan(){
				let that = this
				that.$http.get(base_url+'/select/pelanggan')
				.then(res => {
					Vue.set(that.$data, 'pelanggan', res.data)
				})
			},
			getProduk(){
				let that = this
				that.$http.get(base_url+'/select/produk')
				.then(res => {
					Vue.set(that.$data, 'produk', res.data)
				})
			},
			addItem(){
				this.data.produks.push({
					'produk_id': '',
					'jumlah': 1
				})
				this.form.push({id: '', harga: 0})
			},
			removeItem(idx){
				if (this.data.produks.length > 1) {
					this.data.produks.splice(idx, 1)
					this.form.splice(idx, 1)
				}
			},
			updateProduk(event, idx){
				let _find = this.produk.find(o => o.id == event.target.value)
				this.form[idx].id = _find.id
				this.form[idx].harga = _find.harga
				this.data.produks[idx].sub_total = _find.harga * this.data.produks[idx].jumlah
				this._total()
			},
			updateQty(event, idx){
				this.data.produks[idx].sub_total = event.target.value * this.form[idx].harga
				this._total()
			},
			sub_total(){
				this.form[idx].sub_total = this.data.produk[idx].jumlah * this.form[idx].harga
				return this.data.produk[idx].jumlah * this.form[idx].harga
			},
			_total(){
				let tot = 0
				this.data.produks.forEach((val, key) => {
					tot += val.sub_total
				})
				this.data.total_bayar = tot
			},
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
			}
		},
		beforeMount(){
			this.getPelanggan()
			this.getProduk()
		}
	}
</script>