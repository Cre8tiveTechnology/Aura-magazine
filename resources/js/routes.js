//Route paths for  User  App
import Home from './pages/Home.vue'
import News from './pages/News.vue'
import Magazine from './pages/Magazine.vue'
import Post from './pages/Post.vue'
import Shop from './pages/Shop.vue'
import Login from './pages/auth/Login.vue'
import Register from './pages/auth/Register.vue'

//Route paths for  Admin  App
import Dashboard from './pages/admin/Dashboard.vue'

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
            guestOnly: true,
            showProgressBar: true
        }
    },
    {
        name: 'register',
        path: '/register',
        component: Register,
        meta: {
            guestOnly: true,
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
        meta: {
            showProgressBar: true
        }
    },

    {
        name: 'beauty',
        path: '/category/beauty',
        component: News,
        meta: {
            showProgressBar: true
        }
    },

    {
        name: 'fashion',
        path: '/category/fashion',
        component: News,
        meta: {
            showProgressBar: true
        }
    },

    {
        name: 'lifestyle',
        path: '/category/lifestyle',
        component: News,
        meta: {
            showProgressBar: true
        }
    },

    {
        name: 'arts-and-culture',
        path: '/category/arts-and-culture',
        component: News,
        meta: {
            showProgressBar: true
        }
    },

    {
        name: 'psot',
        path: '/post',
        component: Post,
        meta: {
            showProgressBar: true
        }
    },

    {
        name: 'magazine',
        path: '/magazine',
        component: Magazine,
        meta: {
            showProgressBar: true
        }
    },

    //Admin

    {
        name: 'dashboard',
        path: '/dashboard',
        component: Dashboard,
        meta: {
            showProgressBar: true,
            authOnly: true
        }
    },
]
