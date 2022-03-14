require('./bootstrap');

import 'vue2-dropzone/dist/vue2Dropzone.min.css';
import Vue from 'vue';
window.Vue = require('vue');

// import dependecies tambahan
import VueRouter from 'vue-router';
import VueAxios from 'vue-axios';
import Axios from 'axios';
import titleMixin from './mixins/titleMixins.js';
import '@mdi/font/css/materialdesignicons.css';
import VueSweetalert2 from 'vue-sweetalert2';
import vuetify from './plugins/vuetify.js';
import 'feather-icons';
import moment from 'moment';
import VueProgressBar from 'vue-progressbar';
import loading from 'vuejs-loading-screen'
import store from './store'

import 'vue2-dropzone/dist/vue2Dropzone.min.css';
require('moment/locale/en-au');
moment.locale('en-au');
Vue.mixin(titleMixin);
Vue.use(VueRouter, VueAxios, Axios, VueSweetalert2);

import App from './components/App.vue';
import Index from './components/index.vue';
const routes = [{
    name: 'home',
    path: '/',
    component: Index,
}];

Vue.filter('toDecimal', num => {
    const number = (num / 1).toFixed(0).replace('.', '.');
    return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.');
});
const router = new VueRouter({
    mode: 'history',
    routes: routes,
    scrollBehavior(to, from, savedPosition) {
        return {
            x: 0,
            y: 0
        }
    },
    linkActiveClass: 'active'
});
new Vue(Vue.util.extend({
    router,
    vuetify,
    store,
    render: function (h) {
        return h(App)
    }
})).$mount("#app");
