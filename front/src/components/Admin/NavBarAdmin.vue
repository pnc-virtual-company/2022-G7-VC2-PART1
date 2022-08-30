<template>
  <nav class="flex justify-between align-center">
    <div class="logo flex justify-center align-center">
      <img
        :src="require('../../assets/logo-en.png')"
        alt=""
        class="ml-5 w-1/2"
      />
    </div>
    <div class="flex justify-center align-center">
      <router-link
        class="m-3 text-white text-decoration-none text-lg"
        to="/StudentList"
        >Student lists</router-link
      >
      <router-link
        class="m-3 text-white text-decoration-none text-lg"
        to="/CheckLeave"
        >check leave</router-link
      >
    </div>
    <div class="flex justify-center">
      <div
        class="bg-orange-500 text-center rounded-md outline-none text-white p"
      >
        <a @click="logout" href="#" class="text-decoration-none">Sign out</a>
      </div>
    </div>
  </nav>
</template>
<script>
export default {
 
  methods: {
    logout() {
      localStorage.removeItem("userId");
      this.$router.push({ name: "FormLogIn" });
    },
  },
};
</script>

<style scoped>

</style>
