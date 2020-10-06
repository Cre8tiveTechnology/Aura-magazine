//Route files for  Vue App
import Home from './components/Home.vue'
import News from './components/News.vue'
import Magazine from './components/Magazine.vue'

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
