
require('./../bootstrap');

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
    		localStorage.setItem('login', JSON.stringify(this.data))
    	}
    }
});
