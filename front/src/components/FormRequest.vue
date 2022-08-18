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
          <option value="Go Home">Go home</option>
          <option value="Busy">Busy</option>
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
        <!-- <input type="text" placeholder="Input data" class="form-control"> -->
        <textarea id="w3review" name="w3review" rows="2" cols="71" v-model="cause" ></textarea>
      </div>

      <div class="form-group d-flex card-btn ml-2">
        <button class="btn btn-info" type="submit">Submit</button>
        <button class="btn btn-danger ml-2">Cancel</button>
      </div>

    </form>
  </div>
</template>

<script>
import moment from "moment";
import axios from "axios";
export default {
  data() {
    return {
      start: null,
      end: null,
      SpecificStartTime: null,
      SpecificEndTime: null,
      leave_type:null,
      cause: null,
      studentid:1,
      Padding:"Approve",
      url:'http://127.0.0.1:800/api/request'
    };
  },
  methods:{
    newRequest(){
      let date = {Start_date:this.start,End_date:this.end,Reason:this.cause,leave_Type:this.leave_type,student_id:this.studentid,Status:this.Padding}
      axios.post(this.url,date).then(response => {
        return response.data
      })
      
    }
  },
  computed: {
    differentDate() {
        let notEmpty = this.start !=null && this.end !=null ;
        let isStart = this.start == this.end && this.start !=null && this.end !=null ;
        let fullDay =(this.SpecificStartTime ==this.SpecificEndTime);
        let halfDate = (this.SpecificStartTime !=null && this.SpecificEndTime != null)
        let dateforLeave = moment(this.start, "YYYY.MM.DD HH:mm").diff(moment(this.end, "YYYY.MM.DD HH:mm"));
        let dateTime = 0;
        if(dateforLeave <0 || dateforLeave == 0){
          if ((this.start !=null  && this.end !=null ) && (halfDate)) {
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
      }
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
input,
select {
  border: none;
  background: rgb(210, 207, 207);
}
textarea {
  border: 1px solid gray;
  background: rgb(210, 207, 207);
  border-radius: 5px;
}
</style>