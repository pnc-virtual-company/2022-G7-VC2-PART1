<template>
<nav class="flex justify-between align-center">
    <div class="logo w-1/5">
      <img :src="require('../assets/logo-en.png')" alt="" class="ml-5 w-1/2">
    </div>
      <div class="flex justify-center align-center mt-4">
        <router-link class="m-3 text-white text-decoration-none text-lg" to="/list">List All Leave</router-link>
        <router-link class="m-3 text-white  text-decoration-none text-lg" to="/request">New Request</router-link>
      </div>
      <div class="flex  align-center">
        <h2 class="w-full bg-orange-500 text-center p-3 rounded-md outline-none  mr-5 text-white"><a @click="logout" href="#" class="text-decoration-none">Sign out</a></h2>
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