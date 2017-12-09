<template>
	<div>
		<h5>
			Pegawai <i class="fa fa-angle-right"></i>
			<router-link :to="{ name: 'index'}">List Data Pegawai</router-link> <i class="fa fa-angle-right"></i>
			Lihat Pegawai
		</h5>
		<div class="row">
		  	<div class="col-lg-12">
			  	<div class="form-panel">
	          	  	<h4 class="mb"><i class="fa fa-users"></i> Form Lihat Pegawai</h4>
	              	<table class="table table-bordered">
	              		<tbody>
	              			<tr>
	              				<th>Nama</th>
	              				<td>:</td>
	              				<td>{{ data.nama }}</td>
	              			</tr>
	              			<tr>
	              				<th>Email</th>
	              				<td>:</td>
	              				<td>{{ data.email }}</td>
	              			</tr>
	              			<tr>
	              				<th>Status</th>
	              				<td>:</td>
	              				<td>{{ data.status }}</td>
	              			</tr>
	              		</tbody>
	              	</table>
            	</div>
		  	</div>
		</div>
	</div>
</template>

<script>
	import { mapActions, mapGetters} from 'vuex'

	export default{
		name: 'Show',
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
			}),
			getData(){
				let that = this
				that.$http.get('/'+that.id, {
					headers: {
						Authorization: that.token.token_type+' '+that.token.access_token
					}
				})
					.then(res => {
						Vue.set(that.$data, 'data', res.data)
					})
					.catch(error => {
						console.log(error)
					})
			}
		},
		beforeMount(){
			this.Oauth()
			this.getData()
		}
	}
</script>