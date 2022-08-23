<template>
<div class="w-full flex justify-between">
  <div class="w-[80%]">
    <div class="w-full flex justify-between ml-4 mt-5">
      <div class="w-1/4 flex justify-evenly m-2 ">
        <select class="w-1/2 bg-blue-500 text-center p-2 rounded-md outline-none text-white" v-model="LeaveType">
          <option value="" disabled>Choose Type</option>
          <option value="">Show All</option>
          <option value="sick">Sick</option>
          <option value="headache">headache</option>
          <option value="family's Event">family's Event</option>
        </select>
        <select class="w-1/2 bg-orange-500 ml-4 text-center p-2 rounded-md outline-none text-color text-white" v-model="onStatus">
          <option value="">Show All</option>
          <option value="Approve">Approve</option>
          <option value="Reject">Reject</option>
          <option value="Padding">Padding</option>
        </select>
      </div>
  </div>

  <div class="mt-4 d-flex w-full ml-4">
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
            <td>{{list.start_date}}</td>
            <td>{{list.end_date}}</td>
            <td>{{list.leave_Type}}</td>
            <td>{{list.duration}}</td>
            <td>{{list.reason}}</td>
            <td :class="{'padding':list.status=='Padding','approve':list.status=='Approve','reject':list.status=='Reject'}">{{list.status}}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
  <Card/>
 
</div>

</template>

<script>
import Card from "./CardView.vue";
import axios from 'axios';
export default {
  components:{
    Card,
  },
  data() {
    return {
      URL: "http://127.0.0.1:8082/api/request",
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
       dataFilter=this.lists.filter(value =>(value.status == this.onStatus )&&(value.leave_Type == this.LeaveType));
      // }else if(this.LeaveType != '' ) {
        //   return this.lists.filter(value => value.leave_Type == this.LeaveType);
      }else if(this.onStatus =='' && this.LeaveType!='') {
       dataFilter=this.lists.filter(value =>(value.leave_Type == this.LeaveType));
        }
      else if(this.onStatus !='' && this.LeaveType=='') {
        dataFilter= this.lists.filter(value =>(value.status == this.onStatus ));
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
  color: rgb(9, 165, 9);
  font-weight: bold;
}
.padding{
  color: rgb(216, 170, 3);
    font-weight: bold;
}
.reject{
  color: rgba(192, 21, 9, 0.816);
    font-weight: bold;
}
</style>