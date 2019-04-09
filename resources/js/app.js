require('./bootstrap');

window.Vue = require('vue');

import VueRouter from 'vue-router';
import VueAxios from 'vue-axios';
import axios from 'axios';
import App from './App.vue';
import Router from './router/router.js';

Vue.use(VueRouter);
Vue.use(VueAxios, axios);

Vue.component('head-component', require('./components/Header').default);
Vue.component('footer-component', require('./components/Footer').default);

const router = new VueRouter({
    mode: 'history',
    routes: Router
})

const app = new Vue(Vue.util.extend({ router }, App)).$mount('#app');
