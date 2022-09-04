
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
    meta: {
      requireAuth: false,
    },
    
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
let entryUrl = null;
router.beforeEach((to, from, next) => {

  let userToken = localStorage.getItem('token');
  let authenticated = userToken != undefined && userToken != null;

  if (to.matched.some((record) => record.meta.requireAuth)) {
    if (!authenticated) {
      if (to.name !== 'login' && to.name !== 'home'){
        entryUrl = to.fullPath;
      } 
        
        next({ name: 'login' })

      }
    else if (entryUrl!==null ) {
      let url = entryUrl;
      entryUrl = null;
      next(url);
    } else {
      next()
    }
  }
  else {
    next()
  }
  console.log(to.fullPath)
});

export default router;
