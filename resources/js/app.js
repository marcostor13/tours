/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('./partials/forms');

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

Vue.component('forms-component', require('./components/FormsComponent.vue').default);
Vue.component('content-component', require('./components/ContentComponent.vue').default);
Vue.component('menu-component', require('./components/MenuComponent.vue').default);
Vue.component('list-component', require('./components/ListComponent.vue').default);
Vue.component('locations-component', require('./components/list/LocationsComponent.vue').default);
Vue.component('hotels-component', require('./components/list/HotelsComponent.vue').default);
Vue.component('contact-types-component', require('./components/list/ContactTypesComponent.vue').default);
Vue.component('banks-component', require('./components/list/BanksComponent.vue').default);
Vue.component('currencies-component', require('./components/list/CurrenciesComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
