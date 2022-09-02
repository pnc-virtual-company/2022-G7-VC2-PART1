<template>
  <div class="app h-screen">
    <!-- // navigation bar  -->

    <navbar-view v-if="isLogin || userId!=undefined" :role="userRole" @request-logout="logout"/>

    <main>
      <!-- view -->
      <router-view @request-login="login" :role="role"/>
    </main>
  </div>
</template>
<script>
import axios from './http';
export default {
  components: {},
  data() {
    return {
      isLogin: false,
      user: null,
      listOfLeave: null,
      userId:'',
      userRole: ''

    };
  },
  methods: {
    login(value) {
      this.isLogin = value.isLogin;
      this.user = value.user;
      this.listOfLeave = value.request;
     
    },

    // =================get data from api =================
    getListOfLeave() {   
      if (localStorage.token) {
        // ============= get all user's request ============
        axios.get('request'
        ).
          then((response) => {
            this.userData = response.data;
            console.log(response.data);
          })
      }
   console.log(localStorage.token)
        
    },
    // ============== get specific user ============
    getSpecificUser() {
      let path = "students/";
      if(localStorage.getItem("role") == 'admin'){
        path = 'admin/';
      }
      if (localStorage.userId) {
        axios.get(path + localStorage.userId).
          then((response) => {
          this.user = response.data;
          console.log(response)
        })
        
      }
     
      this.userRole = localStorage.role;
      this.userId = localStorage.userId;
    },
    userRefresh() {
      this.userId = localStorage.userId;
      this.userRole = localStorage.role;
      
    },
    logout(){
      localStorage.removeItem('token');
      localStorage.removeItem('userId');
      localStorage.removeItem('role');
      this.isLogin = false;
      this.userRole = null;
      this.userId = null;
    }
  },
  provide(){
    return {
      userId:this.userId,
      
    }
  },
  mounted() {
    this.userRefresh();
  },
  updated() {
    this.getListOfLeave();
    this.getSpecificUser();
  },

};
</script>

<style>
@import url("https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,500;1,200;1,400;1,500&display=swap");
body {
  margin: 0;
  padding: 0;
  font-family: "Montserrat", sans-serif;
}
nav {
  position: sticky;
  z-index: 5;
  top: 0;
  width: 100%;
  box-shadow: rgba(0, 0, 0, 0.15) 0px 3px 3px 0px;
  background: #22BBEA;
  box-shadow: rgba(50, 50, 93, 0.25) 0px 6px 12px -2px,
    rgba(0, 0, 0, 0.3) 0px 3px 7px -3px;
}

nav a.router-link-exact-active {
  padding: 5px;
  background:#FDBA74;
}
nav a {
  border: none;
  text-decoration: none;
}

</style>