<template>
	<div class="row">
		<div class="col-md-12">
			<div class="panel">
				<div class="panel-heading">
					<h3 class="heading-title">About</h3>
				</div>
				<div class="panel-body">
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.5022836264884!2d107.63643841427732!3d-6.949922794978861!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e84231d56841%3A0x437c3d788c1d4a9c!2sJl.+Sekelimus+Utara%2C+Batununggal%2C+Bandung+Kidul%2C+Kota+Bandung%2C+Jawa+Barat+40266!5e0!3m2!1sid!2sid!4v1517417220853" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
				</div>
			</div>
		</div>
	</div>
</template>

<script>

	export default {
		name: 'About',
		data(){
			return {
				data: {}
			}
		},
	}
</script>

<style lang="scss">
	.panel{
		border: 1px solid #000;
	}
	.panel-heading{
		border-bottom: 1px solid #000;
	}
	.site-min-height{
		min-height: 100vh;
	}
</style>