import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';


window.Vue = require('vue').default;
import Vue from 'vue';
import VueRouter from 'vue-router';
import routes from './router';

// Bootsrap Vue Register
import { TablePlugin, IconsPlugin, ButtonPlugin  } from 'bootstrap-vue'
// import 'bootstrap/dist/css/bootstrap.css'
// import 'bootstrap-vue/dist/bootstrap-vue.css'

// IziToast
import VueIziToast from 'vue-izitoast';
import 'izitoast/dist/css/iziToast.css';
import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';
import MaskedInput from 'vue-text-mask'

Vue.use(TablePlugin)
Vue.use(IconsPlugin)
Vue.use(ButtonPlugin)
Vue.use(VueIziToast);
Vue.use(VueRouter);
Vue.use(VueSweetalert2);


Vue.component('masked-input', MaskedInput);

Vue.component('navigation', require('./components/Navigation.vue').default);
Vue.component('navbar', require('./components/Navbar.vue').default);
Vue.component('bawahan', require('./components/Bawahan.vue').default);

const app = new Vue({
    el: '#app',
    mode: 'history',
    router: new VueRouter(routes),
});