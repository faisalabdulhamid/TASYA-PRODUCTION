import VueRouter from 'vue-router';

export default new VueRouter({
    routes: [
        {path: '/', component: require('./components/branda.vue'), name: 'index'},
        {path: '/kategori/:param', component: function(resolve) {
        	require(['./components/kategori.vue'], resolve)
        }, name: 'kategori', props: true},
        {
        	path: '/produk/:param', 
        	component: require('./components/product-detail.vue'), 
        	name: 'product-detail', 
        	props: true
        },
        {
            path: '/kontak',
            name:'Kontak',
            component: require('./components/kontak.vue')
        },
        {
            path: '/tentang',
            name:'Kontak',
            component: require('./components/tentang.vue')
        }
    ]
});