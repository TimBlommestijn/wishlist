"use strict";

var _axios = _interopRequireDefault(require("axios"));

var _vuetify = _interopRequireDefault(require("../plugins/vuetify"));

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { "default": obj }; }

/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */
// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))
Vue.prototype.axios = _axios["default"];
Vue.component('example-component', require('./components/ExampleComponent.vue')["default"]);
Vue.component('navbar-component', require('./components/NavBarComponent.vue')["default"]);
Vue.component('welcome-message', require('./components/WelcomeComponent.vue')["default"]);
Vue.component('message-component', require('./components/MessageComponent.vue')["default"]);
Vue.component('signup-form', require('./components/SignupComponent.vue')["default"]);
Vue.component('login-form', require('./components/LoginComponent.vue')["default"]);
Vue.component('wishes-component', require('./components/WishesComponent.vue')["default"]);
Vue.component('wishes-create', require('./components/CreateWishComponent.vue')["default"]);
Vue.component('wish', require('./components/WishComponent.vue')["default"]);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

var app = new Vue({
  vuetify: _vuetify["default"],
  el: '#app'
});