import { createRouter, createWebHistory } from 'vue-router'
import ListView from '../views/ListView.vue'
import RquestView from '../views/RequestView.vue';
import StudentView from '../views/StudentView.vue';
import AdminView from '../views/AdminView.vue';
import FormloginView from '../components/FormLogIn.vue';



const routes = [
  {
    path: '/list',
    name: 'list',
    component: ListView,
    props:true
  },
  {
    path: '/request',
    name: 'request',
   
    component:RquestView
  },
  {
    path: '/',
    name: 'form',
    component: FormloginView
  },
  
  {
    path: '/student/:id/list',
    name: 'student',
    component: StudentView,
    props:true
  },
  {
    path: '/admin/:id',
    name: 'admin',
    component: AdminView,
    props:true
  },
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
