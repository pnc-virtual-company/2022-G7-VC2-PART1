<template>
<div class="w-full position flex justify-center bg-gray-200 space-x-2 p-5 space-x-3">
  <div class="card">
    <div class="flex">
      <img :src="require('../../assets/padding.png')" width="35">
      <div class="flex justify-center align-center mt-2">
        <p class="ml-2 text-black">Padding: <span class="ml-1">{{filterPadding}}</span></p>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="flex">
      <img :src="require('../../assets/approve.png')" width="35">
      <div class="flex justify-center align-center mt-2">
        <p class="ml-2 text-black">Approve: <span class="ml-1">{{filterApprove}}</span></p>
      </div>
    </div>
  </div>
  <div class="card" >
    <div class="flex">
      <img :src="require('../../assets/reject.png')" width="35">
      <div class="flex justify-center align-center mt-2 ml-2">
        <p class="text-black">Reject: <span class="text-red-500 ml-1">{{filterReject}}</span></p>
      </div>
    </div>
  </div>
</div>
<div class="w-full flex justify-center mt-4">
  <div class="card-body w-full p-5 mt-5">
  <!-----------------------------table-display-request-------------------------->
    <table class="bg-white m-auto w-full lg:my-4 box-border border-collapse border border-slate-100">
      <thead>
        <tr class="box-border">
          <th class="lg:text-md text-sm border-b-2 lg:p-5 p-0 bg-gray-100 border text-blue-500 border-slate-100">ID</th>
          <th class="lg:text-md text-sm border-b-2 lg:p-5 p-0 bg-gray-100 border text-blue-500 border-slate-100">FIRST NAME</th>
          <th class="lg:text-md text-sm border-b-2 lg:p-5 p-0 bg-gray-100 border text-blue-500 border-slate-100">LAST NAME</th>
          <th class="lg:text-md text-sm border-b-2 lg:p-5 p-0 bg-gray-100 border text-blue-500 border-slate-100">GENDER</th>
          <th class="lg:text-md text-sm border-b-2 lg:p-5 p-0 bg-gray-100 border text-blue-500 border-slate-100">LEAVE TYPE</th>
          <th class="lg:text-md text-sm border-b-2 lg:p-5 p-0 bg-gray-100 border text-blue-500 border-slate-100">DURATION</th>
          <th class="lg:text-md text-sm border-b-2 lg:p-5 p-0 bg-gray-100 border text-blue-500 border-slate-100">STATUS</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="list of listStudent" :key="list">
          <td class=" border-b-2 py-4 text-center lg:text-sm text-xs break-all">{{list.student.id}}</td>
          <td class=" border-b-2 py-4 text-center lg:text-sm text-xs break-all">{{list.student.first_name}}</td>
          <td class=" border-b-2 py-4 text-center lg:text-sm text-xs break-all">{{list.student.last_name}}</td>
          <td class=" border-b-2 py-4 text-center lg:text-sm text-xs break-all">{{list.student.gender}}</td>
          <td class=" border-b-2 py-4 text-center lg:text-sm text-xs break-all">{{list.leave_Type}}</td>
          <td class=" border-b-2 py-4 text-center lg:text-sm text-xs break-all">{{list.duration}}</td>
          <td class=" border-b-2 py-4 text-center lg:text-sm text-xs break-all text-white space-x-3">
              <button v-if="list.status=='Padding'" class="w-[100px]  bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded" value="Approve" @click="onApprove(list.id,'Approve')">Approve</button>
              <button v-if="list.status=='Padding'" class="w-[100px]  bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded" value ='Reject' @click="onReject(list.id,'Reject')">
                Reject
              </button>
              <span v-if="list.status == 'Approve'" class="p-2 rounded-2xl" :class="{'approve':list.status=='Approve'}">{{list.status}}d</span>
              <span v-else-if="list.status == 'Reject'" class="p-2 rounded-2xl" :class="{'reject':list.status=='Reject'}">{{list.status}}ed</span>
          </td>
        </tr>
      </tbody>
    </table>
    <!-----------------------------end-table-display-request---------------------->
  </div>
</div>
</template>
  
<script setup>
// =======Module imported ===========
import {ref,onMounted,computed} from 'vue'
import axios from "../../http";

// ===========check leave information =============================

let listStudent = ref([]);

// ======== Get Data from url ========

function getData(){
  axios.get("request").then(response =>{
    listStudent.value = response.data
      console.log(listStudent.value);
    })
}
    onMounted(()=>getData());

// ======== On Approve --=======
function onApprove(request_Id,status){
    axios.put('requests/'+request_Id,{status:status}).then(response =>{
      getData();
      // hiden.value=false;
      console.log(response);
    }).catch(error =>{
      console.log(error.request);
    });
    console.log('Data user is here: '+status,request_Id);
}

function onReject(request_Id,status){
    axios.put('requests/'+request_Id,{status:status}).then(response =>{
      console.log(status,request_Id,response);
      getData();
      // hiden.value=false;
    });
}

let filterPadding =computed (()=>{
  return listStudent.value.filter(student =>student.status == 'Padding').length;})
let filterReject = computed (()=>{
  return listStudent.value.filter(student =>student.status == 'Reject').length
});
let  filterApprove= computed (()=>{
  return listStudent.value.filter(student =>student.status == 'Approve').length
});
</script>

<style scoped>
.card-body {
  width: 90%;
  margin-top: 4rem;
}
.card {
  padding: 1rem;
  border-radius: 0.5rem;
  background-color: #fff;
  box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
}
:disabled{
  background-color: #cccccc;
  color: #666666;
}
.approve{
  color: #fff;
  background: green;
}
.reject{
  color: #fff;
  background: red;
}
/* table */
.table, th {
  border: none;
}
tr:hover {
  background: gainsboro;
}
.position {
  position: fixed;
  top: 0;
  margin-top: 4.9rem;
  box-shadow: rgba(0, 0, 0, 0.15) 0px 3px 3px 0px;
}
</style>
