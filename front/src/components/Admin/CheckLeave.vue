<template>
  <div class="contianer">  
    <div class="w-[75%] bg-gray-300 m-auto rounded-t-lg mt-5">
        <div class="title text-white bg-sky-600 p-[10px] text-xl font-bold rounded-t-lg">
          <h2 class="mt-[15px]">CheckLeave</h2>
        </div>
        <div class="contain text-center p-[8px] w-[80%] m-auto" v-for="list of listStudent" :key="list">
          <div class="flex items-center p-[10px] bg-white ">
               <div class="w-[80px] h-[80px] ml-[5%]">
                 <img :src="require('../../assets/profile.png')" class="w-[80px] h-[80px] rounded-full">
               </div>
               <div class="w-[45%] text-left ml-[2%]">
                <div class="">
                  <p class="text-[20px] font-bold">{{list.student.first_name}} {{list.student.last_name}}</p>
                  <p class="text-[20px]"> class_id : {{list.student.class_id}}</p>
                </div>
                <div class="flex ">
                  <p class="text-[20px]">Leave type :</p>
                  <p class="text-[20px] text-lime-600 ml-[3%]">{{list.leave_Type}}</p>
                </div>
                <div class="flex">
                  <p class="text-[20px]">Duration :</p>
                  <p class="text-[20px] text-rose-500 ml-[3%]"> {{list.duration}} day</p>
                </div>
              </div> 
               <div class="butto mt-0 w-[30%] flex justify-center ">
                 <button v-if="list.status=='Padding'" class="w-[100px] m-3 bg-blue-500 bg-green-600 text-white font-bold py-2 px-4 rounded" value="Approve" @click="onApprove(list.id,'Approve')">Approve</button>
                 <button v-if="list.status=='Padding'" class="w-[100px] m-3 bg-blue-500 bg-red-700 text-white font-bold py-2 px-4 rounded" value ='Reject' @click="onReject(list.id,'Reject')">
                   Reject
                 </button>
                 <p v-else :class="{'approve':list.status=='Approve','reject':list.status=='Reject'}" class="font-bold text-xl">{{list.status}}</p>
               </div>
          </div>
        </div>
    </div>
  </div> 
  </template>
  
  
  <script setup>
  // =======Module imported ===========
  import {ref,onMounted} from 'vue'
  import axios from "../../http";
  
  // ===========check leave information =============================
  
  let listStudent = ref();
  // let url = 'http://localhost:8082/api/leave/'

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
      axios.put('request/'+request_Id,{status:status}).then(response =>{
        getData();
        // hiden.value=false;
        console.log(response);
      }).catch(error =>{
        console.log(error.request);
      });
      console.log('Data user is here: '+status,request_Id);
  }
  
  function onReject(request_Id,status){
      axios.put('request/'+request_Id,{status:status}).then(response =>{
        console.log(status,request_Id,response);
        getData();
        // hiden.value=false;
      });
  }
  
  </script>
  
  
  
  <style>
  :disabled{
    background-color: #cccccc;
    color: #666666;
  }
  .approve{
    color: rgb(55, 223, 4);
  }
  .reject{
    color: red;
  }
  </style>
  