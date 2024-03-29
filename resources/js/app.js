/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
import Vue from 'vue';
import VueRouter from 'vue-router';
import store from './store';

import Gate from './Gate';

Vue.prototype.$gate = new Gate(window.user);





Vue.use(VueRouter);

//sweet alert 2
import Swal from 'sweetalert2';
window.Swal = Swal;

//vue progressbar

import VueProgressBar from 'vue-progressbar';
const options = {
    color: '#228B22',
    failedColor: '#874b4b',
    thickness: '3px',
    transition: {
        speed: '0.2s',
        opacity: '0.6s',
        termination: 300
    },
    autoRevert: true,
    location: 'top',
    inverse: false
};

Vue.use(VueProgressBar, options);


let routes = [{
        path: '/state',
        component: require('./components/state.vue').default
    },
    {
        path: '/district',
        component: require('./components/district.vue').default
    },
    {
        path: '/municipality',
        component: require('./components/municipality.vue').default
    },
    {
        path: '/ward',
        component: require('./components/ward.vue').default
    },
    {
        path: '/propertytype',
        component: require('./components/propertytype.vue').default
    },
    {
        path: '/userprofile',
        component: require('./components/userprofile.vue').default
    },
    {
        path: '/usertype',
        component: require('./components/usertype.vue').default,
        name: 'usertype'
    },
    {
        path: '/usermanagement',
        component: require('./components/usermanagement.vue').default
    },
    {
        path: '/paddress',
        component: require('./components/paddress.vue').default
    },
    {
        path: '/post',
        component: require('./components/post.vue').default
    },
    {
        path: '/adminpost',
        component: require('./components/adminpost.vue').default
    },
    {
        path: '/',
        component: require('./components/index.vue').default
    },
    {
        path: '/registerform',
        component: require('./components/register.vue').default
    },
    {
        path: '/allproperty',
        component: require('./components/allproperty.vue').default,
        name: 'allproperty'
    },
    {
        path: '/about',
        component: require('./components/about.vue').default
    },
    {
        path: '/contact',
        component: require('./components/contact.vue').default
    },
    {
        path: '/newpost',
        component: require('./components/newpost.vue').default
    },
    {
        path: '/yourpost',
        component: require('./components/yourpost.vue').default,
        name: 'yourpost'
    },
    {
        path: '/singlepost',
        component: require('./components/singlepost.vue').default,
        name: 'singlepost',
        props: true
    },
    {
        path: '/editpost',
        component: require('./components/editpost.vue').default,
        name: '',
        props: true
    },
    {
        path: '/search',
        component: require('./components/search.vue').default,
        name: 'search',
        props: true
    },




];

//Vue Router Register
const router = new VueRouter({
    mode: 'history',
    routes: routes,
});


//v form
import {
    Form,
    HasError,
    AlertError
} from 'vform';
window.Form = Form;
Vue.component(HasError.name, HasError);
Vue.component(AlertError.name, AlertError);






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
Vue.component('slider.vue', require('./components/ExampleComponent.vue').default);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    store,
    el: '#app',
    router,



});
