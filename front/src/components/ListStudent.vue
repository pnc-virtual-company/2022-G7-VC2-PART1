<template>
  <div class="form-group d-flex justify-content-center mt-5">
    <select class="form-control">
      <option value="Accept">Accept</option>
      <option value="Reject">Reject</option>
      <option value="Cencel">Cencel</option>
    </select>
    
  <div class="d-flex w-50 ml-2">
     <select class="form-control">
      <option value="Sick leave">Sick leave</option>
      <option value="Family's Event">Family's Event</option>'
      <option value="Headache">Headache</option>
    </select>
    <button class="btn btn-primary ml-1">Search</button>
  </div>
</div>

<div class="mt-5 d-flex justify-content-center">
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
/* .table, th {
  background: #2a2ab9;
  color: #fff;
} */
tr:hover {
  background: #fafcff;
}
.form-group {
  width: 55%;
  margin: 0 auto;
}
.form-control {
  width: 100%;
}
</style>