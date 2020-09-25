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
    name: 'magazine',
    path: '/magazine',
    component: Magazine,
  },
]
