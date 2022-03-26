require('./bootstrap');

import Vue from 'vue';
import store from './store';
Vue.use({ store });

import VueRouter from "vue-router";

import router from './Router/index';
import App from "./App.vue";

Vue.use(VueRouter);

new Vue({
    el: '#app',
    store,
    router,
    components: { App },
});
