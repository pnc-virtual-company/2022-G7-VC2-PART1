
import { createRouter, createWebHistory } from "vue-router";
import ListView from "../views/ListView.vue";
import RquestView from "../views/RequestView.vue";
import StudentView from "../views/StudentView.vue";
import FormLogIn from "../components/FormLogIn.vue";

import CheckLeave from '../views/AdminView/CheckLeave.vue'
import AdminView from  '../views/AdminView/AdminView.vue'
import StudentList from '../views/AdminView/StudentList.vue'

const routes = [
  
  {
    path: "/",
    name:'user',
    component: StudentView,
    props: true,
    meta: {
      requireAuth: true,
      requireAdmin : true,
    },
  },
  {
    path: "/admin",
    name:'admin',
    component: AdminView,
    props: true,
    meta: {
      requireAuth: true,
    },
  },
  {
    path:'/studentList',
    name:'studentList',
    props: true,
    component:StudentList
    
  },
  {
    path:'/admin',
    name: 'checkleave',
    props: true,
  component: CheckLeave
},

// Student list
{
  path: "/login",
  name:'login',
  component: FormLogIn,
  },
 

  {
    path: "/list",
    name:'list',
    component: ListView,
    props: true,
    meta: {
      requireAuth: true,
      requireAdmin: true
    },
    
  },
  {
    path: "/request",
    name: 'request',
    props: true,
    component: RquestView,
    meta: {
      requireAuth: true,
    },
  },
  
 
];

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes,
});
router.beforeEach((to, from, next) => {
  if (to.meta.requireAuth) {
    if (!localStorage.token) {
      next('/login')
    }
    else {
      if (to.path == '/login') {
        next('/')
      }
      else {
        next()
      }
    }
  } 
  else {
    if (localStorage.token) {
      if (to.path == '/login') {
        next('/')  
      } 
    }
    
  }
  next()
  
});

export default router;
