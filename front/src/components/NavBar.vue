<template>
<nav class="flex justify-between align-center">
    <div class="logo my-auto flex">
      <img :src="require('../assets/logo.png')" alt="" class="w-1/6 ml-2">
      <h2 class="flex items-center ml-2 font-bold text-white " items-center>SLMS</h2>
    </div>
      <div class="flex justify-start align-center">
        <router-link class="font-mono m-3 text-lg text-white text-bold " to="/list">List All Leave</router-link>
        <router-link class="font-mono m-3 text-lg text-white text-bold" to="/request">New Request</router-link>
      </div>
      <div class="flex justify-between align-center p-2">

        <img :src="require('/src/assets/profile.png')" width="60">
        <h2 class="m-2 ml-2 font-bold text-white text-lg">Rady Y</h2>
        <h2 class="m-2 ml-2 text-bold text-white text-lg"><a @click="logout" href="#">Sign out</a></h2>
        <li class="fa fa-sign-out"></li>

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