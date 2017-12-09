import VueRouter from 'vue-router';

export default new VueRouter({
    routes: [
        {path: '/', component: require('./component/Index.vue'), name: 'index'},
        {path: '/:id/lihat', component: require('./component/show.vue'), name: 'show', props: true},
        {path: '/create', component: require('./component/Create.vue'), name: 'create'},
        {path: '/:id/edit', component: require('./component/Edit.vue'), name: 'edit', props: true},
        // {path: '/destroy/:id', component: require('./component/destroy.vue'), name: 'destroy'}
    ]
});