<template>
    <div>
    	<header-client/>

		<section class="container">
		  	<section class="wrapper site-min-height">
			  	<div class="row mt">
			  		<div class="col-lg-12">
			        	<router-view :key="$route.fullPath"/>
			  		</div>
			  	</div>
		    </section>
		</section>

		<footer-client/>
	</div>
</template>

<script>
	export default{
		name: 'Client',
		components: {
			'header-client': function(resolve){
				require(['./header.vue'], resolve)
			},
			'footer-client': function(resolve){
				require(['./footer.vue'], resolve)
			}
		}
	}
</script>