<template>
<nav class="flex justify-between align-center">
    <div class="logo my-auto flex">
      <img :src="require('../assets/logo.png')" alt="" class="ml-5 bg-white rounded-full" width="50">
      <h2 class="flex items-center ml-2 font-bold text-white " items-center>SLMS</h2>
    </div>
      <div class="flex justify-start align-center">
        <router-link class="m-3 text-lg not-italic text-white  text-decoration-none" to="/list">List All Leave</router-link>
        <router-link class="m-3 text-lg not-italic text-white  text-decoration-none" to="/request">New Request</router-link>
      </div>
      <div class="flex justify-between align-center p-2">

        <img :src="require('/src/assets/profile.png')" width="40">
        <h2 class="m-1 mr-4 font-bold text-white font-mono">Rady Y</h2>
        <h2 class="m-2 ml-2 text-bold text-indigo-700 font-mono"><a @click="logout" href="#" class="text-decoration-none">Sign out</a></h2>
        <li @click="logout" class="fa fa-sign-out"></li>

    </div>
</nav>

</template>
<script>
export default {
  methods:{
    logout(){
       localStorage.removeItem('user')
        this.$router.push({name:"FormLogIn"})
    }
  }
}
</script>

<style>

</style>