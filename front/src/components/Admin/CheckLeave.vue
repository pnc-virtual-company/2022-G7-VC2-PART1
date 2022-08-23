<template>
  <div class="w-full flex justify-between">
      <div v-for="items of listCheck" :key="items" >
        <img :src="items.profile" :alt="items.profile">
        <div class="infor ">
          <h3>{{items.first_name}}</h3>
          <h3>{{items.last_name}}</h3>
          <h3>{{items.email}}</h3>
        </div>
      </div>
  </div>

</template>

<script>
import axios from 'axios';
export default {
data(){
  return {
    url:'http://127.0.0.1:8082/api/students',
    listCheck:[],
  }
},
methods:{
  getDate(){
    axios.get(this.url).then(response =>{
      this.listCheck = response.data
      // return this.listCheck;
      console.log(this.listCheck);
    }
    )
  }
},
mounted(){
  return this.getDate();
}
}
</script>

<style>

</style>