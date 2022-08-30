<template>
<nav class="flex justify-between align-center">
    <div class="logo w-1/5">
      <img :src="require('../../assets/logo-en.png')" alt="" class="ml-5 w-1/2">
    </div>
<!-- =================student nav ================== -->
      <div v-if="role=='student'" class="flex justify-center align-center mt-4">
        <router-link class="m-3 text-white text-decoration-none text-lg" :to="items.student.studentList.to">{{items.student.studentList.title}}</router-link>
        <router-link class="m-3 text-white  text-decoration-none text-lg" :to="items.student.listOfLeave.to">{{items.student.listOfLeave.title}}</router-link>
      </div>
<!-- =================admin nav ================== -->
      <div v-else class="flex justify-center align-center mt-4">
        <router-link class="m-3 text-white text-decoration-none text-lg" :to="items.admin.studentList.to">{{items.admin.studentList.title}}</router-link>
        <router-link class="m-3 text-white  text-decoration-none text-lg" :to="items.admin.listOfLeave.to">{{items.admin.listOfLeave.title}}</router-link>
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
            to: "/list",
            title: "List All Leave",
          },
          listOfLeave: {
            to: "/request",
            title: "New Leave",
          },
        },
        admin: {
          studentList: {
            to: '/StudentList',
            title:'Student lists'
          },
          listOfLeave: {
               to: '/CheckLeave',
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