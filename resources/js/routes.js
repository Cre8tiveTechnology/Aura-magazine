//Route files for  Vue App
import Home from './pages/Home.vue'
import News from './pages/News.vue'
import Magazine from './pages/Magazine.vue'

export const routes = [
  {
    name: 'home',
    path: '/',
    component: Home,
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
    name: 'magazine',
    path: '/magazine',
    component: Magazine,
  },
]
