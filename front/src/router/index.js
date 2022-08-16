import { createRouter, createWebHistory } from 'vue-router'
import ListView from '../views/ListView.vue'
import RquestView from '../views/RequestView.vue';
const routes = [
  {
    path: '/',
    name: 'list',
    component: ListView
  },
  {
    path: '/request',
    name: 'request',
   
    component:RquestView
  }
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
