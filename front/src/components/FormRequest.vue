<template>
  <div class="container mt-5 d-flex justify-content-center">
    <form @submit.prevent="newRequest" class="w-50 p-4">
      <h1 class="text-center p-1">Request to Trainer</h1>
      <hr />
      <div class="form-group">
        <label>Leave type</label>
        <select class="form-control" v-model="leave_type">
          <option disabled value="">Choose</option>
          <option value="Sick">Sick</option>
          <option value="Go Home">headache</option>
          <option value="Busy">family's Event</option>
        </select>
      </div>

      <label class="mt-1">StartData</label>
      <div class="w-100 d-flex">
        <div class="form-group w-100">
          <input
            class="form-control"
            type="date"
            placeholder="Input data"
            v-model="start"
          />
        </div>

        <div class="form-group w-100 ml-2">
          <select class="form-control" v-model="SpecificStartTime">
            <option value="Morning">Morning</option>
            <option value="Afternoon">Afternoon</option>
          </select>
        </div>
      </div>

      <label>EndData</label>
      <div class="w-100 d-flex">
        <div class="form-group w-100">
          <input
            type="date"
            placeholder="Input data"
            class="form-control"
            v-model="end"
          />
          <p class="text-red-600 mt-1" v-if="validateDate=='true'">corrected</p>
          <p class="text-red-600 mt-1" v-else-if="validateDate=='false'">start date isn't greater than and end date</p>
        </div>

        <div class="form-group w-100 ml-2">
          <select class="form-control" v-model="SpecificEndTime">
            <option value="Morning">Morning</option>
            <option value="Afternoon">Afternoon</option>
          </select>
        </div>
      </div>

      <div class="w-100 d-flex">
        <div class="form-group w-100 mt-4">
          <label>Duration: </label>
          <span class="p-1.5 text-red font-bold">{{ differentDate }} days</span>
        </div>
      </div>

      <label>Cause(Reason)</label>
      <div class="form-group w-100">
        <textarea id="w3review" name="w3review" class="form-control"  v-model="reason" ></textarea>
      </div>

      <div class="form-group d-flex card-btn ml-2">
        <button class=" btn bg-green-600 text-slate-50 " :disabled="validateDate=='false'"  type="submit"  @click="alertPopUP">Submit</button>
      </div>
    </form>
  </div>
</template>

<script>
import moment from "moment";
import axios from "axios";
import Swal from 'sweetalert2'
export default {
  data() {
    return {
      start: "",
      end:"",
      SpecificStartTime: "",
      SpecificEndTime:"",
      leave_type:"",
      reason: "",
      studentid:1,
      isPast:0,
      Padding:"Approve",
      url:'http://127.0.0.1:8082/api/request/',
      listDate:[]
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
      duration:parseInt(this.differentDate),student_id:this.studentid}

      this.listDate.push(list)

      axios.post(this.url,list).then(response => { 
          console.log('Date:'+ this.listDate,response);
      })
      this.start = ''
      this.end=''
      this.SpecificEndTime=''
      this.SpecificStartTime=''
      this.leave_type =''
      this.cause=''

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
       
        console.log(dateforLeave);
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
  border-top: 5px solid orange;
  border-radius: 5px;
  box-shadow: rgba(50, 50, 93, 0.25) 0px 6px 12px -2px,
    rgba(0, 0, 0, 0.3) 0px 3px 7px -3px;
}
h1 {
  font-family: Arial, Helvetica, sans-serif;
  font-size: 20px;
}
.card-btn {
  display: flex;
  justify-content: center;
  align-items: center;
  text-align: center;
  margin: 0 auto;
  margin-top: 15px;
}

textarea,select,input {
  border: 3px solid rgb(123, 140, 233);
  background: rgb(240, 240, 240);
  border-radius: 5px;
}
</style>