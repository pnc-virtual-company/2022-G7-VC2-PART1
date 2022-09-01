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
        <img :src="require('../../assets/user_female.png')" alt="" class=" w-[20%]  rounded-full ml-[25%]" @click="viewProfile">
        <h2 class="w-[35%] bg-orange-300 text-center flex  items-center justify-center ml-[5%] outline-none  text-white h-[7vh]"><a @click="logout" href="#" class="text-decoration-none">Sign out</a></h2>
    </div>
  </nav>

  <div v-if="isShow == true" class="flex justify-center w-1/4 m-auto pb-6 rounded-xl bg-stone-300 ">
    <div class="text" v-for = "items in datalist" :key="items">
      <div class="text-center ml-5">
        <img :src="require('../../assets/user_female.png')" class='w-28 h-28 rounded-full object-cover text-center'>
        <h3 class="mr-12 text-2xl mt-2"> <strong>{{items.first_name}} {{items.last_name}} </strong> </h3>
      </div>
      <div class="p-0 text-left mr-7">
        <h3>student_id: {{items.id}}</h3>
        <!-- <h3>Class: {{items.class.class}}</h3> -->
        <!-- <h3>Gender: {{items.batch.generation}}</h3> -->
        <h3>phone_number: {{items.phone_number}}</h3>
        <h3>email: {{items.email}}</h3>
      </div>
    </div>
  
    </div>

</template>
<script>
import axios from "../../http.js";
export default {
  props:['role'],
  inject:['userId'],
   data() {
    return {
      datalist:[],
      isShow: false,
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
    information(){
      axios.get('students/'+localStorage.userId).then(response => {
        this.datalist.push(response.data)
        console.log(response.data); 
        console.log('user_Id'+localStorage.userId);
      })
    },
    viewProfile(){
      this.isShow =! this.isShow
    },  
    logout(){
      this.$emit('request-logout')
    }
},
  mounted(){
    this.information()
  },
// logout(){
//    localStorage.removeItem('user')
//     this.$router.push({name:"FormLogIn"})
// }
}
</script>

<style>

</style>