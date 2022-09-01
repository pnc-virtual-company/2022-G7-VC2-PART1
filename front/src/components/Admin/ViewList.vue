<template>
  <div class="flex mt-3 space-x-3 mb-0" >
      <div class="flex">
        <li class="fa fa-user-plus text-4xl text-blue-500"></li>
        <div class="flex justify-center items-center">
          <p class="ml-2"><span class="text-orange-500">{{countStudent}}</span> students</p>
        </div>
      </div>
  </div>
</template>

<script>
import axios from "../../http.js";
  export default {
    data() {
      return {
        studentList:[],
      }
    },
    methods: {
      getAllStudent() {
        axios.get('students').then((res) => {
          this.studentList = res.data
          console.log(this.studentList);
        })
      }
    },
    computed: {
      countStudent () {
        return this.studentList.length;
      },
  },
  mounted() {
    this.getAllStudent()
  }
}
</script>

<style scoped>
.container {
  width: 70%;
  height: auto;
}
.card-body {
 box-shadow: rgba(80, 78, 76, 0.3) 0px 0px 0px 2px;
}
</style>