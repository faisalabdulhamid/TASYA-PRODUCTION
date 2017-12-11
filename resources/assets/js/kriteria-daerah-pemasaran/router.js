import VueRouter from 'vue-router';

export default new VueRouter({
    routes: [
        {path: '/', component: require('./component/Index.vue'), name: 'index'},
        {path: '/create', component: require('./component/Create.vue'), name: 'create'},
        {path: '/:id/edit', component: require('./component/Edit.vue'), name: 'edit', props: true},
    ]
});