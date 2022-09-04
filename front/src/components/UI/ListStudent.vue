<template>
  <div class="flex w-full mt-5 mb-3 justify-center space-x-4">
    <select class="bg-blue-400 text-center py-2 rounded-md outline-none text-white" v-model="LeaveType">
      <option value="" disabled>Leave type</option>
      <option value="">Show All</option>
      <option value="sick">Sick</option>
      <option value="headache">headache</option>
      <option value="family's Event">family's Event</option>
    </select>
    <select class="bg-orange-300 text-center py-2 px-2 rounded-md outline-none text-white" v-model="onStatus">
      <option value="" disabled>Status type</option>
      <option value="">Show All</option>
      <option value="Approve">Approve</option>
      <option value="Reject">Reject</option>
      <option value="Padding">Padding</option>
    </select>
  </div>
  <div class="flex justify-center">
    <table class="w-[86%]">
      <thead class="text-center">
        <tr>
          <th class="bg-blue-400">ID</th>
          <th class="bg-blue-400">START DATE</th>
          <th class="bg-blue-400">END DATA</th>
          <th class="bg-blue-400">LEAVE TYPE</th>
          <th class="bg-blue-400">DURATION</th>
          <th class="bg-blue-400">REASON</th>
          <th class="bg-blue-400">STATUS</th>
        </tr>
       </thead>
        <tbody>
          <tr v-for="list of dataStatus" :key="list">
            <td><span class="flex justify-center">{{list.id}}</span></td>
            <td>{{list.start_date}}</td>
            <td>{{list.end_date}}</td>
            <td>{{list.leave_Type}}</td>
            <td>{{list.duration}} day</td>
            <td>{{list.reason}}</td>
            <td :class="{'padding':list.status=='Padding','approve':list.status=='Approve','reject':list.status=='Reject'}"><span class="flex justify-center">{{list.status}}</span></td>
          </tr>
        </tbody>
      </table>
    </div>
</template>
<script>
import axios  from "../../http.js";
export default {
  data() {
    return {
      lists: [],
      onStatus: '',
      status: false,
      LeaveType: '',
      studentId: localStorage.getItem('userId')
    }
  },
  computed: {
    dataStatus(){
     let  dataFilter = []
      if(this.onStatus != '' && this.LeaveType!='' ) {
       dataFilter=this.lists.filter(value =>(value.status == this.onStatus )&&(value.leave_Type == this.LeaveType));
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
      axios.get('getStudentLeave/' + this.studentId).then((res) => {
        this.lists = res.data;
      })
    }
  },
  mounted() {
    this.getData();
  }
}
</script>

<style scoped>
.table, th, td {
  border-right: 2px solid white;
  padding: 8px;
}
.table, th {
  color: #fff;
  border-bottom: no;
}

tr:hover {
  background: #fafcff;
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
  color: rgb(25, 213, 25);
  font-weight: bold;
}
.padding{
  color: rgb(216, 170, 3);
    font-weight: bold;
}
.reject{
  color: red;
    font-weight: bold;
}
select {
  cursor: pointer;
}
</style>