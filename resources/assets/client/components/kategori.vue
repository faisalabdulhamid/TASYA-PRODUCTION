<template>
	<div class="row">
		<product-item 
			v-for="(item, index) in table.data"
			v-bind:key="index"
			v-bind:product="item"
			/>
	</div>
</template>

<script>
	import {base_url} from './../config/env.config'
	export default{
		name: 'Kategori',
		components:{
			'product-item': function(resolve){
				require(['./product-item'], resolve)
			}
		},
		data(){
			return {
				table: {
					data: []
				}
			}
		},
		beforeMount(){
			let params= (_.isEmpty(this.$route.params))? '': '/kategori/'+this.$route.params.param
			let self = this
			axios.get(`${base_url}`+params)
				.then(res => {
					Vue.set(self.$data, 'table', res.data)
				})
				.catch(e => {
					console.log(e)
				})
		}
	}
</script>