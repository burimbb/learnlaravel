/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import PortalVue from 'portal-vue'

Vue.use(PortalVue);

import VModal from 'vue-js-modal';

Vue.use(VModal, { dialog: true });

import Vuex from 'vuex';
Vue.use(Vuex);

var store = new Vuex.Store({
    state: {
        count: 100,
    },

    mutations: {
        increment(state){
            state.count++;
        },
        decrement(state){
            state.count--;
        },
    }
});

/* import Turbolinks from 'turbolinks';
Turbolinks.start(); */

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('series-component', require('./components/SeriesComponent.vue').default);
Vue.component('support-button', require('./components/SupportButton.vue').default);

Vue.component('multiple-files', require('./components/MultipleFiles.vue').default);

Vue.component('learn-vuex-1', require('./components/LearnVuex1.vue').default);
Vue.component('learn-vuex-2', require('./components/LearnVuex2.vue').default);

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

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    store: store
});
