require('./../bootstrap');
import {base_url} from './../config/env.config'

window.Vue = require('vue');

import App from './component/App.vue'

import VueRouter from 'vue-router'
Vue.use(VueRouter)
import router from './router.js'

//Plugin sweetalert2
const swal = require('sweetalert2')
const swalPlugin = {}
swalPlugin.install = function(Vue){
	Vue.prototype.$swal = swal
}
Vue.use(swalPlugin)

var _http = axios.create({
  	baseURL: base_url+'/pegawai',
    headers: {
      Authorization: 'Bearer '+localStorage.getItem('token')
    }
});
_http.interceptors.response.use((response) => {
    return response;
}, function (error) {
    // Do something with response error
    if (error.response.status === 401 || error.response.status === 500) {
    	swal(error.response.statusText, error.response.data.message, "error")
    }
    if (error.response.status === 422) {
        var contentHtml = '';
        Object.keys(error.response.data.errors).forEach((key) => {
          contentHtml +=  '<p class="text-danger">'+error.response.data.errors[key][0]+'</p>'
        })
        
        swal({
          title: '',
          html: contentHtml,
          type: 'error',
          timer: 5000,
        })	
    }
    return Promise.reject(error.response);
})
Vue.prototype.$http = _http
Vue.config.productionTip = false

const app = new Vue({
    el: '#root',
    template: '<app></app>',
    components: { App },
    router
});
