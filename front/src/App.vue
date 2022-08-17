
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
  width: 100%;
  background: #45b6fe;
  box-shadow: rgba(0, 0, 0, 0.15) 0px 3px 3px 0px;
  border-radius: 5px;
}

nav a.router-link-exact-active{
  background:
#FFAD5C;
  border-radius: 5px;
  padding: 5px;
}
nav a{
  border:none; 
  text-decoration: none;
}

.fa-sign-out {
  font-size: 25px;
  color: #FFAD5C;
  cursor: pointer;
}
</style>