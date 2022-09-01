<template>
  <div class="flex mt-3 space-x-3 mb-0" >
    <div class="card">
      <div class="flex">
        <li class="fa fa-graduation-cap text-4xl text-blue-500"></li>
        <div class="flex justify-center mt-1">
          <p class="ml-2"><span class="text-orange"></span> students</p>
        </div>
      </div>
    </div>
    <div class="card">
      <div class="flex">
        <li class="fa fa-drivers-license text-3xl text-gray-500"></li>
        <div class="flex justify-center mt-1">
          <p class="ml-2">Approve<span class="text-orange ml-2">12</span></p>
        </div>
      </div>
    </div>
    <div class="card">
      <div class="flex">
        <li class="fa fa-download text-3xl text-gray-500"></li>
        <div class="flex justify-center mt-1 ">
          <p class="ml-2">Padding<span class="text-orange ml-2">12</span></p>
        </div>
      </div>
    </div>
    <div class="card">
      <div class="flex">
        <li class="fa fa-minus-circle text-3xl text-red-500"></li>
        <div class="flex justify-center mt-1 ml-2">
          <p>Reject<span class="text-orange ml-2">12</span></p>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "../../http.js";
  export default {
    data() {
      return {
        students: [],
      }
    },
    methods: {
      getDataOfStudent() {
        axios.get('students').then((res) => {
          this.students = res.data;
          console.log(res.data);
        })
      },   
      // showDetail(id) {
      //   let index = this.students.findIndex(student => student.id ==id);
      //   this.students[index].show =!this.students[index].show
      //   console.log(id)
      // }
    }
  }
</script>

<style scoped>
.container {
  width: 70%;
  height: auto;
}
/* card */
.card {
    width: 26%;
    margin: 0 auto;
    padding: 0.9rem;
    border-radius: 0.5rem;
    background-color: #fff;
    border-top: 2px solid #22BBEA ;
}
.card-body {
 box-shadow: rgba(80, 78, 76, 0.3) 0px 0px 0px 2px;
}
</style>