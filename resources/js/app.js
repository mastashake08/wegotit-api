
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
import {store} from './store'
window.Vue = require('vue');
import Vuetify from 'vuetify'
Vue.use(Vuetify)
// index.js or main.js
import 'vuetify/dist/vuetify.min.css' // Ensure you are using css-loader
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('venues', require('./components/VenuesComponent.vue').default);
Vue.component('venue', require('./components/VenueComponent.vue').default);
Vue.component('orders', require('./components/OrderComponent.vue').default);
Vue.component('queued-orders', require('./components/QueuedOrderComponent.vue').default);
Vue.component('home',require('./components/HomeComponent.vue').default);
Vue.component('settings',require('./components/SettingsComponent.vue').default);

Vue.component('business-settings',require('./components/BusinessSettings.vue').default);
Vue.component('fee',require('./components/FeeComponent.vue').default);
Vue.component(
    'passport-clients',
    require('./components/passport/Clients.vue').default
);

Vue.component(
    'passport-authorized-clients',
    require('./components/passport/AuthorizedClients.vue').default
);

Vue.component(
    'passport-personal-access-tokens',
    require('./components/passport/PersonalAccessTokens.vue').default
);
Vue.component('notify', require('./components/Notify.vue').default);
Vue.component('locations', require('./components/LocationsComponent.vue').default);
Vue.component('notifications', require('./components/Notifications.vue').default);
Vue.component('items', require('./components/ItemComponent.vue').default);
Vue.component('add-item', require('./components/AddItem.vue').default);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    store: store
});
