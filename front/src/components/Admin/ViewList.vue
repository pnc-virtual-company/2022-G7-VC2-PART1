<template>
<!-- <FormView/> -->
  <!-- <form>
    <div class="relative w-100 flex justify-center">
      <select class="w-50 block appearance-none bg-gray-200 border border-gray-200 text-gray-700 py-2 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" v-model="leave_type">
          <option value="" disabled>Choose type</option>
          <option value="Sick">2022WEB A</option>
          <option value="Headache">2022WEB B</option>
          <option value="Family's Event">2022SNA</option>
      </select>
      <button class="ml-2 bg-blue-500 hover:bg-blue-700 text-white font-bold px-5 rounded focus:outline-none focus:shadow-outline" type="submit">Search</button>
    </div>
  </form> -->
  <div class="flex mt-3 space-x-3 mb-0">
    <div class="card">
      <div class="flex">
        <li class="fa fa-graduation-cap text-4xl text-blue"></li>
        <div class="flex justify-center mt-1">
          <p class="ml-2"><span class="text-orange">12</span> students</p>
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
// import axios from 'axios'
// import FormView from '@/components/Admin/FormCreate.vue'
  export default {
    // props: {data: Object},
    // components: { FormView },
    // data() {
    //   return {
    //     url: "http://127.0.0.1:8082/api/students/",
    //     students: []
    //   }
    // },
    // methods: {
    //   getDataOfStudent() {
    //     axios.get(this.url, this.image).then((res) => {
    //       let students = res.data;
    //       for(let student of students){
    //         student.show = false;
    //       }
    //       this.students = students;
    //       console.log(this.students);
    //     })
    //   },   
    //   showDetail(id) {
    //     let index = this.students.findIndex(student => student.id ==id);
    //     this.students[index].show =!this.students[index].show
    //     console.log(id)
    //   }
    // },
    // mounted() {
    //   return this.getDataOfStudent()
    // }
  }
</script>

<style scoped>
.container {
  width: 70%;
  height: auto;
}
/* card */
.card {
    width: 24%;
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