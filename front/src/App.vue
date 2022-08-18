<template>
<div class="app">
  <router-link to="/list"/>
</div>
<main><router-view/></main>

</template>
<script>
export default {
  components:{

  }
}
</script>

<style>
body{
  margin: 0;
  padding: 0;
}
nav{
  position: sticky;
  top: 0;
  width: 100%;
  background: #45b6fe;
  height: 10vh;
}

nav a.router-link-exact-active{
  background:
#FFAD5C;
  border-radius: 5px;
  padding: 2px;
}
nav a{
  border:none; 
  text-decoration: none;
}

.fa-sign-out {
  font-size: 25px;
  color:#5579c6;
  cursor: pointer;
}
</style>