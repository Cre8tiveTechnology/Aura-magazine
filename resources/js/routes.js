//Route paths for  User  App
import Home from './pages/Home.vue'
import News from './pages/News.vue'
import Magazine from './pages/Magazine.vue'
import Post from './pages/Post.vue'
import Shop from './pages/Shop.vue'
import Login from './pages/auth/Login.vue'
import Register from './pages/auth/Register.vue'
import Four0Four from './pages/404.vue'

//Route paths for  Admin  App
import Article from './pages/admin/articles/Articles.vue'
import CreateArticle from './pages/admin/articles/CreateArticle.vue'
import Dashboard from './pages/admin/Dashboard.vue'

export const routes = [
    {
        name: 'home',
        path: '/',
        component: Home,
        meta: {
            showProgressBar: true,
        },
    },

    {
        name: 'login',
        path: '/login',
        component: Login,
        meta: {
            guestOnly: true,
            showProgressBar: true,
        },
    },
    {
        name: 'register',
        path: '/register',
        component: Register,
        meta: {
            guestOnly: true,
            showProgressBar: true,
        },
    },

    {
        name: 'shop',
        path: '/shop',
        component: Shop,
        meta: {
            showProgressBar: true,
        },
    },

    {
        name: 'news',
        path: '/category/news',
        component: News,
        meta: {
            showProgressBar: true,
        },
    },

    {
        name: 'beauty',
        path: '/category/beauty',
        component: News,
        meta: {
            showProgressBar: true,
        },
    },

    {
        name: 'fashion',
        path: '/category/fashion',
        component: News,
        meta: {
            showProgressBar: true,
        },
    },

    {
        name: 'lifestyle',
        path: '/category/lifestyle',
        component: News,
        meta: {
            showProgressBar: true,
        },
    },

    {
        name: 'arts-and-culture',
        path: '/category/arts-and-culture',
        component: News,
        meta: {
            showProgressBar: true,
        },
    },

    {
        name: 'post',
        path: '/post',
        component: Post,
        meta: {
            showProgressBar: true,
        },
    },

    {
        name: 'magazine',
        path: '/magazine',
        component: Magazine,
        meta: {
            showProgressBar: true,
        },
    },

    //Page 404

    {
        name: '404',
        path: '*',
        component: Four0Four,
        meta: {
            showProgressBar: true,
        },
    },

    /* -------------------------------------------------------------------------- */
    /*                                  Admin Routes                              */
    /* -------------------------------------------------------------------------- */

    {
        name: 'dashboard',
        path: '/dashboard',
        component: Dashboard,
        meta: {
            authOnly: true,
            showProgressBar: true,
        },
    },

    {
        name: 'article',
        path: '/article',
        component: Article,
        meta: {
            authOnly: true,
            showProgressBar: true,
        },
    },

    {
        name: 'createArticle',
        path: '/article/create',
        component: CreateArticle,
        meta: {
            authOnly: true,
            showProgressBar: true,
        },
    },
]
