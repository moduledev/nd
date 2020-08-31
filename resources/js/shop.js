/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
window.Vue = require('vue');

Vue.component('tabs', require('./components/shop/TabsComponent').default);
Vue.component('auth-tabs',require('./components/shop/auth/Auth-tabs').default);
Vue.component('register-enter',require('./components/shop/auth/Register-enter').default);

const app = new Vue({
    el: '#app',
});
