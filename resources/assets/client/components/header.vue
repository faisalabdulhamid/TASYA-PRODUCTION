<template>
	<header class="header black-bg">
		<div class="sidebar-toggle-box">
			<div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
		</div>
        <!--logo start-->
        <router-link :to="{name:'index'}" class="logo"><b>{{ app_name }}</b></router-link>
        <!--logo end-->
        <div class="nav notify-row" id="top_menu">
            <!--  notification start -->
            <ul class="nav top-menu">
                <!-- settings start -->
                <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="/#">
                        Kategori
                    </a>
                    <ul class="dropdown-menu extended tasks-bar">
                        <div class="notify-arrow notify-arrow-green"></div>
                        <li>
                            <p class="green">Kategori {{ kategori.length }}</p>
                        </li>
                        <li class="external" v-for="(item, i) in kategori">
                            <router-link :to="{name:'kategori' , params: {param:item.url}}" replace>{{item.nama}}</router-link>
                        </li>
                    </ul>
                </li>
                <!-- settings end -->
            </ul>
            <!--  notification end -->
        </div>
    </header>
</template>

<script>
	import {app_name, base_url} from './../config/env.config'

	export default{
		name: 'Header',
		computed:{
			app_name(){
				return app_name
			}
		},
        data(){
            return {
                kategori: []
            }
        },
        created(){
            let self = this
            axios.get(`${base_url}/kategori`)
                .then(res => {
                    Vue.set(self.$data, 'kategori', res.data)
                })
        }
	}
</script>