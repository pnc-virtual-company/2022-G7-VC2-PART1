<template>
  <div class="container">
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
              <div class="p-0 text-left mr-7">
                <button class="bg-orange-500 p-2 rounded-xl my-2.5 ml-2.5" @click="resetPassword">Reset Password</button>
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
              <div class="p-0 text-left mr-7">
                <button class="bg-orange-500 p-2 rounded-xl my-2.5 ml-2.5" @click="openResetpsf">Reset Password</button>
              </div>
            </div>
          </div>

          <!-- reset password form -->
          <div class="modal-mask" v-if="showResetPassword">
            <div class="modal-wrapper">
              <div class="modal-container rounded bg-current">
                <div class="flex justify-center w-11/12 h-full rounded-2xl" >
                    <form class="w-full h-full bg-white flex flex-wrap m-auto  shadow-lg  border-solid border-2 border-blue-300 " @submit.prevent="resetPassword">
                      <div class="w-full text-center my-3.5">
                        <!-- <img :src="require('../src/assets/forgot.webp')" alt="baby with headphones" class="w-36 h-36 bg-red-600 rounded-full m-auto sm:w-1/2 lg:w-40" > -->
                        <h1 class="text-3xl text-sky-500 ">Reset Password</h1>
                      </div>
                      <div class="w-full ml-8 flex my-5 ">
                        <label class="w-1/3 m-auto text-sky-500 border-b-2 border-amber-600" for="current_password">Old Password</label>
                        <input
                        class="w-7/12 m-auto p-1 border-2 "
                        placeholder="current password"
                        type="password"
                        v-model="current_password"
                        id="current_password"
                        />
                      </div>
                      <div class="w-full ml-8 flex my-5">
                        <label class="w-1/3 m-auto text-sky-500 border-b-2 border-amber-600" for="confirmPassword">New Password</label>
                        <input
                        class="w-7/12 m-auto p-1 border-2"
                        placeholder="New Password"
                        type="password"
                        v-model="new_password"
                        id="new_password"
                        />
                      </div>
                      <div class="w-11/12 flex mb-5 text-black">
                        <button
                        type="submit"
                        class="w-48 p-1.5 bg-amber-500 ml-3.5 rounded-md"
                        >
                          Reset
                        </button>
                        <button 
                        @click="cancleReset"
                        class="w-48 p-1.5 bg-sky-500 ml-1.5 rounded-md"
                        >
                          Cancle
                        </button>
                      </div>
                    </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>

      <!----------------------end-popup--------------------------->
    <nav class="flex justify-between align-center w-full">
        <div class="w-[10%] flex items-center" v-for="student of datalist" :key="student">
          <img :src="require('../../assets/logo.png')" alt="" class="ml-5 lg:w-[45%] bg-white rounded-full">
          <p>{{student.first_name}} {{student.last_name}}</p>
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
            <h2 class="w-[35%] bg-orange-300 text-center flex  items-center justify-center ml-[5%] outline-none  text-white h-[7vh]"><a @click="logout" href="#" class="text-decoration-none">Log Out</a></h2>
        </div>
    </nav>
  </div>
</template>
<script>
import axios from "../../http.js";
export default {
  props:['role'],
  inject:['userId'],
   data() {
    return {
      showModal: false,
      showResetPassword:false,
      current_password:null,
      new_password:null,
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
      // console.log('user_Id'+localStorage.userId)
      // console.log('role-data'+localStorage.role)
      if(localStorage.role =="admin"){
          axios.get('admin/'+localStorage.userId).then(response => {
            this.datalist.push(response.data)
            // console.log('data-information'+this.datalist)
          })
      }
      else if(localStorage.role =="student"){
        axios.get('students/'+localStorage.userId).then(response => {
            this.datalist.push(response.data)
            // console.log('user_Id'+localStorage.userId)
            // console.log('data-information'+this.datalist)
          })
        }
    },
    cancleReset(){
      this.showResetPassword = !this.showResetPassword;
    },
    viewProfile(){
      this.showModal = !this.showModal
    },  
    logout(){
      this.$emit('request-logout')
    },
    openResetpsf(){
      this.showResetPassword = !this.showResetPassword;
    },
    resetPassword(){
      if (localStorage.getItem('role')=="student"){
        this.studentResetpassword();
      }
      if (localStorage.getItem('role')=="admin") {
        this.adminResetpassword();
      }
      this.oldpassword = null;
      this.newPassword = null;
      this.showResetPassword = !this.showResetPassword;
    },
    studentResetpassword(){
       axios.patch('http://127.0.0.1:8082/api/studentResetPassword/'+localStorage.getItem('userId'),{oldpassword:this.current_password,newPassword:this.new_password}).then((response)=>{
        console.log(response)
      })
    },
    adminResetpassword(){
      axios.patch('http://127.0.0.1:8082/api/adminResetPassword/'+localStorage.getItem('userId'),{oldpassword:this.current_password,newPassword:this.new_password}).then((response)=>{
        console.log(response);
      })
    }
},
  mounted(){
    this.information()
  },
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