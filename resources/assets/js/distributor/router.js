import VueRouter from 'vue-router';

export default new VueRouter({
    routes: [
        {path: '/', component: require('./component/Index.vue'), name: 'index'},
        {path: '/:id/lihat', component: require('./component/show.vue'), name: 'show', props: true},
    ]
});