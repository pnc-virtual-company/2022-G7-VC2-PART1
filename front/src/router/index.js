import { createRouter, createWebHistory } from 'vue-router'
import ListView from '../views/ListView.vue'
import RquestView from '../views/RequestView.vue';
import StudentView from '../views/StudentView.vue';
import AdminView from '../views/AdminView.vue';
import FormLogIn from '../components/FormLogIn.vue';

const routes = [
  {
    path: '/list/:id',
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
    path: '/student/:id',
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
  {
    path: '/',
    name: 'FormLogIn',
    component: FormLogIn
  },
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router