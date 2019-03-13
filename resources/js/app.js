
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import Vue from 'vue'
import * as VueGoogleMaps from 'vue2-google-maps';

window.Bus=new Vue;

Vue.use(VueGoogleMaps, {
    load: {
        key: 'AIzaSyBEsAP2zef-eYnt29IRb4S4JDWHNIRRMgc',
        libraries: 'places', //// If you need to use place input
    }
});
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('welcome', require('./components/Welcome.vue').default);
Vue.component('shop-map', require('./components/ShopMap.vue'));
Vue.component('shop-layout', require('./components/ShopLayout.vue'));


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app'
});
