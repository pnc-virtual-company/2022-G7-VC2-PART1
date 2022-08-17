<template>
  <nav class="flex justify-between align-center">
    <div class="logo my-auto">
      <h2 class="flex justify-items-stretch ml-3" items-center>SLMS</h2>
    </div>
        <div class="flex justify-start align-center">
          <router-link class="m-3 text-lg text-white text-bold" to="/list">List All Leave</router-link>
          <router-link class="m-3 text-lg text-white text-bold" to="/request">New Request</router-link>
        </div>

      <div class="flex justify-between align-center p-2">
        <h2 class="m-2">Rady Y</h2>
        <h2 class="m-2">Sign out</h2>
    </div>
</nav>

</template>

<script>
export default {

}
</script>

<style>

</style>