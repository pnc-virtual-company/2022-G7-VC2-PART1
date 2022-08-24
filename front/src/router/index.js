
import { createRouter, createWebHistory } from "vue-router";
import ListView from "../views/ListView.vue";
import RquestView from "../views/RequestView.vue";
import StudentView from "../views/StudentView.vue";
import FormLogIn from "../components/ui/FormLogIn.vue";

import CheckLeave from '../views/AdminView/CheckLeave.vue'
import AdminView from  '../views/AdminView/AdminView.vue'
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
    path: "/login",
    name:'login',
    component: FormLogIn,
    meta: {
      requireAuth: false,
    },
  },
 
 

  {
    path: "/list",
    name:'list',
    component: ListView,
    props: true,
    meta: {
      requireAuth: true,
    },
    
  },
  {
    path: "/request",
    name:'request',
    component: RquestView,
    meta: {
      requireAuth: true,
    },
  },
  
  {
    path: "/",
    name:'students',
    component: StudentView,
    props: true,
    meta: {
      requireAuth: true,
    },
  },
  {
    path: "/admin/:id",
    name:'admin',
    component: AdminView,
    props: true,
    meta: {
      requireAuth: true,
    },
  },
 
];

let navigationGuid = (to, from, next) => { 
  if (to.meta.requireAuth) {
    if (!parseInt(localStorage.userId)) {
      next({name:'login'})
      
    } else {
      if (to.path === '/login') {
        next({name:'students'})
      } else {
        next()
      }
    }
    
  } else {
    if (localStorage.userId) {
      if (to.name === 'login') {
        next({name:'students'})
      } else {
        next()
      }
    } 
    console.log(to);
    next()
  }

};
const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes,
});
router.beforeEach(navigationGuid);

export default router;
