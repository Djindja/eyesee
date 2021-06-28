require('./bootstrap');

import Vue from 'vue'
import VueRouter from 'vue-router'
import { BootstrapVue } from 'bootstrap-vue'

Vue.use(VueRouter)
Vue.use(BootstrapVue)

import resultList from './views/index.vue'
import createResult from './views/create.vue'

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/game',
            name: 'resultList',
            component: resultList
        },
        {
            path: '/dashboard/create',
            name: 'createResult',
            component: createResult
        },
    ],

})

const app = new Vue({
    el: '#app',
    router
});