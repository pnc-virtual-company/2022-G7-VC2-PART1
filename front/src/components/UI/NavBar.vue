<template>
<nav class="flex justify-between align-center">
    <div class="logo w-1/5">
      <img :src="require('../../assets/logo-en.png')" alt="" class="ml-5 w-1/2">
    </div>
    <!-- =================student nav ================== -->
    <div v-if="role=='student'" class="flex justify-center align-center mt-4">
      <router-link class="m-3 text-white text-decoration-none text-lg" :to="{name:'home'}">Home</router-link>
      <router-link class="m-3 text-white text-decoration-none text-lg" :to="{name:'list'}">List Of Leave</router-link>
      <router-link class="m-3 text-white  text-decoration-none text-lg" :to="{name:'request'}">Request</router-link>
    </div>
    <!-- =================admin nav ================== -->
    <div v-else class="flex justify-center align-center mt-4">
        <router-link class="m-3 text-white text-decoration-none text-lg" :to="{name:'home'}">Home</router-link>
        <router-link class="m-3 text-white text-decoration-none text-lg" :to="{name:'student-list'}">List Of Students</router-link>
        <router-link class="m-3 text-white  text-decoration-none text-lg" :to="{name:'check-leave'}">Check Leave</router-link>
      </div>
      <div class="flex  align-center">
        <h2 class="w-full bg-orange-500 text-center p-3 rounded-md outline-none  mr-5 text-white"><a @click="logout" href="#" class="text-decoration-none">Sign out</a></h2>
    </div>
</nav>

</template>
<script>
export default {
  props:['role'],
   data() {
    return {
      items: {
        student: {
          studentList: {
            to: "students/list",
            name:'student',
            title: "List All Leave",
          },
          listOfLeave: {
            to: "student/request",
            name:'request',
            title: "New Leave",
          },
        },
        admin: {
          studentList: {
            to: 'admin/Students',
            name:'students',
            title:'Student lists'
          },
          listOfLeave: {
            to: 'admin/leave',
               name:'leave',
            title:'Check Leave'
          }
        }
      },
    };
  },
  methods:{
    logout(){
       localStorage.removeItem('user')
        this.$router.push({name:"FormLogIn"})
    }
  }
}
</script>

<style>

</style>