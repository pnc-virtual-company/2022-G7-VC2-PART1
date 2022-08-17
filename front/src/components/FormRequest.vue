<template>
  <div class="container mt-5 d-flex justify-content-center">
    <form action="#" class="w-50 p-4">
      <h1 class="text-center p-1">Request to Trainer</h1>
      <hr />
      <div class="form-group ml-2">
        <label>Leave type</label>
        <select class="form-control">
          <option disabled value="">Choose</option>
          <option value="">Sick</option>
          <option>Go home</option>
          <option>Busy</option>
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
        <textarea id="w3review" name="w3review" rows="2" cols="71"></textarea>
      </div>

      <div class="form-group d-flex card-btn ml-2">
        <button class="btn btn-info">Submit</button>
        <button class="btn btn-danger ml-2">Cancel</button>
      </div>
    </form>
  </div>
</template>

<script>
import moment from "moment";
export default {
  data() {
    return {
      start: "",
      end: "",
      SpecificStartTime: "",
      SpecificEndTime: "",
    };
  },
  computed: {
    differentDate() {
        let isStart =
        this.start == this.end && this.start != "" && this.end != "";
        let fullDay =(this.SpecificStartTime ==this.SpecificEndTime);
        let dateTime = 0;
      if (this.start != "" && this.end != "") {
        dateTime = Math.abs(
          moment(this.start, "YYYY.MM.DD HH:mm").diff(
            moment(this.end, "YYYY.MM.DD HH:mm"),
            "days"
          )
        );
      }
      if (
        !fullDay
      ) {
        dateTime += 0.5;
      }
      console.log( isStart,fullDay);
   
      return dateTime;
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