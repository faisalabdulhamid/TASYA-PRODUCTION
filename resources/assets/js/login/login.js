
require('./../bootstrap');
import {api_key, base_url} from './../config/env.config'

window.Vue = require('vue');
const app = new Vue({
    el: '#root',
    data(){
    	return {
    		'data' : {
    			email: '',
    			password: ''
    		}
    	}
    },
    methods:{
    	login(){
            axios.post(base_url+'oauth/token', {
                "client_id": 2,
                "client_secret": api_key,
                "grant_type": "password",
                "username": this.data.email,
                "password": this.data.password
            }).then(res => {
                localStorage.setItem('token', res.data.access_token)
            })
    	}
    }
});
