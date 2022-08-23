import { createRouter, createWebHistory } from 'vue-router'
import ListView from '../views/ListView.vue'
import RquestView from '../views/RequestView.vue';
import StudentView from '../views/StudentView.vue';
import AdminView from '../views/AdminView/AdminView.vue';
import FormLogIn from '../components/FormLogIn.vue';
import CheckLeave from '../views/AdminView/CheckLeave.vue'
// import AdminView from  '../views/AdminView/AdminView.vue'
import StudentList from '../views/AdminView/StudentList.vue'

const routes = [
  // {
  //   path:'admin',
  //   name:'admin',
  //   component:AdminView
  // },
  {
    path:'/StudentList',
    name:'StudentList',
    component:StudentList
    
  },
  {
  path:'/checkleave',
  name: 'checkleave',
  component: CheckLeave
  },

  // Student list
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