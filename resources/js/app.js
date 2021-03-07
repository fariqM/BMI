import axios from "axios";
window.axios = axios;

window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";

window.Vue = require("vue").default;
import Vue from "vue";
import VueRouter from "vue-router";
import routes from "./router";

// Bootsrap Vue Register
import {
    TablePlugin,
    IconsPlugin,
    ButtonPlugin,
    ModalPlugin,
    PaginationPlugin,
    FormSelectPlugin,
    FormGroupPlugin,
    FormCheckboxPlugin
} from "bootstrap-vue";
// import 'bootstrap/dist/css/bootstrap.css'
// import 'bootstrap-vue/dist/bootstrap-vue.css'

// IziToast
import VueIziToast from "vue-izitoast";
import "izitoast/dist/css/iziToast.css";
import VueSweetalert2 from "vue-sweetalert2";
import MaskedInput from "vue-text-mask";
import VueApexCharts from "vue-apexcharts";
import vSelect from "vue-select";

import "sweetalert2/dist/sweetalert2.min.css";
import "vue-select/dist/vue-select.css";

// Vue.use(BootstrapVue)
Vue.use(FormCheckboxPlugin);
Vue.use(FormSelectPlugin);
Vue.use(FormGroupPlugin);
Vue.use(PaginationPlugin);
Vue.use(ModalPlugin);
Vue.use(TablePlugin);
Vue.use(IconsPlugin);
Vue.use(ButtonPlugin);
Vue.use(VueIziToast);
Vue.use(VueRouter);
Vue.use(VueSweetalert2);
Vue.use(VueApexCharts);

Vue.component("v-select", vSelect);
Vue.component("masked-input", MaskedInput);
Vue.component("apexchart", VueApexCharts);

Vue.component("navigation", require("./components/Navigation.vue").default);
Vue.component("navbar", require("./components/Navbar.vue").default);
Vue.component("bawahan", require("./components/Bawahan.vue").default);

const app = new Vue({
    el: "#app",
    mode: "history",
    router: new VueRouter(routes)
});
