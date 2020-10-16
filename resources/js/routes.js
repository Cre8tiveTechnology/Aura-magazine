//Route files for  Vue App
import Home from './pages/Home.vue'
import News from './pages/News.vue'
import Magazine from './pages/Magazine.vue'
import Post from './pages/Post.vue'
import Shop from './pages/Shop.vue'
import Login from './pages/auth/Login.vue'
import Signup from './pages/auth/Register.vue'

export const routes = [
    {
        name: 'home',
        path: '/',
        component: Home,
        meta: {
            showProgressBar: true
        }
    },

    {
        name: 'login',
        path: '/login',
        component: Login,
        meta: {
            showProgressBar: true
        }
    },
    {
        name: 'signup',
        path: '/signup',
        component: Signup,
        meta: {
            showProgressBar: true
        }
    },

    {
        name: 'shop',
        path: '/shop',
        component: Shop,
        meta: {
            showProgressBar: true
        }
    },

    {
        name: 'news',
        path: '/category/news',
        component: News,
    },

    {
        name: 'beauty',
        path: '/category/beauty',
        component: News,
    },

    {
        name: 'fashion',
        path: '/category/fashion',
        component: News,
    },

    {
        name: 'lifestyle',
        path: '/category/lifestyle',
        component: News,
    },

    {
        name: 'arts-and-culture',
        path: '/category/arts-and-culture',
        component: News,
    },

    {
        name: 'psot',
        path: '/post',
        component: Post,
    },

    {
        name: 'magazine',
        path: '/magazine',
        component: Magazine,
    },
]
