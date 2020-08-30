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

import VueRouter from 'vue-router';
Vue.use(VueRouter);

import routes from './routes';

import store from './store';

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
Vue.component('another-vuex', require('./components/AnotherVuex.vue').default);
Vue.component('countdown', require('./components/Countdown.vue').default);
Vue.component('Join', require('./components/Join.vue').default);

Vue.component('TabList', require('./components/tabs/TabList.vue').default);
Vue.component('TabComponent', require('./components/tabs/TabComponent.vue').default);

Vue.component('Testimonials', require('./components/Testimonials.vue').default);
Vue.component('Carousel', require('./components/Carousel.vue').default);

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
    
    Vue.component('EventDispatch', require('./components/EventDispatch.vue').default);
    Vue.component('MyForm', require('./components/MyForm.vue').default);
    Vue.component('PaymentForm', require('./components/PaymentForm.vue').default);
    Vue.component('menu-list', require('./components/MenuList.vue').default);
    Vue.component('laracast-question', require('./components/LaracastQuestion.vue').default);
    
    /* window.Event = new Vue(); */
    
    window.Event = new class {
        constructor(){
            this.vue = new Vue();
        }

        fire(event, data = null){
            this.vue.$emit(event, data);
        }

        listen(event, callback){
            this.vue.$on(event, callback);
        }
    };

    import moment from 'moment';
    window.moment = moment;

    /**
     * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    store: new Vuex.Store(store),
    router: new VueRouter(routes)
});
