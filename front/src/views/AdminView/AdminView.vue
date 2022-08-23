<template>
  <div class="admin">
     <Navbar-Admin/>
    <StudentList/>

  </div>

</template>

<script>

import StudentList from '../../components/Admin/StudentList.vue'
export default {
  components:{
    StudentList,
   
  }
}
</script>

<style>

</style>