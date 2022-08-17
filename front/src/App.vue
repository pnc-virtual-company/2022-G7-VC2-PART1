<template>
<div class="app">


  <router-link to="/"/>
  <main>
    <router-view/>
  </main>
</div>
</template>
<script>

export default {

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
}
.content-nav{
  width: 100%;
  display: flex;
  justify-content: space-between;
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