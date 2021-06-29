require('./bootstrap');

import Vue from 'vue'
import VueRouter from 'vue-router'
import { BootstrapVue } from 'bootstrap-vue'

Vue.use(VueRouter)
Vue.use(BootstrapVue)

import play from './views/play.vue'
import list from './views/list.vue'

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/new-game/:id',
            name: 'play',
            component: play
        },
        {
            path: '/get',
            name: 'list',
            component: list
        },
    ],

})

const app = new Vue({
    el: '#app',
    router
});