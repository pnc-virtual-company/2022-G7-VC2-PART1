<template>
<nav class="flex justify-between align-center w-full">
    <div class="w-[10%] flex items-center">
      <img :src="require('../../assets/logo.png')" alt="" class="ml-5 lg:w-[45%] bg-white rounded-full">
    </div>
    <!-- =================student nav ================== -->
    <div v-if="role=='student'" class="flex justify-center align-center mt-4 w-[70%]">
      <router-link class="m-3 text-white text-decoration-none text-lg" :to="{name:'home'}">Home</router-link>
      <router-link class="m-3 text-white text-decoration-none text-lg" :to="{name:'list'}">List Of Leave</router-link>
      <router-link class="m-3 text-white  text-decoration-none text-lg" :to="{name:'request'}">Request</router-link>
    </div>
    <!-- =================admin nav ================== -->
    <div v-else class="flex justify-center align-center mt-4 w-[70%]r">
        <router-link class="m-3 text-white text-decoration-none text-lg" :to="{name:'home'}">Home</router-link>
        <router-link class="m-3 text-white text-decoration-none text-lg" :to="{name:'student-list'}">List Of Students</router-link>
        <router-link class="m-3 text-white text-decoration-none text-lg" :to="{name:'check-leave'}">Check Leave</router-link>
      </div>
      <div class="flex  align-center w-[20%] items-center justify-center">
        <img :src="require('../../assets/user_female.png')" alt="" class=" w-[20%]  rounded-full ml-[25%]">
        <h2 class="w-[35%] bg-orange-300 text-center flex  items-center justify-center ml-[5%] outline-none  text-white h-[7vh]"><a @click="logout" href="#" class="text-decoration-none">Sign out</a></h2>
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
      this.$emit('request-logout')
    }
    // logout(){
    //    localStorage.removeItem('user')
    //     this.$router.push({name:"FormLogIn"})
    // }
  }
}
</script>

<style>

</style>