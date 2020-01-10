/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

// Bvue
import BootstrapVue from 'bootstrap-vue'
Vue.use(BootstrapVue)

import Vuelidate from 'vuelidate'
Vue.use(Vuelidate)

import VueRouter from 'vue-router'
Vue.use(VueRouter)

const routes = [
    { path: '/home', component: require('./components/ExampleComponent.vue').default },
    { path: '/dashboard-component', component: require('./components/DashComponent.vue').default },
    { path: '/profile-component', component: require('./components/ProfileComponent.vue').default },

    // Student
    { path: '/student-list', component: require('./components/student/StudentList.vue').default },

    // Faculty
    { path: '/new-faculty', component: require('./components/faculty/NewFaculty.vue').default },
    { path: '/faculty-list', component: require('./components/faculty/FacultyList.vue').default },
    { path: '/faculty-profile/:id', name: 'faculty-profile', component: require('./components/faculty/FacultyProfile.vue').default },

    // Student
    { path: '/new-student', component: require('./components/student/NewStudent.vue').default },
    { path: '/student-list', component: require('./components/student/StudentList.vue').default },
    { path: '/student-profile/:id', name: 'student-profile', component: require('./components/student/StudentProfile.vue').default },

    // Fee
    { path: '/fee-defaulters', component: require('./components/fee/FeeDefaulters.vue').default },
    { path: '/fee-submit', component: require('./components/fee/FeeSubmit.vue').default },

]

const router = new VueRouter({
    mode: 'history',
    routes // short for `routes: routes`
})
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
Vue.component('contactus-component', require('./components/ui/pre/ContactusComponent.vue').default);
Vue.component('overlay-component', require('./components/ui/common/OverlayComponent.vue').default);
Vue.component('user-count', require('./components/ui/post/UserCount.vue').default);

// Student


const app = new Vue({
    el: '#app',
    router
});
