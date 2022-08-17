
<template>
<div class="app">

<<<<<<< HEAD
  <router-link to="/"/>
  <main>
    <router-view/>
  </main>
</div>
=======
      <div class="flex justify-between align-center p-2">
        <img :src="require('/src/assets/profile.png')" width="70">
        <h2 class="m-1">Rady Y</h2>
        <h2 class="m-2">Sign out</h2>
        <li class="fa fa-sign-out"></li>
    </div>
</nav>
<main><router-view/></main>
>>>>>>> 4b4333ea21da65d1e57f095b20e74c456fff3f70
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