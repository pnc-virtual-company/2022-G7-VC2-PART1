<template>
<div class="app">
<<<<<<< HEAD
  <router-link to="/"/>
  <main>
    <router-view/>
  </main>
=======
  <router-link to="/list"/>
>>>>>>> b4de71584578b0e1c56bccc2b031844f7530dbdc
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