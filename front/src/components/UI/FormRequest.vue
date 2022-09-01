<template>
  <div class="container mt-5 flex justify-center w-[90%] m-auto">
    <form @submit.prevent="newRequest" class="w-[50%] p-4">
      <p class="text-center text-blue text-xl p-1">CREATE REQUEST</p><hr />
      <div class="relative w-[100%]">
        <h2 class="mt-2 p-2">Leave Type</h2>
        <select class="w-full block appearance-none bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white" v-model="leave_type">
            <option value="" disabled>Choose type</option>
            <option value="sick">Sick</option>
            <option value="headache">Headache</option>
            <option value="family's Event">Family's Event</option>
        </select>
        <div class="mt-1 pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
          <svg class="fill-current h-4 w-5 mt-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
        </div>
      </div>
      <h2 class="mt-2 p-2">Start Date</h2>
      <div class="flex flex-wrap -mx-3">
        <div class="w-full px-3 flex space-x-4 relative">
          <input class="w-80 appearance-none block bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-name" type="date" min="2022-08-23" v-model="start">
          <div class="relative w-80">
            <select class="w-full block appearance-none bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white" v-model="SpecificStartTime">
                <option value="" disabled>Choose type</option>
                <option>Morning</option>
                <option>Afternoon</option>
            </select>
            <div class="mb-3 pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
              <svg class="fill-current h-4 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
            </div>
          </div>
        </div>
      </div>
      <h2 class="p-2">EndData</h2>
         <div class="flex flex-wrap -mx-3">
        <div class="w-full px-3 flex space-x-4 relative">
          <input class="w-80 appearance-none block bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-name" type="date" min="2022-08-23"  v-model="end">
          <div class="relative w-80">
            <select class="w-full block appearance-none bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white" v-model="SpecificEndTime">
                <option value="" disabled>Choose type</option>
                <option>Morning</option>
                <option>Afternoon</option>
            </select>
            <div class="mb-3 pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
              <svg class="fill-current h-4 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
            </div>
          </div>
        </div>
      </div>
        <div class="w-100 p-2">
          <p class="text-red-600 mt-1" v-if="validateDate=='false'">start date isn't greater than and end date</p>
          <label>Duration: </label>
          <span class="p-1.5 text-red-600 font-bold">{{ differentDate }} days</span>
        </div>
      <h2 class="p-2">Cause(Reason)</h2>
      <div class="relative w-100 ">
        <input class="mb-3 w-full block appearance-none bg-gray-300 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white" placeholder="Input" v-model="reason">
      </div>
      <div class="w-full p-1">
        <button @click="alertPopUP" :disabled="validateDate=='false'" class="w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2.5 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">Request</button>
      </div>
    </form>
  </div>
</template>

<script>
import moment from "moment";
import axios from "../../http.js";
import Swal from 'sweetalert2'
export default {
  inject:['userId'],
  data() {
    return {
      start: "",
      end:"",
      SpecificStartTime: "",
      SpecificEndTime:"",
      leave_type:"",
      reason: "",
      isPast:0,
      Padding:"Padding",
      listDate:[],
      // userId: localStorage.getItem("userId")
    };
  },
  methods:{
    alertPopUP() {
      Swal.fire({
        position: 'center',
        icon: 'success',
        title: 'Your data has been saved',
        showConfirmButton: false,
        timer: 1500
      })
    },
    newRequest(){
      let notEmptydata = this.start !="" && this.end !="" && this.leave_type !="" && this.reason !="" && this.SpecificStartTime !="" && this.SpecificEndTime !="";
      let list = {start_date:this.start ,end_date:this.end, leave_Type:this.leave_type, status:this.Padding, reason:this.reason,
      duration:parseInt(this.differentDate),student_id:localStorage.userId}

      this.listDate.push(list)
  // =============request new leave =====================
      axios.post('request', list).then(response => { 
          console.log('Date:'+ this.listDate,response,localStorage.userId);
      })
      this.start = ''
      this.end=''
      this.SpecificEndTime=''
      this.SpecificStartTime=''
      this.leave_type =''
      this.reason=''

      if(!notEmptydata){
        Swal.fire({
          position: 'center',
          icon: 'warning',
          title: 'Please completed all your date',
          showConfirmButton: false,
          timer: 1500
        })
      }
    }
    },
  computed: {
    differentDate() {
        let notEmpty = this.start !="" && this.end !="" ;
        let isStart = this.start == this.end && this.start !="" && this.end !="" ;
        let fullDay =(this.SpecificStartTime ==this.SpecificEndTime);
        let halfDate = (this.SpecificStartTime !="" && this.SpecificEndTime != "")
        let dateforLeave = moment(this.start, "YYYY.MM.DD HH:mm").diff(moment(this.end, "YYYY.MM.DD HH:mm"));
        let dateTime = 0;
        
        if(dateforLeave <0 || dateforLeave == 0){
          
          if ((notEmpty ) && (halfDate)) {
            dateTime = Math.abs(moment(this.start, "YYYY.MM.DD HH:mm").diff(moment(this.end, "YYYY.MM.DD HH:mm"),"days"));
              } 
              if(isStart && fullDay && halfDate){
                dateTime += 0.5;
              }
              else if(fullDay && notEmpty && halfDate){
                dateTime +=0.5
              }
              else if(!fullDay && halfDate) {
                dateTime +=1
              }
        }
        return dateTime;
    },
    validateDate(){
      let isValid = 'false';
       let dateforLeave = moment(this.start, "YYYY.MM.DD HH:mm").diff(moment(this.end, "YYYY.MM.DD HH:mm"));
       if(isNaN(dateforLeave) ){
         isValid = 'not completed';
       }
    
       if(dateforLeave<=0){
         isValid = 'true'
       }
    
    return isValid;
    },
  },
};
</script>

<style scoped>
form {
  box-shadow: rgba(50, 50, 93, 0.25) 0px 6px 12px -2px,
    rgba(0, 0, 0, 0.3) 0px 3px 7px -3px;
}
h1 {
  font-family: Arial, Helvetica, sans-serif;
  font-size: 20px;
}

</style>