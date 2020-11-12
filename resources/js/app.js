/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap')

window.Vue = require('vue')
import App from './App.vue'
import VueRouter from 'vue-router'
import VueAxios from 'vue-axios'
import axios from 'axios'
import {routes} from './routes'
import NProgress from 'nprogress'
import VueAnalytics from 'vue-analytics';
import ToggleSwitch from 'vuejs-toggle-switch'
import VueToast from 'vue-toast-notification'
import 'vue-toast-notification/dist/theme-sugar.css'
import vSelect from "vue-select";
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

import Navbar from './components/Navbar'
import AuthNav from './layout/navbars/navs/Auth'
import SideNav from './layout/navbars/Auth-Sidenav'
import Footer from './layout/Footer'
import Admin from './layout/Admin'
import validationError from './components/ValidationError'
import Modal from './components/Modal'
import CFooter from './components/footer'
import AuraLoader from './utils/AuraLoader'
import Loader from './utils/Loader'
import EmptyResource from './utils/EmptyResource'

import './helpers/filters'

Vue.component('navbar',Navbar)
Vue.component('auth-nav',AuthNav)
Vue.component('auth-sidenav',SideNav)
Vue.component('auth-footer',Footer)
Vue.component('user-footer',CFooter)
Vue.component('auth-admin',Admin)
Vue.component('validation-error',validationError)
Vue.component('aura-loader',AuraLoader)
Vue.component('loader',Loader)
Vue.component('empty-resource',EmptyResource)
Vue.component('pagination',require('laravel-vue-pagination'))
Vue.component("v-select",vSelect);
Vue.component("modal",Modal);
// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

NProgress.configure({easing: 'ease',speed: 500,showSpinner: true})

Vue.use(VueRouter)
Vue.use(NProgress)
Vue.use(VueAxios,axios)
Vue.use(ToggleSwitch)
Vue.use(VueToast)
Vue.use(VueAnalytics,{
    id: 'UA-143387872-1',
    router
});

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const router = new VueRouter({
    mode: 'history',
    routes: routes,
    meta: {
        showProgressBar: true,
    },
})



function isLoggedIn ()
{
    return localStorage.getItem('auth')
}

function isRoleGuard (role)
{
    return localStorage.getItem(role)
}

router.beforeResolve((to,from,next) =>
{
    if (to.name) {
        NProgress.start()

        if (to.matched.some((record) => record.meta.authOnly)) {
            // Auth
            if (!isLoggedIn()) {
                next({
                    path: '/login',
                })
            }
            // Super Admin
            else if (to.matched.some((record) => record.meta.superAdminOnly)) {
                if (!isRoleGuard('superadmin')) {
                    next({
                        path: '/unauthorized',
                    })
                } else {
                    next()
                }
            }
            // Editor
            else if (to.matched.some((record) => record.meta.editorOnly)) {
                if (!isRoleGuard('editorinchief')) {
                    next({
                        path: '/unauthorized',
                    })
                } else {
                    next()
                }
            }
            // Marketer
            else if (to.matched.some((record) => record.meta.marketerOnly)) {
                if (!isRoleGuard('marketermain')) {
                    next({
                        path: '/unauthorized',
                    })
                } else {
                    next()
                }
            }
            // Last
            else {
                next()
            }
        }
        //
        else if (to.matched.some((record) => record.meta.guestOnly)) {
            if (isLoggedIn()) {
                next({
                    path: '/dashboard',
                })
            } else {
                next()
            }
        } else {
            next()
        }
    }
})

router.afterEach((to,from) =>
{
    if (to.name) {
        // Complete the animation of the route progress bar.
        NProgress.done()
    }
})

const app = new Vue({
    el: '#app',
    router: router,
    render: (h) => h(App),
})
