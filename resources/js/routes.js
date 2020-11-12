/* -------------------------------------------------------------------------- */
/*                        //Route paths for  User  App                        */
/* -------------------------------------------------------------------------- */
import Home from './pages/Home.vue'
import News from './pages/News.vue'
import Beauty from './pages/Beauty.vue'
import Fashion from './pages/Fashion.vue'
import Culture from './pages/Culture.vue'
import AskRuby from './pages/AskRuby.vue'
import AuthorArticles from './pages/AuthorArticles.vue'
import SexAndRelationship from './pages/SexAndRelationship.vue'
import Magazine from './pages/Magazine.vue'
import Post from './pages/Post.vue'
import Shop from './pages/Shop.vue'
import Login from './pages/auth/Login.vue'
import AdminRegister from './pages/auth/Register.vue'
import Four0Four from './pages/404.vue'
import Unauthorized from './utils/Unauthorized.vue'

/* -------------------------------------------------------------------------- */
/*                        //Route paths for  Admin  App                       */
/* -------------------------------------------------------------------------- */
import Article from './pages/admin/articles/Articles.vue'
import CreateArticle from './pages/admin/articles/CreateArticle.vue'
import Role from './pages/admin/roles/Roles.vue'
import CreateRole from './pages/admin/roles/CreateRole.vue'
import Dashboard from './pages/admin/Dashboard.vue'
import User from './pages/admin/users/Users.vue'
import CreateUser from './pages/admin/users/CreateUser.vue'
import Invoice from './pages/admin/invoices/Invoice.vue'
import CreateInvoice from './pages/admin/invoices/CreateInvoice.vue'

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
        name: 'admin-register',
        path: '/admin/register',
        component: AdminRegister,
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
        component: Beauty,
        meta: {
            showProgressBar: true,
        },
    },

    {
        name: 'fashion',
        path: '/category/fashion',
        component: Fashion,
        meta: {
            showProgressBar: true,
        },
    },

    {
        name: 'culture',
        path: '/category/culture',
        component: Culture,
        meta: {
            showProgressBar: true,
        },
    },

    {
        name: 'askRuby',
        path: '/category/ask-ruby',
        component: AskRuby,
        meta: {
            showProgressBar: true,
        },
    },

    {
        name: 'sex-and-relationships',
        path: '/category/sex-and-relationships',
        component: SexAndRelationship,
        meta: {
            showProgressBar: true,
        },
    },

    {
        name: 'post',
        path: '/post/:id/:title',
        component: Post,
        meta: {
            showProgressBar: true,
        },
        props: true,
    },

    {
        name: 'authorArticles',
        path: '/author/:id/:name',
        component: AuthorArticles,
        meta: {
            showProgressBar: true,
        },
        props: true,
    },

    {
        name: 'magazine',
        path: '/magazine',
        component: Magazine,
        meta: {
            showProgressBar: true,
        },
    },

    /* -------------------------------------------------------------------------- */
    /*                                  Page 404                                 */
    /* -------------------------------------------------------------------------- */
    {
        name: '404',
        path: '*',
        component: Four0Four,
        meta: {
            showProgressBar: true,
        },
    },

    /* -------------------------------------------------------------------------- */
    /*                                Unauthorized                                */
    /* -------------------------------------------------------------------------- */

    {
        name: 'Unauthorized',
        path: '/unauthorized',
        component: Unauthorized,
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
        path: '/articles',
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

    {
        name: 'role',
        path: '/roles',
        component: Role,
        meta: {
            authOnly: true,
            superAdminOnly: true,
            showProgressBar: true,
        },
    },

    {
        name: 'createRole',
        path: '/role/create',
        component: CreateRole,
        meta: {
            authOnly: true,
            showProgressBar: true,
        },
    },
    {
        name: 'user',
        path: '/users',
        component: User,
        meta: {
            authOnly: true,
            superAdminOnly: true,
            showProgressBar: true,
        },
    },

    {
        name: 'createUser',
        path: '/user/create',
        component: CreateUser,
        meta: {
            authOnly: true,
            showProgressBar: true,
        },
    },
    {
        name: 'invoice',
        path: '/invoices',
        component: Invoice,
        meta: {
            authOnly: true,
            showProgressBar: true,
        },
    },

    {
        name: 'createInvoice',
        path: '/invoice/create',
        component: CreateInvoice,
        meta: {
            authOnly: true,
            showProgressBar: true,
        },
    },
]
