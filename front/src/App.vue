<template>
<div class="app">

  <router-link to="/"/>
  <main>
    <router-view/>
  </main>

  <router-link to="/list"/>

</div>

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
  background: #22BBEA;
  box-shadow: rgba(0, 0, 0, 0.15) 0px 3px 3px 0px;
}

nav a.router-link-exact-active{
  background:
#FFAD5C;
  /* border-radius: 5px; */
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