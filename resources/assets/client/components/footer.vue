<template>
	<footer class="site-footer">
		<div class="text-center">
			2017 - {{ app_name }}
			<a href="#container" class="go-top">
				<i class="fa fa-angle-up"></i>
			</a>
		</div>
	</footer>
</template>

<script>
	import {app_name} from './../config/env.config'

	export default{
		name: 'Footer',
		computed:{
			app_name(){
				return app_name
			}
		}
	}
</script>