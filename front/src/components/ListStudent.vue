<template>
  <div class="w-4/5 flex justify-between ml-4 mt-5">
    <div class="w-1/4 flex justify-evenly m-2 ">
      <select class="w-1/2 bg-blue-500 text-center rounded-md outline-none text-white">
        <option value="" disabled>Choose</option>
        <option>Sick</option>
        <option>Go home</option>
        <option>Shoping</option>
      </select>
      <select class="w-1/2 bg-orange ml-4 text-center p-2 rounded-md text-white outline-none" v-model="onChoose">
        <option value="" disabled>Choose</option>
        <option>Accept</option>
        <option>Reject</option>
        <option>Cancel</option>
      </select>
    </div>
    <div class="w-1/5">
      <h1 class="text-center text-white bg-blue-500 mt-4 w-1/2 p-2.5 rounded-md">Table</h1>
    </div>
</div>
<div class="mt-4 d-flex w-4/5 ml-4">
  <table>
    <thead class="text-center">
      <tr>
        <th>StartDate</th>
        <th>EndDate</th>
        <th>Reason</th>
        <th>Duration</th>
        <th>Leave type</th>
        <th>Status</th>
        <th>Request Date</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Alfreds Futterkiste</td>
        <td>Maria Anders</td>
        <td>Germany</td>
        <td>Alfreds Futterkiste</td>
        <td>Maria Anders</td>
        <td>Germany</td>
        <td>Germany</td>
      </tr>
      <tr>
        <td>Alfreds Futterkiste</td>
        <td>Maria Anders</td>
        <td>Germany</td>
        <td>Alfreds Futterkiste</td>
        <td>Maria Anders</td>
        <td>Germany</td>
        <td>Germany</td>
      </tr>
    </tbody>
  </table>
</div>
</template>

<script>
export default {
  data(){
    return{
      onChoose:'Accept',
    }
  },
  computed(){
    // dataStatus(){
    //   if(this.)
    // }
  }
}
</script>

<style scoped>
table {
  width: 90%;
}
.table, th, td {
  border:2px solid rgb(176, 167, 167);
  padding: 10px;
}
.table, th {
  background: #2a2ab9;
  color: #fff;
}
tr:hover {
  background: #45b6fe;
}
.form-group {
  width: 55%;
  margin: auto;
}
.form-control {
  width: 100%;
}
</style>