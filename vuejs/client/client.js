require('./../admin/bootstrap');
window.Vue = require('vue');
import router from './router'
import VueRouter from 'vue-router'
Vue.use(VueRouter)

const app = new Vue({
    el: '#root',    
    template: '<app></app>',
    components: { 'App': function(resolve){
    	require(['./components/client.vue'], resolve)
    } },
    router
});
