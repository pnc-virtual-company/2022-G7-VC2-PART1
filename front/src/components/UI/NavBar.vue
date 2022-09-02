<template>
  <!----------------------popup------------------------------->
<div class="modal-mask" v-if="showModal==true">
  <div class="modal-wrapper">
    <div class="modal-container rounded bg-current">
      <div class="flex justify-end">
        <svg @click="viewProfile" class="fa-cross" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" width="5%">
          <path strokeLinecap="round" strokeLinejoin="round" d="M6 18L18 6M6 6l12 12" />
        </svg>
      </div>
      
      <!-- student profile  -->
      <div class="flex justify-center" v-if="role == 'student'">
        <div  class="text" v-for = "items in datalist" :key="items">
          <div class="text-center ml-5">
            <img :src="require('../../assets/user_female.png')" class='w-28 h-28 rounded-full object-cover text-center'>
            <h3 class="mr-12 text-2xl mt-2"> <strong>{{items.first_name}} {{items.last_name}} </strong> </h3>
          </div>
          <div class="p-0 text-left mr-7">
            <h3>student_id: {{items.id}}</h3>
            <h3>Class: {{items.class.class}}</h3>
            <h3>Gender: {{items.batch.generation}}</h3>
            <h3>phone_number: {{items.phone_number}}</h3>
            <h3>email: {{items.email}}</h3>
          </div>
        </div>
      </div>

       <!-- admin profile  -->
       
       <div class="flex justify-center" v-if="role == 'admin' ">
        <div  class="text" v-for = "items in datalist" :key="items">
          <div class="text-center ml-5">
            <img :src="require('../../assets/user_female.png')" class='w-28 h-28 rounded-full object-cover text-center'>
            <h3 class="mr-12 text-2xl mt-2"> <strong>{{items.first_name}} {{items.last_name}} </strong> </h3>
          </div>
          <div class="p-0 text-left mr-7">
            <h3>admin_id: {{items.id}}</h3>
            <h3>Class: {{items.email}}</h3>
          </div>
        </div>
      </div>

      </div>
  </div>

</div>
  <!----------------------end-popup--------------------------->
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
</template>
<script>
import axios from "../../http.js";
export default {
  props:['role'],
  inject:['userId'],
   data() {
    return {
      showModal: false,
      datalist:[],
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
      console.log('user_Id'+localStorage.userId)
      console.log('role-data'+localStorage.role)
      if(localStorage.role =="admin"){
          axios.get('admin/'+localStorage.userId).then(response => {
            this.datalist.push(response.data)
            console.log('data-information'+this.datalist)
          })
      }
      else if(localStorage.role =="student"){
        axios.get('students/'+localStorage.userId).then(response => {
            this.datalist.push(response.data)
            console.log('user_Id'+localStorage.userId)
            console.log('data-information'+this.datalist)
          })
        }

      },
    
      viewProfile(){
        this.showModal = !this.showModal
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

<style scoped>
.modal-mask {
  position: fixed;
  z-index: 10;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.5);
  display: table;
  transition: opacity 0.3s ease;
}

.modal-wrapper {
    display: table-cell;
    vertical-align: middle;
}
.modal-container {
    width: 35%;
    height: auto;
    margin: 0px auto;
    padding: 15px 28px;
    background-color: #fff;
    border-radius: 2px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.33);
    transition: all 0.3s ease;
    font-family: Helvetica, Arial, sans-serif;
}

.modal-body {
    margin: 20px 0;
}

.modal-default-button {
    float: right;
}
.modal-enter-from, .modal-leave-to {
    opacity: 0;
}

.modal-enter-active .modal-container,
.modal-leave-active .modal-container {
    -webkit-transform: scale(1.1);
    transform: scale(1.1);
};
.fa-cross {
  cursor: pointer;
}
</style>