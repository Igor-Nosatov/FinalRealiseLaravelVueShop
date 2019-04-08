require('./bootstrap');

window.Vue = require('vue');

import VueRouter from 'vue-router';
Vue.use(VueRouter);

import VueAxios from 'vue-axios';
import axios from 'axios';

import App from './App.vue';
Vue.use(VueAxios, axios);

import Router from './routes/routing.vue'

Vue.component('footer-component', require('./parts/FooterComponent').default);

const router = new VueRouter({
    mode: 'history',
    routes: Router
})
