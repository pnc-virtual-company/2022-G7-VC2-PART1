<template>
  <CardSlot>
    <div class="w-full mt-5 position flex justify-center space-x-2">
      <input type="text" placeholder="search" class="hover:border-blue-00 w-96 block text-gray-700 border rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white" v-model="search">
      <button  type="submit" class="btn hover:bg-orange-500 text-white px-4 rounded focus:outline-none focus:shadow-outline">Search</button>
    </div>
    <div class="flex justify-between">
      <!------------------view-numberStudent-------------------->
      <div class="flex w-full">
        <li class="fa fa-user-plus text-4xl text-blue-500"></li>
        <div class="flex justify-start items-center w-full ml-2">
          <p class="text-orange-500">{{countNumberStudent}}<span class="text-black ml-2">students</span></p>
        </div>
      </div>
      <FormInput @add-data="createNewStudent"/>
      <!--------------------end-view----------------------------->
    </div>
    <h1 class="text-center text-2xl mb-2">List all of the students</h1><hr>
    <table class="bg-white m-auto w-full lg:my-4 box-border border-collapse border border-slate-100">
      <thead>
          <tr class="box-border">
              <th class="lg:text-md text-sm border-b-2 lg:p-5 p-0 bg-gray-100 border text-blue-500 border-slate-100">ID</th>
              <th class="lg:text-md text-sm border-b-2 lg:p-5 p-0 bg-gray-100 border text-blue-500 border-slate-100">PROFILE</th>
              <th class="lg:text-md text-sm border-b-2 lg:p-5 p-0 bg-gray-100 border text-blue-500 border-slate-100">NAME</th>
              <th class="lg:text-md text-sm border-b-2 lg:p-5 p-0 bg-gray-100 border text-blue-500 border-slate-100">GENDER</th>
              <th class="lg:text-md text-sm border-b-2 lg:p-5 p-0 bg-gray-100 border text-blue-500 border-slate-100">CLASS</th>
              <th class="lg:text-md text-sm border-b-2 lg:p-5 p-0 bg-gray-100 border text-blue-500 border-slate-100">TEL</th>
              <th class="lg:text-md text-sm border-b-2 lg:p-5 p-0 bg-gray-100 border text-blue-500 border-slate-100">EMAIL</th>
              <th class="lg:text-md text-sm border-b-2 lg:p-5 p-0 bg-gray-100 border text-blue-500 border-slate-100">PASSWORD</th>
              <th class="lg:text-md text-sm border-b-2 lg:p-5 p-0 bg-gray-100 border text-blue-500 border-slate-100">ACTIONS</th>
          </tr>
      </thead>
        <CardDetail v-for="student of students"
            :key="student" :data="student"
            @remove-list="removeListStudent">
          </CardDetail>
    </table>
  </CardSlot>
</template>
<script>
import axios from "../../http.js";
import CardSlot from './CardSlot.vue'
import CardDetail from './CardDetail.vue'
import FormInput from './FormCreate.vue'
  export default {
    provide() {
      return {
        displayData: this.getDataOfStudent,
        listStudents :this.students
      }
    },
    components: { CardDetail, CardSlot, FormInput },
    data() {
      return {
        search: null,
        students: [],
      }
    },
    methods: {
      getDataOfStudent() {
        axios.get("students").then((res) => {
          this.students = res.data;
          console.log(this.students);
        })
      }, 
      createNewStudent(first_name,last_name,gender,email,password, profile, phone_number,class_id,batch_id,admin_id,role) {
        axios.post("students", 
        {
          first_name:first_name, last_name:last_name,
          gender:gender,email:email, password:password,profile:profile,
          phone_number:phone_number,class_id:class_id,batch_id:batch_id,admin_id:admin_id,role:role,
        }).then((res) => {
          this.getDataOfStudent();
          console.log(res.data);
        }).catch((error)=>{
          console.log(error.response.data)
        })
      },
      removeListStudent(id) {
        axios.delete('students/' + id).then(() => {
          this.getDataOfStudent();
        })
      }
    },    
    computed: {
      countNumberStudent() {
        return this.students.length
      }
    },
    mounted() {
      this.getDataOfStudent();
    }
  }
</script>
<style scoped>
  h1 {
    font-family: Arial, Helvetica, sans-serif;
  }
  hr {
    border: 0.5px solid #FDBA74;
  }
  .template {
    width: 100%;
    height: auto;
  }
/* search */
.btn {
  display: flex;
  justify-content: center;
  align-items: center;
  background: #FDBA74;
  height: 7vh;
}
</style>>