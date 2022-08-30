<template >
  <CardBody>
    <FormInput/>
    <h1 class="text-center text-2xl mb-3">List all of the students</h1><hr>
    <CardList/>
    <CardDetail v-for="student of students" :key="student" :data="student">
    </CardDetail>
  </CardBody>
</template>
<script>
import axios from "../../http.js";
import CardBody from './MenuSlot.vue'
import CardDetail from './CardDetail.vue'
import CardList from './ViewList.vue'
import FormInput from './FormCreate.vue'
  export default {
    components: { CardDetail, CardList, CardBody, FormInput},
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
      }
    },
      mounted() {
        this.getDataOfStudent();
    }
  }
</script>

<style scoped>
</style>>


