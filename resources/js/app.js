/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;
import axios from 'axios'
import VueAxios from 'vue-axios'

//Vue packages
Vue.use(VueAxios, axios);

Vue.component('TodoInput', require('./components/input.vue').default);
Vue.component('TodoTable', require('./components/table.vue').default);
Vue.component('app', require('./components/app.vue').default);


const app = new Vue({
    el: '#app',
});
