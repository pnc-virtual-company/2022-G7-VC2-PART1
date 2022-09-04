<template>
  <div class="app h-screen bg-gray-100">
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
      userId:'6',
      userRole: ''

    };
  },
  methods: {
    login(userData) {
      this.isLogin = userData.isLogin;
      this.user = userData.user;

    },

    // =================get data from api =================
   async getListOfLeave() {   
      if (localStorage.token) {
        // ============= get all user's request ============
     await  axios.get('request'
        ).
          then((response) => {
            this.userData = response.data;
            console.log(response.data);
          }).catch((error) => {error})
      }
    },
    // ============== get specific user ============
   async getSpecificUser() {
      let path = "students/";
      if(localStorage.getItem("role") == 'admin'){
        path = 'admin/';
      }
      if (localStorage.userId) {
      await  axios.get(path + localStorage.userId).
          then((response) => {
          this.user = response.data;
          console.log(response)
        })
        
      }
      this.userRole = localStorage.role;
      this.userId = localStorage.userId;
    },
   async userRefresh() {
      this.userId = localStorage.userId;
      this.userRole = localStorage.role;
    }
  },
 provide(){
    return {
      userId:this.userId,
    }
  },
  mounted() {
    this.userRefresh();
    this.getListOfLeave();
    this.getSpecificUser();
  },
  updated() {
    this.userRefresh();
    this.getSpecificUser();
    this.getListOfLeave();
  }
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