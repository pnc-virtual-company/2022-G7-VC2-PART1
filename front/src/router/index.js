
import { createRouter, createWebHistory } from "vue-router";
import ListView from "../views/LeaveView.vue";
import RquestView from "../views/RequestView.vue";
import StudentView from "../views/StudentView.vue";
import FormLogIn from "../components/UI/FormLogIn.vue";

import CheckLeave from '../views/AdminView/CheckLeave.vue'
import AdminView from  '../views/AdminView/AdminView.vue'
import StudentList from '../views/AdminView/StudentList.vue';
import HomeView from '../views/HomeView.vue';
import NotFound from '@/views/Error404View.vue';
// import { userStore } from "@/store/index";

const routes = [
//  ======= public router =========
  {
  
    path: "/login",
    name:'login',
    component: FormLogIn,
    
  },
  {
    path: "/:NotFound(.*)*",
    name:'notfound',
    component: NotFound,
    
  },
  {
    path: '/',
    name: 'home',
    component: HomeView,
    meta: {
      requireAuth: true,
    },
   
      // ========= admin route =========================
  

  },
  {
    path: "/admin",
    name:'admin',
    component: AdminView,
    meta: {
      requireAuth: true,
    },
    props: true,
    beforeEnter(to, from, next) {

      if (localStorage.role=== 'admin') {
        next();
      } else {
        next('/login');
      }
    },
    children: [
      {
        path:'students',
        name:'student-list',
        props: true,
      
        component:StudentList
        
      },
      {
        path:'leave',
        name: 'check-leave',
        props: true,
        component: CheckLeave,
  
        
    },
    ]
  },
  

// Student route
{
  path: "/student",
  name:'student',
  component: StudentView,
  props: true,
  meta: {   

    requireAuth: true,
  },
  beforeEnter(to, from, next) {
    if (localStorage.role === 'student') {
      next();
    } else {
      next('/login');
    }
  },
  children: [
    {
      path: "list",
      name:'list',
      component: ListView,
      props: true,
    
      
    },
    {
      path: "request",
      name: 'request',
      props: true,
      component: RquestView,                                                
    
    },
  ]
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
          next({name:'user'})
      }
      else {
        next()
      }
    }
  } 
  else {
    if (localStorage.token) {
      if (to.path == '/login') {
          next({name:'user'}) 
      } 
      else {
        next()
      }
    }
    
  }
  next()
  
});

export default router;
