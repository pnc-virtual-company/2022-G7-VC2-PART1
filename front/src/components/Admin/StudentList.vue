<template >
  <CardSlot>
    <FormInput @add-data="createNewStudent"/>
    <h1 class="text-center text-2xl mb-3">List all of the students</h1><hr>
    <CardList/>
    <CardDetail v-for="student of students" :key="student" :data="student"
      @remove-list="removeListStudent">
    </CardDetail>
  </CardSlot>
</template>
<script>
import axios from "../../http.js";
import CardSlot from './CardSlot.vue'
import CardDetail from './CardDetail.vue'
import CardList from './ViewList.vue'
import FormInput from './FormCreate.vue'
  export default {
    provide() {
      return {
        displayData: this.getDataOfStudent
      }
    },
    components: { CardDetail, CardList, CardSlot, FormInput},
    data() {
      return {
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
    mounted() {
      this.getDataOfStudent();
    }
  }
</script>

<style scoped>
</style>>