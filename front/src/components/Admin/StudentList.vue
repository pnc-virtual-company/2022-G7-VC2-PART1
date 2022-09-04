<template>
  <div class="w-full position flex justify-center bg-gray-200 space-x-1 p-5">
      <input type="text" placeholder="search" class="hover:border-blue-300 w-96 block text-gray-700 border rounded py-3 px-5 leading-tight focus:outline-none focus:bg-white" v-model="search">
      <button  type="submit" class="btn hover:bg-orange-300 text-white px-4 rounded focus:outline-none focus:shadow-outline">Search</button>
  </div>
  <CardSlot>
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
    <h1 class="text-center text-2xl text-gray-500 mb-2">List all of the students</h1><hr>
    <table class="bg-white m-auto w-full lg:my-4 box-border border-collapse border border-slate-100">
      <thead>
          <tr class="box-border">
              <th class="lg:text-md text-sm border-b-2 lg:p-5 p-0 bg-gray-100 border text-blue-500 border-slate-100">PORFILE</th>
              <th class="lg:text-md text-sm border-b-2 lg:p-5 p-0 bg-gray-100 border text-blue-500 border-slate-100">ID</th>
              <th class="lg:text-md text-sm border-b-2 lg:p-5 p-0 bg-gray-100 border text-blue-500 border-slate-100">NAME</th>
              <th class="lg:text-md text-sm border-b-2 lg:p-5 p-0 bg-gray-100 border text-blue-500 border-slate-100">GENDER</th>
              <th class="lg:text-md text-sm border-b-2 lg:p-5 p-0 bg-gray-100 border text-blue-500 border-slate-100">CLASS</th>
              <th class="lg:text-md text-sm border-b-2 lg:p-5 p-0 bg-gray-100 border text-blue-500 border-slate-100">TEL</th>
              <th class="lg:text-md text-sm border-b-2 lg:p-5 p-0 bg-gray-100 border text-blue-500 border-slate-100">EMAIL</th>
              <th class="lg:text-md text-sm border-b-2 lg:p-5 p-0 bg-gray-100 border text-blue-500 border-slate-100">ACTIONS</th>
          </tr>
      </thead>
      <CardDetail v-for="student of filterByName" :key="student" :data="student" @remove-list="removeListStudent"></CardDetail>
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
        }).then(() => {
          this.getDataOfStudent();
        })
      },
      removeListStudent(id) {
        axios.delete('students/' + id).then(() => {
          this.getDataOfStudent();
        })
      }
    },    
    computed: {
      filterByName() {
        if(!this.search) {
          return this.students
        }else {
          return  this.students.filter(student => student.first_name.toLowerCase().includes(this.search.toLowerCase()))
        }
      },
      countNumberStudent() {
        return this.students.length
      }
    },
    mounted() {
      this.getDataOfStudent()
    },
    updated() {
      this.getDataOfStudent()
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
  height: 6.8vh;
}
/* table */
.table, th {
  /* background: #bae2f2; */
  border-bottom: no;
  border: none;
}
/* search */
.position {
  position: fixed;
  top: 0;
  margin-top: 4.9rem;
  box-shadow: rgba(0, 0, 0, 0.15) 0px 3px 3px 0px;
}
</style>