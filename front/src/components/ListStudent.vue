<template>
  <div class="w-4/5 flex justify-between ml-4 mt-5">
    <div class="w-1/4 flex justify-evenly m-2 ">
      <select class="w-1/2 bg-emerald-500 text-center p-2 rounded-md outline-none text-white" v-model="LeaveType">
        <option value="" disabled>Choose Type</option>
        <option value="">Show All</option>
        <option value="Sick">Sick</option>
        <option value="headache">headache</option>
        <option value="family's Event">family's Event</option>
      </select>
      <select class="w-1/2 bg-cyan-600 ml-5 text-white text-center p-2 rounded-md outline-none text-white" v-model="onStatus">
        <option value="">Show All</option>
        <option value="Approve">Approve</option>
        <option value="Reject">Reject</option>
        <option value="Padding">Padding</option>
      </select>
    </div>
    <div class="w-1/5">
      <h1 class="text-center text-white bg-emerald-600 mt-4 w-1/2 p-2.5 rounded-md">Table</h1>
    </div>
</div>

<div class="mt-4 d-flex w-4/5 ml-4">
  <table>
    <thead class="text-center">
      <tr>
        <th>START DATE</th>
        <th>END DATA</th>
        <th>LEAVE TYPE</th>
        <th>DURATION</th>
        <th>REASON</th>
        <th>STATUS</th>
      </tr>
    </thead>
    <tbody>
      <tr v-for="list of dataStatus" :key="list">
        <td>{{list.Start_date}}</td>
        <td>{{list.End_date}}</td>
        <td>{{list.leave_Type}}</td>
        <td>{{list.Status}}</td>
        <td>{{list.Reason}}</td>
        <td :class="{'padding':list.Status=='Padding','approve':list.Status=='Approve','reject':list.Status=='Reject'}">{{list.Status}}</td>
      </tr>
    </tbody>
  </table>
</div>
</template>

<script>
import axios from 'axios';
export default {

  data() {
    return {
      URL: "http://127.0.0.1:800/api/request",
      lists: [],
      onStatus: '',
      status: false,
      color:'',
      LeaveType:''
    }
  },
  computed:{
    dataStatus(){
     let  dataFilter = []
      if(this.onStatus != '' && this.LeaveType!='' ) {
       dataFilter=this.lists.filter(value =>(value.Status == this.onStatus )&&(value.leave_Type == this.LeaveType));
      // }else if(this.LeaveType != '' ) {
        //   return this.lists.filter(value => value.leave_Type == this.LeaveType);
      }else if(this.onStatus =='' && this.LeaveType!='') {
       dataFilter=this.lists.filter(value =>(value.leave_Type == this.LeaveType));
        }
      else if(this.onStatus !='' && this.LeaveType=='') {
        dataFilter= this.lists.filter(value =>(value.Status == this.onStatus ));
        }
        else{
          dataFilter = this.lists;
        }

        return dataFilter ;
    }
  },
  methods: {
      getData() {
        axios.get(this.URL).then((res) => {
          this.lists = res.data
        })  
      }
    },
    mounted() {
      return this.getData()
    },
}


</script>

<style scoped>
table {
  width: 90%;
}
.table, th, td {
  border-right: 2px solid white;
  padding: 10px;
}
.table, th {
  background: #6095C9;
  color: #fff;
  border-bottom: no;
}
tr:hover {
  background: #45b6fe;
}
tr:nth-child(even) {
  background: #D9E0ED;
}
tr:nth-child(odd) {
  background:#EDF1F6;
}
.form-group {
  width: 55%;
  margin: 0 auto;
}
.form-control {
  width: 100%;
}
.approve{
  color: green;
}
.padding{
  color: rgba(0, 119, 255, 0.611);
  
}
.reject{
  color: rgba(9, 192, 125, 0.816);
}
</style>